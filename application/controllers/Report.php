<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('status') != "admin") {
      redirect(base_url("admin"));
    }
  }

  function index()
  {
    // $data['base'] = base_url();
    // load library
    $this->load->model('M_report');
    $this->load->library('pdf');
    // create pdf
    $data['produk'] = $this->M_report->get_all_report();

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "Laporan_Data_Produk.pdf";
    $this->pdf->set_option('isRemoteEnabled', TRUE);
    $this->pdf->set_option('defaultMediaType', 'all');
    $this->pdf->set_option('isFontSubsettingEnabled', true);
    $this->pdf->set_option('isPhpEnabled', true);
    $this->pdf->load_view('pdf_report', $data);
    // $this->load->view('pdf_report', $data);
  }
}
