<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    // Load model

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('produk_model');
        $this->load->model('konfigurasi_model');
    }


    // Halaman utama Website-Homepage
    public function index()
    {
        $site       = $this->konfigurasi_model->listing();
        $kategori   = $this->konfigurasi_model->nav_produk();
        $produk     = $this->produk_model->home();
        $data = array(
            'title'     => $site->nama_web . '|' . $site->tagline,
            'keyword'   => $site->keyword,
            'deskripsi' => $site->deskripsi,
            'site'      => $site,
            'kategori'  => $kategori,
            'produk'    => $produk,
            'isi'       => 'home/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
