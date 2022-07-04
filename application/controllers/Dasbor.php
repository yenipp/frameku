<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        //Halaman ini diproteksi dengan simple_pelanggan => cek login
        $this->simple_pelanggan->cek_login();
    }

    //Halaman dasbor
    public function index()
    {
        //Ambil dara login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = array(
            'title' => 'Halaman Dashboard Pelanggan',
            'header_transaksi' => $header_transaksi,
            'isi'   => 'dasbor/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //Belanja
    public function belanja()
    {
        //Ambil dara login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = array(
            'title'            => 'Daftar favorit saya',
            'header_transaksi' => $header_transaksi,
            'isi'              => 'dasbor/belanja'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //Detail
    public function detail($kode_transaksi)
    {
        //Ambil dara login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);

        //pastikan bahwa pelanggan hanya mengakses data transaksinya
        if ($header_transaksi->id_pelanggan != $id_pelanggan) {
            $this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
            redirect(base_url('masuk'));
        }

        $data = array(
            'title'            => 'Riwayat Belanja',
            'header_transaksi' => $header_transaksi,
            'transaksi'        => $transaksi,
            'isi'              => 'dasbor/detail'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //Profil
    public function profil()
    {
        //Ambil dari login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $pelanggan    = $this->pelanggan_model->detail($id_pelanggan);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_pelanggan',
            'Nama lengkap',
            'required',
            array('required' => '%s harus diisi')
        );

        // $valid->set_rules(
        //     'alamat',
        //     'Alamat',
        //     'required',
        //     array('required' => '%s harus diisi')
        // );

        // $valid->set_rules(
        //     'telepon',
        //     'Nomor Telepon',
        //     'required',
        //     array('required' => '%s harus diisi')
        // );

        if ($valid->run() === FALSE) {
            //End validasi

            $data = array(
                'title'            => 'Profil saya',
                'pelanggan'        => $pelanggan,
                'isi'              => 'dasbor/profil'
            );
            $this->load->view('layout/wrapper', $data, FALSE);

            //Masuk database
        } else {
            $i = $this->input;
            //Kalau password lebih dari 6 karakter, maka password diganti
            if (strlen($i->post('password')) >= 6) {
                $data = array(
                    'id_pelanggan'      => $id_pelanggan,
                    'nama_pelanggan'    => $i->post('nama_pelanggan'),
                    'password'          => SHA1($i->post('password')),
                    // 'telepon'           => $i->post('telepon'),
                    // 'alamat'            => $i->post('alamat'),
                );
            } else {
                //Kalau password < 6 maka password tidak diganti
                $data = array(
                    'id_pelanggan'      => $id_pelanggan,
                    'nama_pelanggan'    => $i->post('nama_pelanggan'),
                    // 'telepon'           => $i->post('telepon'),
                    // 'alamat'            => $i->post('alamat'),
                );
            }
            //End data update
            $this->pelanggan_model->edit($data);
            $this->session->set_flashdata('sukses', 'Profil berhasil diperbarui');
            redirect(base_url('dasbor/profil'), 'refresh');
        }
        //End masuk database
    }
}
