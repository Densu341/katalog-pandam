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

        $query = $this->db->get();
        return $query->result_array();
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
