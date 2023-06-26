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
        $this->db->join('material', 'material.mat_id = product.mat_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_product($data)
    {
        $this->db->insert('product', $data);
    }

    public function get_product_by_id($product_id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('subcategory', 'subcategory.sub_id = product.sub_id');
        $this->db->join('category', 'category.category_id = subcategory.category_id');
        $this->db->join('material', 'material.mat_id = product.mat_id');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delete_product()
    {
        $this->db->where('product_id', $this->input->post('product_id'));
        $this->db->delete('product');
    }

    public function getProductsByCategory($category_id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('subcategory', 'subcategory.sub_id = product.sub_id');
        $this->db->join('category', 'category.category_id = subcategory.category_id');
        $this->db->where('category.category_id', $category_id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
