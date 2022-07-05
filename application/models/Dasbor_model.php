<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Total produk
    public function total_produk()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('tb_produk');
        $query = $this->db->get();
        return $query->row();
    }

    // Total berita
    public function total_berita()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('tb_berita');
        $query = $this->db->get();
        return $query->row();
    }

    // Total pelanggan
    public function total_pelanggan()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('tb_pelanggan');
        $query = $this->db->get();
        return $query->row();
    }

    // Total pelanggan
    public function total_pengguna()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('tb_pengguna');
        $query = $this->db->get();
        return $query->row();
    }

    //Listing all transaksi
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function listing_wishlist()
    {
        $this->db->select('*');
        $this->db->from('tb_wishlist');
        $this->db->order_by('id_wishlist', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Detail transaksi
    public function detail($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // //Detail wishlist
    // public function detail_wishlist($id_wishlist)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_wishlist');
    //     $this->db->where('id_wishlist', $id_wishlist);
    //     $this->db->order_by('id_wishlist', 'desc');
    //     $query = $this->db->get();
    //     return $query->row();
    // }

    // Tambah
    public function tambah_wishlist($data)
    {
        $this->db->insert('tb_wishlist', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->delete('tb_transaksi', $data);
    }
}
