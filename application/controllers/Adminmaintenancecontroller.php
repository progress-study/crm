<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmaintenancecontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{
		$sql1 = "SELECT * FROM region";
	    $query1 = $this->db->query($sql1);
	    $region = $query1->result();

	    $sql2 = "SELECT * FROM officer";
	    $query2 = $this->db->query($sql2);
	    $officer = $query2->result();

	    $sql3 = "SELECT * FROM officerassignment oa inner join officer o on oa.oaid = o.officer_id inner join region r on oa.region_id = r.region_id";
	    $query3 = $this->db->query($sql3);
	    $officerassignment = $query3->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Admin Maintenance";
		$data['asset_url'] = $asset_url;
		
		$data['region'] = $region;
		$data['officer'] = $officer;
		$data['officerassignment'] = $officerassignment;

		if(isset($this->session->officer_name)) {
			$this->load->view('maintenance/index', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

	public function newregion()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "New Region";
		$data['asset_url'] = $asset_url;

		if(isset($this->session->officer_name)) {
			$this->load->view('maintenance/newregion', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

	public function saveregion()
	{

		$data = array(
					'region_name' => $this->input->post('regionname'),
					'region_description' => $this->input->post('regiondescription')
				);
		$this->db->insert('region', $data);
		redirect('adminmaintenance');
	}

	public function newofficer()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "New Officer";
		$data['asset_url'] = $asset_url;

		$sql1 = "SELECT * FROM offices";
	    $query1 = $this->db->query($sql1);
	    $offices = $query1->result();

	    $sql2 = "SELECT * FROM region";
	    $query2 = $this->db->query($sql2);
	    $region = $query2->result();

	    $sql3 = "SELECT * FROM mastersetting where details = 'for roles'";
	    $query3 = $this->db->query($sql3);
	    $mastersetting = $query3->result();

	    $data['offices'] = $offices;
	    $data['region'] = $region;
	    $data['mastersetting'] = $mastersetting;

		if(isset($this->session->officer_name)) {
			$this->load->view('maintenance/newofficer', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

	public function saveofficer()
	{

		$data = array(
					'region_name' => $this->input->post('regionname'),
					'region_description' => $this->input->post('regiondescription')
				);
		$this->db->insert('region', $data);
		redirect('adminmaintenance');
	}

	public function do_upload()
        {
                
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $data = array('error' => $this->upload->display_errors());
                        $this->load->view('newofficer', $data);
                }
                else
                {
                	$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];

                	$data = array(
								'officer_login_name' => $this->input->post('loginname'),
			                	'officer_name' => $this->input->post('name'),
			                	'officer_last_logged_date' => date("Y-m-d"),
			                	'officer_password' => $this->input->post('password'),
			                	'officer_role' => $this->input->post('role'),
			                	'officer_status' => 'active',
			                	'officer_photo' => $file_name,
			                	'officer_office_id' => $this->input->post('office'),
			                	'email' => $this->input->post('email'),
			                	'officer_region' => $this->input->post('region'),
			                	'user_role_id' => $this->input->post('role')
							);

					$this->db->insert('officer', $data);
                    redirect('adminmaintenance');
                }
                
        }

    public function newassignment()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "New Region Assignment";
		$data['asset_url'] = $asset_url;

		$sql1 = "SELECT * FROM officer";
	    $query1 = $this->db->query($sql1);
	    $officer = $query1->result();

	    $sql2 = "SELECT * FROM region";
	    $query2 = $this->db->query($sql2);
	    $region = $query2->result();

	    $data['officer'] = $officer;
	    $data['region'] = $region;

		if(isset($this->session->officer_name)) {
			$this->load->view('maintenance/newassignment', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

	public function saveassignment()
	{

		$data = array(
					'officer_id' => $this->input->post('officer'),
					'region_id' => $this->input->post('region'),
					'datecreated' => date("Y-m-d"),
					'bactive' => 1
				);
		$this->db->insert('officerassignment', $data);
		redirect('adminmaintenance');
	}
	

}