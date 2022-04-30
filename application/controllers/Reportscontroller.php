<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library("fpdf");
	}

	public function index() {
		$asset_url = base_url()."assets/";
		$data['title'] = "Reports";
		$data['asset_url'] = $asset_url;

		if(isset($this->session->officer_name)) {
			$this->load->view('reports/index', $data);
		} else {
			redirect('');
		}
	}

	public function generatereportdefault() {
		$this->load->library('mypdf');
		$test = "This is a test";
		$pdf = new PDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(59,5,'',0,1);
		$pdf->Cell(59,5,'',0,1);
		$pdf->Cell(59,5,'',0,1);
		$pdf->Cell(59,5,'',0,1);
		$pdf->Cell(59,5,'',0,1);
		$pdf->Cell(59,5,'',0,1);
		$pdf->Cell(59,5,'',0,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(189,5,' ANNUAL INVENTORY REPORT',0,1,'C');
		$pdf->Cell(189,5," As of {'2022-04-30'} to {'2022-04-30'}",0,1,'C');
		$pdf->Cell(59,5,'',0,1);
		$pdf->Cell(59,5,'',0,1);
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(20,5,"Item Code",1,0,'C');
		$pdf->Cell(60,5,"Name",1,0,'C');
		$pdf->Cell(15,5,"Quantity",1,0,'C');
		$pdf->Cell(25,5,"Room",1,0,'C');
		$pdf->Cell(35,5,"In-charge",1,0,'C');
		$pdf->Cell(20,5,"Status",1,0,'C');
		$pdf->Cell(17,5,"Date",1,1,'C');
		$x = 0;
		while($x < 20){  
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(20,5,"{$test}",1,0,'C');
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(60,5,"{$test}",1,0,'C');
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(15,5,"{$test}",1,0,'C');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(25,5,"{$test}",1,0,'C');
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(35,5,"{$test}",1,0,'C');
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(20,5,"{$test}",1,0,'C');
			$pdf->Cell(17,5,"{$test}",1,1,'C');
			$x++;
		}
		$pdf->output();
	}

}