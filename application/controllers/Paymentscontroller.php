<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{
		$officer_id = $this->session->userdata('officer_id');

		if($this->session->userdata('officer_role') == 'regional manager' || $this->session->userdata('officer_role') == 'manager') {
			$sql = "SELECT paymentid,m.identity,referencenumber,c.client_surname,c.client_firstname,paymentdate,o.officer_name from payments p inner join client c on p.payee = c.client_id inner join officer o on o.officer_id = p.processedby inner join mastersetting m on p.paymenttype = m.id where p.barchived = 0";
	        $query = $this->db->query($sql);
	        $result = $query->result();
		} else {
			$sql = "SELECT paymentid,m.identity,referencenumber,c.client_surname,c.client_firstname,paymentdate,o.officer_name from payments p inner join client c on p.payee = c.client_id inner join officer o on o.officer_id = p.processedby inner join mastersetting m on p.paymenttype = m.id where p.barchived = 0 and p.processedby = $officer_id";
	        $query = $this->db->query($sql);
	        $result = $query->result();
		}

        $asset_url = base_url()."assets/";
		$data['title'] = "Payments";
		$data['asset_url'] = $asset_url;
		$data['payments'] = $result;

		if(isset($this->session->officer_name)) {
			$this->load->view('payments/index', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

	public function newpayment()
	{
		$sql = "SELECT client_id,client_surname,client_firstname,client_middlename FROM client";
        $query = $this->db->query($sql);
        $result = $query->result();

        $sql2 = "SELECT id,identity FROM mastersetting";
        $query2 = $this->db->query($sql2);
        $result2 = $query2->result();

        $data['clients'] = $result;
        $data['mastersetting'] = $result2;
		$asset_url = base_url()."assets/";
		$data['title'] = "Payments";
		$data['asset_url'] = $asset_url;
		$this->load->view('payments/newpayment', $data);
	}

	public function savepayment()
	{
		$data = array(
					'paymenttype' => $this->input->post('paymenttype'),
					'referencenumber' => $this->input->post('referencenumber'),
					'payee' => $this->input->post('payee'),
					'paymentdate' => $this->input->post('paymentdate'),
					'processedby' => $this->session->userdata('officer_id'),
					'barchived' => 0
				);
		$this->db->insert('payments', $data);
		redirect('payments');
	}

	public function archivepayment($id) {
		$this->db->set('barchived', 1);
        $this->db->where('paymentid', $id);
        $this->db->update('payments');
        redirect('payments');
	}

}