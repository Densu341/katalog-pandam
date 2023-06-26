<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_subcategory extends CI_Model
{
    public function get_subcategory()
    {
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->join('category', 'category.category_id = subcategory.category_id');
        $this->db->order_by("category.category_id", "desc");
        $this->db->limit(4);

        $query = $this->db->get();
        return $query->result_array();
    }

    private function _uploadImage()
    {
        $config['upload_path'] = './assets/img/subcategory/';
        $config['allowed_types'] = 'svg|gif|jpg|png|jpeg';
        $config['file_name'] = $this->input->post('subcategory_name');
        $config['overwrite'] = true;
        $config['max_size'] = 5120;
        $config['max_width'] = 1080;
        $config['max_height'] = 1080;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return 'default.jpg';
    }

    public function add_subcategory($data)
    {
        $this->db->insert('subcategory', $data);
    }


    public function get_sub_by_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_subcategory($sub_id)
    {
        $this->db->where('sub_id', $sub_id);
        $this->db->delete('subcategory');
    }

    // count subcategory
    public function count_subcategory()
    {
        $query = $this->db->get('subcategory');
        return $query->num_rows();
    }
}
