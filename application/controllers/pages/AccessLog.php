<?php
defined('BASEPATH') || exit('No direct script access allowed');

class AccessLog extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// Access Log
		$this->load->model('access_log/M_access_log');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');
		$this->load->model('auth/M_auditDurationAdmin');
	}

	// Access Log
	// Access Log Super Admin
	public function index(){
		if($this->session->userdata('role') == 'user_logged_in' or $this->session->userdata('role') == 'admin_logged_in'){
			redirect('/Err404');
		};
		$readDuration_superadmin = $this->M_auditDurationAdmin->readDuration_superadmin();
		$log = $this->M_access_log->getAuditTrailSuperAdmin();
		$this->M_auditTrail->auditTrailRead('Access Log Super Admin', $this->session->userdata['type']);
		$data = [
			'log' => $log,
			'duration' => $readDuration_superadmin,
			'judul' => 'Access Log Guest - INSIGHT',
			'konten' => 'adm_views/access_log/logSuperAdmin',
			'admModal' => [],
			'footerGraph' => []
		];
		$this->load->view('adm_layout/master', $data);
	}
	// End of Access Log Super Admin

	// Access Log Admin
	public function access_log_admin(){
		if($this->session->userdata('role') == 'user_logged_in' or $this->session->userdata('role') == 'admin_logged_in'){
			redirect('/Err404');
		};
		$readDuration_admin = $this->M_auditDurationAdmin->readDuration_admin();
		//var_dump($readDurationAdmin);
		//die;
		//$readDurationAdmin = $this->center_model->readDuration('admin');
		$log = $this->M_access_log->getAuditTrailAdmin();
		$this->M_auditTrail->auditTrailRead('Access Log Admin', $this->session->userdata['type']);
		$data = [
			'log' => $log,
			'duration' => $readDuration_admin,
			'judul' => 'Access Log Admin - INSIGHT',
			'konten' => 'adm_views/access_log/logAdmin',
			'admModal' => [],
			'footerGraph' => []
		];
		$this->load->view('adm_layout/master', $data);
	}
	// end of Access Log Admin

	// Access Log Guest
	public function access_log_guest(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		$readDuration_guest = $this->M_auditDurationAdmin->readDuration_guest();
		$log = $this->M_access_log->getAuditTrailGuest();
		$this->M_auditTrail->auditTrailRead('Access Log Guest', $this->session->userdata['type']);
		$data = [
			'log' => $log,
			'duration' => $readDuration_guest,
			'judul' => 'Access Log Guest - INSIGHT',
			'konten' => 'adm_views/access_log/logGuest',
			'admModal' => [],
			'footerGraph' => []
		];
		$this->load->view('adm_layout/master', $data);
	}
	// @codeCoverageIgnoreEnd
	// end of Access Log Guest

    // Access Log Member
	public function access_log_member(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		$readDuration_member = $this->M_auditDurationAdmin->readDuration_member();
		$log = $this->M_access_log->getAuditTrailMember();
		$this->M_auditTrail->auditTrailRead('Access Log Member', $this->session->userdata['type']);
		$data = [
			'log' => $log,
			'duration' => $readDuration_member,
			'judul' => 'Access Log Member - INSIGHT',
			'konten' => 'adm_views/access_log/logMember',
			'admModal' => [],
			'footerGraph' => []
		];
		$this->load->view('adm_layout/master', $data);
	}
    // end of Access Log Member

	// end of Access Log
}
?>
