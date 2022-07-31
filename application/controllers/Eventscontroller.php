<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function newevent()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "New Event";
		$data['asset_url'] = $asset_url;

		$sql2 = "SELECT * FROM region";
	    $query2 = $this->db->query($sql2);
	    $region = $query2->result();

	    if($this->session->officer_role == "regional manager" || $this->session->officer_role == "admin") {
			$officer_id_check = $this->session->officer_id;
			$sql11 = "SELECT * FROM notifications WHERE seen = 0 ORDER BY notif_id DESC LIMIT 20";
			$query11 = $this->db->query($sql11);
			$notifnum = $query11->num_rows();

			$sql12 = "SELECT * FROM notifications WHERE seen = 0 ORDER BY notif_id DESC LIMIT 20";
			$query12 = $this->db->query($sql12);
			$notif = $query12->result();
		} else {
			$officer_id_check = $this->session->officer_id;
			$sql11 = "SELECT * FROM notifications WHERE seen = 0 AND officer_id = '$officer_id_check' ORDER BY notif_id DESC LIMIT 20";
			$query11 = $this->db->query($sql11);
			$notifnum = $query11->num_rows();

			$sql12 = "SELECT * FROM notifications WHERE seen = 0 AND officer_id = '$officer_id_check' ORDER BY notif_id DESC LIMIT 20";
			$query12 = $this->db->query($sql12);
			$notif = $query12->result();
		}

		$data['notifnum'] = $notifnum;
		$data['notif'] = $notif;

	    $data['region'] = $region;

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
				$this->load->view('maintenance/newevent', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function do_upload()
	{
		$config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('event_photo'))
        {
        	$data = array(
					'event_name' => $this->input->post('event_name'),
					'event_date' => $this->input->post('event_date'),
					'event_time' => $this->input->post('event_time'),
					'event_location' => $this->input->post('event_location'),
					'event_region' => $this->input->post('event_region'),
					'event_info' => $this->input->post('event_info'),
					'event_comments' => $this->input->post('event_comments'),
					'event_photo' => ''
				);
			$this->db->insert('events', $data);
			redirect('adminmaintenance');
        }
        else
        {
        	$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$data = array(
					'event_name' => $this->input->post('event_name'),
					'event_date' => $this->input->post('event_date'),
					'event_time' => $this->input->post('event_time'),
					'event_location' => $this->input->post('event_location'),
					'event_region' => $this->input->post('event_region'),
					'event_info' => $this->input->post('event_info'),
					'event_comments' => $this->input->post('event_comments'),
					'event_photo' => $file_name
				);
			$this->db->insert('events', $data);
			redirect('adminmaintenance');
        }

		
	}
}