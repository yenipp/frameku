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


    //Konfigurasi Logo website
    public function logo()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'id_konfigurasi',
            'Nomor ID Konfigurasi',
            'required',
            array(
                'required' => '%s harus diisi',
                'min_length' => '%s minimal 1 karakter',
                'max_length' => '%s maksimal 11 karakter',
                'is_unique' => '%s sudah ada. Buat ID Konfigurasi baru.'
            )
        );

        $valid->set_rules(
            'nama_web',
            'Nama Website',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($valid->run()) {
            //Check jika logo diganti
            if (!empty($_FILES['logo']['name'])) {

                $config['upload_path']       = './assets/upload/image/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['max_size']          = '2400'; //dalam KB
                $config['max_width']         = '2024';
                $config['max_height']        = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('logo')) {

                    //End validasi
                    $data = array(
                        'title'         => 'Konfigurasi Logo Website',
                        'konfigurasi'   => $konfigurasi,
                        'error'         => $this->upload->display_errors(),
                        'isi'           => 'admin/konfigurasi/logo'
                    );
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                    //Masuk database
                } else {
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    //create thumbanil logo
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

                    //end create thumbanil logo

                    $i = $this->input;

                    $data = array(
                        'id_konfigurasi'     => $konfigurasi->id_konfigurasi,
                        'nama_web'           => $i->post('nama_web'),
                        //disimpan nama file logo
                        'logo'               => $upload_gambar['upload_data']['file_name']

                    );
                    $this->konfigurasi_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data berhasil diperbarui');
                    redirect(base_url('admin/konfigurasi/logo'), 'refresh');
                }
            } else {
                //Edit produk tanpa ganti logo
                $i = $this->input;

                $data = array(
                    'id_konfigurasi'     => $konfigurasi->id_konfigurasi,
                    'nama_web'           => $i->post('nama_web'),
                    //disimpan nama file logo
                    //'logo'               => $upload_gambar['upload_data']['file_name']

                );
                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data berhasil diperbarui');
                redirect(base_url('admin/konfigurasi/logo'), 'refresh');
            }
        }
        //End masuk database
        $data = array(
            'title'         => 'Konfigurasi Logo Website',
            'konfigurasi'   => $konfigurasi,
            'isi'           => 'admin/konfigurasi/logo'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    //Konfigurasi Icon website
    public function icon()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'id_konfigurasi',
            'Nomor ID Konfigurasi',
            'required',
            array(
                'required' => '%s harus diisi',
                'min_length' => '%s minimal 1 karakter',
                'max_length' => '%s maksimal 11 karakter',
                'is_unique' => '%s sudah ada. Buat ID Konfigurasi baru.'
            )
        );

        $valid->set_rules(
            'nama_web',
            'Nama Website',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($valid->run()) {
            //Check jika icon diganti
            if (!empty($_FILES['icon']['name'])) {

                $config['upload_path']       = './assets/upload/image/';
                $config['allowed_types']     = 'gif|jpg|png|jpeg';
                $config['max_size']          = '2400'; //dalam KB
                $config['max_width']         = '2024';
                $config['max_height']        = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('icon')) {

                    //End validasi
                    $data = array(
                        'title'         => 'Konfigurasi Icon Website',
                        'konfigurasi'   => $konfigurasi,
                        'error'         => $this->upload->display_errors(),
                        'isi'           => 'admin/konfigurasi/icon'
                    );
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                    //Masuk database
                } else {
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    //create thumbanil icon
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

                    //end create thumbanil icon

                    $i = $this->input;

                    $data = array(
                        'id_konfigurasi'     => $konfigurasi->id_konfigurasi,
                        'nama_web'           => $i->post('nama_web'),
                        //disimpan nama file icon
                        'icon'               => $upload_gambar['upload_data']['file_name']

                    );
                    $this->konfigurasi_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data berhasil diperbarui');
                    redirect(base_url('admin/konfigurasi/icon'), 'refresh');
                }
            } else {
                //Edit produk tanpa ganti icon
                $i = $this->input;

                $data = array(
                    'id_konfigurasi'     => $konfigurasi->id_konfigurasi,
                    'nama_web'           => $i->post('nama_web'),
                    //disimpan nama file icon
                    //'icon'               => $upload_gambar['upload_data']['file_name']

                );
                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data berhasil diperbarui');
                redirect(base_url('admin/konfigurasi/icon'), 'refresh');
            }
        }
        //End masuk database
        $data = array(
            'title'         => 'Konfigurasi Logo Website',
            'konfigurasi'   => $konfigurasi,
            'isi'           => 'admin/konfigurasi/icon'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
