<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	public function __construct() {
	parent::__construct();

	}

	public function index()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Dashboard";
		$data['asset_url'] = $asset_url;
		$this->load->view('dashboard/index', $data);
	}
}