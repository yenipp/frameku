<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Listing all header_transaksi
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('tb_header_transaksi');
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Listing all header_transaksi
    public function pelanggan($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('tb_header_transaksi');
        $this->db->where('tb_header_transaksi.id_pelanggan', $id_pelanggan);
        // JOIN
        $this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 'left');
        //END JOIN
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //HARUSE SG BENER YA YENN
    // public function pelanggan($id_pelanggan)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_header_transaksi.*, SUM(tb_transaksi.jumlah) AS total_item');
    //     $this->db->where('tb_header_transaksi.id_pelanggan', $id_pelanggan);
    //     //JOIN
    //     $this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 'left');
    //     //END
    //     $this->db->group_by('tb_header_transaksi.id_header_transaksi');
    //     $this->db->order_by('id_header_transaksi', 'desc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }


    //Detail header_transaksi
    public function kode_transaksi($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tb_header_transaksi');
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Detail header_transaksi
    public function detail($id_header_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tb_header_transaksi');
        $this->db->where('id_header_transaksi', $id_header_transaksi);
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // //Header_transaksi sudah login
    // public function sudah_login($email, $nama_header_transaksi)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_header_transaksi');
    //     $this->db->where('email', $email);
    //     $this->db->where('nama_header_transaksi', $nama_header_transaksi);
    //     $this->db->order_by('id_header_transaksi', 'desc');
    //     $query = $this->db->get();
    //     return $query->row();
    // }

    // //Login header_transaksi
    // public function login($email, $password)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_header_transaksi');
    //     $this->db->where(array(
    //         'email'    => $email,
    //         'password' => SHA1($password)
    //     ));
    //     $this->db->order_by('id_header_transaksi', 'desc');
    //     $query = $this->db->get();
    //     return $query->row();
    // }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('tb_header_transaksi', $data);
    }

    //Edit
    public function edit($data)
    {
        $this->db->where('id_header_transaksi', $data['id_header_transaksi']);
        $this->db->update('tb_header_transaksi', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_header_transaksi', $data['id_header_transaksi']);
        $this->db->delete('tb_header_transaksi', $data);
    }
}
