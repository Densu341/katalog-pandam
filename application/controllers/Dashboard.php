<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_category');
		$this->load->model('M_subcategory');

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

	function category()
	{
		$data['title'] = 'Category';
		$data['category'] = $this->M_category->get_category();
		$this->load->view('template_a/__header', $data);
		$this->load->view('category_a');
		// var_dump($data['category']);
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

	function editcategory($category_id)
	{
		$data['title'] = 'Data Category';
		$data['category'] = $this->M_category->get_category_by_id($category_id);

		$this->form_validation->set_rules('category_name', 'Category', 'required|trim|is_unique[category.category_name]', [
			'is_unique' => 'This Category has already!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('template_a/__header', $data);
			$this->load->view('category_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$category_name = $this->input->post('category_name');
			$category_id = $this->input->post('category_id');
			$data['category'] = $this->M_category->get_category_by_id($category_id);

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['banner']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
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
}
