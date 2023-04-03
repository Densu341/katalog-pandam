<?php

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
		$data['category'] = $this->M_category->get_all();
		$this->load->view('template_a/__header', $data);
		$this->load->view('category_a');
		// var_dump($data['category']);
		$this->load->view('template_a/__footer');
	}

	function add_category()
	{
		$this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Category';
			$data['category'] = $this->M_category->get_all();
			$this->load->view('template_a/__header', $data);
			$this->load->view('category_a');
			$this->load->view('template_a/__footer');
		} else {
			$category_name = $this->input->post('category_name');
			$this->M_category->insert($category_name);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New category added!</div>');
			redirect(base_url('dashboard/category'));
		}
	}

	function edit_category()
	{
		$this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Category';
			$data['category'] = $this->M_category->get_all()->result();
			$data['category'] = $this->M_category->get_by_id()->result();
			$this->load->view('template_a/__header', $data);
			$this->load->view('category_a');
			$this->load->view('template_a/__footer');
		} else {
			$category_name = $this->input->post('category_name');
			$this->M_category->update($category_name);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category has been updated!</div>');
			redirect(base_url('dashboard/category'));
		}
	}

	function delete_category()
	{
		$category_id = $this->uri->segment(3);
		$this->M_category->delete($category_id);
		redirect(base_url('dashboard/category'));
	}

	function search_category()
	{
		$key = $this->input->post('key');
		$data['title'] = 'Category';
		$data['category'] = $this->M_category->search($key);
		$this->load->view('template_a/__header', $data);
		$this->load->view('category_a');
		$this->load->view('template_a/__footer');
	}

	function subcategory()
	{
		$data['title'] = 'Sub Category';
		$data['subcategory'] = $this->M_subcategory->get_all()->result();
		$this->load->view('template_a/__header', $data);
		$this->load->view('subcategory_a');
		// var_dump($data['subcategory']);
		$this->load->view('template_a/__footer');
	}

	function add_subcategory()
	{
		$this->form_validation->set_rules('category_id', 'Category', 'required|trim');
		$this->form_validation->set_rules('subcategory_name', 'Sub Category Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Sub Category';
			$data['subcategory'] = $this->M_subcategory->get_all()->result();
			$data['category'] = $this->M_category->get_all()->result();
			$this->load->view('template_a/__header', $data);
			$this->load->view('subcategory_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$category_id = $this->input->post('category_id');
			$subcategory_name = $this->input->post('subcategory_name');
			$data = array(
				'category_id' => $category_id,
				'subcategory_name' => $subcategory_name
			);
			$this->M_subcategory->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub category added!</div>');
			redirect(base_url('dashboard/subcategory'));
		}
	}

	function edit_subcategory()
	{
		$this->form_validation->set_rules('category_id', 'Category', 'required|trim');
		$this->form_validation->set_rules('subcategory_name', 'Sub Category Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Sub Category';
			$data['subcategory'] = $this->M_subcategory->get_all()->result();
			$data['subcategory'] = $this->M_subcategory->get_by_id()->result();
			$data['category'] = $this->M_category->get_all()->result();
			$this->load->view('template_a/__header', $data);
			$this->load->view('subcategory_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$this->M_subcategory->update();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub category has been updated!</div>');
			redirect(base_url('dashboard/subcategory'));
		}
	}
}
