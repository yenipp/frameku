<?php

class Berita extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('berita_model');
        $this->load->model('produk_model');
        //Proteksi halaman
        $this->simple_login->cek_login();
        //load helper random string
        $this->load->helper('string');
    }

    // Data produk
    public function index()
    {
        $berita = $this->berita_model->listing();

        $data = array(
            'title' => 'Data Berita',
            'berita' => $berita,
            'isi' => 'admin/berita/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // public function tambah()
    // {
    //     $gambar_berita         = $_FILES['gambar_berita']['name'];
    //     $this->load->library('upload');
    //     $config['upload_path']  = './assets/upload/image/';
    //     $config['allowed_types']  = 'gif|jpg|png|jpeg';
    //     $config['max_size']  = '2400'; //dalam KB
    //     $config['max_width']  = '2024';
    //     $config['max_height']  = '2024';

    //     $this->load->library('upload', $config);
    //     if (!$this->upload->do_upload('gambar_berita')) {
    //         echo "Gambar gagal diupload";
    //     } else {
    //         $gambar_berita = $this->upload->data('file_name');
    //     }

    //     $data = array(
    //         'id_berita'     => $this->input->post('id_berita'),
    //         'nama_berita'   => $this->input->post('nama_berita'),
    //         'gambar_berita' =>  $gambar_berita,
    //         'status_berita' => $this->input->post('status_berita'),
    //         'tanggal_post'  => date('Y-m-d H:i:s')

    //     );

    //     $this->berita_model->tambah($data);
    //     $this->session->set_flashdata('sukses', 'Data telah ditambah');
    //     redirect(base_url('admin/berita/'), 'refresh');
    // }


    //tambah berita
    public function tambah()
    {
        $gambar_berita         = $_FILES['gambar_berita']['name'];
        $this->load->library('upload');
        $config['upload_path']  = './assets/upload/frame/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = 'br' . date('dmhis');
        $config['max_size']  = '2400'; //dalam KB
        $config['max_width']  = '2024';
        $config['max_height']  = '2024';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar_berita')) {
            echo "Gambar gagal diupload";
        } else {
            $gambar_berita = $this->upload->data('file_name');
        }

        $data = array(
            'id_berita'     => $this->input->post('id_berita'),
            'id_pengguna'   => $this->session->userdata('id_pengguna'),
            'nama_berita'   => $this->input->post('nama_berita'),
            'gambar_berita' =>  $gambar_berita,
            'status_berita' => $this->input->post('status_berita'),
            'tanggal_post'  => date('Y-m-d H:i:s')

        );

        $this->berita_model->tambah_berita($data);
        $this->session->set_flashdata('sukses', 'Data telah ditambah');
        redirect(base_url('admin/berita/'), 'refresh');
    }


    //Delete Berita
    public function delete($id_berita)
    {
        //Proses hapus gambar
        $berita = $this->berita_model->detail($id_berita);
        unlink('./assets/upload/frame/' . $berita->gambar_berita);
        //End proses hapus
        $data = array('id_berita' => $id_berita);
        $this->berita_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/berita'), 'refresh');
    }

    // //Delete User
    // public function delete($id_berita)
    // {
    //     $where = array(
    //         'id_berita' => $id_berita
    //     );

    //     $this->berita_model->delete($where, 'tb_berita');
    //     $this->session->set_flashdata('sukses', 'Data telah dihapus');
    //     redirect(base_url('admin/berita'), 'refresh');
    // }


    // public function tambah1()
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
    //             $i = $this->input;
    //             $data = array(
    //                 'id_frame'     => $i->post('id_frame'),
    //                 'nama_frame'   => $i->post('nama_frame'),
    //                 //disimpan nama file gambar
    //                 'gambar_contoh' => $contoh,
    //                 'gambar_frame' => $upload_gambar['upload_data']['file_name']

    //             );
    //             $this->frame_model->tambah($data);
    //             $this->session->set_flashdata('sukses', 'Data telah ditambah');
    //             redirect(base_url('admin/dasbor'), 'refresh');
    //         }
    //     }

    //     //End masuk database
    //     $frame = $this->frame_model->listing();
    //     $data = array(
    //         'title' => 'Data Frame',
    //         'frame' => $frame,
    //         'isi' => 'admin/frame/tambah'
    //     );
    //     $this->load->view('admin/layout/wrapper', $data, FALSE);
    // }

}
