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
		$this->load->model('M_material');
		$this->load->model('M_code');

		if ($this->session->userdata('status') != "admin") {
			redirect(base_url("admin"));
		}
	}

	function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template_a/__header', $data);
		$this->load->view('dashboard_a');
		$this->load->view('template_a/__footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		// var_dump($data['user']);
		if ($this->form_validation->run() == false) {
			$this->load->view('template_a/__header', $data);
			$this->load->view('editprofile_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$no = $this->input->post('no');

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['username'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/profile/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->db->set('username', $username);
			$this->db->where('email', $email);
			$this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
			redirect('dashboard/edit');
		}
	}

	function category()
	{
		$data['title'] = 'Category';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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
				$config['max_size']     = '5120';
				$config['max_width'] = '1920';
				$config['max_height'] = '1080';
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
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['subcategory'] = $this->M_subcategory->get_subcategory();
		$data['category'] = $this->M_subcategory->get_category();
		$this->load->view('template_a/__header', $data);
		$this->load->view('subcategory_a');
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
		$this->form_validation->set_rules('sub_code', 'Subcategory', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('template_a/__header', $data);
			$this->load->view('subcategory_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$subcategory_name = $this->input->post('subcategory_name');
			$sub_id = $this->input->post('sub_id');
			$sub_code = $this->input->post('sub_code');
			$data['subcategory'] = $this->M_subcategory->get_sub_by_id($sub_id);

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '5120';
				$config['max_width']	= '1920';
				$config['max_height']	= '1080';
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
			$this->db->set('sub_code', $sub_code);
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
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// ambil data dari database
		$data['product'] = $this->M_product->get_product();
		$data['subcategory'] = $this->M_product->get_subcategory();
		$data['material'] = $this->M_material->get_material();

		// var_dump($data['material']);
		// die;

		// load view 
		$this->load->view('template_a/__header', $data);
		$this->load->view('product_a', $data);
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
		$this->form_validation->set_rules('material_id', 'Material', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Product';
			$data['product'] = $this->M_product->get_product();
			$data['subcategory'] = $this->M_product->get_subcategory();

			$this->load->view('template_a/__header', $data);
			$this->load->view('product_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			// persiapkan data
			$sub_id = $this->input->post('sub_id');
			$mat_id = $this->input->post('material_id');

			// cek tabel kode
			$sub = [
				'sub_id' => $sub_id
			];
			$subCode = $this->M_code->get($sub);

			if (!$subCode) {
				// jika data tidak ada
				$product_code = '001';
			} else {
				// jika data ada
				$matCode = [
					'sub_id' => $sub_id,
					'mat_id' => $mat_id
				];
				$subCode = $this->M_code->get($matCode);
				// cek code material
				if (!$subCode) {
					// jika kode material tidak ada
					$product_code = '001';
				} else {
					// jika kode material ada
					$number = $subCode[0]['product_code'] + 1;
					$product_code = sprintf('%03d', $number);
				}
			}


			// ambil kode product
			//  kode product + 1
			// masukan ke tabel code
			// code material tidak ada 
			// masukan data sub code - mat code - material code (1)
			// masukan data sub code - mat code - material code (1)

			$dataProduct = [
				'product_name' => $this->input->post('product_name'),
				'sub_id' => $sub_id,
				'mat_id' => $mat_id,
				'length' => $this->input->post('length'),
				'width' => $this->input->post('width'),
				'height' => $this->input->post('height'),
				'product_code' => $product_code,
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'picture' => $this->_uploadImage()
			];

			// insert ke tabel product
			$this->M_product->add_product($dataProduct);

			$dataCode = [
				'sub_code' => $sub_id,
			];

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
				$config['max_size']     = '5120';
				$config['max_widht']	= '1920';
				$config['max_height']	= '1080';
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

	function material()
	{
		$data['title'] = 'Data Material';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['material'] = $this->M_material->get_material();
		$this->load->view('template_a/__header', $data);
		$this->load->view('material_a');
		$this->load->view('template_a/__footer');
	}

	function addmaterial()
	{
		$this->form_validation->set_rules('material_name', 'Material', 'required|trim|is_unique[material.material_name]', [
			'is_unique' => 'This Material has already!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Material';
			$data['material'] = $this->M_material->get_material();

			$this->load->view('template_a/__header', $data);
			$this->load->view('material_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$this->M_material->add_material();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New material added!</div>');
			redirect('dashboard/material');
		}
	}

	function editmaterial()
	{
		$mat_id = $this->uri->segment(3);
		$data['title'] = 'Data Material';
		$data['material'] = $this->M_material->get_material();

		$this->form_validation->set_rules('material_name', 'Material', 'required|trim');
		$this->form_validation->set_rules('mat_code', 'Material', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('template_a/__header', $data);
			$this->load->view('material_a', $data);
			$this->load->view('template_a/__footer');
		} else {
			$material_name = $this->input->post('material_name');
			$mat_code = $this->input->post('mat_code');
			$mat_id = $this->input->post('mat_id');
			$data['material'] = $this->M_material->get_material_by_id($mat_id);

			$this->db->set('material_name', $material_name);
			$this->db->set('mat_code', $mat_code);
			$this->db->where('mat_id', $mat_id);
			$this->db->update('material');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Material has been updated!</div>');
			redirect('dashboard/material');
		}
	}

	function deletematerial()
	{
		$mat_id = $this->input->post('mat_id');
		$this->M_material->delete_material($mat_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Material has been deleted!</div>');
		redirect('dashboard/material');
	}

	// upload image function
	private function _uploadImage()
	{
		$config['upload_path']          = './assets/img/product/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $this->input->post('product_name');
		$config['overwrite']            = true;
		$config['max_size']             = 5120; // 5MB
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('picture')) {
			return $this->upload->data("file_name");
		}

		return "default.jpg";
	}
}
