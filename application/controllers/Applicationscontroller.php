<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicationscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{

		$sql = "SELECT * FROM student_application sa inner join education_provider s on sa.provider_id = s.provider_id inner join client c on c.client_id = sa.client_id";
        $query = $this->db->query($sql);
        $result = $query->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Applications";
		$data['asset_url'] = $asset_url;
		$data['applications'] = $result;

		if(isset($this->session->officer_name)) {
			$this->load->view('applications/index', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

	public function newapplication() {
		$asset_url = base_url()."assets/";
		$data['title'] = "New Application";
		$data['asset_url'] = $asset_url;

		$sql3 = "SELECT * FROM client";
	    $query3 = $this->db->query($sql3);
	    $client = $query3->result();

	    $sql3 = "SELECT * FROM education_provider";
	    $query3 = $this->db->query($sql3);
	    $schools = $query3->result();

	    $data['client'] = $client;
		$data['schools'] = $schools;

		if(isset($this->session->officer_name)) {
			$this->load->view('applications/newapplication', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}

	}

	public function getprogramfromschool($schoolid) {
		$sql3 = "SELECT * FROM schoolprograms where schoolid = $schoolid";
	    $query3 = $this->db->query($sql3);
	    $program = $query3->result();
	    echo json_encode($program);
	}

}