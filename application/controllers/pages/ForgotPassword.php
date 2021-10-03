<?php
defined('BASEPATH') || exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
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
            $this->load->view('adm_views/auth/forgotPassword');
        }
    }

    public function requestforgotpassword()
    {
        if (isset($_POST)) {
            $credentials = array(
                'email' => $this->input->post('email'),
            );

            if ($this->M_auth->check_email($credentials['email']) == 0) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Email not found!</div><br>');
                redirect('pages/ForgotPassword');
            } else {
                $role = $this->M_auth->get_email($credentials);
                if ($this->M_auth->request_forgot_password($credentials)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success">Success request password!</div><br>');
                    $this->M_auditTrail->auditTrailRequestForgotPassword($credentials, $role);
                    redirect('pages/Login');
                }
            }
        };
    }
}
