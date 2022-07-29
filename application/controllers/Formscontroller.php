<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('email');
	}

	public function clientform()
	{
		$sql = "SELECT nationality,en_short_name FROM countries";
	    $query = $this->db->query($sql);
	    $nationality = $query->result();

	    $sql2 = "SELECT value FROM qualifications";
	    $query2 = $this->db->query($sql2);
	    $qualifications = $query2->result();

	    $sql3 = "SELECT value FROM civilstatus";
	    $query3 = $this->db->query($sql3);
	    $civilstat = $query3->result();


        $asset_url = base_url()."assets/";
		$data['title'] = "Client Form";
		$data['asset_url'] = $asset_url;
		
		$data['nationality'] = $nationality;
		$data['qualifications'] = $qualifications;
		$data['civilstatus'] = $civilstat;

		$this->load->view('forms/clientform', $data);
	}

	public function programoptionform($poid)
	{
		$sql6 = "SELECT * FROM programoptions po inner join education_provider s on po.provider_id = s.provider_id inner join schoolprograms sp on sp.spid = po.sp_id inner join client c on po.client_id = c.client_id where po.poid = '$poid'";
        $query6 = $this->db->query($sql6);
        $programoptions = $query6->result();

        $sql7 = "SELECT * FROM programoptionsdetails pod where poid = '$poid'";
        $query7 = $this->db->query($sql7);
        $programoptionsdetails = $query7->result();

        $sql8 = "SELECT * FROM programoptions po inner join client c on po.client_id = c.client_id inner join clientscholarship csc on c.client_id = csc.clientid inner join scholarships s on s.scholarshipid = csc.scholarshipid inner join mastersetting m on s.paymenttype = m.id where po.poid = '$poid'";
        $query8 = $this->db->query($sql8);
        $scholarships = $query8->result();

        $data['programoptions'] = $programoptions;
        $data['programoptionsdetails'] = $programoptionsdetails;
        $data['scholarships'] = $scholarships;        
        $data['poid'] = $poid; 

        $asset_url = base_url()."assets/";
		$data['title'] = "Program Options Form";
		$data['asset_url'] = $asset_url;

		$this->load->view('forms/programoptionform', $data);
	}

	public function do_upload() 
	{
		$message = "";
		$birthdate = DateTime::createFromFormat("Y-m-d", $this->input->post('birthdate'));
    	$birthyear = $birthdate->format("Y");
    	$birthmonth = $birthdate->format("m");
    	$birthday = $birthdate->format("d");

    	if($this->input->post('confirm2') !== "") {
    		$confirm2 = 'on';
    	} else {
    		$confirm2 = 'off';
    	}

    	if($this->input->post('confirm1') !== "") {
    		$confirm1 = 'on';
    	} else {
    		$confirm1 = 'off';
    	}

    	$config['upload_path']          = './assets/resume/';
        $config['allowed_types']        = 'jpg|png|pdf|docx';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('resume'))
        {
        	if ($this->input->post('password') == $this->input->post('password2')) {
	    		$data = array(
							'inquiries_surname' => $this->input->post('lastname'),
							'inquiries_firstname' => $this->input->post('firstname'),
							'inquiries_middlename' => $this->input->post('middlename'),
							'inquiries_dob_day' => $birthday,
							'inquiries_dob_month' => $birthmonth,
							'inquiries_dob_year' => $birthyear,
							'inquiries_phoneno' => '',
							'inquiries_mobileno' => $this->input->post('mobile'),
							'inquiries_email' => $this->input->post('email'),
							'inquiries_address' => $this->input->post('city'),
							'inquiries_qualifications' => $this->input->post('qualifications'),
							'inquiries_password' => $this->input->post('password'),
							'inquiries_dependents' => '',
							'inquiries_civilstatus' => $this->input->post('civilstatus'),
							'inquiries_country' => $this->input->post('country'),
							'inquiries_nationality' => $this->input->post('nationality'),
							'inquiries_city' => $this->input->post('city'),
							'inquiries_notes' => $this->input->post('notes'),
							'inquiries_privacy_consent' => $confirm1,
							'inquiries_info_receiving_consent' => $confirm2,
							'inquiries_status' => 'Created',
							'inquiries_resume' => '',
							'inquiries_visaexpdate' => $this->input->post('visaexpdate'),
							'inquiries_visaheld' => $this->input->post('visaheld')
						);
				$this->db->insert('inquiries', $data);

				$emailquery = $this->db->query("SELECT * FROM `emailcontents`");
				$iaremailheader = $emailquery->row()->iaremailheader;
				$iaremailbody = $emailquery->row()->iaremailbody;
				$iaremailfooter = $emailquery->row()->iaremailfooter;

				$message .= "<!DOCTYPE html>
							 <html>
							 <body>";
			    $message .= "<p>".$iaremailheader."</p>";
			    $message .= "<br>";
				$message .= "<p>".$iaremailbody."</p>";
				$message .= "<br>";
				$message .= "<p>".$iaremailfooter."</p>";
				$message .= "</body>
							 </html>
							";
				$sender = "ramirezkyl@gmail.com";
			
				$this->load->library('phpmailer_lib');
		        $mail = $this->phpmailer_lib->load();
	  
	  /*
			    $mail->SMTPDebug = 1;
			    $mail->isSMTP();
			    $mail->Host       = 'ssl://smtp.gmail.com';            
			    $mail->SMTPAuth   = true;                                
			    $mail->Username   = 'servicezeronoisemarketing@gmail.com';            
			    $mail->Password   = 'lgbnxidtxswccfzr';                     
			    $mail->SMTPSecure = 'ssl';      
			    $mail->Port       = 465;   
		*/

			    $mail->isSMTP();
				$mail->Host = 'localhost';
				$mail->SMTPAuth = false;
				$mail->SMTPAutoTLS = false; 
				$mail->Port = 25; 

		        $mail->setFrom("ramirezkyl@gmail.com");
		        //$mail->addReplyTo($sender, $this->session->userdata('companyname'));
		        $mail->addAddress("ramirezkyl@gmail.com");
		        $mail->Subject = 'New Inquiries';
		        $mail->isHTML(true);
		        $mailContent = $message;
		        $mail->Body = $mailContent;
		        $mail->send();

		        redirect('success');
				//$this->load->view('forms/success');
	    	} else {
	    		echo "<script>alert('Passwords are not matched!');</script>";
	    	}
        } else {
        	$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

        	if ($this->input->post('password') == $this->input->post('password2')) {
	    		$data = array(
							'inquiries_surname' => $this->input->post('lastname'),
							'inquiries_firstname' => $this->input->post('firstname'),
							'inquiries_middlename' => $this->input->post('middlename'),
							'inquiries_dob_day' => $birthday,
							'inquiries_dob_month' => $birthmonth,
							'inquiries_dob_year' => $birthyear,
							'inquiries_phoneno' => '',
							'inquiries_mobileno' => $this->input->post('mobile'),
							'inquiries_email' => $this->input->post('email'),
							'inquiries_address' => $this->input->post('city'),
							'inquiries_qualifications' => $this->input->post('qualifications'),
							'inquiries_password' => $this->input->post('password'),
							'inquiries_dependents' => '',
							'inquiries_civilstatus' => $this->input->post('civilstatus'),
							'inquiries_country' => $this->input->post('country'),
							'inquiries_nationality' => $this->input->post('nationality'),
							'inquiries_city' => $this->input->post('city'),
							'inquiries_notes' => $this->input->post('notes'),
							'inquiries_privacy_consent' => $confirm1,
							'inquiries_info_receiving_consent' => $confirm2,
							'inquiries_status' => 'Created',
							'inquiries_resume' => $file_name,
							'inquiries_visaexpdate' => $this->input->post('visaexpdate'),
							'inquiries_visaheld' => $this->input->post('visaheld')
						);
				$this->db->insert('inquiries', $data);

				$emailquery = $this->db->query("SELECT * FROM `emailcontents`");
				$iaremailheader = $emailquery->row()->iaremailheader;
				$iaremailbody = $emailquery->row()->iaremailbody;
				$iaremailfooter = $emailquery->row()->iaremailfooter;

				$message .= "<!DOCTYPE html>
							 <html>
							 <body>";
			    $message .= "<p>".$iaremailheader."</p>";
			    $message .= "<br>";
				$message .= "<p>".$iaremailbody."</p>";
				$message .= "<br>";
				$message .= "<p>".$iaremailfooter."</p>";
				$message .= "</body>
							 </html>
							";
				$sender = "ramirezkyl@gmail.com";
			
				$this->load->library('phpmailer_lib');
		        $mail = $this->phpmailer_lib->load();
	    
	  /*
			    $mail->SMTPDebug = 1;
			    $mail->isSMTP();
			    $mail->Host       = 'ssl://smtp.gmail.com';            
			    $mail->SMTPAuth   = true;                                
			    $mail->Username   = 'servicezeronoisemarketing@gmail.com';            
			    $mail->Password   = 'lgbnxidtxswccfzr';                     
			    $mail->SMTPSecure = 'ssl';      
			    $mail->Port       = 465;   
		*/

			    $mail->isSMTP();
				$mail->Host = 'localhost';
				$mail->SMTPAuth = false;
				$mail->SMTPAutoTLS = false; 
				$mail->Port = 25; 
   
		        $mail->setFrom("ramirezkyl@gmail.com");
		        //$mail->addReplyTo($sender, $this->session->userdata('companyname'));
		        $mail->addAddress("ramirezkyl@gmail.com");
		        $mail->Subject = 'New Inquiries';
		        $mail->isHTML(true);
		        $mailContent = $message;
		        $mail->Body = $mailContent;
		        $mail->send();

		        redirect('success');
				//$this->load->view('forms/success');
	    	} else {
	    		echo "<script>alert('Passwords are not matched!');</script>";
	    	}
        }

    	
	}

	public function saveclientform() 
	{
		$birthdate = DateTime::createFromFormat("Y-m-d", $this->input->post('birthdate'));
    	$birthyear = $birthdate->format("Y");
    	$birthmonth = $birthdate->format("m");
    	$birthday = $birthdate->format("d");

    	if ($this->input->post('password') == $this->input->post('password2')) {
    		$data = array(
						'client_surname' => $this->input->post('lastname'),
						'client_firstname' => $this->input->post('firstname'),
						'client_middlename' => $this->input->post('middlename'),
						'client_dob_day' => $birthday,
						'client_dob_month' => $birthmonth,
						'client_dob_year' => $birthyear,
						'client_phoneno' => '',
						'client_mobileno' => $this->input->post('mobile'),
						'client_overseas_mobileno' => '',
						'client_email' => $this->input->post('email'),
						'client_address' => '',
						'client_suburb' => '',
						'client_state' => '',
						'client_postcode' => '',
						'client_overseas_address' => '',
						'client_flag' => 'active',
						'locked_by_id' => '',
						'client_comments' => '',
						'client_qualifications' => $this->input->post('qualifications'),
						'client_photo' => '',
						'client_office_id' => '',
						'client_ve_day' => '',
						'client_ve_month' => '',
						'client_ve_year' => '',
						'client_event_id' => 0,
						'client_password' => $this->input->post('password'),
						'client_noofchildren' => $this->input->post('noofchildren'),
						'client_civilstatus' => $this->input->post('civilstatus'),
						'client_nationality' => $this->input->post('nationality'),
						'client_country' => $this->input->post('country'),
						'client_notes' => $this->input->post('notes')
					);
			$this->db->insert('client', $data);
			$this->load->view('forms/success');
    	} else {
    		echo "<script>alert('Passwords are not matched!');</script>";
    	}
	}

	public function clientinformation()
	{
		$this->load->view('forms/clientinformation');
	}

	public function success()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Client Form";
		$data['asset_url'] = $asset_url;

		$this->load->view('forms/success', $data);
	}

}