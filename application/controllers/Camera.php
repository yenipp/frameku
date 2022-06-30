<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Camera extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Coba Frame',
            'isi'   => 'camera/list'
        );
        $data['daftar_frame'] = $this->db->get('tb_produk')->result_array();
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
