<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{
    // Halaman utama dasbor
    public function index()
    {
        $data = array(
            'title' => 'Halaman Admin',
            'isi' => 'admin/dasbor/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
