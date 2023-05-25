<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_category');
		$this->load->model('M_subcategory');
		$this->load->model('M_product');
	}

	function index()
	{
		$data['category'] = $this->M_category->get_category();
		$data['subcategory'] = $this->M_subcategory->get_subcategory();
		$data['title'] = "Katalog Pandam";
		$this->load->view('template/header', $data);
		$this->load->view('katalog', $data);
		$this->load->view('template/footer');
	}

	function product()
	{
		$data['product'] = $this->M_product->get_product();
		$data['title'] = "Katalog Pandam";
		$this->load->view('template/header', $data);
		$this->load->view('product', $data);
		$this->load->view('template/footer');
	}
}
