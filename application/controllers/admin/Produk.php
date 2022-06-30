<?php

class Produk extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        //Proteksi halaman
        $this->simple_login->cek_login();
        //load helper random string
        $this->load->helper('string');
    }

    // Data produk
    public function index()
    {
        $produk = $this->produk_model->listing();

        $data = array(
            'title' => 'Data Produk',
            'produk' => $produk,
            'isi' => 'admin/produk/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Gambar
    public function gambar($id_produk)
    {
        $produk     = $this->produk_model->detail($id_produk);
        $gambar     = $this->produk_model->gambar($id_produk);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'judul_gambar',
            'Nama Gambar',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($valid->run()) {
            $config['upload_path']  = './assets/upload/frame/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'gb' . date('dmhis');
            $config['max_size']  = '2400'; //dalam KB
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                //End validasi

                $data = array(
                    'title'  => 'Tambah Gambar Produk:' . $produk->nama_produk,
                    'produk' => $produk,
                    'gambar' => $gambar,
                    'error'  => $this->upload->display_errors(),
                    'isi'    => 'admin/produk/gambar'
                );
                $this->load->view('admin/layout/wrapper', $data, FALSE);
                //Masuk database
            } else {
                $upload_gambar = array('upload_data' => $this->upload->data());

                //create thumbanil gambar
                $config['image_library']    = 'gd2';
                $config['source_image']   = './assets/upload/frame/' . $upload_gambar['upload_data']['file_name'];
                //lokasi folder thumbnail
                $config['new_image']        = './assets/upload/frame/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250; //Pixel
                $config['height']           = 250;
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                //end create thumbanil gambar

                $i = $this->input;
                $data = array(
                    'id_produk'     => $id_produk,
                    'id_gambar'     => $i->post('id_gambar'),
                    'judul_gambar'  => $i->post('judul_gambar'),
                    //disimpan nama file gambar
                    'gambar'        => $upload_gambar['upload_data']['file_name'],
                    'tanggal_post'  => date('Y-m-d H:i:s')

                );
                $this->produk_model->tambah_gambar($data);
                $this->session->set_flashdata('sukses', 'Data gambar telah ditambah');
                redirect(base_url('admin/produk/gambar/' . $id_produk), 'refresh');
            }
        }
        //End masuk database
        $data = array(
            'title'     => 'Tambah Gambar Produk: ' . $produk->nama_produk,
            'produk'    => $produk,
            'gambar'    => $gambar,
            'isi'       => 'admin/produk/gambar'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    // //TAMBAH
    // public function tambah()
    // {
    //     // Ambil data kategori
    //     $kategori = $this->kategori_model->listing();
    //     //Validasi input
    //     $valid = $this->form_validation;
    //     $this->load->library('upload');
    //     $config['upload_path']  = './assets/upload/image/';
    //     $config['allowed_types']  = 'gif|jpg|png|jpeg';
    //     $config['max_size']  = '2400'; //dalam KB
    //     $config['max_width']  = '2024';
    //     $config['max_height']  = '2024';
    //     $this->load->library('upload', $config);
    //     $this->upload->initialize($config);

    //     if (!$this->upload->do_upload('gambar_produk')) {
    //         //End validasi
    //         //Masuk database
    //     } else {
    //         $contoh = $this->upload->data('file_name');
    //         $this->load->library('upload');
    //         $config['upload_path']  = './assets/upload/image/';
    //         $config['allowed_types']  = 'gif|jpg|png|jpeg';
    //         $config['max_size']  = '2400'; //dalam KB
    //         $config['max_width']  = '2024';
    //         $config['max_height']  = '2024';
    //         $this->load->library('upload', $config);
    //         $this->upload->initialize($config);
    //         if (!$this->upload->do_upload('gambar_frame')) {
    //             //End validasi
    //             //Masuk database

    //         } else {
    //             $upload_gambar = array('upload_data' => $this->upload->data());
    //             //SLUG PRODUK
    //             $slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);
    //             $i = $this->input;

    //             $data = array(
    //                 'id_produk'   => $i->post('id_produk'),
    //                 'id_pengguna'   => $this->session->userdata('id_pengguna'),
    //                 'id_kategori'   => $i->post('id_kategori'),
    //                 'kode_produk'   => $i->post('kode_produk'),
    //                 'nama_produk'   => $i->post('nama_produk'),
    //                 'slug_produk'    => $slug_produk,
    //                 'keterangan'    => $i->post('keterangan'),
    //                 'harga_produk'  => $i->post('harga_produk'),
    //                 //disimpan nama file gambar
    //                 'gambar_produk' => $contoh,
    //                 'gambar_frame' => $upload_gambar['upload_data']['file_name'],
    //                 'status_produk' => $i->post('status_produk'),
    //                 'tanggal_post'  => date('Y-m-d H:i:s')

    //             );
    //             $this->produk_model->tambah($data);
    //             $this->session->set_flashdata('sukses', 'Data telah ditambah');
    //             redirect(base_url('admin/produk'), 'refresh');
    //         }
    //     }

    //     // End masuk database
    //     $data = array(
    //         'title' => 'Tambah Produk',
    //         'kategori' => $kategori,
    //         'isi' => 'admin/produk/tambah'
    //     );
    //     $this->load->view('admin/layout/wrapper', $data, FALSE);
    // }


    // Tambah produk
    public function tambah()
    {
        //Ambil data kategori
        $kategori = $this->kategori_model->listing();
        //Validasi input
        $this->load->library('upload');
        $config['upload_path']  = './assets/upload/frame/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = 'KC' . date('dmhis');
        $config['max_size']  = '2400'; //dalam KB
        $config['max_width']  = '2024';
        $config['max_height']  = '2024';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar_produk')) {
            //End validasi
            //Masuk database
        } else {
            $contoh = $this->upload->data('file_name');
            $this->load->library('upload');
            $config['upload_path']  = './assets/upload/frame/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = 'FR' . date('dmhis');
            $config['max_size']  = '2400'; //dalam KB
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar_frame')) {
                //End validasi
                //Masuk database

            } else {
                $upload_gambar = array('upload_data' => $this->upload->data());

                //create thumbanil gambar
                $config['image_library']    = 'gd2';
                $config['source_image']   = './assets/upload/frame/' . $upload_gambar['upload_data']['file_name'];
                //lokasi folder thumbnail
                $config['new_image']        = './assets/upload/frame/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250; //Pixel
                $config['height']           = 250;
                $config['thumb_marker']     = '';
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                //end create thumbanil gambar

                //SLUG PRODUK
                $slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);
                $i = $this->input;
                $data = array(
                    'id_produk'   => $i->post('id_produk'),
                    'id_pengguna'   => $this->session->userdata('id_pengguna'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'   => $i->post('nama_produk'),
                    'slug_produk'    => $slug_produk,
                    'keterangan'    => $i->post('keterangan'),
                    'harga_produk'  => $i->post('harga_produk'),
                    //disimpan nama file gambar
                    'gambar_produk' => $contoh,
                    'gambar_frame' => $upload_gambar['upload_data']['file_name'],
                    'status_produk' => $i->post('status_produk'),
                    'tanggal_post'  => date('Y-m-d H:i:s')

                );
                $this->produk_model->tambah($data);
                $this->session->set_flashdata('sukses', 'Data telah ditambah');
                redirect(base_url('admin/produk'), 'refresh');
            }
        }
        //End masuk database
        $kategori = $this->kategori_model->listing();
        $data = array(
            'title' => 'Tambah Produk',
            'kategori' => $kategori,
            'isi' => 'admin/produk/tambah'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    // Edit produk
    public function edit($id_produk)
    {
        //Ambil data produk yang akan diedit
        $produk = $this->produk_model->detail($id_produk);
        //Ambil data kategori
        $kategori   = $this->kategori_model->listing();
        //Validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'id_produk',
            'Nomor ID Produk',
            'required',
            array(
                'required' => '%s harus diisi',
                'min_length' => '%s minimal 1 karakter',
                'max_length' => '%s maksimal 4 karakter',
                'is_unique' => '%s sudah ada. Buat ID Produk baru.'
            )
        );

        $valid->set_rules(
            'nama_produk',
            'Nama produk',
            'required',
            array('required' => '%s harus diisi')
        );

        $valid->set_rules(
            'kode_produk',
            'Kode produk',
            'required',
            array('required' => '%s harus diisi')
        );
        if ($valid->run()) {
            $produk = '';
            $frame = '';
            // print_r($_FILES['gambar_produk']);
            // echo '<br>';
            // exit;
            if (!empty($_FILES['gambar_produk']['name'])) {

                $config['upload_path']  = './assets/upload/frame/';
                $config['allowed_types']  = 'gif|jpg|png|jpeg';
                $config['file_name'] = 'KC' . date('dmhis');
                $config['max_size']  = '2400'; //dalam KB
                $config['max_width']  = '2024';
                $config['max_height']  = '2024';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_produk')) {
                    $produk = $this->upload->data('file_name');
                } else {
                    redirect(base_url('edit/' . $id_produk));
                }
            }
            if (!empty($_FILES['gambar_frame']['name'])) {
                $config['upload_path']  = './assets/upload/frame/';
                $config['allowed_types']  = 'gif|jpg|png|jpeg';
                $config['file_name'] = 'FR' . date('dmhis');
                $config['max_size']  = '2400'; //dalam KB
                $config['max_width']  = '2024';
                $config['max_height']  = '2024';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_frame')) {
                    $frame = $this->upload->data('file_name');
                } else {
                    redirect(base_url('edit/' . $id_produk));
                }
            }

            $i = $this->input;
            //SLUG PRODUK
            $slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);
            if ($produk !== '' && $frame !== '') {
                $data = array(
                    'id_produk'     => $id_produk,
                    'id_pengguna'   => $this->session->userdata('id_pengguna'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'   => $i->post('nama_produk'),
                    'slug_produk'    => $slug_produk,
                    'keterangan'    => $i->post('keterangan'),
                    'harga_produk'  => $i->post('harga_produk'),
                    //disimpan nama file gambar
                    'gambar_produk' => $produk,
                    // 'gambar_produk' => $upload_gambar['upload_data']['file_name'],
                    'gambar_frame' => $frame,
                    'status_produk' => $i->post('status_produk')

                );
            } elseif ($produk == '' && $frame !== '') {
                // $produk = $this->produk_model->get($update['id_produk'])->row();
                // if ($produk->gambar_produk != null) {
                //     $target_file = './assets/upload/image/gambar/' . $produk->gambar_produk;
                //     unlink($target_file);
                // }
                $data = array(
                    'id_produk'     => $id_produk,
                    'id_pengguna'   => $this->session->userdata('id_pengguna'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'   => $i->post('nama_produk'),
                    'slug_produk'    => $slug_produk,
                    'keterangan'    => $i->post('keterangan'),
                    'harga_produk'  => $i->post('harga_produk'),
                    //disimpan nama file gambar
                    'gambar_frame' => $frame,
                    'status_produk' => $i->post('status_produk')

                );
            } elseif ($produk !== '' && $frame == '') {
                // $target_file = './assets/upload/image/gambar/' . $produk->gambar_frame;
                // unlink($target_file);
                $data = array(
                    'id_produk'     => $id_produk,
                    'id_pengguna'   => $this->session->userdata('id_pengguna'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'   => $i->post('nama_produk'),
                    'slug_produk'    => $slug_produk,
                    'keterangan'    => $i->post('keterangan'),
                    'harga_produk'  => $i->post('harga_produk'),
                    //disimpan nama file gambar
                    'gambar_produk' => $produk,
                    'status_produk' => $i->post('status_produk')

                );
            } else {
                $data = array(
                    'id_produk'     => $id_produk,
                    'id_pengguna'   => $this->session->userdata('id_pengguna'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'   => $i->post('nama_produk'),
                    'slug_produk'    => $slug_produk,
                    'keterangan'    => $i->post('keterangan'),
                    'harga_produk'  => $i->post('harga_produk'),
                    //disimpan nama file gambar
                    'status_produk' => $i->post('status_produk')

                );
            }
            // echo print_r($data);
            // exit;
            $this->produk_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit');
            redirect(base_url('admin/produk'), 'refresh');
        }
        //End masuk database
        $data = array(
            'title'     => 'Edit Produk: ' . $produk->nama_produk,
            'kategori'  => $kategori,
            'produk'    => $produk,
            'isi'       => 'admin/produk/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        //End masuk database
    }



    // // Tambah edit
    // public function edit($id_produk)
    // {
    //     //Ambil data produk yang akan diedit
    //     $produk = $this->produk_model->detail($id_produk);
    //     //Ambil data kategori
    //     $kategori   = $this->kategori_model->listing();
    //     //Validasi input
    //     $this->load->library('upload');
    //     $config['upload_path']  = './assets/upload/image/';
    //     $config['allowed_types']  = 'gif|jpg|png|jpeg';
    //     $config['file_name'] = 'KC' . date('dmh');
    //     $config['max_size']  = '2400'; //dalam KB
    //     $config['max_width']  = '2024';
    //     $config['max_height']  = '2024';
    //     $this->load->library('upload', $config);
    //     $this->upload->initialize($config);

    //     if (!$this->upload->do_upload('gambar_produk')) {
    //         //End validasi
    //         //Masuk database
    //     } else {
    //         $contoh = $this->upload->data('file_name');
    //         $this->load->library('upload');
    //         $config['upload_path']  = './assets/upload/image/';
    //         $config['allowed_types']  = 'gif|jpg|png|jpeg';
    //         $config['file_name'] = 'FR' . date('dmh');
    //         $config['max_size']  = '2400'; //dalam KB
    //         $config['max_width']  = '2024';
    //         $config['max_height']  = '2024';
    //         $this->load->library('upload', $config);
    //         $this->upload->initialize($config);
    //         if (!$this->upload->do_upload('gambar_frame')) {
    //             //End validasi
    //             //Masuk database

    //         } else {
    //             $upload_gambar = array('upload_data' => $this->upload->data());
    //             //SLUG PRODUK
    //             $slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);
    //             $i = $this->input;
    //             $data = array(
    //                 'id_produk'   => $i->post('id_produk'),
    //                 'id_pengguna'   => $this->session->userdata('id_pengguna'),
    //                 'id_kategori'   => $i->post('id_kategori'),
    //                 'kode_produk'   => $i->post('kode_produk'),
    //                 'nama_produk'   => $i->post('nama_produk'),
    //                 'slug_produk'    => $slug_produk,
    //                 'keterangan'    => $i->post('keterangan'),
    //                 'harga_produk'  => $i->post('harga_produk'),
    //                 //disimpan nama file gambar
    //                 'gambar_produk' => $contoh,
    //                 'gambar_frame' => $upload_gambar['upload_data']['file_name'],
    //                 'status_produk' => $i->post('status_produk'),
    //                 'tanggal_post'  => date('Y-m-d H:i:s')

    //             );
    //             $this->produk_model->tambah($data);
    //             $this->session->set_flashdata('sukses', 'Data telah ditambah');
    //             redirect(base_url('admin/produk'), 'refresh');
    //         }
    //     }
    //     //End masuk database
    //     $kategori = $this->kategori_model->listing();
    //     $data = array(
    //         'title' => 'Tambah Produk',
    //         'kategori' => $kategori,
    //         'isi' => 'admin/produk/tambah'
    //     );
    //     $this->load->view('admin/layout/wrapper', $data, FALSE);
    // }





    //Delete Produk
    public function delete($id_produk)
    {
        //Proses hapus gambar
        $produk = $this->produk_model->detail($id_produk);
        // unlink($_SERVER['DOCUMENT_ROOT'] . './assets/upload/image/' . $produk['gambar_produk']);
        unlink('./assets/upload/frame/' . $produk->gambar_produk);
        unlink('./assets/upload/frame/' . $produk->gambar_frame);
        //End proses hapus
        $data = array('id_produk' => $id_produk);
        $this->produk_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/produk'), 'refresh');
    }

    //Delete Gambar produk
    public function delete_gambar($id_produk, $id_gambar)
    {
        //Proses hapus gambar
        $gambar = $this->produk_model->detail_gambar($id_gambar);
        unlink('./assets/upload/frame/' . $gambar->gambar);
        //End proses hapus
        $data = array('id_gambar' => $id_gambar);
        $this->produk_model->delete_gambar($data);
        $this->session->set_flashdata('sukses', 'Data gambar telah dihapus');
        redirect(base_url('admin/produk/gambar/' . $id_produk), 'refresh');
    }

    public function detail_produk($id_produk)
    {
        $produk = $this->produk_model->detail($id_produk);
        $data = array(
            'title'     => 'Detail Data Produk',
            'produk'    => $produk,
            'isi'       => 'admin/produk/detail_produk'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
