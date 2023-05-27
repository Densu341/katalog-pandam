<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_category extends CI_Model
{
    public function get_category()
    {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function get_category_by_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/category/';
        $config['allowed_types']        = 'svg|gif|jpg|png|jpeg';
        $config['file_name']            = $this->input->post('category_name');
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 10MB
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('banner')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    public function add_category()
    {
        $data = [
            'category_name' => $this->input->post('category_name'),
            'banner' => $this->_uploadImage()
        ];
        $this->db->insert('category', $data);
    }

    public function get_cat_by_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delete_category($category_id)
    {
        $this->db->where('category_id', $category_id);
        $this->db->delete('category');
    }
}
