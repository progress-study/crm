<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scholarshipcontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{
		$sql1 = "SELECT * FROM clientscholarship cs inner join client c on c.client_id = cs.clientid inner join scholarships s on s.scholarshipid = cs.scholarshipid";
	    $query1 = $this->db->query($sql1);
	    $clientscholarship = $query1->result();

	    $sql2 = "SELECT * FROM scholarships s inner join mastersetting m on s.paymenttype = m.id";
	    $query2 = $this->db->query($sql2);
	    $scholarships = $query2->result();

	    $sql3 = "SELECT * FROM client";
	    $query3 = $this->db->query($sql3);
	    $client = $query3->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Scholarships";
		$data['asset_url'] = $asset_url;
		
		$data['clientscholarship'] = $clientscholarship;
		$data['scholarships'] = $scholarships;
		$data['client'] = $client;

		if(isset($this->session->officer_name)) {
			$this->load->view('scholarship/index', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

	public function newscholarshipfile()
	{

        $asset_url = base_url()."assets/";
		$data['title'] = "New Scholarship File";
		$data['asset_url'] = $asset_url;

		$sql2 = "SELECT * FROM mastersetting WHERE details = 'For scholarship payment type'";
	    $query2 = $this->db->query($sql2);
	    $mastersetting = $query2->result();

	    $data['mastersetting'] = $mastersetting;

		if(isset($this->session->officer_name)) {
			$this->load->view('scholarship/newscholarshipfile', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

	public function savescholarshipfile()
	{

		$data = array(
					'description' => $this->input->post('description'),
					'type' => $this->input->post('scholarshiptype'),
					'paymenttype' => $this->input->post('paymenttype'),
					'amount' => $this->input->post('amount'),
					'datecreated' => date('Y-m-d'),
					'bactive' => 1
				);
		$this->db->insert('scholarships', $data);
		redirect('scholarships');
	}

	public function newscholarshipallocation()
	{

        $asset_url = base_url()."assets/";
		$data['title'] = "New Scholarship Allocation";
		$data['asset_url'] = $asset_url;

		$sql2 = "SELECT * FROM scholarships";
	    $query2 = $this->db->query($sql2);
	    $scholarships = $query2->result();

		$sql3 = "SELECT * FROM client";
	    $query3 = $this->db->query($sql3);
	    $client = $query3->result();

	    $data['client'] = $client;
	    $data['scholarships'] = $scholarships;

		if(isset($this->session->officer_name)) {
			$this->load->view('scholarship/newscholarshipallocation', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

	public function savescholarshipallocation()
	{

		$data = array(
					'clientid' => $this->input->post('client'),
					'scholarshipid' => $this->input->post('scholarship'),
					'bactive' => 1
				);
		$this->db->insert('clientscholarship', $data);
		redirect('scholarships');
	}

}