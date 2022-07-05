<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiriescontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{

		$sql = "SELECT * FROM inquiries";
        $query = $this->db->query($sql);
        $inquiries = $query->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Inquiries";
		$data['asset_url'] = $asset_url;
		$data['inquiries'] = $inquiries;

		if(isset($this->session->officer_name)) {
			$this->load->view('inquiries/index', $data);
		} else {
			redirect(base_url()."?error3=1");
		}
	}

	public function getsingleinquiry($inquiries_id)
	{

		$sql = "SELECT * FROM inquiries WHERE inquiries_id = $inquiries_id";
        $query = $this->db->query($sql);
        $inquiries = $query->result();
        echo json_encode($inquiries);
	}

	public function deleteinquiry($inquiry_id)
	{
		$this->db->where('inquiries_id', $inquiry_id);
		$this->db->delete('inquiries');
		
		redirect('inquiries');
	}

	public function transferinquirytoclient($inquiry_id)
	{
		$sql = "SELECT * FROM inquiries where inquiries_id = '$inquiry_id'";
	    $query = $this->db->query($sql);
	    $inquiries = $query->result();

	    foreach ($inquiries as $row) {
            $data = array(
						'client_surname' => $row->inquiries_surname,
						'client_firstname' => $row->inquiries_firstname,
						'client_middlename' => $row->inquiries_middlename,
						'client_dob_day' => $row->inquiries_dob_day,
						'client_dob_month' => $row->inquiries_dob_month,
						'client_dob_year' => $row->inquiries_dob_year,
						'client_phoneno' => '',
						'client_mobileno' => $row->inquiries_mobileno,
						'client_overseas_mobileno' => '',
						'client_email' => $row->inquiries_email,
						'client_address' => $row->inquiries_address,
						'client_suburb' => '',
						'client_state' => '',
						'client_postcode' => '',
						'client_overseas_address' => '',
						'client_flag' => 'active',
						'locked_by_id' => '',
						'client_comments' => '',
						'client_qualifications' => $row->inquiries_qualifications,
						'client_photo' => '',
						'client_office_id' => '',
						'client_ve_day' => '',
						'client_ve_month' => '',
						'client_ve_year' => '',
						'client_event_id' => 0,
						'client_password' => $row->inquiries_password,
						'client_noofchildren' => $row->inquiries_dependents,
						'client_civilstatus' => $row->inquiries_civilstatus,
						'client_nationality' => '',
						'client_country' => $row->inquiries_country,
						'client_notes' => '',
						'client_inquiries_id' => $row->inquiries_id,
						'client_officer_id' => $this->session->officer_id
					);
			$this->db->insert('client', $data);

            $this->db->set('inquiries_status', 'Transferred');
			$this->db->where('inquiries_id', $inquiry_id);
			$this->db->update('inquiries');
                    
        }

		redirect('inquiries');
	}


}