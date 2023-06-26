<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_category extends CI_Model
{
    public function get_category()
    {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function add_category($data)
    {
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

    // count category
    public function count_category()
    {
        $query = $this->db->get('category');
        return $query->num_rows();
    }
}
