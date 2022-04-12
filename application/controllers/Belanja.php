<?php

class Belanja extends CI_Controller
{
    // Load model

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('produk_model');
        $this->load->model('konfigurasi_model');
    }

    //Halaman belanja
    public function index()
    {
        $keranjang = $this->cart->contents();
        $data = array(
            'title'    => 'Keranjang Belanja',
            'keranjang' => $keranjang,
            'isi'       => 'belanja/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //Tambahkan ke keranjang belanja
    public function add()
    {
        //Ambil data dari form
        $id             = $this->input->post('id');
        $qty            = $this->input->post('qty');
        $price          = $this->input->post('price');
        $name           = $this->input->post('name');
        $redirect_page  = $this->input->post('redirect_page');
        //proses memasukkan ke keranjang belanja
        $data = array(
            'id'    => $id,
            'qty'   => $qty,
            'price'   => $price,
            'name'   => $name
        );
        $this->cart->insert($data);
        //redirect page
        redirect($redirect_page, 'refresh');
    }
}
