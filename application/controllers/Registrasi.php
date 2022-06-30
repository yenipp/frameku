<?php

class Registrasi extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        //load helper random string
        $this->load->helper('string');
    }

    //Halaman registrasi
    public function index()
    {
        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'id_pelanggan',
            'Nomor ID Pelanggan',
            'required|min_length[1]|max_length[5]|is_unique[tb_pelanggan.id_pelanggan]',
            array(
                'required' => '%s harus diisi',
                'min_length' => '%s minimal 1 karakter',
                'max_length' => '%s maksimal 4 karakter',
                'is_unique' => '%s sudah ada. Buat ID Pengguna baru.'
            )
        );

        $valid->set_rules(
            'nama_pelanggan',
            'Nama lengkap',
            'required',
            array('required' => '%s harus diisi')
        );

        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[tb_pelanggan.email]',
            array(
                'required'      => '%s harus diisi',
                'valid_email'   => '%s tidak valid',
                'is_unique'     => '%s sudah terdaftar'
            )
        );

        $valid->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        if ($valid->run() === FALSE) {
            //End validasi

            $data = array(
                'title'    => 'Registrasi Pelanggan',
                'isi'       => 'registrasi/list'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
            //Masuk database
        } else {
            $i = $this->input;
            $data = array(
                'status_pelanggan'  => 'Pending',
                'id_pelanggan'      => $i->post('id_pelanggan'),
                'nama_pelanggan'    => $i->post('nama_pelanggan'),
                'email'             => $i->post('email'),
                'password'          => SHA1($i->post('password')),
                'telepon'           => $i->post('telepon'),
                'alamat'            => $i->post('alamat'),
                'tanggal_daftar'    => date('Y-m-d H:i:s')
            );
            $this->pelanggan_model->tambah($data);
            //Create session login pelanggan
            $this->session->set_userdata('email', $i->post('email'));
            $this->session->set_userdata('nama_pelanggan', $i->post('nama_pelanggan'));
            //End session
            $this->session->set_flashdata('sukses', 'Registrasi berhasil');
            redirect(base_url('registrasi/sukses'), 'refresh');
        }
        //End masuk database
    }

    //Sukses
    public function sukses()
    {
        $data = array(
            'title'    => 'Registrasi berhasil',
            'isi'      => 'registrasi/sukses'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
