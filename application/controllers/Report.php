<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_report');
    $this->load->library('pdf');

    if ($this->session->userdata('status') != "admin") {
      redirect(base_url("admin"));
    }
  }

  function index()
  {
    $data['produk'] = $this->M_report->get_all_report();
    // var_dump($data);
    // die;
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "Laporan_Data_Produk.pdf";
    $this->pdf->load_view('pdf_report', $data);
    // $this->load->view('pdf_report', $data);
  }
}
