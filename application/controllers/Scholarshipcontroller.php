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

	    $sql2 = "SELECT s.scholarshipid,s.description,s.type,m.identity,s.amount,s.datecreated,ep.provider_name,sp.program,s.bactive FROM scholarships s inner join mastersetting m on s.paymenttype = m.id inner join education_provider ep on s.school = ep.provider_id inner join schoolprograms sp on s.program = sp.spid";
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

		$this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('scholarship/index', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function newscholarshipfile()
	{

        $asset_url = base_url()."assets/";
		$data['title'] = "New Scholarship File";
		$data['asset_url'] = $asset_url;


	    $sql3 = "SELECT * FROM education_provider";
	    $query3 = $this->db->query($sql3);
	    $education_provider = $query3->result();

	    $sql3 = "SELECT * FROM schoolprograms";
	    $query3 = $this->db->query($sql3);
	    $schoolprograms = $query3->result();

		$sql2 = "SELECT * FROM mastersetting WHERE details = 'For scholarship payment type'";
	    $query2 = $this->db->query($sql2);
	    $mastersetting = $query2->result();

	    $data['mastersetting'] = $mastersetting;
	    $data['education_provider'] = $education_provider;
		$data['schoolprograms'] = $schoolprograms;

		$this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('scholarship/newscholarshipfile', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
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
					'school' => $this->input->post('school'),
					'program' => $this->input->post('program'),
					'bactive' => 1
				);
		$this->db->insert('scholarships', $data);
		redirect('scholarships');
	}

	public function newscholarshipallocation($client_id)
	{

        $asset_url = base_url()."assets/";
		$data['title'] = "New Scholarship Allocation";
		$data['asset_url'] = $asset_url;

		$sql2 = "SELECT * FROM scholarships";
	    $query2 = $this->db->query($sql2);
	    $scholarships = $query2->result();

		$sql3 = "SELECT * FROM client where client_id = '$client_id'";
	    $query3 = $this->db->query($sql3);
	    $client = $query3->result();

	    $this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}

	    $data['client'] = $client;
	    $data['scholarships'] = $scholarships;

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('scholarship/newscholarshipallocation', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
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