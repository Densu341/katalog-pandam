<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_report extends CI_Model
{
    public function get_all_report()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('material', 'material.mat_id = product.mat_id');
        $this->db->join('subcategory', 'subcategory.sub_id = product.sub_id');
        $this->db->join('category', 'category.category_id = subcategory.category_id');
        $this->db->order_by('category.category_id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
