<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_product extends CI_Model
{
    public function get_product()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('subcategory', 'subcategory.sub_id = product.sub_id');
        $this->db->join('category', 'category.category_id = subcategory.category_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_category()
    {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function get_subcategory()
    {
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->join('category', 'category.category_id = subcategory.category_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_product_by_id($product_id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('subcategory', 'subcategory.sub_id = product.sub_id');
        $this->db->join('category', 'category.category_id = subcategory.category_id');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/product/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $this->input->post('product_name');
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        $config['max_width']            = 1400;
        $config['max_height']           = 1600;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('picture')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    public function add_product()
    {
        $data = [
            'product_name' => $this->input->post('product_name'),
            'sub_id' => $this->input->post('sub_id'),
            'length' => $this->input->post('length'),
            'width' => $this->input->post('width'),
            'height' => $this->input->post('height'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'picture' => $this->_uploadImage()
        ];
        $this->db->insert('product', $data);
    }

    public function delete_product()
    {
        $this->db->where('product_id', $this->input->post('product_id'));
        $this->db->delete('product');
    }
}
