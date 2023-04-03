<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_subcategory extends CI_Model
{
    function get_all()
    {
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->join('category', 'category.category_id = subcategory.category_id');
        $this->db->order_by('subcategory_id', 'ASC');
        return $this->db->get();
    }

    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->where('subcategory_id', $id);
        return $this->db->get();
    }

    function insert($data)
    {
        $this->db->insert('subcategory', $data);
    }

    function update()
    {
        $data = [
            'category_id' => $this->input->post('category_id'),
            'subcategory_name' => $this->input->post('subcategory_name')
        ];
        $this->db->where('subcategory_id', $this->input->post('subcategory_id'));
        $this->db->update('subcategory', $data);
    }

    function delete($id)
    {
        $this->db->where('subcategory_id', $id);
        $this->db->delete('subcategory');
    }
}
