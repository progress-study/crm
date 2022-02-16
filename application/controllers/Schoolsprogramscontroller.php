<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolsprogramscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function schools()
	{
		$sql = "SELECT * FROM education_provider";
        $query = $this->db->query($sql);
        $result = $query->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Schools and Programs";
		$data['asset_url'] = $asset_url;
		$data['schools'] = $result;

		if(isset($this->session->officer_name)) {
			$this->load->view('schoolsprograms/schools', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

	public function programs()
	{

		$sql = "SELECT * FROM schoolprograms sp inner join schools s on sp.schoolid = s.id";
        $query = $this->db->query($sql);
        $result = $query->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Schools and Programs";
		$data['asset_url'] = $asset_url;
		$data['programs'] = $result;

		if(isset($this->session->officer_name)) {
			$this->load->view('schoolsprograms/programs', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

}