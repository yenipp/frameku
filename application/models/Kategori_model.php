<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Listing all kategori
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Detail kategori
    public function detail($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->where('id_kategori', $id_kategori);
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Detail sub kategori
    public function read($sub_kategori)
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->where('sub_kategori', $sub_kategori);
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->row();
    }


    // AUTO MODEL PLISS
    public function get_invoice()
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->order_by('id_kategori', 'desc');
        $this->db->limit(1);
        return $this->db->get();
    }

    // function get_invoice()
    // {
    //     $q = $this->db->query("select max(RIGHT(id_kategori, 4)) AS kd_max from tb_kategori where date(tanggal_diperbarui)=curdate");
    //     $kd = "";
    //     if ($q->num_rows() > 0) {
    //         foreach ($q->result() as $k) {
    //             $tmp = ((int)$k->kd_max) + 1;
    //             $kd = sprintf("%04s", $tmp);
    //         }
    //     } else {
    //         $kd = "0001";
    //     }
    //     date_default_timezone_set('Asia/Jakarta');
    //     return 'INV-' . date('dmy') . $kd;
    // }


    // Tambah
    public function tambah($data)
    {
        $this->db->insert('tb_kategori', $data);
    }

    // // KODE KATEGORI
    // public function cekkodekategori()
    // {
    //     $query = $this->db->query("SELECT MAX(id_kategori) as kodekategori from tb_kategori");
    //     $hasil = $query->row();
    //     return $hasil->kodekategori;
    // }

    //Edit
    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('tb_kategori', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('tb_kategori', $data);
    }
}
