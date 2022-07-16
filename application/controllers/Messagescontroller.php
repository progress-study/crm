<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messagescontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{
		$sql1 = 
		"SELECT officer_id as contactid, officer_name as contactname, 'officer' as contacttype FROM `officer` 
		UNION
		SELECT inquiries_id as contactid, CONCAT(inquiries_firstname, ' ', inquiries_surname) as contactname, 'inquiries' as contacttype FROM `inquiries`";
	    $query1 = $this->db->query($sql1);
	    $officer = $query1->result();

	    $officer_id = $this->session->officer_id;

	    $sql2 = "SELECT th.thread_id, 
	        th.created_date,
	        th.chattype,
	    	off1.officer_id as senderid,
	    	off1.officer_name as sendername,
	    	off2.officer_name as receivername,
	    	off2.officer_id as receiverid,
	    	inq1.inquiries_id as inqsenderid,
	    	CONCAT(inq1.inquiries_firstname, ' ', inq1.inquiries_surname) as inqsendername,
	    	inq2.inquiries_id as inqreceiverid,
	    	CONCAT(inq2.inquiries_firstname, ' ', inq2.inquiries_surname) as inqreceivername,
	    	(SELECT message FROM thread_conversations WHERE thread_id = th.thread_id ORDER BY thread_convo_id DESC LIMIT 1) as recentmessage,
	    	(SELECT message_from FROM thread_conversations WHERE thread_id = th.thread_id ORDER BY thread_convo_id DESC LIMIT 1) as recentmessagefrom,
	    	(SELECT message_date_time FROM thread_conversations WHERE thread_id = th.thread_id ORDER BY thread_convo_id DESC LIMIT 1) as recentmessagedatetime
	    	FROM thread th 
	    	LEFT JOIN officer off1 ON th.sender_id = off1.officer_id 
	    	LEFT JOIN officer off2 ON th.receiver_id = off2.officer_id
	    	LEFT JOIN inquiries inq1 ON th.sender_id = inq1.inquiries_id 
	    	LEFT JOIN inquiries inq2 ON th.receiver_id = inq2.inquiries_id  
	    	WHERE (th.sender_id = '$officer_id' OR th.receiver_id = '$officer_id')
	    	ORDER BY recentmessagedatetime DESC";
        $query2 = $this->db->query($sql2);
        $thread = $query2->result();

		$asset_url = base_url()."assets/";
		$data['title'] = "Admin Maintenance";
		$data['asset_url'] = $asset_url;

		$data['officer'] = $officer;
		$data['thread'] = $thread;

		if(isset($this->session->officer_name)) {
			$this->load->view('messages/index', $data);
		} else {
			redirect(base_url()."?error3=1");
		}
	}

	public function getconversation($thread_id) {
		$sql3 = "SELECT * FROM thread_conversations where thread_id = '$thread_id'";
	    $query3 = $this->db->query($sql3);
	    $thread_conversations = $query3->result();
	    echo json_encode($thread_conversations);
	}

	public function updatethreads($officer_id) {
		$sql = "SELECT th.thread_id, 
	        th.created_date,
	    	off1.officer_id as senderid,
	    	off1.officer_name as sendername,
	    	off2.officer_name as receivername,
	    	off2.officer_id as receiverid,
	    	inq1.inquiries_id as inqsenderid,
	    	inq1.inquiries_surname + ' ' + inq1.inquiries_firstname as inqsendername,
	    	inq2.inquiries_id as inqreceiverid,
	    	inq2.inquiries_surname + ' ' + inq2.inquiries_firstname as inqreceivername,
	    	(SELECT message FROM thread_conversations WHERE thread_id = th.thread_id ORDER BY thread_convo_id DESC LIMIT 1) as recentmessage,
	    	(SELECT message_from FROM thread_conversations WHERE thread_id = th.thread_id ORDER BY thread_convo_id DESC LIMIT 1) as recentmessagefrom,
	    	(SELECT message_date_time FROM thread_conversations WHERE thread_id = th.thread_id ORDER BY thread_convo_id DESC LIMIT 1) as recentmessagedatetime
	    	FROM thread th 
	    	LEFT JOIN officer off1 ON th.sender_id = off1.officer_id 
	    	LEFT JOIN officer off2 ON th.receiver_id = off2.officer_id
	    	LEFT JOIN inquiries inq1 ON th.sender_id = inq1.inquiries_id 
	    	LEFT JOIN inquiries inq2 ON th.receiver_id = inq2.inquiries_id  
	    	WHERE (th.sender_id = '$officer_id' OR th.receiver_id = '$officer_id')
	    	ORDER BY recentmessagedatetime DESC";
	    $query = $this->db->query($sql);
	    $threads = $query->result();
	    echo json_encode($threads);
	}

	public function savefilechat()
	{
		$thread_id = $this->input->post('thread_id');
		$message = $this->input->post('message');
		$message_from = $this->input->post('message_from');
		$message_type = $this->input->post('message_type');
		$message_status = $this->input->post('message_status');

		$data = array(
			'thread_id' => $thread_id,
			'message' => $message,
			'message_from' => $message_from,
			'message_type' => $message_type,
			'message_status' => $message_status,
			'message_date' => date("Y-m-d"),
			'message_time' => date("H:i:s"),
			'message_date_time' => date("Y-m-d H:i:s")
		);
		$this->db->insert('thread_conversations', $data);
		echo json_encode("Successfully uploaded the document!");
	}

	public function savetextchat()
	{
		$thread_id = $this->input->post('thread_id');
		$message = $this->input->post('message');
		$message_from = $this->input->post('message_from');
		$message_type = $this->input->post('message_type');
		$message_status = $this->input->post('message_status');

		$data = array(
			'thread_id' => $thread_id,
			'message' => $message,
			'message_from' => $message_from,
			'message_type' => $message_type,
			'message_status' => $message_status,
			'message_date' => date("Y-m-d"),
			'message_time' => date("H:i:s"),
			'message_date_time' => date("Y-m-d H:i:s")
		);
		$this->db->insert('thread_conversations', $data);
		echo json_encode("Successfully uploaded the document!");
	}

	public function createthread()
	{
		$sender_id = $this->input->post('sender_id');
		$receiver_id = $this->input->post('receiver_id');
		$chattype = $this->input->post('chattype');

		if($chattype == "officer") {
			$savetype = "managermanager";
		} else {
			$savetype = "managerclient";
		}

		$data = array(
			'sender_id' => $sender_id,
			'receiver_id' => $receiver_id,
			'created_date' => date("Y-m-d"),
			'status' => 'active',
			'chattype' => $savetype
		);
		$this->db->insert('thread', $data);
		echo json_encode("Successfully uploaded the document!");
	}

}