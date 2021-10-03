<?php
defined('BASEPATH') || exit('No direct script access allowed');

class TalentRecommendation extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// rekrutmen
		$this->load->model('rekrutmen/M_recruitment');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');
	}

	// recruitment qualicifation
	public function index(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		}
        
		$this->M_auditTrail->auditTrailRead('Recruitment Qualification', $this->session->userdata['type']);

		$data = [
			'recruitment_qualification' => $this->M_recruitment->get_data_qualification(),
			'recruitment_qualification_2' => $this->M_recruitment->get_data_qualification_2(),
			'judul' => 'Recruitment Qualification - INSIGHT',
			'konten' => 'adm_views/rekrutmen/recruitment',
			'admModal' => [],
			'footerGraph' => []
		];

		$this->load->view('adm_layout/master', $data);
	}
	// end of recruitment qualicifation
}
?>
