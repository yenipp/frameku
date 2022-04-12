<?php

function kode_produk_otomatis()
{
    $ci = get_instance();
    $query = "SELECT max(id_produk) as maxKode FROM tb_produk";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $noUrut = (int) substr($kode, 2, 5);
    $noUrut++;
    $char = "AI";
    $kodeBaru = $char . sprintf("%05s", $noUrut);
    return $kodeBaru;
}
