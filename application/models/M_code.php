<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Code extends CI_Model
{
    public function get($param)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where($param);
        $query = $this->db->get();
        return $query->result_array();
    }
}