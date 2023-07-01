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
		$this->load->model('M_visitor');
	}

	function index()
	{
		$data['category'] = $this->M_category->get_category();
		$data['subcategory'] = $this->M_subcategory->get_subcategory();
		$data['title'] = "Katalog Pandam";

		// cek ip dari user
		$ip = $this->input->ip_address();
		$cek_ip = $this->M_visitor->cek_ip($ip);
		if ($cek_ip == 0) {
			// Hitung visitor jika ip berbeda
			$this->M_visitor->save_visitor($ip);
		}

		$this->load->view('user/header', $data);
		$this->load->view('user/katalog', $data);
		$this->load->view('user/footer');
	}

	public function show_subCategory()
	{
		$data['title'] = "Sub Kategory";

		// Ambil data URL
		$category_id = $this->uri->segment(3);

		// Ambil data subkategori berdasarkan category_id
		$data['subcategory'] = $this->M_subcategory->get_sub_by_id($category_id);

		// Ambil data produk berdasarkan category_id
		$data['products'] = $this->M_product->getProductsByCategory($category_id);

		// Ambil data produk berdasarkan sub_id
		$data['product'] = $this->M_product->getProductsBySubCategory();



		// var_dump json
		var_dump(json_encode($data['product']));
		die;

		$this->load->view('user/header', $data);
		$this->load->view('user/subcategory', $data);
		$this->load->view('user/footer');
	}



	function show_product_by_subcategory()
	{
		$data['title'] = "Produk";

		// Ambil data URL
		$sub_id = $this->uri->segment(3);

		// Ambil data produk berdasarkan sub_id
		$data['product'] = $this->M_product->get_product_by_subcategory($sub_id);

		$this->load->view('user/header', $data);
		$this->load->view('user/subcategory', $data);
		$this->load->view('user/footer');
	}
}
