<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_visitor');
    }

    public function visitor()
    {
        $ip = $this->input->ip_address();
        $this->M_visitor->save_visitor($ip);
    }
}
