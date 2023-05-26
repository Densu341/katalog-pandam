<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_category');
		$this->load->model('M_subcategory');
		$this->load->model('M_product');

		if ($this->session->userdata('status') != "admin") {
			redirect(base_url("admin"));
		}
	}

	function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->view('template_a/__header', $data);
		$this->load->view('dashboard_a');
		$this->load->view('template_a/__footer');
	}

	function editprofile()
	{
		$data['title'] = 'Edit Profile';
		$this->load->view('template_a/__header', $data);
		$this->load->view('editprofile_a');
		$this->load->view('template_a/__footer');
	}

	function category()
	{
		$data['title'] = 'Category';
		$data['category'] = $this->M_category->get_category();
		$this->load->view('template_a/__header', $data);
		$this->load->view('category_a');
		$this->load->view('template_a/__footer');
	}

	function addcategory()
	{
		$this->form_validation->set_rules('category_name', 'Category', 'required|trim|is_unique[category.category_name]', [
			'is_unique' => 'This Category has already!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Category';
			$data['category'] = $this->M_category->get_category();

			$this->load->view('template_a/__header', $data);
			$this->load->view('category_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$this->M_category->add_category();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New category added!</div>');
			redirect('dashboard/category');
		}
	}

	function editcategory()
	{
		$data['title'] = 'Data Category';
		$data['category'] = $this->M_category->get_category();

		$this->form_validation->set_rules('category_name', 'Category', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('template_a/__header', $data);
			$this->load->view('category_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$category_name = $this->input->post('category_name');
			$category_id = $this->input->post('category_id');
			$data['category'] = $this->M_category->get_cat_by_id($category_id);

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['banner']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '10240';
				$config['upload_path'] = './assets/img/category/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('banner')) {
					$old_image = $data['category']['banner'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/category/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('banner', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('category_name', $category_name);
			$this->db->where('category_id', $category_id);
			$this->db->update('category');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category has been updated!</div>');
			redirect('dashboard/category');
		}
	}

	function deletecategory($category_id)
	{
		$this->M_category->delete_category($category_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category has been deleted!</div>');
		redirect('dashboard/category');
	}

	function subcategory()
	{
		$data['title'] = 'Subcategory';
		$data['subcategory'] = $this->M_subcategory->get_subcategory();
		$data['category'] = $this->M_subcategory->get_category();
		$this->load->view('template_a/__header', $data);
		$this->load->view('subcategory_a');
		// var_dump($data['subcategory']);
		$this->load->view('template_a/__footer');
	}

	function addsubcategory()
	{
		$this->form_validation->set_rules('subcategory_name', 'Subcategory', 'required|trim|is_unique[subcategory.subcategory_name]', [
			'is_unique' => 'This Subcategory has already!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Subcategory';
			$data['subcategory'] = $this->M_subcategory->get_subcategory();
			$data['category'] = $this->M_subcategory->get_category();

			$this->load->view('template_a/__header', $data);
			$this->load->view('subcategory_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$this->M_subcategory->add_subcategory();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New subcategory added!</div>');
			redirect('dashboard/subcategory');
		}
	}

	function editsubcategory()
	{
		$data['title'] = 'Data Subcategory';
		$data['subcategory'] = $this->M_subcategory->get_subcategory();
		$data['category'] = $this->M_subcategory->get_category();

		$this->form_validation->set_rules('subcategory_name', 'Subcategory', 'required|trim');
		$this->form_validation->set_rules('category_id', 'Category', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('template_a/__header', $data);
			$this->load->view('subcategory_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$subcategory_name = $this->input->post('subcategory_name');
			$sub_id = $this->input->post('sub_id');
			$data['subcategory'] = $this->M_subcategory->get_sub_by_id($sub_id);

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '10240';
				$config['upload_path'] = './assets/img/subcategory/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['subcategory']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/subcategory/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('subcategory_name', $subcategory_name);
			$this->db->where('sub_id', $sub_id);
			$this->db->update('subcategory');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Subcategory has been updated!</div>');
			redirect('dashboard/subcategory');
		}
	}

	function deletesubcategory()
	{
		$sub_id = $this->input->post('sub_id');
		$this->M_subcategory->delete_subcategory($sub_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Subcategory has been deleted!</div>');
		redirect('dashboard/subcategory');
	}

	function product()
	{
		$data['title'] = 'Product';
		$data['product'] = $this->M_product->get_product();
		$data['subcategory'] = $this->M_product->get_subcategory();
		$this->load->view('template_a/__header', $data);
		$this->load->view('product_a');
		$this->load->view('template_a/__footer');
	}

	function addproduct()
	{
		$this->form_validation->set_rules('product_name', 'Product', 'required|trim|is_unique[product.product_name]', [
			'is_unique' => 'This Product has already!'
		]);
		$this->form_validation->set_rules('length', 'Length', 'required|trim');
		$this->form_validation->set_rules('width', 'Width', 'required|trim');
		$this->form_validation->set_rules('height', 'Height', 'required|trim');
		$this->form_validation->set_rules('price', 'Price', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');
		$this->form_validation->set_rules('sub_id', 'Subcategory', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Product';
			$data['product'] = $this->M_product->get_product();
			$data['subcategory'] = $this->M_product->get_subcategory();

			$this->load->view('template_a/__header', $data);
			$this->load->view('product_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$this->M_product->add_product();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New product added!</div>');
			redirect('dashboard/product');
		}
	}

	function editproduct()
	{
		$product_id = $this->uri->segment(3);
		$data['title'] = 'Data Product';
		$data['product'] = $this->M_product->get_product();
		$data['subcategory'] = $this->M_product->get_subcategory();

		$this->form_validation->set_rules('product_name', 'Product', 'required|trim');
		$this->form_validation->set_rules('length', 'Length', 'required|trim');
		$this->form_validation->set_rules('width', 'Width', 'required|trim');
		$this->form_validation->set_rules('height', 'Height', 'required|trim');
		$this->form_validation->set_rules('price', 'Price', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');
		$this->form_validation->set_rules('sub_id', 'Subcategory', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('template_a/__header', $data);
			$this->load->view('product_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$product_name = $this->input->post('product_name');
			$length = $this->input->post('length');
			$width = $this->input->post('width');
			$height = $this->input->post('height');
			$price = $this->input->post('price');
			$description = $this->input->post('description');
			$sub_id = $this->input->post('sub_id');
			$product_id = $this->input->post('product_id');
			$data['product'] = $this->M_product->get_product_by_id($product_id);

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['picture']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/product/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('picture')) {
					$old_image = $data['product']['picture'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/product/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('picture', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->db->set('product_name', $product_name);
			$this->db->set('length', $length);
			$this->db->set('width', $width);
			$this->db->set('height', $height);
			$this->db->set('price', $price);
			$this->db->set('description', $description);
			$this->db->set('sub_id', $sub_id);
			$this->db->where('product_id', $product_id);
			$this->db->update('product');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been updated!</div>');
			redirect('dashboard/product');
		}
	}

	function deleteproduct()
	{
		$product_id = $this->input->post('product_id');
		$this->M_product->delete_product($product_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been deleted!</div>');
		redirect('dashboard/product');
	}
}
