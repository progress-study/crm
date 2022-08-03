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

		if($this->session->officer_role == "regional manager" || $this->session->officer_role == "admin") {
			$officer_id_check = $this->session->officer_id;
			$sql11 = "SELECT * FROM notifications WHERE seen = 0 ORDER BY notif_id DESC LIMIT 20";
			$query11 = $this->db->query($sql11);
			$notifnum = $query11->num_rows();

			$sql12 = "SELECT * FROM notifications ORDER BY notif_id DESC LIMIT 20";
			$query12 = $this->db->query($sql12);
			$notif = $query12->result();
		} else {
			$officer_id_check = $this->session->officer_id;
			$sql11 = "SELECT * FROM notifications WHERE seen = 0 AND officer_id = '$officer_id_check' ORDER BY notif_id DESC LIMIT 20";
			$query11 = $this->db->query($sql11);
			$notifnum = $query11->num_rows();

			$sql12 = "SELECT * FROM notifications WHERE officer_id = '$officer_id_check' ORDER BY notif_id DESC LIMIT 20";
			$query12 = $this->db->query($sql12);
			$notif = $query12->result();
		}

		$data['notifnum'] = $notifnum;
		$data['notif'] = $notif;
		
		$this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('inquiries/index', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
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

			$data = array(
						'details' => $row->inquiries_firstname." ".$row->inquiries_middlename." ".$row->inquiries_surname." to receive and approve the Program Options from PSC.",
						'client_id' => $row->inquiries_id,
						'officer_id' => $this->session->officer_id,
						'datetime_created' => date("Y-m-d H:i:s"),
						'status' => 'Created',
						'module' => 'Program Options',
						'associated_id' => $row->inquiries_id
					);
			$this->db->insert('tasklist', $data);

			$data = array(
						'details' => $row->inquiries_firstname." ".$row->inquiries_middlename." ".$row->inquiries_surname." to submit the required documents for the application",
						'client_id' => $row->inquiries_id,
						'officer_id' => $this->session->officer_id,
						'datetime_created' => date("Y-m-d H:i:s"),
						'status' => 'Created',
						'module' => 'Documents',
						'associated_id' => $row->inquiries_id
					);
			$this->db->insert('tasklist', $data);

			$data = array(
						'details' => $row->inquiries_firstname." ".$row->inquiries_middlename." ".$row->inquiries_surname." to process Visa application",
						'client_id' => $row->inquiries_id,
						'officer_id' => $this->session->officer_id,
						'datetime_created' => date("Y-m-d H:i:s"),
						'status' => 'Created',
						'module' => 'Visa Application',
						'associated_id' => $row->inquiries_id
					);
			$this->db->insert('tasklist', $data);

			$data = array(
						'details' => $this->session->officer_name." approved ".$row->inquiries_firstname." ".$row->inquiries_middlename." ".$row->inquiries_surname."<br>as official client.",
						'date_created' => date("Y-m-d"),
						'officer_id' => $this->session->officer_id,
						'seen' => 0
					);
			$this->db->insert('notifications', $data);

        }

		redirect('inquiries');
	}

	public function transferinquirytoclientfromdashboard($inquiry_id)
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

			$data = array(
						'details' => $row->inquiries_firstname." ".$row->inquiries_middlename." ".$row->inquiries_surname." to receive and approve the Program Options from PSC.",
						'client_id' => $row->inquiries_id,
						'officer_id' => $this->session->officer_id,
						'datetime_created' => date("Y-m-d H:i:s"),
						'status' => 'Created',
						'module' => 'Program Options',
						'associated_id' => $row->inquiries_id
					);
			$this->db->insert('tasklist', $data);

			$data = array(
						'details' => $row->inquiries_firstname." ".$row->inquiries_middlename." ".$row->inquiries_surname." to submit the required documents for the application",
						'client_id' => $row->inquiries_id,
						'officer_id' => $this->session->officer_id,
						'datetime_created' => date("Y-m-d H:i:s"),
						'status' => 'Created',
						'module' => 'Documents',
						'associated_id' => $row->inquiries_id
					);
			$this->db->insert('tasklist', $data);

			$data = array(
						'details' => $row->inquiries_firstname." ".$row->inquiries_middlename." ".$row->inquiries_surname." to process Visa application",
						'client_id' => $row->inquiries_id,
						'officer_id' => $this->session->officer_id,
						'datetime_created' => date("Y-m-d H:i:s"),
						'status' => 'Created',
						'module' => 'Visa Application',
						'associated_id' => $row->inquiries_id
					);
			$this->db->insert('tasklist', $data);

			$data = array(
						'details' => $this->session->officer_name." approved ".$row->inquiries_firstname." ".$row->inquiries_middlename." ".$row->inquiries_surname."<br>as official client.",
						'date_created' => date("Y-m-d"),
						'officer_id' => $this->session->officer_id,
						'seen' => 0
					);
			$this->db->insert('notifications', $data);

        }

		redirect('dashboard');
	}


}