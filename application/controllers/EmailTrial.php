<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmailTrial extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Halaman Email',
            'isi'   => 'email/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function SendMail()
    {
        if (isset($_POST['submit_email'])) {
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $pesan = $this->input->post('pesan');

            if (!empty($email)) {

                //configuration to email & process
                $config = [
                    'mailtype' => 'text',
                    'charset' => 'iso-8859-1',
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_user' => 'nama_email.gmail',
                    'smtp_pass' => 'xxx',
                    'smtp_port' => 465
                ];

                $this->load->library('email', $config);
                $this->email->initialize($config);
                //end connfig

                $this->email->from('emailfrom');
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($pesan);

                if ($this->email->send()) {
                    echo "Email, Berhasil dikirimkan..";
                } else {
                    show_error($this->email->print_debugger());
                }
            }
        }
    }
}
