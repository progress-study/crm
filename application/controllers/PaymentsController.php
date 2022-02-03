<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentsController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{

		$sql = "SELECT paymentid,paymenttype,referencenumber,c.client_surname,c.client_firstname,paymentdate,o.officer_name from payments p inner join client c on p.payee = c.client_id inner join officer o on o.officer_id = p.processedby";
        $query = $this->db->query($sql);
        $result = $query->result();

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

}