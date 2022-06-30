<?php

class Kategori extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->helper('string');
    }

    // Data kategori
    public function index()
    {
        $kategori = $this->kategori_model->listing();

        $data = array(
            'title' => 'Data Kategori Produk',
            'kategori' => $kategori,
            'isi' => 'admin/kategori/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // //AUTO PLISSSS
    // function get_invoice()
    // {
    //     echo $this->kategori_model->get_invoice();
    // }

    // Tambah kategori
    public function tambah()
    {
        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'id_kategori',
            'Nomor ID Kategori Produk',
            'required|min_length[1]|max_length[11]|is_unique[tb_kategori.id_kategori]',
            array(
                'required' => '%s harus diisi',
                'min_length' => '%s minimal 1 karakter',
                'max_length' => '%s maksimal 11 karakter',
                'is_unique' => '%s sudah ada. Buat ID Kategori Produk baru.'
            )
        );

        $valid->set_rules(
            'nama_kategori',
            'Nama kategori',
            'required|is_unique[tb_kategori.nama_kategori]',
            array(
                'required' => '%s harus diisi',
                'is_unique' => '%s sudah ada. Buat nama Kategori Produk baru.'
            )
        );

        if ($valid->run() === FALSE) {
            //End validasi
            $data = array(
                'title' => 'Tambah Kategori Produk',
                'isi' => 'admin/kategori/tambah'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk database
        } else {
            $i            = $this->input;
            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

            $data = array(
                'id_kategori'   => $i->post('id_kategori'),
                'slug_kategori'  => $slug_kategori,
                'nama_kategori' => $i->post('nama_kategori'),
                'urutan'        => $i->post('urutan'),
            );
            $this->kategori_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/kategori'), 'refresh');
        }
        //End masuk database
    }


    // Edit kategori
    public function edit($id_kategori)
    {
        $kategori = $this->kategori_model->detail($id_kategori);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_kategori',
            'Nama kategori',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($valid->run() === FALSE) {
            //End validasi
            $data = array(
                'title'     => 'Edit Kategori Produk',
                'kategori'      => $kategori,
                'isi'       => 'admin/kategori/edit'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk database
        } else {
            $i            = $this->input;
            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

            $data = array(
                'id_kategori'   => $id_kategori,
                'slug_kategori'  => $slug_kategori,
                'nama_kategori' => $i->post('nama_kategori'),
                'urutan'        => $i->post('urutan'),
            );
            $this->kategori_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diperbarui');
            redirect(base_url('admin/kategori'), 'refresh');
        }
        //End masuk database
    }

    //Delete Kategori
    public function delete($id_kategori)
    {
        $where = array(
            'id_kategori' => $id_kategori
        );

        $this->kategori_model->delete($where, 'tb_kategori');
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/kategori'), 'refresh');
    }
}
