<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programoptionscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}
	
	public function newprogramoption($client_id)
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Program Options";
		$data['asset_url'] = $asset_url;
		$data['client_id'] = $client_id;

		//$poidnew = 0;

		$sql = "SELECT * FROM education_provider";
	    $query = $this->db->query($sql);
	    $schools = $query->result();

	    $data['schools'] = $schools;

	    $this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

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
				$this->load->view('programoptions/newprogramoptions', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function saveprogramoptions() {
		$data = array(
					'provider_id' => $this->input->post('provider_id'),
					'sp_id' => $this->input->post('sp_id'),
					'indicativeannualcost' => str_replace(",","", str_replace(" ","",$this->input->post('indicativeannualcost'))),
					'duration' => $this->input->post('duration'),
					'location' => $this->input->post('location'),
					'englishrequirement' => $this->input->post('englishrequirement'),
					'intake' => $this->input->post('intake'),
					'importanttoconsider' => $this->input->post('importanttoconsider'),
					'migrationpathway' => $this->input->post('migrationpathway'),
					'prepby' => $this->session->officer_id,
					'prepdate' => date("Y-m-d"),
					'client_id' => $this->input->post('client_id'),
					'status' => 'Created',
					'others' => $this->input->post('others'),
					'clientfeedback' => ''
				);
		$this->db->insert('programoptions', $data);
		redirect('editclientinfo2/'.$this->input->post('client_id'));
	}

	public function updateprogramoptions() {
		if($this->input->post('birthday') == "") {
			$birthday = NULL;
		} else {
			$birthday = $this->input->post('birthday');
		}

		$this->db->set('provider_id', $this->input->post('provider_id'));
		$this->db->set('sp_id', $this->input->post('sp_id'));
		$this->db->set('indicativeannualcost', str_replace(",","", str_replace(" ","",$this->input->post('indicativeannualcost'))));
		$this->db->set('duration', $this->input->post('duration'));
		$this->db->set('location', $this->input->post('location'));
		$this->db->set('englishrequirement', $this->input->post('englishrequirement'));
		$this->db->set('intake', $this->input->post('intake'));
		$this->db->set('importanttoconsider', $this->input->post('importanttoconsider'));
		$this->db->set('migrationpathway', $this->input->post('migrationpathway'));
		$this->db->set('client_id', $this->input->post('client_id'));
		$this->db->set('others', $this->input->post('others'));
		$this->db->set('programlink', $this->input->post('programlink'));
		$this->db->set('birthday', $birthday);
		$this->db->set('cricoscode', $this->input->post('cricoscode'));
		$this->db->set('englishtestresult', $this->input->post('englishtestresult'));
		$this->db->where('poid', $this->input->post('poid'));
		$this->db->update('programoptions');

		redirect('editclientinfo2/'.$this->input->post('client_id'));
	}

	public function editprogramoption($poid)
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Program Options";
		$data['asset_url'] = $asset_url;
		$data['poid'] = $poid;

		//$poidnew = 0;

		$sql6 = "SELECT * FROM programoptions po inner join education_provider s on po.provider_id = s.provider_id inner join schoolprograms sp on sp.spid = po.sp_id where po.poid = '$poid'";
        $query6 = $this->db->query($sql6);
        $programoptions = $query6->result();

        // $sql7 = "SELECT * FROM programoptionsdetails pod where poid = '$poid'";
        // $query7 = $this->db->query($sql7);
        // $programoptionsdetails = $query7->result();

        $sql9 = "SELECT * FROM programoptionsdetaileipwithdependent where poid = '$poid'";
        $query9 = $this->db->query($sql9);
        $programoptionsdetaileipwithdependent = $query9->result();

        $sql9 = "SELECT * FROM programoptionsdetaileipwithoutdependent where poid = '$poid'";
        $query9 = $this->db->query($sql9);
        $programoptionsdetaileipwithoutdependent = $query9->result();

        $sql9 = "SELECT * FROM programoptionsdetailwithdependent where poid = '$poid'";
        $query9 = $this->db->query($sql9);
        $programoptionsdetailwithdependent = $query9->result();

        $sql9 = "SELECT * FROM programoptionsdetailwithoutdependent where poid = '$poid'";
        $query9 = $this->db->query($sql9);
        $programoptionsdetailwithoutdependent = $query9->result();

        $data['programoptions'] = $programoptions;
        // $data['programoptionsdetails'] = $programoptionsdetails;
        $data['programoptionsdetaileipwithdependent'] = $programoptionsdetaileipwithdependent;
        $data['programoptionsdetaileipwithoutdependent'] = $programoptionsdetaileipwithoutdependent;
        $data['programoptionsdetailwithdependent'] = $programoptionsdetailwithdependent;
        $data['programoptionsdetailwithoutdependent'] = $programoptionsdetailwithoutdependent; 

		$sql = "SELECT * FROM education_provider";
	    $query = $this->db->query($sql);
	    $schools = $query->result();

	    $data['schools'] = $schools;

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
				$this->load->view('programoptions/editprogramoptions', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function newprogramoptiondetails($poid)
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Program Option Details";
		$data['asset_url'] = $asset_url;
		$data['poid'] = $poid;

		//$poidnew = 0;

		$sql = "SELECT * FROM education_provider";
	    $query = $this->db->query($sql);
	    $schools = $query->result();

	    $data['schools'] = $schools;

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
				$this->load->view('programoptions/newprogramoptiondetails', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function editprogramoptiondetails($podid)
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Program Option Details";
		$data['asset_url'] = $asset_url;
		$data['podid'] = $podid;

		//$poidnew = 0;

		$sql7 = "SELECT * FROM programoptionsdetails pod where podid = '$podid'";
        $query7 = $this->db->query($sql7);
        $programoptionsdetails = $query7->result();

		$data['programoptionsdetails'] = $programoptionsdetails;

		$this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}

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

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('programoptions/editprogramoptiondetails', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function saveprogramoptiondetails() {
		$data = array(
					'poid' => $this->input->post('poid'),
					'expensestype' => $this->input->post('expensestype'),
					'perperson' => str_replace(",","", str_replace(" ","",$this->input->post('perperson'))),
					'amountrequired' => str_replace(",","", str_replace(" ","",$this->input->post('amountrequired'))),
					'numberoffamily' => str_replace(",","", str_replace(" ","",$this->input->post('numberoffamily'))),
					'amounttoaccess' => str_replace(",","", str_replace(" ","",$this->input->post('amounttoaccess'))),
					'confirmaccesstofunds' => str_replace(",","", str_replace(" ","",$this->input->post('confirmaccesstofunds')))
				);
		$this->db->insert('programoptionsdetails', $data);
		redirect(base_url().'index.php/editprogramoptions/'.$this->input->post('poid'));
	}

	public function updateprogramoptiondetails() {
		$this->db->set('expensestype', $this->input->post('expensestype'));
		$this->db->set('perperson', str_replace(",","", str_replace(" ","",$this->input->post('perperson'))));
		$this->db->set('amountrequired', str_replace(",","", str_replace(" ","",$this->input->post('amountrequired'))));
		$this->db->set('numberoffamily', str_replace(",","", str_replace(" ","",$this->input->post('numberoffamily'))));
		$this->db->set('amounttoaccess', str_replace(",","", str_replace(" ","",$this->input->post('amounttoaccess'))));
		$this->db->set('confirmaccesstofunds', str_replace(",","", str_replace(" ","",$this->input->post('confirmaccesstofunds'))));
		$this->db->where('podid', $this->input->post('podid'));
		$this->db->update('programoptionsdetails');

		redirect(base_url().'index.php/editprogramoptions/'.$this->input->post('podid'));
	}

	public function acceptpo() {
		$this->db->set('status', 'Accepted');
		$this->db->where('poid', $this->input->post('poid'));
		$this->db->update('programoptions');

		$this->db->where('poid', $this->input->post('poid'));
        $poquery = $this->db->get('programoptions');

		foreach ($poquery->result() as $porow)
		{
		        $this->db->where('sender_id', $porow->prepby);
		        $this->db->where('receiver_id', $porow->client_id);
		        $threadquery = $this->db->get('thread');

				foreach ($threadquery->result() as $threadrow)
				{
					$data = array(
						'thread_id' => $threadrow->thread_id,
						'message' => 'Hello! Thank you for accepting the PO, please download and fill-up the following files and send it back to us once done. Thank you!',
						'message_from' => $porow->prepby,
						'message_type' => 'text',
						'message_status' => 'Sent',
						'message_date' => date("Y-m-d"),
						'message_time' => date("H:i:s"),
						'message_date_time' => date("Y-m-d H:i:s")
					);
					$this->db->insert('thread_conversations', $data);

					$data = array(
						'thread_id' => $threadrow->thread_id,
						'message' => "<a href='".base_url()."assets/forms/956_Form.pdf'>956_Form.pdf<a>",
						'message_from' => $porow->prepby,
						'message_type' => 'file',
						'message_status' => 'Sent',
						'message_date' => date("Y-m-d"),
						'message_time' => date("H:i:s"),
						'message_date_time' => date("Y-m-d H:i:s")
					);
					$this->db->insert('thread_conversations', $data);

					$data = array(
						'thread_id' => $threadrow->thread_id,
						'message' => "<a href='".base_url()."assets/forms/PROGRESS_ADMISSION_FORMS.docx'>PROGRESS_ADMISSION_FORMS.docx<a>",
						'message_from' => $porow->prepby,
						'message_type' => 'text',
						'message_status' => 'Sent',
						'message_date' => date("Y-m-d"),
						'message_time' => date("H:i:s"),
						'message_date_time' => date("Y-m-d H:i:s")
					);
					$this->db->insert('thread_conversations', $data);

					$data = array(
						'thread_id' => $threadrow->thread_id,
						'message' => "<a href='".base_url()."assets/forms/PROGRESS_STUDY_VISA_APPLICATION_FORM.docx'>PROGRESS_STUDY_VISA_APPLICATION_FORM.docx<a>",
						'message_from' => $porow->prepby,
						'message_type' => 'text',
						'message_status' => 'Sent',
						'message_date' => date("Y-m-d"),
						'message_time' => date("H:i:s"),
						'message_date_time' => date("Y-m-d H:i:s")
					);
					$this->db->insert('thread_conversations', $data);

				}
		}

		$this->posuccess('accepted', $this->input->post('poid'));
	}

	public function rejectpo($poid) {
		$this->db->set('status', 'Rejected');
		$this->db->where('poid', $poid);
		$this->db->update('programoptions');

		//redirect(base_url().'index.php/posuccess?result=reject&poid='.$this->input->post('poid'));
		$this->posuccess('rejected', $poid);
	}

	public function posuccess($status, $poid) {
		$data['poid'] = $poid;
		$data['status'] = $status;

		$asset_url = base_url()."assets/";
		$data['title'] = "PO Response";
		$data['asset_url'] = $asset_url;

		$this->load->view('forms/posuccess', $data);;
	}

	public function saveclientfeedback() {
		$this->db->set('clientfeedback', $this->input->post('feedback'));
		$this->db->where('poid', $this->input->post('poid'));
		$this->db->update('programoptions');

		$asset_url = base_url()."assets/";
		$data['title'] = "Success Feedback";
		$data['asset_url'] = $asset_url;

		$this->load->view('forms/clientfeedbacksuccess', $data);
	}

	public function deletepo($poid, $client_id)
	{
		$this->db->where('poid', $poid);
		$this->db->delete('programoptions');
		//echo json_encode("Successfully done reset!");
		redirect(base_url()."index.php/editclientinfo2/".$client_id);
	}
}