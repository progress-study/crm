<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerInfoController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{

		$sql = "SELECT client_surname,client_firstname,client_middlename,'' as processingofficer, '' as datecreated, '' as inquiry, '' as documents, '' as admissions, '' as school, '' as course, '' as location, 'Kim' as gteofficer, '' as gtestatus FROM client";
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
}