<?php

class Frame extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frame_model');
        $this->load->model('produk_model');
        //Proteksi halaman
        $this->simple_login->cek_login();
        //load helper random string
        $this->load->helper('string');
    }

    // Data produk
    public function index()
    {
        $frame = $this->frame_model->listing();

        $data = array(
            'title' => 'Data Frame',
            'frame' => $frame,
            'isi' => 'admin/frame/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // public function tambah1()
    // {
    //     $gambar_contoh         = $_FILES['tambah1']['name'];
    //     $this->load->library('upload');
    //     $config['upload_path']  = './assets/upload/image/';
    //     $config['allowed_types']  = 'gif|jpg|png|jpeg';
    //     $config['max_size']  = '2400'; //dalam KB
    //     $config['max_width']  = '2024';
    //     $config['max_height']  = '2024';

    //     $this->load->library('upload', $config);
    //     if (!$this->upload->do_upload('tambah1')) {
    //         echo "Gambar gagal diupload";
    //     } else {
    //         $gambar_contoh = $this->upload->data('file_name');
    //     }

    //     $data = array(
    //         'id_frame'     => $this->input->post('id_frame'),
    //         'nama_frame'     => $this->input->post('nama_frame'),
    //         'tambah1'           =>  $gambar_contoh

    //     );

    //     $this->frame_model->tambah($data);
    //     $this->session->set_flashdata('sukses', 'Data telah ditambah');
    //     redirect(base_url('admin/frame'), 'refresh');
    // }


    public function tambah1()
    {
        $this->load->library('upload');
        $config['upload_path']  = './assets/upload/image/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['max_size']  = '2400'; //dalam KB
        $config['max_width']  = '2024';
        $config['max_height']  = '2024';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar_contoh')) {
            //End validasi
            //Masuk database
        } else {
            $contoh = $this->upload->data('file_name');
            $this->load->library('upload');
            $config['upload_path']  = './assets/upload/image/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
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
                $i = $this->input;
                $data = array(
                    'id_frame'     => $i->post('id_frame'),
                    'nama_frame'   => $i->post('nama_frame'),
                    //disimpan nama file gambar
                    'gambar_contoh' => $contoh,
                    'gambar_frame' => $upload_gambar['upload_data']['file_name']

                );
                $this->frame_model->tambah($data);
                $this->session->set_flashdata('sukses', 'Data telah ditambah');
                redirect(base_url('admin/dasbor'), 'refresh');
            }
        }

        //End masuk database
        $frame = $this->frame_model->listing();
        $data = array(
            'title' => 'Data Frame',
            'frame' => $frame,
            'isi' => 'admin/frame/tambah'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }




    // public function tambah2()
    // {
    //     $frame = $this->frame_model->listing();
    //     $data = array(
    //         'title' => 'Data Frame',
    //         'frame' => $frame,
    //         'isi' => 'admin/frame/tambah'
    //     );
    //     $this->load->view('admin/layout/wrapper', $data, FALSE);
    // }



    // public function tambah()
    // {
    //     $this->load->library('upload');
    //     $config['upload_path']  = './assets/upload/image/';
    //     $config['allowed_types']  = 'gif|jpg|png|jpeg';
    //     $config['max_size']  = '2400'; //dalam KB
    //     $config['max_width']  = '2024';
    //     $config['max_height']  = '2024';
    //     $this->load->library('upload', $config);
    //     $this->upload->initialize($config);
    //     if (!$this->upload->do_upload('gambar_contoh')) {
    //         $this->session->set_flashdata('gagal', 'gagal aja');
    //         redirect(base_url('admin/frame/tambah'), 'refresh');
    //     } else {
    //         $config['upload_path']  = './assets/upload/image/';
    //         $config['allowed_types']  = 'gif|jpg|png|jpeg';
    //         $config['max_size']  = '2400'; //dalam KB
    //         $config['max_width']  = '2024';
    //         $config['max_height']  = '2024';
    //         $gambar_frame = $this->upload->data();
    //         // $inputFileName = './assets/upload/image/' . $gambar_frame['file_name'];
    //         $this->load->library('upload', $config);
    //         $this->upload->initialize($config);
    //         if (!$this->upload->do_upload('gambar_frame')) {
    //             $this->session->set_flashdata('gagal', 'gagal aja');
    //             redirect(base_url('admin/frame/tambah'), 'refresh');
    //         } else {
    //             $gambar_contoh = $this->upload->data();
    //             // $inputFileName = './assets/upload/image/' . $gambar_contoh['file_name'];

    //             $data = array(
    //                 'id_frame'     => $this->input->post('id_frame'),
    //                 'nama_frame'     => $this->input->post('nama_frame'),
    //                 'gambar_contoh' => $gambar_contoh['file_name'],
    //                 'gambar_frame' => $gambar_contoh['file_frame']
    //             );

    //             $res = $this->frame_model->tambah($data);
    //             if ($res > 0) {
    //                 redirect(base_url('admin/frame'), 'refresh');
    //             }
    //         }
    //         $frame = $this->frame_model->listing();
    //         $data = array(
    //             'title' => 'Data Frame',
    //             'frame' => $frame,
    //             'isi' => 'admin/frame/tambah'
    //         );
    //         $this->load->view('admin/layout/wrapper', $data, FALSE);
    //     }
    // }
}
