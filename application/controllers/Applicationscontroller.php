<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicationscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{

		$sql = "SELECT * FROM student_application sa inner join education_provider s on sa.provider_id = s.provider_id inner join client c on c.client_id = sa.client_id";
        $query = $this->db->query($sql);
        $result = $query->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Applications";
		$data['asset_url'] = $asset_url;
		$data['applications'] = $result;

		if(isset($this->session->officer_name)) {
			$this->load->view('applications/index', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}
	}

	public function newapplication() {
		$asset_url = base_url()."assets/";
		$data['title'] = "New Application";
		$data['asset_url'] = $asset_url;

		$sql3 = "SELECT * FROM client";
	    $query3 = $this->db->query($sql3);
	    $client = $query3->result();

	    $sql3 = "SELECT * FROM education_provider";
	    $query3 = $this->db->query($sql3);
	    $schools = $query3->result();

	    $data['client'] = $client;
		$data['schools'] = $schools;

		if(isset($this->session->officer_name)) {
			$this->load->view('applications/newapplication', $data);
		} else {
			echo "<script>alert('Please login first to CRM!')</script>";
			$asset_url = base_url()."assets/";
			$data['title'] = "User Login";
		    $data['asset_url'] = $asset_url;
			$this->load->view('userlogin/index', $data);
		}

	}

	public function getprogramfromschool($schoolid) {
		$sql3 = "SELECT * FROM schoolprograms where schoolid = $schoolid";
	    $query3 = $this->db->query($sql3);
	    $program = $query3->result();
	    echo json_encode($program);
	}

	public function saveapplication()
	{
		$startdate = $this->input->post('startdate');
		$time1 = strtotime($startdate);
		$month1 = date("m",$time1);
		$year1 = date("Y",$time1);
		$day1 = date("d",$time1);

		$enddate = $this->input->post('enddate');
		$time2 = strtotime($enddate);
		$month2 = date("m",$time2);
		$year2 = date("Y",$time2);
		$day2 = date("d",$time2);

		$coedate = $this->input->post('coedate');
		$time3 = strtotime($coedate);
		$month3 = date("m",$time3);
		$year3 = date("Y",$time3);
		$day3 = date("d",$time3);

		$program = $this->input->post('program');
		$sql = "SELECT * FROM schoolprograms WHERE id = '$program'";
        $query = $this->db->query($sql);
        $programs = $query->result();

		$data = array(
					'client_id' => $this->input->post('client'),
					'officer_id' => $this->session->userdata('officer_id'),
					'provider_id' => $this->input->post('school'),
					'studentapp_record_created_date' => date('Y-m-d'),
					'studentapp_course_starting_day' => $day1,
					'studentapp_course_starting_month' => $month1,
					'studentapp_course_starting_year' => $year1,
					'studentapp_course_end_day' => $day2,
					'studentapp_course_end_month' => $month2,
					'studentapp_course_end_year' => $year2,
					'studentapp_course_name' => $this->input->post('program'),
					'studentapp_course_level' => $programs->program_type,
					'studentapp_coe_day' => $day3,
					'studentapp_coe_month' => $month3,
					'studentapp_coe_year' => $year3,
					'studentapp_visa_lodged_day' => '',
					'studentapp_visa_lodged_month' => '',
					'studentapp_visa_lodged_year' => '',
					'studentapp_visa_status' => '',
					'studentapp_documents_pending' => '',
					'studentapp_comments' => '',
					'studentapp_flag' => '',
					'studentapp_invoice_processed_flag' => '',
					'studentapp_student_no' => '',
					'course_starting_date' => $this->input->post('startdate'),
					'course_ending_date' => $this->input->post('enddate'),
					'offices_id' => 0,
					'subagent_id' => 0,
					'staff_invoice_no' => '',
					'staff_invoice_no2' => '',
					'studentapp_event_id' => 0
				);
		$this->db->insert('student_application', $data);
		redirect('applications');
	}

}