<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiriescontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{

		$sql = "SELECT * FROM inquiries";
        $query = $this->db->query($sql);
        $inquiries = $query->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Inquiries";
		$data['asset_url'] = $asset_url;
		$data['inquiries'] = $inquiries;

		if(isset($this->session->officer_name)) {
			$this->load->view('inquiries/index', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}
}