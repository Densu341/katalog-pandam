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

		$this->load->view('user/header', $data);
		$this->load->view('user/katalog', $data);
		$this->load->view('user/footer');
	}

	function show_subCategory()
	{
		$data['title'] = "Sub Kategory";
		
		// ambil data url 
		$category_id = $this->uri->segment('3');

		// ambil data by category_id
		$data['product'] = $this->M_subcategory->get_sub_by_id($category_id);

		$this->load->view('user/header', $data);
		$this->load->view('user/subcategory', $data);
		$this->load->view('user/footer');
	}

	function show_product($category_id)
	{
		$data['product'] = $this->M_product->getProductsByCategory($category_id);
		$data['title'] = "Katalog Pandam";
		// var_dump($data['product']);
		// die;
		$this->load->view('user/header', $data);
		$this->load->view('user/product', $data);
		$this->load->view('user/footer');
	}
}