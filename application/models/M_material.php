<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_material extends CI_Model
{
    public function get_material()
    {
        $query = $this->db->get('material');
        return $query->result_array();
    }

    public function add_material()
    {
        $data = [
            'material_name' => $this->input->post('material_name'),
            'mat_code' => $this->input->post('mat_code')
        ];
        $this->db->insert('material', $data);
    }

    public function get_material_by_id($mat_id)
    {
        $this->db->select('*');
        $this->db->from('material');
        $this->db->where('mat_id', $mat_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_material()
    {
        $data = [
            'material_name' => $this->input->post('material_name'),
            'mat_code' => $this->input->post('mat_code')
        ];
        $this->db->where('mat_id', $this->input->post('mat_id'));
        $this->db->update('material', $data);
    }

    public function delete_material($mat_id)
    {
        $this->db->where('mat_id', $mat_id);
        $this->db->delete('material');
    }
}
