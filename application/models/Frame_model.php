<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frame_model extends CI_Model
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
        $this->db->from('tb_frame');
        $this->db->order_by('id_frame', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('tb_frame', $data);
    }
}
