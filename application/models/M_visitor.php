<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Visitor extends CI_Model
{
    public function get_total_visitors()
    {
        return $this->db->count_all('visitors');
    }

    public function cek_ip($ip)
    {
        $this->db->where('ip_address', $ip);
        $query = $this->db->get('visitors');
        return $query->num_rows();
    }

    public function save_visitor($ip)
    {
        $this->db->set('ip_address', $ip);
        $this->db->insert('visitors');
    }
}
