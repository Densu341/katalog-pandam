<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_category extends CI_Model
{
    function get_all()
    {
        $guery = $this->db->get('category');
        return $guery->result();
    }

    function insert($category_name)
    {
        $data = array(
            'category_name' => $category_name
        );
        $this->db->insert('category', $data);
    }

    function get_by_id($id)
    {
        $this->db->where('category_id', $id);
        $query = $this->db->get('category');
        return $query->result();
    }

    function update($category_name)
    {
        $data = array(
            'category_name' => $category_name
        );
        $this->db->where('category_id', $this->input->post('category_id'));
        $this->db->update('category', $data);
    }

    function delete($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('category');
    }

    function search($key)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->like('category_name', $key);
        $query = $this->db->get()->result();
        return $query;
    }
}
