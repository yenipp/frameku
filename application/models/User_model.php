<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Listing all user
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('tb_pengguna');
        $this->db->order_by('id_pengguna', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Detail user
    public function detail($id_pengguna)
    {
        $this->db->select('*');
        $this->db->from('tb_pengguna');
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->order_by('id_pengguna', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('tb_pengguna', $data);
    }

    //Edit
    public function edit($data)
    {
        $this->db->where('id_pengguna', $data['id_pengguna']);
        $this->db->update('tb_pengguna', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_pengguna', $data['id_pengguna']);
        $this->db->delete('tb_pengguna', $data);
    }
}
