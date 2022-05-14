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

	public function saveinquiries() 
	{
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
						'inquiries_dependents' => $this->input->post('noofdependents'),
						'inquiries_civilstatus' => $this->input->post('civilstatus'),
						'inquiries_country' => $this->input->post('country'),
						'inquiries_city' => $this->input->post('city'),
						'inquiries_notes' => $this->input->post('notes'),
						'inquiries_privacy_consent' => $confirm1,
						'inquiries_info_receiving_consent' => $confirm2,
						'inquiries_status' => 'Created'
					);
			$this->db->insert('inquiries', $data);
/*
			$message = "
							<!DOCTYPE html>
							<html>
							<body>
							<p>Good day!</p>
							<p>
							Here are the details from the e-Client form:
							</p>
							<p>
							".$this->input->post('lastname')."<br>
						    ".$this->input->post('firstname')."<br>
						    ".$this->input->post('middlename')."<br>
						    ".$this->input->post('birthdate')."<br>
						    ".$this->input->post('mobile')."<br>
						    ".$this->input->post('email')."<br>
						    ".$this->input->post('location')."<br>
						    ".$this->input->post('qualifications')."<br>
						    ".$this->input->post('password')."<br>
						    ".$this->input->post('noofdependents')."<br>
						    ".$this->input->post('civilstatus')."<br>
						    ".$this->input->post('nationality')."<br>
						    ".$this->input->post('notes')."<br>
						    Privacy Policy Consent: ".$this->input->post('confirm1')."<br>
						    Receiving Information Consent: ".$confirm2."<br>
							</p>
							<p>Thank you!</p>
							<p>Progress Connect CRM</p>
							</body>
							</html>
						";
			$sender = "ramirezkyl@gmail.com";
		
			$this->load->library('phpmailer_lib');
	        $mail = $this->phpmailer_lib->load();
  
		    $mail->SMTPDebug = 1;
		    $mail->isSMTP();
		    $mail->Host       = 'ssl://smtp.gmail.com';            
		    $mail->SMTPAuth   = true;                                
		    $mail->Username   = 'servicezeronoisemarketing@gmail.com';            
		    $mail->Password   = 'lgbnxidtxswccfzr';                     
		    $mail->SMTPSecure = 'ssl';      
		    $mail->Port       = 465;   
	        
	        $mail->setFrom("ramirezkyl@gmail.com");
	        //$mail->addReplyTo($sender, $this->session->userdata('companyname'));
	        $mail->addAddress("ramirezkyl@gmail.com");
	        $mail->Subject = 'New Inquiries';
	        $mail->isHTML(true);
	        $mailContent = $message;
	        $mail->Body = $mailContent;
	        $mail->send();
*/

	        redirect('clientform');
			//$this->load->view('forms/success');
    	} else {
    		echo "<script>alert('Passwords are not matched!');</script>";
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
		$this->load->view('forms/success');
	}

}