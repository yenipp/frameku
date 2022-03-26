<?php

class Konfigurasi extends CI_Controller
{
    //LOAD MODEL
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konfigurasi_model');
    }

    //Konfigurasi Umum
    public function index()
    {
        $konfigurasi    = $this->konfigurasi_model->listing();

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'id_konfigurasi',
            'Nomor ID Konfigurasi',
            'required',
            array('required' => '%s harus diisi')
        );

        $valid->set_rules(
            'nama_web',
            'Nama Website',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($valid->run() === FALSE) {
            //End validasi
            $data = array(
                'title'          => 'Konfigurasi Website',
                'konfigurasi'    => $konfigurasi,
                'isi'            => 'admin/konfigurasi/list'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk database
        } else {
            $i            = $this->input;
            $data = array(
                'id_konfigurasi'        => $konfigurasi->id_konfigurasi,
                'nama_web'              => $i->post('nama_web'),
                'tagline'               => $i->post('tagline'),
                'email'                 => $i->post('email'),
                'website'               => $i->post('website'),
                'keyword'               => $i->post('keyword'),
                'meta_text'             => $i->post('meta_text'),
                'telepon'               => $i->post('telepon'),
                'alamat'                => $i->post('alamat'),
                'facebook'              => $i->post('facebook'),
                'instagram'             => $i->post('instagram'),
                'deskripsi'             => $i->post('deskripsi'),
                'rekening_pembayaran'   => $i->post('rekening_pembayaran'),

            );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diperbarui');
            redirect(base_url('admin/konfigurasi'), 'refresh');
        }
        //End masuk database
    }

    //Konfigurasi Logo
    public function logo()
    {
    }

    //Konfigurasi Icon
    public function icon()
    {
    }
}
