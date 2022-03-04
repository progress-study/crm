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

        $asset_url = base_url()."assets/";
		$data['title'] = "Client Information";
		$data['asset_url'] = $asset_url;
		$data['clients'] = $result;

		if(isset($this->session->officer_name)) {
			$this->load->view('customerinfo/header', $data);
			$this->load->view('customerinfo/index', $data);
			$this->load->view('customerinfo/footer', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
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

        $data['client'] = $client;
        $data['offices'] = $offices;
		$data['events'] = $events;

		$asset_url = base_url()."assets/";
		$data['title'] = "Edit/View Client Information";
		$data['asset_url'] = $asset_url;

		if(isset($this->session->officer_name)) {
			$this->load->view('customerinfo/editclientinfo', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
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

}