<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientLoginController extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Client Login";
		$data['asset_url'] = $asset_url;
		$this->load->view('clientlogin/index',$data);
	}

}