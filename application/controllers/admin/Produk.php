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
            'id_gambar',
            'Nomor ID gambar',
            'required|min_length[1]|max_length[11]|is_unique[tb_gambar.id_gambar]',
            array(
                'required' => '%s harus diisi',
                'min_length' => '%s minimal 1 karakter',
                'max_length' => '%s maksimal 11 karakter',
                'is_unique' => '%s sudah ada. Buat ID Produk baru.'
            )
        );

        $valid->set_rules(
            'judul_gambar',
            'Nama Gambar',
            'required',
            array('required' => '%s harus diisi')
        );


        if ($valid->run()) {
            $config['upload_path']  = './assets/upload/image/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
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
                $config['source_image']   = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
                //lokasi folder thumbnail
                $config['new_image']        = './assets/upload/image/thumbs/';
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

    // Tambah produk
    public function tambah()
    {
        //Ambil data kategori
        $kategori = $this->kategori_model->listing();

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'id_produk',
            'Nomor ID Produk',
            'required|min_length[1]|max_length[11]|is_unique[tb_produk.id_produk]',
            array(
                'required' => '%s harus diisi',
                'min_length' => '%s minimal 1 karakter',
                'max_length' => '%s maksimal 11 karakter',
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
            $config['upload_path']  = './assets/upload/image/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2400'; //dalam KB
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar_produk')) {
                //End validasi

                $data = array(
                    'title' => 'Tambah Produk',
                    'kategori' => $kategori,
                    'error'     => $this->upload->display_errors(),
                    'isi' => 'admin/produk/tambah'
                );
                $this->load->view('admin/layout/wrapper', $data, FALSE);
                //Masuk database
            } else {
                $upload_gambar = array('upload_data' => $this->upload->data());

                //create thumbanil gambar
                $config['image_library']    = 'gd2';
                $config['source_image']   = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
                //lokasi folder thumbnail
                $config['new_image']        = './assets/upload/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250; //Pixel
                $config['height']           = 250;
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();

                //end create thumbanil gambar

                $i = $this->input;
                //SLUG PRODUK
                $sub_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);

                $data = array(
                    'id_produk'   => $i->post('id_produk'),
                    'id_pengguna'   => $this->session->userdata('id_pengguna'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'   => $i->post('nama_produk'),
                    'sub_produk'    => $sub_produk,
                    'keterangan'    => $i->post('keterangan'),
                    'keyword'       => $i->post('keyword'),
                    'harga_produk'  => $i->post('harga_produk'),
                    'stok_produk'   => $i->post('stok_produk'),
                    //disimpan nama file gambar
                    'gambar_produk' => $upload_gambar['upload_data']['file_name'],
                    'status_produk' => $i->post('status_produk'),
                    'tanggal_post'  => date('Y-m-d H:i:s')

                );
                $this->produk_model->tambah($data);
                $this->session->set_flashdata('sukses', 'Data telah ditambah');
                redirect(base_url('admin/produk'), 'refresh');
            }
        }
        //End masuk database
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
                'max_length' => '%s maksimal 11 karakter',
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
            //Check jika gambar diganti
            if (!empty($_FILES['gambar_produk']['name'])) {

                $config['upload_path']  = './assets/upload/image/';
                $config['allowed_types']  = 'gif|jpg|png|jpeg';
                $config['max_size']  = '2400'; //dalam KB
                $config['max_width']  = '2024';
                $config['max_height']  = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar_produk')) {

                    //End validasi
                    $data = array(
                        'title' => 'Edit Produk: ' . $produk->nama_produk,
                        'kategori' => $kategori,
                        'produk' => $produk,
                        'error'     => $this->upload->display_errors(),
                        'isi' => 'admin/produk/edit'
                    );
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                    //Masuk database
                } else {
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    //create thumbanil gambar
                    $config['image_library']    = 'gd2';
                    $config['source_library']   = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
                    //lokasi folder thumbnail
                    $config['new_image']        = './assets/upload/image/thumbs/';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 250; //Pixel
                    $config['height']           = 250;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

                    //end create thumbanil gambar

                    $i = $this->input;
                    //SLUG PROFUK
                    $sub_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);

                    $data = array(
                        'id_produk'     => $id_produk,
                        'id_pengguna'   => $this->session->userdata('id_pengguna'),
                        'id_kategori'   => $i->post('id_kategori'),
                        'kode_produk'   => $i->post('kode_produk'),
                        'nama_produk'   => $i->post('nama_produk'),
                        'sub_produk'    => $sub_produk,
                        'keterangan'    => $i->post('keterangan'),
                        'keyword'       => $i->post('keyword'),
                        'harga_produk'  => $i->post('harga_produk'),
                        'stok_produk'   => $i->post('stok_produk'),
                        //disimpan nama file gambar
                        'gambar_produk' => $upload_gambar['upload_data']['file_name'],
                        'status_produk' => $i->post('status_produk')

                    );
                    $this->produk_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data berhasil diedit');
                    redirect(base_url('admin/produk'), 'refresh');
                }
            } else {
                //Edit produk tanpa ganti gambar
                $i = $this->input;
                //SLUG PROFUK
                $sub_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);

                $data = array(
                    'id_produk'     => $id_produk,
                    'id_pengguna'   => $this->session->userdata('id_pengguna'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'   => $i->post('nama_produk'),
                    'sub_produk'    => $sub_produk,
                    'keterangan'    => $i->post('keterangan'),
                    'keyword'       => $i->post('keyword'),
                    'harga_produk'  => $i->post('harga_produk'),
                    'stok_produk'   => $i->post('stok_produk'),
                    //disimpan nama file gambar (gambar tidak diganti)
                    // 'gambar_produk' => $upload_gambar['upload_data']['file_name'],
                    'status_produk' => $i->post('status_produk')

                );
                $this->produk_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit');
                redirect(base_url('admin/produk'), 'refresh');
            }
        }
        //End masuk database
        $data = array(
            'title' => 'Edit Produk: ' . $produk->nama_produk,
            'kategori' => $kategori,
            'produk'    => $produk,
            'isi' => 'admin/produk/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        //End masuk database
    }

    //Delete Produk
    public function delete($id_produk)
    {
        //Proses hapus gambar
        $produk = $this->produk_model->detail($id_produk);
        unlink('./assets/upload/image/' . $produk->gambar_produk);
        unlink('./assets/upload/image/thumbs/' . $produk->gambar_produk);
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
        unlink('./assets/upload/image/' . $gambar->gambar_produk);
        unlink('./assets/upload/image/thumbs/' . $gambar->gambar_produk);
        //End proses hapus
        $data = array('id_gambar' => $id_gambar);
        $this->produk_model->delete_gambar($data);
        $this->session->set_flashdata('sukses', 'Data gambar telah dihapus');
        redirect(base_url('admin/produk/gambar/' . $id_produk), 'refresh');
    }
}
