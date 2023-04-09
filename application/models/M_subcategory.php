<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_subcategory extends CI_Model
{
    public function get_subcategory()
    {
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->join('category', 'category.category_id = subcategory.category_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_category()
    {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/subcategory/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->post('subcategory_name');
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        $config['max_width']            = 1200;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    public function add_subcategory()
    {
        $data = [
            'category_id' => $this->input->post('category_id'),
            'subcategory_name' => $this->input->post('subcategory_name'),
            'image' => $this->_uploadImage()
        ];
        $this->db->insert('subcategory', $data);
    }

    public function get_sub_by_id($sub_id)
    {
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->join('category', 'category.category_id = subcategory.category_id');
        $this->db->where('sub_id', $sub_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delete_subcategory($sub_id)
    {
        $this->db->where('sub_id', $sub_id);
        $this->db->delete('subcategory');
    }
}
