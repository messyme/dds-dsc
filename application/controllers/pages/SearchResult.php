<?php
defined('BASEPATH') || exit('No direct script access allowed');

class SearchResult extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// Searching
		$this->load->model('searching/M_searching');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');
	}

	// searching
	function index()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('All DSC', $this->session->userdata['type']);
		$keyword = $this->input->get('keyword', TRUE);

		if (empty($keyword)) {
			redirect('pages/Home');
		} else {
			$data = array(
				'member_dsc' => $this->M_searching->searchallmember($keyword),
				'member_apprentice' => $this->M_searching->searchApprentice($keyword),
				'member_Aretired' => $this->M_searching->searchApprenticeRetired($keyword),
				'member_kontrak' => $this->M_searching->searchMemberkontrak($keyword),
				'member_alumni' => $this->M_searching->searchMemberAlumni($keyword),
				'trained_member' => $this->M_searching->searchTrainedMember($keyword),
				'certified_member' => $this->M_searching->searchCertifiedMember($keyword),
				'member_assignments' => $this->M_searching->searchMemberAssignments($keyword),
				'AssignmentApp' => $this->M_searching->searchAssignmentApp($keyword),
				'jirareward' => $this->M_searching->searchJirareward($keyword),
				'jiramonitoring' => $this->M_searching->searchJiramonitoring($keyword),
				'searchgruptribe' => $this->M_searching->searchgruptribe($keyword),
				'searchtribe' => $this->M_searching->searchtribe($keyword),
				'searchusecase' => $this->M_searching->searchusecase($keyword),
				'searchsquad' => $this->M_searching->searchsquad($keyword),
				'keyword' => $this->input->get('keyword', TRUE),
				'judul' => 'Search Result - INSIGHT',
				'konten' => 'adm_views/searching/searchresult',
				'footerGraph' => []
			);
			$this->load->view('adm_layout/master', $data);
		}
	}
}
?>