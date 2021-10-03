<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Auth
		$this->load->model('auth/M_auth');
		$this->load->model('auth/M_auditTrail');
		$this->load->model('auth/M_auditDurationAdmin');

		// Dsc Members
		$this->load->model('dscMembers/M_memberDsc');
	}

	public function index()
	{
		if ($this->session->userdata('status') === 'admin_logged_in') {
			redirect('pages/Home');
		} else {
			$this->load->view('adm_views/auth/login');
		}
	}

	public function login()
	{
		if (isset($_POST)) {
			$credentials = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'status' => 'admin_logged_in',
			);

			if ($this->M_auth->login($credentials)) {
				$memberdsc = $this->M_memberDsc->check_nik_member($this->input->post('username'));
				if ($memberdsc > 0 and ($this->input->post('username') == $this->input->post('password'))) {
					$id_admin = $this->M_auth->get_id_admin($this->input->post('username'));
					$credentialsMember = array(
						// 'username' => $this->M_memberDsc->get_nama($this->input->post('username')),
						'username' => $this->input->post('username'),
						'status' => 'admin_logged_in',
						'id_admin' => $id_admin
					);

					$role = $this->M_auth->get_user($credentials);

					$credentialsMember['role'] = $role . '_logged_in';
					$credentialsMember['type'] = $role;

					if ($memberdsc > 0) {
						$credentialsMember['nama'] = $this->M_memberDsc->get_nama($this->input->post('username'));
					}

					$this->session->set_userdata($credentialsMember);
					$log = array(
						'activity' => 'Successfully logged in',
						'type_activity' => 1,
						'username' => $credentialsMember['username'],
						'type_user' => $this->session->userdata['type'],
						'date_access' => date('Y-m-d H:i:s')
					);

					$startDuration = array(
						'username' => $credentialsMember['username'],
						'type_user' => $this->session->userdata['type'],
						'tanggal'  => date("Y-m-d"),
						'login_time' => date("Y-m-d H:i:s")
					);

					$this->M_auditTrail->auditTrail($log);
					$this->M_auditDurationAdmin->insertDuration_admin($startDuration);

					redirect('pages/ChangePassword');
				} else {
					if ($this->M_auth->get_verified($credentials) == false) {
						$typeuser = $this->M_auth->get_type($credentials);
						$log = array(
							'activity' => 'User not verified',
							'type_activity' => 1,
							'username' => $this->input->post('username'),
							'type_user' => $typeuser,
							'date_access' => date('Y-m-d H:i:s')
						);
						$this->M_auditTrail->auditTrail($log);
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">User not verified</div>');
						redirect('pages/Login');
					} else {
						$role = $this->M_auth->get_user($credentials);
						$reqpass = $this->M_auth->get_forgot_password($credentials);
						if ($reqpass == true) {
							$this->M_auth->cancel_forgot_password($credentials);
						}
						$credentials['role'] = $role . '_logged_in';
						$credentials['type'] = $role;
						if ($memberdsc > 0) {
							$credentials['nama'] = $this->M_memberDsc->get_nama($this->input->post('username'));
						} else {
							$credentials['nama'] = $this->input->post('username');
						}

						$this->session->set_userdata($credentials);

						$log = array(
							'activity' => 'Successfully logged in',
							'type_activity' => 1,
							'username' => $this->session->userdata['username'],
							'type_user' => $this->session->userdata['type'],
							'date_access' => date('Y-m-d H:i:s')
						);

						$startDuration = array(
							'username' => $this->input->post('username'),
							'type_user' => $this->session->userdata['type'],
							'tanggal'  => date("Y-m-d"),
							'login_time' => date("Y-m-d H:i:s")
						);
						// var_dump($this->session->userdata());
						// die;

						$verify_data = $this->M_memberDsc->get_verify_data($this->input->post('username'));

						if ($verify_data == 0 and $memberdsc > 0) {
							redirect('pages/VerifyData');
						}

						$this->M_auditTrail->auditTrail($log);
						$this->M_auditDurationAdmin->insertDuration_admin($startDuration);

						redirect('pages/Home');
					}
				}
			} else {
				$typeuser = $this->M_auth->get_type($credentials);
				$log = array(
					'activity' => 'Login failed',
					'type_activity' => 1,
					'username' => $this->input->post('username'),
					'type_user' => $typeuser,
					'date_access' => date('Y-m-d H:i:s')
				);
				$this->M_auditTrail->auditTrail($log);
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Username or password!</div>');
				$this->session->set_flashdata('forgotpassword');
				redirect('pages/Login');
				// @codeCoverageIgnoreStart
			}
		}
	}
	// @codeCoverageIgnoreEnd

	public function login_nik()
	{
		if (isset($_POST)) {
			$client = new GuzzleHttp\Client();

			$res_get_token = $client->request('POST', 'https://apifactory.telkom.co.id:8243/token', [
				'headers' => [
					'Authorization' => 'Basic Y3QyM3p6Z1NMVVI5M1J6WWREUENyZ0VYU25zYTpTSXNzVVdNdzdOckhhNU9FUWgzNU1VN2NaVkVh',
					'Content-Type' => 'application/x-www-form-urlencoded'
				],
				'form_params' => [
					'grant_type' => 'client_credentials',
					'mode' => 'x-www-form-urlencoded'
				]
			]);

			$body_get_token = $res_get_token->getBody();

			$json_get_token = json_decode($body_get_token);

			$res_login = $client->request('POST', 'https://apifactory.telkom.co.id:8243/auth/1/auth', [
				'headers' => [
					'Content-Type' => 'application/x-www-form-urlencoded',
					'Authorization' => 'Bearer ' . $json_get_token->access_token
				],
				'form_params' => [
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				]
			]);

			$body_login = $res_login->getBody();

			$json_login = json_decode($body_login);

			if ($json_login->login == 1) {
				$credentialsMember = array(
					'username' => $this->input->post('username'),
					'status' => 'admin_logged_in',
				);

				$credentialsMember['role'] = 'member_logged_in';
				$credentialsMember['type'] = 'member';
				$credentialsMember['nama'] = $this->M_memberDsc->get_nama($this->input->post('username'));

				$this->session->set_userdata($credentialsMember);

				$log = array(
					'activity' => 'Successfully logged in',
					'type_activity' => 1,
					'username' => $credentialsMember['username'],
					'type_user' => $this->session->userdata['type'],
					'date_access' => date('Y-m-d H:i:s')
				);

				$startDuration = array(
					'username' => $credentialsMember['username'],
					'type_user' => $this->session->userdata['type'],
					'tanggal'  => date("Y-m-d"),
					'login_time' => date("Y-m-d H:i:s")
				);

				$this->M_auditTrail->auditTrail($log);
				$this->M_auditDurationAdmin->insertDuration_admin($startDuration);

				redirect('pages/VerifyData');
			} else if ($json_login->login == '') {
				$log = array(
					'activity' => 'LDAP error',
					'type_activity' => 1,
					'username' => $this->input->post('username'),
					'type_user' => 'member',
					'date_access' => date('Y-m-d H:i:s')
				);
				$this->M_auditTrail->auditTrail($log);
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">There was an error with LDAP, please reload your page or try again later.</div>');
				redirect('pages/Login');
			} else {
				$log = array(
					'activity' => 'Login failed',
					'type_activity' => 1,
					'username' => $this->input->post('username'),
					'type_user' => 'member',
					'date_access' => date('Y-m-d H:i:s')
				);
				$this->M_auditTrail->auditTrail($log);
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Username or password!</div>');
				redirect('pages/Login');
			}
		}
	}

	public function logout()
	{
		date_default_timezone_set('Asia/Jakarta');
		$log = array(
			'activity' => 'Successfully logged out',
			'type_activity' => 1,
			'username' => $this->session->userdata['username'],
			'type_user' => $this->session->userdata['type'],
			'date_access' => date('Y-m-d H:i:s')
		);
		$this->M_auditTrail->auditTrail($log);

		// var_dump($log);
		// var_dump($this->session->userdata());
		// die;

		$getLastDuration_admin = $this->M_auditDurationAdmin->getLastDuration_admin();
		$diff = strtotime(date('Y-m-d H:i:s')) - strtotime($getLastDuration_admin->login_time);

		$jam   = floor($diff / (60 * 60));
		$selisih = [
			'logout_time' => date('Y-m-d H:i:s'),
			'duration' => $jam . ":" . date('i:s', $diff)
		];
		$this->M_auditDurationAdmin->updateDuration_admin($getLastDuration_admin->nomor, $selisih);

		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('type');
		// var_dump($this->session->userdata());
		// die;
		redirect('/');
		// @codeCoverageIgnoreStart
	}
	// @codeCoverageIgnoreEnd

}
