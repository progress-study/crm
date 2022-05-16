<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requireddocumentscontroller extends CI_Controller {
	public function index()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Required Documents";
		$data['asset_url'] = $asset_url;
		
		if(isset($this->session->officer_name)) {
			$this->load->view('requireddocuments/index', $data);
		} else {
			redirect(base_url()."?error3=1");
		}
	}
}