<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RequiredDocumentsController extends CI_Controller {
	public function index()
	{
		$this->load->view('userlogin/index');
	}
}