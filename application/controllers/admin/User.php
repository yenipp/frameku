<?php

class User extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    // Data user
    public function index()
    {
        $user = $this->user_model->listing();

        $data = array(
            'title' => 'Data Pengguna',
            'user' => $user,
            'isi' => 'admin/user/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    // Tambah user
    public function tambah()
    {
        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'id_pengguna',
            'Nomor ID Pengguna',
            'required|min_length[1]|max_length[11]|is_unique[tb_pengguna.id_pengguna]',
            array(
                'required' => '%s harus diisi',
                'min_length' => '%s minimal 1 karakter',
                'max_length' => '%s maksimal 11 karakter',
                'is_unique' => '%s sudah ada. Buat ID Pengguna baru.'
            )
        );

        $valid->set_rules(
            'nama_pengguna',
            'Nama lengkap',
            'required',
            array('required' => '%s harus diisi')
        );

        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required' => '%s harus diisi',
                'valid_email' => '%s harus diisi'
            )
        );

        $valid->set_rules(
            'username',
            'Username',
            'required|min_length[6]|max_length[32]|is_unique[tb_pengguna.username]',
            array(
                'required' => '%s harus diisi',
                'min_length' => '%s minimal 6 karakter',
                'max_length' => '%s maksimal 32 karakter',
                'is_unique' => '%s sudah ada. Buat username baru.'
            )
        );

        $valid->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($valid->run() === FALSE) {
            //End validasi
            $data = array(
                'title' => 'Tambah Pengguna',
                'isi' => 'admin/user/tambah'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk database
        } else {
            $i = $this->input;
            $data = array(
                'id_pengguna'   => $i->post('id_pengguna'),
                'nama_pengguna' => $i->post('nama_pengguna'),
                'email'         => $i->post('email'),
                'username'      => $i->post('username'),
                'password'      => $i->post('password'),
                'akses_level'   => $i->post('akses_level'),
            );
            $this->user_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/user'), 'refresh');
        }
        //End masuk database
    }


    // Edit user
    public function edit($id_pengguna)
    {
        $user = $this->user_model->detail($id_pengguna);

        //Validasi input
        $valid = $this->form_validation;

        // $valid->set_rules(
        //     'id_pengguna',
        //     'Nomor ID Pengguna',
        //     'required|min_length[1]|max_length[11]|is_unique[tb_pengguna.id_pengguna]',
        //     array(
        //         'required' => '%s harus diisi',
        //         'min_length' => '%s minimal 1 karakter',
        //         'max_length' => '%s maksimal 11 karakter',
        //         'is_unique' => '%s sudah ada. Buat ID Pengguna baru.'
        //     )
        // );

        $valid->set_rules(
            'nama_pengguna',
            'Nama lengkap',
            'required',
            array('required' => '%s harus diisi')
        );

        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required' => '%s harus diisi',
                'valid_email' => '%s harus diisi'
            )
        );

        $valid->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($valid->run() === FALSE) {
            //End validasi
            $data = array(
                'title'     => 'Edit Pengguna',
                'user'      => $user,
                'isi'       => 'admin/user/edit'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk database
        } else {
            $i = $this->input;
            $data = array(
                'id_pengguna'   => $id_pengguna,
                'nama_pengguna' => $i->post('nama_pengguna'),
                'email'         => $i->post('email'),
                'username'      => $i->post('username'),
                'password'      => $i->post('password'),
                'akses_level'   => $i->post('akses_level'),
            );
            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diperbarui');
            redirect(base_url('admin/user'), 'refresh');
        }
        //End masuk database
    }

    //Delete User
    public function delete($id_pengguna)
    {
        $where = array(
            'id_pengguna' => $id_pengguna
        );

        $this->user_model->delete($where, 'tb_pengguna');
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/user'), 'refresh');
    }
}
