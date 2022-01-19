<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerInfoController extends CI_Controller {
	public function index()
	{
		$this->load->view('userlogin/index');
	}
}