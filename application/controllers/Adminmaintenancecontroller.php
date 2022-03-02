<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmaintenancecontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{
		$sql1 = "SELECT * FROM region";
	    $query1 = $this->db->query($sql1);
	    $region = $query1->result();

	    $sql2 = "SELECT * FROM officer";
	    $query2 = $this->db->query($sql2);
	    $officer = $query2->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Admin Maintenance";
		$data['asset_url'] = $asset_url;
		
		$data['region'] = $region;
		$data['officer'] = $officer;

		if(isset($this->session->officer_name)) {
			$this->load->view('maintenance/index', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

}