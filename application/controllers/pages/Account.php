<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// Data Account
		$this->load->model('dataAccount/M_dataAccount');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');
		// Footnote
		$this->load->model('footnote/M_footnote');
        // DSC Members
		$this->load->model('dscMembers/M_memberDsc');
	}

	// Account Data
	// Akun Admin
	public function index(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		$this->M_auditTrail->auditTrailRead('Akun Admin', $this->session->userdata['type']);

		$data = array(
			'admin' => $this->M_dataAccount->get_data_admin(),
			'unverifieduser' => $this->M_dataAccount->get_data_unuser(),
			'requestforgetpassworduser' => $this->M_dataAccount->get_data_reqpassuser(),
            'member' => $this->M_dataAccount->get_data_member(),
			'footnote' => $this->M_footnote->getFootnoteTable('21'),
			'judul' => 'Admin Account - INSIGHT',
			'konten' => 'adm_views/dataAccount/akunAdmin',
			'admModal' => ['dataAccount/adm_modal_dataAdmin'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	// @codeCoverageIgnoreStart
	public function add_data_admin(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			// Variabel untuk encrypt
			$ciphering = "AES-128-CTR";
			$iv_length = openssl_cipher_iv_length($ciphering);
			$options = 0;
			$encryption_iv = "1234567891011121";
			$encryption_key = "ddsdsctelkom";

			$data = array(
				'username' => $this->input->post('username'),
				'password' => openssl_encrypt($this->input->post('password'), $ciphering, $encryption_key, $options, $encryption_iv),
				'role' => $this->input->post('role'),
				'email' => $this->input->post('email'),
				'verified' => true,
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('username'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_dataAccount->check_username_admin($this->input->post('username'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Username Exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Account Admin', $this->session->userdata['type']);
				redirect('pages/Account');
			} else {
				if($this->M_dataAccount->add_data_admin($data)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
					$this->M_auditTrail->auditTrailInsert('Account Admin', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('21', $footnote);
					redirect('pages/Account');}}}}

	public function edit_data_admin(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			if (empty($this->input->post('new_password'))) {
				$data = array(
					'username' => $this->input->post('username'),
					'role' => $this->input->post('role')
				);
			} else {
				// Variabel untuk encrypt
				$ciphering = "AES-128-CTR";
				$iv_length = openssl_cipher_iv_length($ciphering);
				$options = 0;
				$encryption_iv = "1234567891011121";
				$encryption_key = "ddsdsctelkom";
				$data = array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => openssl_encrypt($this->input->post('new_password'), $ciphering, $encryption_key, $options, $encryption_iv),
					'role' => $this->input->post('role')
				);
			}

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('username'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_dataAccount->edit_data_admin($this->input->post('id_admin'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited '.$this->input->post('username').'</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Account Admin, ID : '.$this->input->post('id_admin'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('21', $footnote);
				redirect('pages/Account');}}}

	public function delete_data_admin($id_admin){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			if(empty($id_admin)){
				redirect('pages/Account');
			} else {
				$nama = $this->M_dataAccount->get_username($id_admin);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_dataAccount->del_data_admin($id_admin)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID '.$id_admin.' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Account Admin, ID : '.$id_admin, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('21', $footnote);
					redirect('pages/Account');}}}}
	// @codeCoverageIgnoreEnd
	// end of Akun Admin
	// end of Account Data

	public function verify_user($id_admin){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			if(empty($id_admin)){
				redirect('pages/Account');
			} else {
				if($this->M_dataAccount->verify_data_user($id_admin)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">User with ID '.$id_admin.' successfully verify</div><br>');
					$this->M_auditTrail->auditTrailVerify($id_admin, $this->session->userdata['type']);
					redirect('pages/Account');}}}}

	public function send_password($id_admin){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			if(empty($id_admin)){
				redirect('pages/Account');
			} else {
				if($this->M_dataAccount->sendreqpassword($id_admin)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Success send password to user with ID '.$id_admin.'</div><br>');
					$this->M_auditTrail->auditTrailSendPassword($id_admin, $this->session->userdata['type']);
					redirect('pages/Account');}}}}

    public function member(){
        if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		$this->M_auditTrail->auditTrailRead('Akun Admin', $this->session->userdata['type']);

		$data = array(
			'member' => $this->M_dataAccount->get_data_member(),
            'member_dsc' => $this->M_memberDsc->get_all_member(),
			'footnote' => $this->M_footnote->getFootnoteTable('30'),
            'requesteditmember' => $this->M_memberDsc->get_request_edit_member(),
			'judul' => 'Member Account - INSIGHT',
			'konten' => 'adm_views/dataAccount/akunMember',
			'admModal' => ['dataAccount/adm_modal_dataMember'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
    }

    public function add_data_member(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			// Variabel untuk encrypt
            foreach($this->input->post('multinik[]') as $nik){
                $ciphering = "AES-128-CTR";
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;
                $encryption_iv = "1234567891011121";
                $encryption_key = "ddsdsctelkom";

                $data = array(
                    'username' => $nik,
                    'password' => openssl_encrypt($nik, $ciphering, $encryption_key, $options, $encryption_iv),
                    'role' => 'member',
                    'verified' => 1,
                    'forget_password' => 0
                );

                $footnote = array(
                    'username_admin' => $this->session->userdata['username'],
                    'activity' => 'added',
                    'name' => $this->M_memberDsc->get_nama($nik),
                    'timestamp' => date("Y-m-d H:i:s")
                );

                if($this->M_dataAccount->add_data_admin($data)){
                    $this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
                    $this->M_auditTrail->auditTrailInsert('Account Member', $this->session->userdata['type']);
                    $this->M_footnote->editFootnoteTable('30', $footnote);
                }
            }
            redirect('pages/Account/Member');
        }
    }

    public function delete_data_member($id_admin){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			if(empty($id_admin)){
				redirect('pages/Account/Member');
			} else {
                $nik = $this->M_dataAccount->get_username($id_admin);

				$nama = $this->M_memberDsc->get_nama($nik);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

                $have_account = array(
                    'verify_data' => 0
                );

				if($this->M_dataAccount->del_data_admin($id_admin)){
                    $this->M_memberDsc->edit_have_account_member($nik, $have_account);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID '.$id_admin.' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Account Member, ID : '.$id_admin, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('30', $footnote);
					redirect('pages/Account/Member');}}}}

    public function accept_request_edit($nik){
        if($this->session->userdata('role') == 'user_logged_in'){
            redirect('/Err404');
        };

        if(isset($_POST)){
            $verify_data = array(
                'verify_data' => 0,
            );

            if($this->M_memberDsc->edit_member_dsc($nik, $verify_data)){
                redirect('pages/Account/Member');
            }

        }
    }

}
