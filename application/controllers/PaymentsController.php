<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentsController extends CI_Controller {
	public function __construct() {
	parent::__construct();

	}

	public function index()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Payments";
		$data['asset_url'] = $asset_url;
		$this->load->view('payments/index', $data);
	}
}