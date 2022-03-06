<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    // Halaman utama Website-Homepage
    public function index()
    {
        $data = array(
            'title' => 'Optik Wijaya Kusuma',
            'isi' => 'home/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
