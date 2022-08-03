<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customerinfocontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{

		$sql = "SELECT * FROM client";
        $query = $this->db->query($sql);
        $result = $query->result();

        $sql2 = "SELECT * FROM officer";
        $query2 = $this->db->query($sql2);
        $result2 = $query2->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Client Information";
		$data['asset_url'] = $asset_url;
		$data['clients'] = $result;
		$data['officer'] = $result2;

		if($this->session->officer_role == "regional manager" || $this->session->officer_role == "admin") {
			$officer_id_check = $this->session->officer_id;
			$sql11 = "SELECT * FROM notifications WHERE seen = 0 ORDER BY notif_id DESC LIMIT 20";
			$query11 = $this->db->query($sql11);
			$notifnum = $query11->num_rows();

			$sql12 = "SELECT * FROM notifications ORDER BY notif_id DESC LIMIT 20";
			$query12 = $this->db->query($sql12);
			$notif = $query12->result();
		} else {
			$officer_id_check = $this->session->officer_id;
			$sql11 = "SELECT * FROM notifications WHERE seen = 0 AND officer_id = '$officer_id_check' ORDER BY notif_id DESC LIMIT 20";
			$query11 = $this->db->query($sql11);
			$notifnum = $query11->num_rows();

			$sql12 = "SELECT * FROM notifications WHERE officer_id = '$officer_id_check' ORDER BY notif_id DESC LIMIT 20";
			$query12 = $this->db->query($sql12);
			$notif = $query12->result();
		}

		$data['notifnum'] = $notifnum;
		$data['notif'] = $notif;

		$this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}

		if(isset($this->session->officer_name)) {
			$this->load->view('customerinfo/header', $data);
			$this->load->view('customerinfo/index', $data);
			$this->load->view('customerinfo/footer', $data);
		} else {
			redirect(base_url()."?error3=1");
		}

	}

	public function editclientinfo($client_id) 
	{
		$sql1 = "SELECT * FROM client WHERE client_id = '$client_id'";
        $query1 = $this->db->query($sql1);
        $client = $query1->result();

        $sql2 = "SELECT * FROM offices";
        $query2 = $this->db->query($sql2);
        $offices = $query2->result();

        $sql3 = "SELECT * FROM events";
        $query3 = $this->db->query($sql3);
        $events = $query3->result();

        $sql4 = "SELECT * FROM student_application sa inner join education_provider s on sa.provider_id = s.provider_id inner join client c on c.client_id = sa.client_id where sa.client_id = $client_id";
        $query4 = $this->db->query($sql4);
        $student_application = $query4->result();

        $sql5 = "SELECT * FROM clientscholarship cs inner join client c on c.client_id = cs.clientid inner join scholarships s on s.scholarshipid = cs.scholarshipid";
	    $query5 = $this->db->query($sql5);
	    $clientscholarship = $query5->result();

	    $sql6 = "SELECT * FROM programoptions po inner join education_provider s on po.provider_id = s.provider_id inner join schoolprograms sp on sp.spid = po.sp_id where po.client_id = '$client_id'";
        $query6 = $this->db->query($sql6);
        $programoptions = $query6->result();

        $data['client'] = $client;
        $data['offices'] = $offices;
		$data['events'] = $events;
		$data['student_application'] = $student_application;
		$data['clientscholarship'] = $clientscholarship;
		$data['programoptions'] = $programoptions;

		$asset_url = base_url()."assets/";
		$data['title'] = "Edit/View Client Information";
		$data['asset_url'] = $asset_url;

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('customerinfo/editclientinfo', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function enterclientinfo($inquiry_id) {
		$sql1 = "SELECT client_id FROM client WHERE client_inquiries_id = '$inquiry_id'";
		$query1 = $this->db->query($sql1);

		foreach($query1->result() as $row) {
			redirect(base_url()."index.php/editclientinfo2/".$row->client_id);
		}

	}

	public function editclientinfo2($client_id)
	{
		$sql1 = "SELECT * FROM client WHERE client_id = '$client_id'";
        $query1 = $this->db->query($sql1);
        $client = $query1->result();

        $sql2 = "SELECT * FROM offices";
        $query2 = $this->db->query($sql2);
        $offices = $query2->result();

        $sql3 = "SELECT * FROM events";
        $query3 = $this->db->query($sql3);
        $events = $query3->result();

        $sql4 = "SELECT * FROM student_application sa inner join education_provider s on sa.provider_id = s.provider_id inner join client c on c.client_id = sa.client_id where sa.client_id = $client_id";
        $query4 = $this->db->query($sql4);
        $student_application = $query4->result();

        $sql5 = "SELECT * FROM clientscholarship cs inner join client c on c.client_id = cs.clientid inner join scholarships s on s.scholarshipid = cs.scholarshipid where cs.clientid = '$client_id'";
	    $query5 = $this->db->query($sql5);
	    $clientscholarship = $query5->result();

	    $sql6 = "SELECT * FROM visa_application va inner join client c on va.client_id = c.client_id where va.client_id = $client_id";
	    $query6 = $this->db->query($sql6);
	    $visa_application = $query6->result();

	    $sql7 = "SELECT * FROM expression_of_interest eoi inner join client c on eoi.client_id = c.client_id where eoi.client_id = $client_id";
	    $query7 = $this->db->query($sql7);
	    $eoi = $query7->result();

	    $sql8 = "SELECT * FROM visa_accounts vac inner join visa_application vap on vac.client_visa_id = vap.client_visa_id inner join client c on vap.client_id = c.client_id where vap.client_id = $client_id";
	    $query8 = $this->db->query($sql8);
	    $visa_accounts = $query8->result();

	    $sql9 = "SELECT * from payments p inner join client c on p.payee = c.client_id inner join officer o on o.officer_id = p.processedby inner join mastersetting m on p.paymenttype = m.id where p.barchived = 0 and p.payee = $client_id";
	    $query9 = $this->db->query($sql9);
	    $payments = $query9->result();

	    $sql10 = "SELECT * FROM programoptions po inner join education_provider s on po.provider_id = s.provider_id inner join schoolprograms sp on sp.spid = po.sp_id where po.client_id = '$client_id'";
        $query10 = $this->db->query($sql10);
        $programoptions = $query10->result();

        $this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_clients'] = $row3->privilege_manage_clients;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		        $data['privilege_manage_studentdocs'] = $row3->privilege_manage_studentdocs;
		        $data['privilege_manage_prapps'] = $row3->privilege_manage_prapps;
		        $data['privilege_manage_prdocs'] = $row3->privilege_manage_prdocs;
		        $data['privilege_manage_prfeereceived'] = $row3->privilege_manage_prfeereceived;
		        $data['privilege_manage_prfeepaid'] = $row3->privilege_manage_prfeepaid;
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		}

        //id=2018&name=De%20Leon%20Abigail_PRApplication_127%20-2018&gdrive_id=150guQ5rBvbqw4Vo7HsAZAJJhUl6w6T3B&exist=exist

	    $data['client_id'] = $client_id;
        $data['client'] = $client;
        $data['offices'] = $offices;
		$data['events'] = $events;
		$data['student_application'] = $student_application;
		$data['clientscholarship'] = $clientscholarship;
		$data['visa_application'] = $visa_application;
		$data['visa_accounts'] = $visa_accounts;
		$data['eoi'] = $eoi;
		$data['payments'] = $payments;
		$data['programoptions'] = $programoptions;

		$data['exist'] = 'exist';

		$asset_url = base_url()."assets/";
		$data['title'] = "Edit/View Client Information";
		$data['asset_url'] = $asset_url;

		if($this->session->officer_role == "regional manager" || $this->session->officer_role == "admin") {
			$officer_id_check = $this->session->officer_id;
			$sql11 = "SELECT * FROM notifications WHERE seen = 0 ORDER BY notif_id DESC LIMIT 20";
			$query11 = $this->db->query($sql11);
			$notifnum = $query11->num_rows();

			$sql12 = "SELECT * FROM notifications ORDER BY notif_id DESC LIMIT 20";
			$query12 = $this->db->query($sql12);
			$notif = $query12->result();
		} else {
			$officer_id_check = $this->session->officer_id;
			$sql11 = "SELECT * FROM notifications WHERE seen = 0 AND officer_id = '$officer_id_check' ORDER BY notif_id DESC LIMIT 20";
			$query11 = $this->db->query($sql11);
			$notifnum = $query11->num_rows();

			$sql12 = "SELECT * FROM notifications WHERE officer_id = '$officer_id_check' ORDER BY notif_id DESC LIMIT 20";
			$query12 = $this->db->query($sql12);
			$notif = $query12->result();
		}

		$data['notifnum'] = $notifnum;
		$data['notif'] = $notif;

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('customerinfo/editclientinfo2', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}
	
	public function updateclientinfo()
	{
		$birthdate = DateTime::createFromFormat("Y-m-d", $this->input->post('birthdate'));
    	$birthyear = $birthdate->format("Y");
    	$birthmonth = $birthdate->format("m");
    	$birthday = $birthdate->format("d");

    	$vedate = DateTime::createFromFormat("Y-m-d", $this->input->post('vedate'));
    	$veyear = $vedate->format("Y");
    	$vemonth = $vedate->format("m");
    	$veday = $vedate->format("d");

    	if($this->input->post('selectevent') != "") {
    		$selectevent = $this->input->post('selectevent');
    	} else {
    		$selectevent = 0;
    	}

    	if($this->input->post('selectoffice') != "") {
    		$selectoffice = $this->input->post('selectoffice');
    	} else {
    		$selectoffice = 0;
    	}

    	if($this->input->post('selectflag') != "") {
    		$selectflag = $this->input->post('selectflag');
    	} else {
    		$selectflag = "";
    	}

		$this->db->set('client_surname', $this->input->post('lastname'));
		$this->db->set('client_firstname', $this->input->post('firstname'));
		$this->db->set('client_middlename', $this->input->post('middlename'));
		$this->db->set('client_dob_day', $birthday);
		$this->db->set('client_dob_month', $birthmonth);
		$this->db->set('client_dob_year', $birthyear);
		$this->db->set('client_phoneno', $this->input->post('phoneno'));
		$this->db->set('client_mobileno', $this->input->post('mobileno'));
		$this->db->set('client_overseas_mobileno', $this->input->post('Overseasmobileno'));
		$this->db->set('client_email', $this->input->post('email'));
		$this->db->set('client_address', $this->input->post('clientaddress'));
		$this->db->set('client_suburb', $this->input->post('suburb'));
		$this->db->set('client_state', $this->input->post('state'));
		$this->db->set('client_postcode', $this->input->post('postcode'));
		$this->db->set('client_overseas_address', $this->input->post('overseasaddress'));
		$this->db->set('client_flag', $selectflag);
		$this->db->set('locked_by_id', '');
		$this->db->set('client_comments', $this->input->post('comment'));
		$this->db->set('client_qualifications', $this->input->post('qualifications'));
		$this->db->set('client_photo', '');
		$this->db->set('client_office_id', $selectoffice);
		$this->db->set('client_ve_day', $veday);
		$this->db->set('client_ve_month', $vemonth);
		$this->db->set('client_ve_year', $veyear);
		$this->db->set('client_event_id', $selectevent);
		$this->db->set('client_password', $this->input->post('password'));
		$this->db->set('client_noofchildren', $this->input->post('noofchildren'));
		$this->db->set('client_civilstatus', $this->input->post('civilstatus'));
		$this->db->set('client_nationality', $this->input->post('nationality'));
		$this->db->set('client_country', $this->input->post('country'));
		$this->db->set('client_notes', $this->input->post('notes'));
		$this->db->where('client_id', $this->input->post('clientid'));
		$this->db->update('client');

		redirect('applications');
	}

	public function do_upload()
        {
                
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 10000;
                $config['max_height']           = 10000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('userfile'))
                {
                	$birthdate = DateTime::createFromFormat("Y-m-d", $this->input->post('birthdate'));
			    	$birthyear = $birthdate->format("Y");
			    	$birthmonth = $birthdate->format("m");
			    	$birthday = $birthdate->format("d");

			    	$vedate = DateTime::createFromFormat("Y-m-d", $this->input->post('vedate'));
			    	$veyear = $vedate->format("Y");
			    	$vemonth = $vedate->format("m");
			    	$veday = $vedate->format("d");

			    	if($this->input->post('selectevent') != "") {
			    		$this->db->set('client_event_id', $this->input->post('selectevent'));
			    	}

			    	if($this->input->post('selectoffice') != "") {
			    		$this->db->set('client_office_id', $this->input->post('selectoffice'));
			    	}

			    	if($this->input->post('selectflag') != "" ) {
			    		$this->db->set('client_flag', $this->input->post('selectflag'));
			    	}

					$this->db->set('client_surname', $this->input->post('lastname'));
					$this->db->set('client_firstname', $this->input->post('firstname'));
					$this->db->set('client_middlename', $this->input->post('middlename'));
					$this->db->set('client_dob_day', $birthday);
					$this->db->set('client_dob_month', $birthmonth);
					$this->db->set('client_dob_year', $birthyear);
					$this->db->set('client_phoneno', $this->input->post('phoneno'));
					$this->db->set('client_mobileno', $this->input->post('mobileno'));
					$this->db->set('client_overseas_mobileno', $this->input->post('Overseasmobileno'));
					$this->db->set('client_email', $this->input->post('email'));
					$this->db->set('client_address', $this->input->post('clientaddress'));
					$this->db->set('client_suburb', $this->input->post('suburb'));
					$this->db->set('client_state', $this->input->post('state'));
					$this->db->set('client_postcode', $this->input->post('postcode'));
					$this->db->set('client_overseas_address', $this->input->post('overseasaddress'));
					
					$this->db->set('locked_by_id', '');
					$this->db->set('client_comments', $this->input->post('comment'));
					$this->db->set('client_qualifications', $this->input->post('qualifications'));
					
					$this->db->set('client_ve_day', $veday);
					$this->db->set('client_ve_month', $vemonth);
					$this->db->set('client_ve_year', $veyear);
					
					$this->db->where('client_id', $this->input->post('clientid'));
					$this->db->update('client');

                    redirect(base_url().'index.php/editclientinfo2/'.$this->input->post('clientid'));
                }
                else
                {
                	$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];

                	$birthdate = DateTime::createFromFormat("Y-m-d", $this->input->post('birthdate'));
			    	$birthyear = $birthdate->format("Y");
			    	$birthmonth = $birthdate->format("m");
			    	$birthday = $birthdate->format("d");

			    	$vedate = DateTime::createFromFormat("Y-m-d", $this->input->post('vedate'));
			    	$veyear = $vedate->format("Y");
			    	$vemonth = $vedate->format("m");
			    	$veday = $vedate->format("d");

			    	if($this->input->post('selectevent') != "") {
			    		$selectevent = $this->input->post('selectevent');
			    	} else {
			    		$selectevent = 0;
			    	}

			    	if($this->input->post('selectoffice') != "") {
			    		$selectoffice = $this->input->post('selectoffice');
			    	} else {
			    		$selectoffice = 0;
			    	}

			    	if($this->input->post('selectflag') != "") {
			    		$selectflag = $this->input->post('selectflag');
			    	} else {
			    		$selectflag = "";
			    	}

					$this->db->set('client_surname', $this->input->post('lastname'));
					$this->db->set('client_firstname', $this->input->post('firstname'));
					$this->db->set('client_middlename', $this->input->post('middlename'));
					$this->db->set('client_dob_day', $birthday);
					$this->db->set('client_dob_month', $birthmonth);
					$this->db->set('client_dob_year', $birthyear);
					$this->db->set('client_phoneno', $this->input->post('phoneno'));
					$this->db->set('client_mobileno', $this->input->post('mobileno'));
					$this->db->set('client_overseas_mobileno', $this->input->post('Overseasmobileno'));
					$this->db->set('client_email', $this->input->post('email'));
					$this->db->set('client_address', $this->input->post('clientaddress'));
					$this->db->set('client_suburb', $this->input->post('suburb'));
					$this->db->set('client_state', $this->input->post('state'));
					$this->db->set('client_postcode', $this->input->post('postcode'));
					$this->db->set('client_overseas_address', $this->input->post('overseasaddress'));
					$this->db->set('client_flag', $selectflag);
					$this->db->set('locked_by_id', '');
					$this->db->set('client_comments', $this->input->post('comment'));
					$this->db->set('client_qualifications', $this->input->post('qualifications'));
					$this->db->set('client_photo', $file_name);
					$this->db->set('client_office_id', $selectoffice);
					$this->db->set('client_ve_day', $veday);
					$this->db->set('client_ve_month', $vemonth);
					$this->db->set('client_ve_year', $veyear);
					$this->db->set('client_event_id', $selectevent);
					$this->db->where('client_id', $this->input->post('clientid'));
					$this->db->update('client');

                    redirect(base_url().'index.php/editclientinfo2/'.$this->input->post('clientid'));
                }
                
        }

    public function savefirebasefile() {
    	$date = date("Y-m-d");
    	$client_id = $_GET['clientid'];
    	$url =  $_GET['url'];

    	$data = array(
			'client_id' => $client_id,
			'document_type' => $row->inquiries_firstname,
			'document_link' => $url,
			'date_uploaded' => $date
		);
		$this->db->insert('firebasefiles', $data);
		echo json_encode("Successfully saved documents!");
    }

    public function assignofficer()
	{
		$this->db->set('client_officer_id', $this->input->post('officer'));
		$this->db->where('client_id', $this->input->post('clientid'));
		$this->db->update('client');

		redirect(base_url()."index.php/customerinfo?success1=1");
	}



}