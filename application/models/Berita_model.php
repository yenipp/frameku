<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all produk
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('tb_berita');
        // $this->db->order_by('id_berita', 'desc');
        $this->db->order_by('tanggal_post', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    //Detail produk
    public function detail($id_berita)
    {
        $this->db->select('*');
        $this->db->from('tb_berita');
        $this->db->where('id_berita', $id_berita);
        $this->db->order_by('id_berita', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('tb_berita', $data);
    }

    // Berita
    public function tambah_berita($data)
    {
        $this->db->insert('tb_berita', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_berita', $data['id_berita']);
        $this->db->delete('tb_berita', $data);
    }
}
