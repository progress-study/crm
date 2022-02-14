<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function clientform()
	{
		$this->load->view('requireddocuments/index');
	}

	public function clientinformation()
	{
		$this->load->view('requireddocuments/index');
	}

}