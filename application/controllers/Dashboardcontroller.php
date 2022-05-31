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

		$sql5 = "SELECT 
				c.client_surname,
				c.client_firstname,
				c.client_middlename,
				c.client_inquiries_id,
				i.inquiries_id,
				sa.studentapp_id,
				vap.client_visa_id,
				p.paymentid
				FROM client c
				LEFT JOIN inquiries i on i.inquiries_id = c.client_inquiries_id
				LEFT JOIN visa_application vap on vap.client_id = c.client_id
				LEFT JOIN student_application sa on sa.client_id = c.client_id
				LEFT JOIN payments p on p.payee = c.client_id";
        $query5 = $this->db->query($sql5);
        $client = $query5->result();

		$data['title'] = "Dashboard";
		$data['asset_url'] = $asset_url;

		$data['activeclients'] = $activeclients;
		$data['student_application'] = $student_application;
		$data['pr_application'] = $pr_application;
		$data['education_provider'] = $education_provider;
		$data['clients'] = $client;

		if(isset($this->session->officer_name)) {
			$this->load->view('dashboard/index', $data);
		} else {
			redirect(base_url()."?error3=1");
		}
		
	}
}