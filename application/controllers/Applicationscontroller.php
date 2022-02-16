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
}