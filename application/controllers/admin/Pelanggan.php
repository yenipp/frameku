<?php

class Pelanggan extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        //PROTEKSI HALAMAN
        $this->simple_login->cek_login();
        //load helper random string
        $this->load->helper('string');
    }

    // Data pelanggan
    public function index()
    {
        $pelanggan = $this->pelanggan_model->listing();

        $data = array(
            'title' => 'Data Pelanggan',
            'pelanggan' => $pelanggan,
            'isi' => 'admin/pelanggan/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }



    //Delete Pelanggan
    public function delete($id_pelanggan)
    {
        $where = array(
            'id_pelanggan' => $id_pelanggan
        );

        $this->pelanggan_model->delete($where, 'tb_pelanggan');
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/pelanggan'), 'refresh');
    }
}
