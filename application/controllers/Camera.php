<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Camera extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
    }

    public function index()
    {
        $daftar_frame = $this->produk_model->coba_camera();

        $data = array(
            'title'        => 'Coba Frame',
            'daftar_frame' => $daftar_frame,
            'isi'          => 'camera/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // public function index()
    // {
    //     $data = array(
    //         'title' => 'Coba Frame',
    //         'isi'   => 'camera/list'
    //     );
    //     $data['daftar_frame'] = $this->db->get('tb_produk')->result_array();
    //     $this->load->view('layout/wrapper', $data, FALSE);
    // }
}
