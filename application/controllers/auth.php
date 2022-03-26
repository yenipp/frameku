<?php

class Auth extends CI_Controller {

	public function login()
	{
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form_login')
		}
	}
}