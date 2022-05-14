<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardcontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{
		$asset_url = base_url()."assets/";
		
		$sql1 = "SELECT * FROM client WHERE client_flag = 'active'";
		$query1 = $this->db->query($sql1);
		$activeclients = $query1->num_rows();

		$sql2 = "SELECT * FROM student_application WHERE studentapp_flag = 'WIP'";
		$query2 = $this->db->query($sql2);
		$student_application = $query2->num_rows();

		$sql3 = "SELECT * FROM visa_application WHERE status = 'WIP'";
		$query3 = $this->db->query($sql3);
		$pr_application = $query3->num_rows();

		$sql4 = "SELECT * FROM education_provider";
		$query4 = $this->db->query($sql4);
		$education_provider = $query4->num_rows();

		$sql5 = "SELECT * FROM client";
        $query5 = $this->db->query($sql5);
        $client = $query5->result();

		$data['title'] = "Dashboard";
		$data['asset_url'] = $asset_url;

		$data['activeclients'] = $activeclients;
		$data['student_application'] = $student_application;
		$data['pr_application'] = $pr_application;
		$data['education_provider'] = $education_provider;
		$data['clients'] = $client;

		$this->load->view('dashboard/index', $data);
	}
}