<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_category');
	}

	function index()
	{
		$data['title'] = "Katalog Pandam";
		$this->load->view('template/header', $data);
		$this->load->view('katalog', $data);
		$this->load->view('template/footer');
	}
}
