<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Register extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth/M_auth');
		$this->load->model('auth/M_auditTrail');
	}

	public function index()
	{
		if ($this->session->userdata('status') === 'admin_logged_in') {
			redirect('pages/Home');
		} else {
			$this->load->view('adm_views/auth/register');
		}
		// @codeCoverageIgnoreStart
	}
	// @codeCoverageIgnoreEnd

	public function register()
	{
		if (isset($_POST)) {

			// Variabel untuk encrypt
			$ciphering = "AES-128-CTR";
			$iv_length = openssl_cipher_iv_length($ciphering);
			$options = 0;
			$encryption_iv = "1234567891011121";
			$encryption_key = "ddsdsctelkom";

			$data = array(
				'username' => $this->input->post('username'),
				'password' => openssl_encrypt($this->input->post('password'), $ciphering, $encryption_key, $options, $encryption_iv),
				'email' => $this->input->post('email'),
				'role' => 'user',
				'verified' => false,
				'forget_password' => false,
			);

			if ($this->M_auth->check_username($this->input->post('username')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Username already used</div><br>');
				redirect('pages/Register');
			} else if ($this->M_auth->check_email($this->input->post('email')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Email already used</div><br>');
				redirect('pages/Register');
			} else {
				if ($this->M_auth->add_data_user($data)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Successfully Register</div><br>');
					redirect('pages/Login');
				}
			}
			// @codeCoverageIgnoreStart
		}
	}
	// @codeCoverageIgnoreEnd
}
