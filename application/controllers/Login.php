<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    // Halaman login
    public function index()
    {
        $data = array('title' => 'Login Admin');
        $this->load->view('login/list', $data, FALSE);
    }
}
