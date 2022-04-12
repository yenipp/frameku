<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Listing all produk
    // public function listing()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_produk');
    //     $this->db->order_by('id_produk', 'desc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    //Listing all produk
    public function listing()
    {
        $this->db->select('tb_produk.*,
                            tb_pengguna.nama_pengguna,
                            tb_kategori.nama_kategori,
                            tb_kategori.sub_kategori,
                            COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        // JOIN
        $this->db->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_produk.id_pengguna', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        // END JOIN
        $this->db->group_by('tb_produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Listing all produk home
    public function home()
    {
        $this->db->select('tb_produk.*,
                            tb_pengguna.nama_pengguna,
                            tb_kategori.nama_kategori,
                            tb_kategori.sub_kategori,
                            COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        // JOIN
        $this->db->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_produk.id_pengguna', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        // END JOIN
        $this->db->where('tb_produk.status_produk', 'Publish');
        $this->db->group_by('tb_produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit(12);
        $query = $this->db->get();
        return $query->result();
    }

    //Read produk
    public function read($sub_produk)
    {
        $this->db->select('tb_produk.*,
                            tb_pengguna.nama_pengguna,
                            tb_kategori.nama_kategori,
                            tb_kategori.sub_kategori,
                            COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        // JOIN
        $this->db->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_produk.id_pengguna', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        // END JOIN
        $this->db->where('tb_produk.status_produk', 'Publish');
        $this->db->where('tb_produk.sub_produk', $sub_produk);
        $this->db->group_by('tb_produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Produk
    public function produk($limit, $start)
    {
        $this->db->select('tb_produk.*,
                             tb_pengguna.nama_pengguna,
                             tb_kategori.nama_kategori,
                             tb_kategori.sub_kategori,
                             COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        // JOIN
        $this->db->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_produk.id_pengguna', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        // END JOIN
        $this->db->where('tb_produk.status_produk', 'Publish');
        $this->db->group_by('tb_produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    //Total produk
    public function total_produk()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('tb_produk');
        $this->db->where('status_produk', 'Publish');
        $query = $this->db->get();
        return $query->row();
    }


    //Kategori Produk
    public function kategori($id_kategori, $limit, $start)
    {
        $this->db->select('tb_produk.*,
                             tb_pengguna.nama_pengguna,
                             tb_kategori.nama_kategori,
                             tb_kategori.sub_kategori,
                             COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        // JOIN
        $this->db->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_produk.id_pengguna', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        // END JOIN
        $this->db->where('tb_produk.status_produk', 'Publish');
        $this->db->where('tb_produk.id_kategori', $id_kategori);
        $this->db->group_by('tb_produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    //Total kategori produk
    public function total_kategori($id_kategori)
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('tb_produk');
        $this->db->where('status_produk', 'Publish');
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get();
        return $query->row();
    }


    //Listing kategori
    public function listing_kategori()
    {
        $this->db->select('tb_produk.*,
                            tb_pengguna.nama_pengguna,
                            tb_kategori.nama_kategori,
                            tb_kategori.sub_kategori,
                            COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        // JOIN
        $this->db->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_produk.id_pengguna', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        // END JOIN
        $this->db->group_by('tb_produk.id_kategori');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }


    //Detail produk
    public function detail($id_produk)
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Detail gambar produk
    public function detail_gambar($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('tb_gambar');
        $this->db->where('id_gambar', $id_gambar);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Gambar
    public function gambar($id_produk)
    {
        $this->db->select('*');
        $this->db->from('tb_gambar');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('tb_produk', $data);
    }

    // //Auto ID PRODUKK
    // public function buat_kode()
    // {
    //     $this->db->select('RIGHT(tb_produk.id_produk,2) as kode', FALSE);
    //     $this->db->order_by('id_produk', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get('tb_produk');      //cek dulu apakah ada sudah ada kode di tabel.    
    //     if ($query->num_rows() <> 0) {
    //         //jika kode ternyata sudah ada.      
    //         $data = $query->row();
    //         $kode = intval($data->kode) + 1;
    //     } else {
    //         //jika kode belum ada      
    //         $kode = 1;
    //     }
    //     $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);
    //     $kodejadi = "KASIR" . $kodemax;
    //     return $kodejadi;
    // }

    // Tambah gambar
    public function tambah_gambar($data)
    {
        $this->db->insert('tb_gambar', $data);
    }

    //Edit
    public function edit($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('tb_produk', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('tb_produk', $data);
    }

    //Delete gambar produk
    public function delete_gambar($data)
    {
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('tb_gambar', $data);
    }
}
