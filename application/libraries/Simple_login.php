<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        //load data model user
        $this->CI->load->model('user_model');
    }

    //Fungsi login
    public function login($username, $password)
    {
        $check = $this->CI->user_model->login($username,  $password);
        //Jika ada data user, maka create session login
        if ($check) {
            $id_pengguna    = $check->id_pengguna;
            $nama_pengguna  = $check->nama_pengguna;
            $akses_level    = $check->akses_level;
            //Create session
            $this->CI->session->set_userdata('id_pengguna', $id_pengguna);
            $this->CI->session->set_userdata('nama_pengguna', $nama_pengguna);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('akses_level', $akses_level);
            //redirect ke halaman admin yang diproteksi
            redirect(base_url('admin/dasbor'), 'refresh');
        } else {
            //Kalau tidak ada atau password username salah, maka login lagi
            $this->CI->session->set_flashdata('warning', 'Username atau password salah');
            redirect(base_url('login'), 'refresh');
        }
    }

    //Fungsi cek login
    public function cek_login()
    {
        //memeriksa apakahh session sudah ada atau belum, jika belum alihkan ke halaman login
        if ($this->CI->session->userdata('username') == "") {
            $this->CI->session->set_flashdata('warning', 'Anda belum login');
            redirect(base_url('login'), 'refresh');
        }
    }

    //Fungsi logout
    public function logout()
    {
        //membuang semua session yang telah di set pada saat login
        $this->CI->session->unset_userdata('id_pengguna');
        $this->CI->session->unset_userdata('nama_pengguna');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('akses_level');
        //setelah session di unset, maka redirect ke login
        $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
        redirect(base_url('login'), 'refresh');
    }
}
