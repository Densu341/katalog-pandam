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
		$this->load->model('M_visitor');

		if ($this->session->userdata('status') != "admin") {
			redirect(base_url("admin"));
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$visitors = $this->M_visitor->get_total_visitors();
		$category = $this->M_category->count_category();
		$subcategory = $this->M_subcategory->count_subcategory();
		$product = $this->M_product->count_product();

		$data['visitors'] = $visitors;
		$data['category'] = $category;
		$data['subcategory'] = $subcategory;
		$data['product'] = $product;
		$this->load->view('admin/__header', $data);
		$this->load->view('admin/dashboard_a', $data);
		$this->load->view('admin/__footer');
	}

	public function editprofile()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/__header', $data);
			$this->load->view('admin/editprofile_a', $data);
			$this->load->view('admin/__footer');
		} else {
			$username = $this->input->post('username');
			$email = $this->input->post('email');

			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/profile/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					$error_message = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error_message . '</div>');
					redirect('dashboard/editprofile');
				}
			}
			$this->db->set('username', $username);
			$this->db->where('email', $email);
			$this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
			redirect('dashboard/editprofile');
		}
	}

	public function changepassword()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/__header', $data);
			$this->load->view('admin/changepassword_a', $data);
			$this->load->view('admin/__footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');

			$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			if (md5($current_password) !== $user['password']) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
				redirect('dashboard/changepassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as the current password!</div>');
					redirect('dashboard/changepassword');
				} else {
					$password_hash = md5($new_password);

					// Update password di database
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
					redirect('dashboard/changepassword');
				}
			}
		}
	}

	//Start Category
	public function category()
	{
		$data['title'] = 'Category';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['category'] = $this->M_category->get_category();
		$this->load->view('admin/__header', $data);
		$this->load->view('admin/category_a', $data);
		$this->load->view('admin/__footer');
	}

	public function addcategory()
	{
		$this->form_validation->set_rules('category_name', 'Category', 'required|trim|is_unique[category.category_name]', [
			'is_unique' => 'This Category has already!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Category';
			$data['category'] = $this->M_category->get_category();
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('admin/__header', $data);
			$this->load->view('admin/category_a', $data);
			$this->load->view('admin/__footer');
		} else {
			$category_name = $this->input->post('category_name');
			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['banner']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'svg|gif|jpg|png|jpeg';
				$config['max_size']     = '5120';
				$config['max_width'] = '1080';
				$config['max_height'] = '500';
				$config['overwrite'] = true;
				$config['upload_path'] = './assets/img/category/';
				$config['file_name'] = $category_name;
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('banner')) {
					$banner = $this->upload->data('file_name');
					$this->db->set('banner', $banner);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('dashboard/addcategory');
				}
			}
			$data = [
				'category_name' => $category_name,
				'banner' => $banner
			];
			$this->M_category->add_category($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Category added!</div>');
			redirect('dashboard/category');
		}
	}

	public function editcategory()
	{

		$this->form_validation->set_rules('category_name', 'Category', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Category';
			$data['category'] = $this->M_category->get_category();
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('admin/__header', $data);
			$this->load->view('admin/category_a', $data);
			$this->load->view('admin/__footer');
		} else {
			$category_id = $this->input->post('category_id');
			$category_name = $this->input->post('category_name');
			$category = $this->M_category->get_cat_by_id($category_id);

			// Cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['banner']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '5120';
				$config['max_width'] = '1080';
				$config['max_height'] = '500';
				$config['overwrite'] = true;
				$config['upload_path'] = './assets/img/category/';
				$config['file_name'] = $category_name; // Menggunakan category_name sebagai nama file

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('banner')) {
					$old_image = $category['banner'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/category/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('banner', $new_image);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('dashboard/editcategory');
				}
			}

			$this->db->set('category_name', $category_name);
			$this->db->where('category_id', $category_id);
			$this->db->update('category');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category has been updated!</div>');
			redirect('dashboard/category');
		}
	}


	public function deletecategory($category_id)
	{
		$category = $this->M_category->get_cat_by_id($category_id);
		$this->M_category->delete_category($category_id);

		if ($category['banner'] != 'default.jpg') {
			$banner_path = './assets/img/category/' . $category['banner'];
			if (file_exists($banner_path)) {
				unlink($banner_path);
			}
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category has been deleted!</div>');
		redirect('dashboard/category');
	}

	// End Category

	// Start Subcategory
	public function subcategory()
	{
		$data['title'] = 'Subcategory';
		$data['subcategory'] = $this->M_subcategory->get_subcategory();
		$data['category'] = $this->db->get('category')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/__header', $data);
		$this->load->view('admin/subcategory_a', $data);
		$this->load->view('admin/__footer');
	}

	public function addsubcategory()
	{
		$this->form_validation->set_rules('subcategory_name', 'Category', 'required|trim|is_unique[subcategory.subcategory_name]', [
			'is_unique' => 'This Subcategory has already!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Subcategory';
			$data['subcategory'] = $this->M_subcategory->get_subcategory();
			$data['category'] = $this->db->get('category')->result_array();
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('admin/__header', $data);
			$this->load->view('admin/subcategory_a', $data);
			$this->load->view('admin/__footer');
		} else {
			$subcategory_name = $this->input->post('subcategory_name');
			$category_id = $this->input->post('category_id');
			$sub_code = $this->input->post('sub_code');

			// Cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'svg|gif|jpg|png|jpeg';
				$config['max_size'] = '5120';
				$config['max_width'] = '1080';
				$config['max_height'] = '1080';
				$config['overwrite'] = true;
				$config['upload_path'] = './assets/img/subcategory/';
				$config['file_name'] = $subcategory_name; // Menggunakan category_name sebagai nama file

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('dashboard/addsubcategory');
				}
			}

			$data = [
				'subcategory_name' => $subcategory_name,
				'category_id' => $category_id,
				'sub_code' => $sub_code,
				'image' => $new_image
			];
			$this->M_subcategory->add_subcategory($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New subcategory added!</div>');
			redirect('dashboard/subcategory');
		}
	}

	public function editsubcategory()
	{

		$this->form_validation->set_rules('subcategory_name', 'Subcategory', 'required|trim');
		$this->form_validation->set_rules('category_id', 'Category', 'required|trim');
		$this->form_validation->set_rules('sub_code', 'Subcategory', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Subcategory';
			$data['subcategory'] = $this->M_subcategory->get_subcategory();
			$data['category'] = $this->db->get('category')->result_array();
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('admin/__header', $data);
			$this->load->view('admin/subcategory_a', $data);
			$this->load->view('admin/__footer');
		} else {
			$subcategory_name = $this->input->post('subcategory_name');
			$sub_id = $this->input->post('sub_id');
			$sub_code = $this->input->post('sub_code');
			$subcategory = $this->M_subcategory->get_sub_by_id($sub_id);

			// Cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['upload_path'] = './assets/img/subcategory/';
				$config['allowed_types'] = 'svg|gif|jpg|png|jpeg';
				$config['file_name'] = $subcategory_name;
				$config['overwrite'] = true;
				$config['max_size'] = 5120; // 5MB
				$config['max_width'] = 1080;
				$config['max_height'] = 1080;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $subcategory['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/subcategory/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					$error_message = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error_message . '</div>');
					redirect('dashboard/subcategory');
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


	public function deletesubcategory($sub_id)
	{
		$subcategory = $this->M_subcategory->get_sub_by_id($sub_id);
		$this->M_subcategory->delete_subcategory($sub_id);

		if ($subcategory['image'] != 'default.jpg') {
			$image_path = './assets/img/subcategory/' . $subcategory['image'];
			if (file_exists($image_path)) {
				unlink($image_path);
			}
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Subcategory has been deleted!</div>');
		redirect('dashboard/subcategory');
	}

	public function product()
	{
		$data['title'] = 'Product';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// ambil data dari database
		$data['product'] = $this->M_product->get_product();
		$data['subcategory'] = $this->M_subcategory->get_subcategory();
		$data['category'] = $this->M_category->get_category();
		$data['material'] = $this->M_material->get_material();

		// load view 
		$this->load->view('admin/__header', $data);
		$this->load->view('admin/product_a', $data);
		$this->load->view('admin/__footer');
	}

	public function addproduct()
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
			$data['subcategory'] = $this->M_subcategory->get_subcategory();
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('admin/__header', $data);
			$this->load->view('admin/product_a', $data);
			$this->load->view('admin/__footer');
		} else {
			// persiapkan data
			$product_name = $this->input->post('product_name');
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

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['picture']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'svg|gif|jpg|png|jpeg';
				$config['max_size'] = '5120';
				$config['max_width'] = '1080';
				$config['max_height'] = '1080';
				$config['overwrite'] = true;
				$config['file_name'] = $product_name;
				$config['upload_path'] = './assets/img/product/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('picture')) {
					$picture = $this->upload->data('file_name');
					$this->db->set('picture', $picture);
				} else {
					$error_message = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error_message . '</div>');
					redirect('dashboard/product');
				}
			}

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
				'picture' => $picture,
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

	public function editproduct()
	{
		$product_id = $this->input->post('product_id');

		// get product data
		$product = $this->M_product->get_product_by_id($product_id);

		// persiapkan data
		$product_name = $this->input->post('product_name');
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

		// cek jika ada gambar yang akan diupload
		$upload_image = $_FILES['picture']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'svg|gif|jpg|png|jpeg';
			$config['max_size'] = '5120';
			$config['max_width'] = '1080';
			$config['max_height'] = '1080';
			$config['overwrite'] = true;
			$config['file_name'] = $product_name;
			$config['upload_path'] = './assets/img/product/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('picture')) {
				$picture = $this->upload->data('file_name');
				$this->db->set('picture', $picture);
			} else {
				$error_message = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error_message . '</div>');
				redirect('dashboard/product');
			}
		} else {
			$picture = $product['picture'];
		}

		$dataProduct = [
			'product_name' => $product_name,
			'sub_id' => $sub_id,
			'mat_id' => $mat_id,
			'product_code' => $product['product_code'],
			'description' => $this->input->post('description'),
			'price' => $this->input->post('price'),
		];

		if ($product['picture'] != $picture) {
			unlink('./assets/img/product/' . $product['picture']);
		}

		$this->db->where('product_id', $product_id);
		$this->db->update('product', $dataProduct);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been updated!</div>');
		redirect('dashboard/product');
	}




	public function deleteproduct($product_id)
	{
		$product = $this->M_product->get_product_by_id($product_id);
		$this->M_product->delete_product($product_id);

		if ($product['picture'] != 'default.jpg') {
			$picture_path = './assets/img/product/' . $product['picture'];
			if (file_exists($picture_path)) {
				unlink($picture_path);
			}
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been deleted!</div>');
		redirect('dashboard/product');
	}

	public function material()
	{
		$data['title'] = 'Data Material';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['material'] = $this->M_material->get_material();
		$this->load->view('admin/__header', $data);
		$this->load->view('admin/material_a');
		$this->load->view('admin/__footer');
	}

	public function addmaterial()
	{
		$this->form_validation->set_rules('material_name', 'Material', 'required|trim|is_unique[material.material_name]', [
			'is_unique' => 'This Material has already!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Material';
			$data['material'] = $this->M_material->get_material();

			$this->load->view('admin/__header', $data);
			$this->load->view('admin/material_a', $data);
			$this->load->view('admin/__footer');
		} else {
			$this->M_material->add_material();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New material added!</div>');
			redirect('dashboard/material');
		}
	}

	public function editmaterial()
	{
		$mat_id = $this->uri->segment(3);
		$data['title'] = 'Data Material';
		$data['material'] = $this->M_material->get_material();

		$this->form_validation->set_rules('material_name', 'Material', 'required|trim');
		$this->form_validation->set_rules('mat_code', 'Material', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/__header', $data);
			$this->load->view('admin/material_a', $data);
			$this->load->view('admin/__footer');
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

	public function deletematerial()
	{
		$mat_id = $this->input->post('mat_id');
		$this->M_material->delete_material($mat_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Material has been deleted!</div>');
		redirect('dashboard/material');
	}
}
