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
        // $site       = $this->konfigurasi_model->listing();
        $kategori   = $this->konfigurasi_model->nav_produk();
        $produk     = $this->produk_model->home();
        $berita = $this->produk_model->tampil_berita();
        $data = array(
            'title'     => 'Wijaya Kusuma | Optik',
            'deskripsi' => 'Optik Wijaya Kusuma menyediakan berbagai macam kacamata',
            'kategori'  => $kategori,
            'produk'    => $produk,
            'berita'    => $berita,
            'isi'       => 'home/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }


    public function berita()
    {
        // $site       = $this->konfigurasi_model->listing();
        $kategori   = $this->konfigurasi_model->nav_produk();
        $produk     = $this->produk_model->home();
        $data = array(
            'title'     => 'Wijaya Kusuma | Optik',
            'deskripsi' => 'Optik Wijaya Kusuma menyediakan berbagai macam kacamata',
            'kategori'  => $kategori,
            'produk'    => $produk,
            'isi'       => 'home/berita'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function kontak()
    {
        // $site       = $this->konfigurasi_model->listing();
        $kategori   = $this->konfigurasi_model->nav_produk();
        $produk     = $this->produk_model->home();
        $data = array(
            'title'     => 'Wijaya Kusuma | Optik',
            'deskripsi' => 'Optik Wijaya Kusuma menyediakan berbagai macam kacamata',
            'kategori'  => $kategori,
            'produk'    => $produk,
            'isi'       => 'home/kontak'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
