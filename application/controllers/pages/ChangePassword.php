<?php
defined('BASEPATH') || exit('No direct script access allowed');

class ChangePassword extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load Model Auth
        $this->load->model('auth/M_auth');
        $this->load->model('auth/M_auditTrail');

        // Member Dsc
        $this->load->model('dscMembers/M_memberDsc');

        // Data Account
        $this->load->model('dataAccount/M_dataAccount');
    }

    public function index()
    {
        $this->load->view('adm_views/auth/changePassword');
    }

    public function request_change_password()
    {
        if (isset($_POST)) {
            // Variabel untuk encrypt
            $ciphering = "AES-128-CTR";
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;
            $encryption_iv = "1234567891011121";
            $encryption_key = "ddsdsctelkom";

            $data = array(
                'email' => $this->input->post('email'),
                'password' => openssl_encrypt($this->input->post('password'), $ciphering, $encryption_key, $options, $encryption_iv),
            );

            if ($this->M_auth->check_email($this->input->post('email')) > 0) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Email already exist!</div><br>');
                redirect('pages/ChangePassword');
            } else if ($this->M_dataAccount->edit_data_admin($this->session->userdata['id_admin'], $data)) {
                redirect('pages/VerifyData');
            }
        }
    }
}
