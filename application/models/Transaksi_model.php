<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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

    //Listing all transaksi berdasarkan header
    public function kode_transaksi($kode_transaksi)
    {
        $this->db->select('tb_transaksi.*,tb_produk.nama_produk, tb_produk.kode_produk');
        $this->db->from('tb_transaksi');
        //join dengan tb_produk
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_transaksi.id_produk', 'left');
        //end join
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
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

    //Detail sub transaksi
    public function read($sub_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('sub_transaksi', $sub_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('tb_transaksi', $data);
    }

    //Detail wishlist
    // public function detail_wishlist()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_wishlist');
    //     // $this->db->where('id_wishlist', $id_wishlist);
    //     $this->db->order_by('id_wishlist', 'desc');
    //     $query = $this->db->get();
    //     return $query->row();
    // }

    // Tambah
    public function tambah_wishlist($data)
    {
        $this->db->insert('tb_wishlist', $data);
    }

    //Edit
    public function edit($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tb_transaksi', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->delete('tb_transaksi', $data);
    }
}
