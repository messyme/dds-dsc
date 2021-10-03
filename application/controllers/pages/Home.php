<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// Home
		$this->load->model('home/M_organizationStructure');
		$this->load->model('home/M_assignmentsMindMapping');
		$this->load->model('home/M_visiMisiProfile');
		// DSC Members
		$this->load->model('dscMembers/M_dscMembersGraph');
		$this->load->model('dscMembers/M_apprenticeGraph');
		$this->load->model('dscMembers/M_memberDsc');
		$this->load->model('dscMembers/M_otherDataMember');
		// Trained Certified
		$this->load->model('trainedCertifiedMember/M_memberSkillsGraph');
        $this->load->model('trainedCertifiedMember/M_certifiedMember');
        $this->load->model('trainedCertifiedMember/M_trainedMember');
		// Assignments
		$this->load->model('assignments/M_assignmentsGraph');
        $this->load->model('assignments/M_otherDataAssignments');
		// Workload
		$this->load->model('workload/M_workloadGraph');
		// courseOnTrending
		$this->load->model('courseOnTrending/M_courseOnTrending');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');	
	}

	// Home Menu
	// Home
	public function index(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		} else {
			$this->M_auditTrail->auditTrailRead('Home', $this->session->userdata['type']);

			$data = [
				'contetDscProfile' => $this->M_visiMisiProfile->getDscProfile(),
				'contentVisiMisi' => $this->M_visiMisiProfile->getVisiMisi(),
				'contentGroupHead' => $this->M_visiMisiProfile->getGroupHead(),
				'judul' => 'Home - INSIGHT',
				'konten' => 'adm_views/home/home',
				'admModal' => [],
				'footerGraph' => []
			];
			$this->load->view('adm_layout/master',$data);
		}
	}

	public function edit_homepage(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		} else {
			$this->M_auditTrail->auditTrailRead('Home', $this->session->userdata['type']);

			$data = [
				'contetDscProfile' => $this->M_visiMisiProfile->getDscProfile(),
				'contentVisiMisi' => $this->M_visiMisiProfile->getVisiMisi(),
				'contentGroupHead' => $this->M_visiMisiProfile->getGroupHead(),
				'judul' => 'Home - INSIGHT',
				'konten' => 'adm_views/home/editHome',
				'admModal' => ['home/adm_modal_visi'],
				'footerGraph' => []
			];
			$this->load->view('adm_layout/master',$data);
		}
	}

	public function updateVision(){
		$vision = $this->input->post('descriptionVision');
		$mision = $this->input->post('descriptionMission');

		if($this->M_visiMisiProfile->editVisi($vision, $mision)){
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Vision and Mission successfully changed</div><br>');
			$this->M_auditTrail->auditTrailUpdate('Vision Mission ', $this->session->userdata['type']);
			redirect('pages/Home/edit_homepage');}
	}

	public function updateGroupHead(){
			$path_parts = pathinfo($_FILES["fotoGroup"]["name"]);
			$image = file_get_contents($_FILES['fotoGroup']['tmp_name']);
			$fileType = $path_parts['extension'];
			$sambutan = $this->input->post('descriptionGroupHead');
			$nameGroup = $this->input->post('nameGroupHead');
			$fotoText = $this->input->post('fotoText');
			// echo $fotoText;
			// die;
			if(count($path_parts) == 2 ) {
				$data = array(
					'sambutan' => $sambutan,
					'name_group' => $nameGroup
				);
			} else {
				$data = array(
					'foto' => $image,
					'file_type' => 'png',
					'sambutan' => $sambutan,
					'name_group' => $nameGroup
				);
			}
			
			if($this->M_visiMisiProfile->editGroupHead($data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Group Head Greeting successfully changed</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Group Head Greeting ', $this->session->userdata['type']);
				redirect('pages/Home/edit_homepage');}
	}

	public function updateDscProfile(){
		$input = $this->input->post('descriptionDscProfile');
		$data = array(
			'deskripsi' => $input
		);
		if($this->M_visiMisiProfile->editDscProfile($data)){
			$this->session->set_flashdata('msg', '<div class="alert alert-success">DSC Profile successfully changed</div><br>');
			$this->M_auditTrail->auditTrailUpdate('DSC Profile ', $this->session->userdata['type']);
			redirect('pages/Home/edit_homepage');
		}
	}
	// end of Home

	// get image struktur organisasi
	public function organization_structure(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		} else {
		$this->M_auditTrail->auditTrailRead('Organization Structure', $this->session->userdata['type']);

		$data = [
			'content' => $this->M_organizationStructure->getStrukturOrganisasi(),
			'judul' => 'Organization Structure - INSIGHT',
			'konten' => 'adm_views/home/strukturOrganisasi',
			'admModal' => ['home/adm_modal_strukturOrganisasi'],
			'footerGraph' => []
		];
		$this->load->view('adm_layout/master',$data);	
		} 
	}

	public function updateFotoStrukturOrganisasi(){
		if(isset($_POST)){
			$path_parts = pathinfo($_FILES["fotoOrganitation"]["name"]);
			$image = file_get_contents($_FILES['fotoOrganitation']['tmp_name']);
			$fileType = $path_parts['extension'];
			$data = array(
				'file' => $image,
				'file_type' => $fileType
			);
			if($this->M_organizationStructure->editStrukturOrganisasi($data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Organization Structure successfully changed</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Organization Structure Picture', $this->session->userdata['type']);
				redirect('pages/Home/organization_structure');}}
	}
	// end get image struktur organisasi

	// Tentang Assignments
	public function assignments_mind_mapping(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Assignments Mind Mapping', $this->session->userdata['type']);

		$data = [
			'content' => $this->M_assignmentsMindMapping->getContentAssignment(),
			'judul' => 'Assignments Mind Mapping - INSIGHT',
			'konten' => 'adm_views/home/assignmentsMindMapping',
			'admModal' => ['home/adm_modal_assigment'],
			'footerGraph' => []
		];

		$this->load->view('adm_layout/master', $data);
	}

	public function updateFotoAboutAssignment(){
		if(isset($_POST)){
			$path_parts = pathinfo($_FILES["fotoAssignment"]["name"]);
			$image = file_get_contents($_FILES['fotoAssignment']['tmp_name']);
			$fileType = $path_parts['extension'];
			$data = array(
				'file' => $image,
				'file_type' => $fileType
			);
			if($this->M_assignmentsMindMapping->editAboutAssignment($data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">About Assignment successfully changed</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Gambar Assignment Mind Mapping', $this->session->userdata['type']);
				redirect('pages/Home/assignments_mind_mapping');}}
	}
	// end of Tentang Assignments

	// Member DSC Summary
	public function member_dsc_summary(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Member DSC Summary', $this->session->userdata['type']);

		$total_emp_prohire = $this->M_dscMembersGraph->get_total_pro_hire();
		$total_emp_probation = $this->M_dscMembersGraph->get_total_probation();
		$total_emp_outsource = $this->M_dscMembersGraph->get_total_outsource();
		$total_emp_mob = $this->M_dscMembersGraph->get_total_member_emp_mob();
		$total_digital_talent = $this->M_dscMembersGraph->get_total_member_digital_talent();
		$total_member_organik = $this->M_dscMembersGraph->get_total_member_organik();
		$total_member = $this->M_dscMembersGraph->get_total_member();

		$data = [
		'total_member_organik' => $total_member_organik,
		'total_emp_prohire'=> $total_emp_prohire,
		'total_emp_probation' => $total_emp_probation,
		'total_emp_outsource' => $total_emp_outsource,
		'total_emp_mob' => $total_emp_mob,
		'total_digital_talent' => $total_digital_talent,
		'total_member' => $total_member,
		'member_status' => $this->M_dscMembersGraph->get_member_graph(),
		'contract_expired' => $this->M_dscMembersGraph->get_contract_expired(),
		'graphAlumni' => $this->M_dscMembersGraph->getGraphMemberAlumni(),
		'graphBand' => $this->M_dscMembersGraph->getGraphBand(),
		'graphPosition' => $this->M_dscMembersGraph->getGraphPosition(),
		'judul' => 'DSC Member Summary - INSIGHT',
		'konten' => 'adm_views/home/monitoringMemberDsc',
		'admModal' => [],
		'footerGraph' => ['dscMemberSummary/memberDscGraph']
		];

		$this->load->view('adm_layout/master', $data);
	}
	// end of Member DSC Summary

	// Apprentice Summary
	public function apprentice_summary(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
		redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Apprentice Summary', $this->session->userdata['type']);
		
		$data = [
			'total_internship' => $this->M_apprenticeGraph->get_total_internship(),
			'contract_expiredApprentice' => $this->M_apprenticeGraph->get_contract_expiredApprentice(),
			'graphAlumniInt' => $this->M_apprenticeGraph->getGraphMemberAlumniInt(),
			'internship_expired' => $this->M_apprenticeGraph->get_internship_expired(),
			'graphApprYear' => $this->M_apprenticeGraph->getGraphApprByYear(),
			'graphApprUniv' => $this->M_apprenticeGraph->getGraphApprByUniversity(),
			'graphApprSpv' => $this->M_apprenticeGraph->getGraphApprBySpv(),
			'judul' => 'Apprentice Summary - INSIGHT',
			'konten' => 'adm_views/home/monitoringApprentice',
			'admModal' => [],
			'footerGraph' => ['apprenticeSummary/apprenticeSummaryGraph']
		];

		$this->load->view('adm_layout/master', $data);
	}
	// end of Apprentice Summary

	// Training Certification Summary
	public function training_certification_summary(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
		redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Training Certification Summary', $this->session->userdata['type']);

		$data = [
			'total_trained_member' => $this->M_memberSkillsGraph->get_total_trained_member(),
			'total_certified_member' => $this->M_memberSkillsGraph->get_total_certified_member(),
			'trained_member_pertahun' => $this->M_memberSkillsGraph->get_trained_JenisperTahun(),
			'certified_member_pertahun' => $this->M_memberSkillsGraph->get_certified_JenisperTahun(),
			'judul' => 'Training - Certification Summary - INSIGHT',
			'konten' => 'adm_views/home/monitoringTrainingCertification',
			'admModal' => [],
			'footerGraph' => ['trainingCertificationSummary/trainingCertificationGraph']
		];

		$this->load->view('adm_layout/master', $data);
	}
	// end of Training Certification Summary

	// Usecase Summary
	public function usecase_summary(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
		redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Usecase Summary', $this->session->userdata['type']);

		$data = [
			'graphGroup' => $this->M_assignmentsGraph->getTotalGroup(),
			'graphGroupApp' => $this->M_assignmentsGraph->getTotalGroupApp(),
			'graphSquad'=> $this->M_assignmentsGraph->getTotalSquad(),
			'graphSquadApp' => $this->M_assignmentsGraph->getTotalSquadApp(),
			'countUsecae' => $this->M_assignmentsGraph->getCountUsecase(),
			'total_mdscinassigments' => $this->M_assignmentsGraph->get_total_mdscinassigments(),
			'total_mdscnotinassigments' => $this->M_assignmentsGraph->get_total_mdscnotinassigments(),
			'total_appinassigments' => $this->M_assignmentsGraph->get_total_appinassigments(),
			'total_appnotinassigments' => $this->M_assignmentsGraph->get_total_appnotinassigments(),
			'total_groups' => $this->M_assignmentsGraph->get_total_groups(),
			'total_tribe' => $this->M_assignmentsGraph->get_total_tribe(),
			'total_squad' => $this->M_assignmentsGraph->get_total_squad(),
			'total_usecase' => $this->M_assignmentsGraph->get_total_usecase(),
			'labe_perusecase' => $this->M_assignmentsGraph->getNameLabelPerusecase(),
			'member_perusecase' => $this->M_assignmentsGraph->get_member_perusecase(),
			'member_perusecaseApp' => $this->M_assignmentsGraph->get_member_perusecaseApp(), 
			'member_pertribe' => $this->M_assignmentsGraph->get_member_pertribe(),
			'member_pertribeApp' => $this->M_assignmentsGraph->get_member_pertribeApp(),
			'inprogressUsecase' => $this->M_assignmentsGraph->progress_usecase_inprogress(),
			'doneUsecase' => $this->M_assignmentsGraph->progress_usecase_done(),
			'cancelUsecase' => $this->M_assignmentsGraph->progress_usecase_cancel(),
			'judul' => 'Use Case Summary - INSIGHT',
			'konten' => 'adm_views/home/monitoringUsecase',
			'admModal' => [],
			'footerGraph' => ['usecaseSummary/usecaseGraph']
		];

		$this->load->view('adm_layout/master', $data);
	}
	// end of Usecase Summary
	
	// Workload Summary
	public function workload_summary(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
		redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Usecase Summary', $this->session->userdata['type']);

		$data = [
			'countUsecase' => $this->M_workloadGraph->getCountUsecase(),
			'countMember' => $this->M_workloadGraph->getCountMember(),
			'graphNodes' => $this->M_workloadGraph->get_nodes(),
			'graphLinks' => $this->M_workloadGraph->get_links(),
			'judul' => 'Workload Summary - INSIGHT',
			'konten' => 'adm_views/home/monitoringWorkload',
			'admModal' => [],
			'footerGraph' => ['workloadSummary/workloadGraph']
		];

		$this->load->view('adm_layout/master', $data);
	}
	// end of Workload Summary

	// Course on Trending
	public function course_on_trending(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
		redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Course on Trending', $this->session->userdata['type']);

		$data = [
			'courseTrend' => $this->M_courseOnTrending->getCourseTrend(),
			'judul' => 'Course on Trending - INSIGHT',
			'konten' => 'adm_views/home/courseOnTrending',
			'admModal' => [],
			'footerGraph' => []
		];

		$this->load->view('adm_layout/master', $data);
	}
	//end of Course on Trending

	// OKR SUMMARY - MONITORING
	public function okr_summary()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('OKR Summary', $this->session->userdata['type']);


		$data = [
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'member_selected' => '',
			'usecase_selected' => '',
			'judul' => 'OKR Summary - INSIGHT',
			'konten' => 'adm_views/home/monitoring_okr_summaryProduct',
			'admModal' => [],
			'footerGraph' => []
		];

		$this->load->view('adm_layout/master', $data);
	}

	//Jenis OKR
	public function okr_summary_product()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('OKR Summary', $this->session->userdata['type']);


		$data = [
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'member_selected' => '',
			'usecase_selected' => '',
			'judul' => 'OKR Summary - INSIGHT',
			'konten' => 'adm_views/home/monitoring_okr_summaryProduct',
			'admModal' => [],
			'footerGraph' => []
		];

		$this->load->view('adm_layout/master', $data);
	}

	public function okr_summary_DSC()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('OKR Summary', $this->session->userdata['type']);


		$data = [
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'member_selected' => '',
			'usecase_selected' => '',
			'judul' => 'OKR Summary - INSIGHT',
			'konten' => 'adm_views/home/monitoring_okr_summaryDSC',
			'admModal' => [],
			'footerGraph' => []
		];

		$this->load->view('adm_layout/master', $data);
	}

	public function okr_summary_member()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('OKR Summary', $this->session->userdata['type']);


		$data = [
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'member_selected' => '',
			'usecase_selected' => '',
			'judul' => 'OKR Summary - INSIGHT',
			'konten' => 'adm_views/home/monitoring_okr_summaryMember',
			'admModal' => [],
			'footerGraph' => []
		];

		$this->load->view('adm_layout/master', $data);
	}
	// END OKR SUMMARY
}

