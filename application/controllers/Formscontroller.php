<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
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