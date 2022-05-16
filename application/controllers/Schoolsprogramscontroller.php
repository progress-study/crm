<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolsprogramscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function schools()
	{
		$sql = "SELECT * FROM education_provider";
        $query = $this->db->query($sql);
        $result = $query->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Schools";
		$data['asset_url'] = $asset_url;
		$data['schools'] = $result;

		if(isset($this->session->officer_name)) {
			$this->load->view('schoolsprograms/schools', $data);
		} else {
			redirect(base_url()."?error3=1");
		}
	}

	public function newschool()
	{
        $asset_url = base_url()."assets/";
		$data['title'] = "New School";
		$data['asset_url'] = $asset_url;
	
		if(isset($this->session->officer_name)) {
			$this->load->view('schoolsprograms/newschool', $data);
		} else {
			redirect(base_url()."?error3=1");
		}
	}

	public function saveschool()
	{
		$data = array(
					'provider_name' => $this->input->post('schoolname'),
					'provider_marketing_contact_name' => $this->input->post('marketingname'),
					'provider_marketing_contact_phoneno' => $this->input->post('marketingphone'),
					'provider_marketing_mobileno' => $this->input->post('marketingmobile'),
					'provider_admin_contact_name' => $this->input->post('adminname'),
					'provider_admin_contact_phoneno' => $this->input->post('adminphone'),
					'provider_finance_contact_name' => $this->input->post('financename'),
					'provider_finance_contact_phoneno' => $this->input->post('financephone'),
					'provider_faxno' => $this->input->post('faxno'),
					'provider_mailing_address' => $this->input->post('mailingaddress'),
					'provider_suburb' => $this->input->post('suburb'),
					'provider_state' => $this->input->post('state'),
					'provider_postcode' => $this->input->post('postcode'),
					'provider_finance_mailing_address1' => $this->input->post('financemailing1'),
					'provider_finance_suburb1' => $this->input->post('financesuburb'),
					'provider_finance_state1' => $this->input->post('financestate'),
					'provider_finance_postcode1' => $this->input->post('financepostcode'),
					'provider_finance_mailing_address2' => $this->input->post('financemailing2'),
					'provider_notes' => $this->input->post('notes')
				);
		$this->db->insert('education_provider', $data);
		redirect('schools');
	}

	public function programs()
	{

		$sql = "SELECT * FROM schoolprograms sp inner join education_provider ep on sp.provider_id = ep.provider_id";
        $query = $this->db->query($sql);
        $result = $query->result();

        $asset_url = base_url()."assets/";
		$data['title'] = "Programs";
		$data['asset_url'] = $asset_url;
		$data['programs'] = $result;

		if(isset($this->session->officer_name)) {
			$this->load->view('schoolsprograms/programs', $data);
		} else {
			redirect(base_url()."?error3=1");
		}
	}

	public function newprogram()
	{
        $asset_url = base_url()."assets/";
		$data['title'] = "New Program";
		$data['asset_url'] = $asset_url;

		$sql = "SELECT * FROM education_provider";
        $query = $this->db->query($sql);
        $education_provider = $query->result();

		$sql = "SELECT * FROM qualifications";
        $query = $this->db->query($sql);
        $qualifications = $query->result();

        $sql = "SELECT * FROM currency";
        $query = $this->db->query($sql);
        $currency = $query->result();

        $data['qualifications'] = $qualifications; 
        $data['education_provider'] = $education_provider;
        $data['currency'] = $currency;
	
		if(isset($this->session->officer_name)) {
			$this->load->view('schoolsprograms/newprogram', $data);
		} else {
			redirect(base_url()."?error3=1");
		}
	}

	public function saveprogram()
	{
		$data = array(
					'program' => $this->input->post('program'),
					'applicationfee' => $this->input->post('applicationfee'),
					'programtype' => $this->input->post('programlevel'),
					'commission' => $this->input->post('commission'),
					'provider_id' => $this->input->post('school'),
					'description' => $this->input->post('description'),
					'tuition' => $this->input->post('tuitionfee'),
					'costofliving' => $this->input->post('costofliving'),
					'currency' => $this->input->post('currency')
				);
		$this->db->insert('schoolprograms', $data);
		redirect('programs');
	}

}