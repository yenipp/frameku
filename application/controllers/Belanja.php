<?php

class Belanja extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('konfigurasi_model');
        $this->load->model('pelanggan_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        //load helper random string
        $this->load->helper('string');
    }

    //Halaman wishlist
    public function index()
    {
        $keranjang = $this->cart->contents();
        $data = array(
            'title'    => 'Wishlist',
            'keranjang' => $keranjang,
            'isi'       => 'belanja/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //Sukses belanja
    public function sukses()
    {
        $data = array(
            'title'    => 'Belanja Berhasil',
            'isi'      => 'belanja/sukses'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // //wishlist
    // public function wishlist()
    // {
    //     //cek pelanggan sudah login atau belum
    //     //cek dengan session login dan email

    //     //kondisi sudah login
    //     if ($this->session->userdata('email')) {
    //         $email          = $this->session->userdata('email');
    //         $nama_pelanggan = $this->session->userdata('nama_pelanggan');
    //         $pelanggan      = $this->pelanggan_model->sudah_login($email, $nama_pelanggan);

    //         $keranjang = $this->cart->contents();

    //         //Validasi input
    //         $valid = $this->form_validation;

    //         $valid->set_rules(
    //             'id_pelanggan',
    //             'Nomor ID Pelanggan',
    //             'required|min_length[1]|max_length[4]|is_unique[tb_pelanggan.id_pelanggan]',
    //             array(
    //                 'required' => '%s harus diisi',
    //                 'min_length' => '%s minimal 1 karakter',
    //                 'max_length' => '%s maksimal 11 karakter',
    //                 'is_unique' => '%s sudah ada. Buat ID Pengguna baru.'
    //             )
    //         );
    //         //End validasi
    //         //Ambil data dari form
    //         $id             = $this->input->post('id');
    //         $qty            = $this->input->post('qty');
    //         $price          = $this->input->post('price');
    //         $name           = $this->input->post('name');
    //         $redirect_page  = $this->input->post('redirect_page');
    //         //proses memasukkan ke keranjang belanja
    //         $data = array(
    //             'id'    => $id,
    //             'qty'   => $qty,
    //             'price' => $price,
    //             'name'   => $name
    //         );
    //         // if ($valid->run() === FALSE) {
    //         $this->cart->insert($data);
    //         foreach ($keranjang as $keranjang) {
    //             $data = array(
    //                 'id_pelanggan'      => $pelanggan->id_pelanggan,
    //                 'id_produk'         => $keranjang['id'],
    //                 'nama_produk'       => $keranjang['name'],
    //                 'harga_produk'      => $keranjang['price'],
    //                 'tanggal'           => date('Y-m-d H:i:s')
    //             );
    //         }
    //         $this->transaksi_model->tambah_wishlist($data);
    //         $this->session->set_flashdata('sukses', 'Wishlist berhasil');
    //         redirect($redirect_page, 'refresh');
    //         // }
    //     } else {
    //         //kalau belum maka harus registrasi
    //         $this->session->set_flashdata('sukses', 'Silahkan login atau registrasi terlebih dahulu');
    //         redirect(base_url('registrasi'), 'refresh');
    //     }
    // }

    //Checkout_barang
    public function checkout_barang()
    {
        //Ambil dari login id_pelanggan dari session
        $email          = $this->session->userdata('email');
        $nama_pelanggan = $this->session->userdata('nama_pelanggan');
        $pelanggan      = $this->pelanggan_model->sudah_login($email, $nama_pelanggan);

        $keranjang = $this->cart->contents();

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'id_pelanggan',
            'Nomor ID Pelanggan',
            'required|min_length[1]|max_length[4]|is_unique[tb_pelanggan.id_pelanggan]',
            array(
                'required' => '%s harus diisi',
                'min_length' => '%s minimal 1 karakter',
                'max_length' => '%s maksimal 11 karakter',
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
            'telepon',
            'Nomor telepon',
            'required',
            array('required' => '%s harus diisi')
        );

        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required' => '%s harus diisi',
                'valid_email' => '%s tidak diisi'
            )
        );

        $valid->set_rules(
            'alamat',
            'Alamat',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($valid->run() === TRUE) {
            //End validasi
            $data = array(
                'title'    => 'Checkout',
                'keranjang' => $keranjang,
                'pelanggan' => $pelanggan,
                'isi'       => 'belanja/checkout'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
            //Masuk database
        } else {
            $i = $this->input;
            $data = array(
                'id_pelanggan'      => $pelanggan->id_pelanggan,
                'nama_pelanggan'    => $i->post('nama_pelanggan'),
                'email'             => $i->post('email'),
                'telepon'           => $i->post('telepon'),
                'alamat'            => $i->post('alamat'),
                'kode_transaksi'    => $i->post('kode_transaksi'),
                'tanggal_transaksi' => $i->post('tanggal_transaksi'),
                'jumlah_transaksi'  => $i->post('jumlah_transaksi'),
                'status_bayar'      => 'Belum',
                'tanggal_post'      => date('Y-m-d H:i:s')
            );
            //Proses masuk ke header transaksi
            $this->header_transaksi_model->tambah($data);
            //Proses masuk ke tabel transaksi
            foreach ($keranjang as $keranjang) {
                $sub_total = $keranjang['price'] = $keranjang['qty'];
                $data = array(
                    'id_pelanggan'      => $pelanggan->id_pelanggan,
                    'kode_transaksi'    => $i->post('kode_transaksi'),
                    'id_produk'         => $keranjang['id'],
                    'harga_produk'      => $keranjang['price'],
                    'jumlah'            => $keranjang['qty'],
                    'total_harga'       => $sub_total,
                    'tanggal_transaksi' => $i->post('tanggal_transaksi')
                );
                $this->transaksi_model->tambah($data);
            }
            //End proses masuk ke tabel transaksi
            //Setelah masuk ke ke tabel transaksi maka keranjang dikosongi lagi
            $this->cart->destroy();
            //End pengosongan keranjang
            $this->session->set_flashdata('sukses', 'Checkout berhasil');
            redirect(base_url('belanja/sukses'), 'refresh');
        }
        //End masuk database
    }

    //Tambahkan ke keranjang belanja
    public function add()
    {
        //Ambil data dari form
        $id             = $this->input->post('id');
        $qty            = $this->input->post('qty');
        $price          = $this->input->post('price');
        $name           = $this->input->post('name');
        $redirect_page  = $this->input->post('redirect_page');
        //proses memasukkan ke keranjang belanja
        $data = array(
            'id'    => $id,
            'qty'   => $qty,
            'price'   => $price,
            'name'   => $name
        );
        $this->cart->insert($data);
        //redirect page
        redirect($redirect_page, 'refresh');
    }

    //Update keranjang belanja
    public function update_cart($rowid)
    {
        //Jika ada data rowid
        if ($rowid) {
            $data = array(
                'rowid' => $rowid,
                'qty' => $this->input->post('qty'),
            );
            $this->cart->update($data);
            $this->session->set_flashdata('sukses', 'Data keranjang diupdate');
            redirect(base_url('belanja'), 'refresh');
        } else {
            //Jika tidak ada rowid
            redirect(base_url('belanja'), 'refresh');
        }
    }

    // public function update_cart()
    // {
    //     $i = 1;
    //     foreach ($this->cart->contents() as $items) {
    //         $data = array(
    //             'rowid' => $items['rowid'],
    //             'qty' => $this->input->post($i . '[qty]')
    //         );
    //         $this->cart->update($data);
    //         $i++;
    //     }
    //     redirect(base_url('belanja'));
    // }

    //Hapus keranjang belanja
    public function hapus($rowid = '')
    {
        if ($rowid) {
            //Hapus per item keranjang
            $this->cart->remove($rowid);
            $this->session->set_flashdata('sukses', 'Data keranjang belanja dihapus');
            redirect(base_url('dasbor/belanja'), 'refresh');
        } else {
            //Hapus all keranjang
            $this->cart->destroy();
            $this->session->set_flashdata('sukses', 'Semua data keranjang belanja telah dihapus');
            redirect(base_url('belanja'), 'refresh');
        }
    }

    // public function hapus($rowid)
    // {
    //     $this->cart->remove($rowid);
    //     redirect(base_url('belanja'));
    // }
}
