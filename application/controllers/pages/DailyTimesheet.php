<?php
defined('BASEPATH') || exit('No direct script access allowed');

class DailyTimesheet extends CI_Controller
{

	public function __construct()
	{
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
		$this->load->model('assignments/M_memberInAssignments');
		// courseOnTrending
		$this->load->model('courseOnTrending/M_courseOnTrending');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');
		// Footnote
		$this->load->model('footnote/M_footnote');
	}

	public function index()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		$nik = $this->session->userdata['username'];
		$this->M_auditTrail->auditTrailRead('Leader ', $this->session->userdata['type']);

		$data = array(
			'judul' => 'Daily Timesheet | Leader',
			'konten' => 'adm_views/dailyTimesheet/leader',
			'footerGraph' => []
		);
		$this->load->view('adm_layout/master', $data);
	}

	// public function leader()
	// {
	// 	if ($this->session->userdata('status') !== 'admin_logged_in') {
	// 		redirect('pages/Login');
	// 	}

	// 	$nik = $this->session->userdata['username'];
	// 	$this->M_auditTrail->auditTrailRead('Daily Timesheet Leader ', $this->session->userdata['type']);

	// 	$leader = $this->M_otherDataAssignments->get_leader($nik);
	// 	$leader_default = $this->M_otherDataAssignments->get_leader_default($nik);
	// 	$usecase = $this->M_otherDataAssignments->get_member_detail_usecase_inprogress($nik);
	// 	$usecase_default = $this->M_otherDataAssignments->get_member_detail_usecase_inprogress_default($nik);

	// 	$data = array(
	// 		'leader' => $leader,
	// 		'count_leader' => $leader->num_rows(),
	// 		'leader_default' => $leader_default,
	// 		'leader_usecase' => $this->M_otherDataAssignments->get_leader_usecase($leader_default->id_usecase),
	// 		'member_in_usecase' => $this->M_otherDataAssignments->get_member_in_usecase($leader_default->id_usecase),
	// 		'all_member_usecase' => $this->M_otherDataAssignments->get_all_member_usecase(),
	// 		'all_member_dsc_in_usecase' => $this->M_otherDataAssignments->get_all_member_dsc_in_usecase($leader_default->id_usecase),
	// 		'member_usecase' => $this->M_otherDataAssignments->get_member_usecase($leader_default->id_usecase),
	// 		'member_usecase_nik' => $this->M_otherDataAssignments->get_member_usecase($leader_default->id_usecase, $member_usecase->nik),
	// 		'count_all_usecase_task' => $this->M_otherDataAssignments->count_get_usecase_task_nik($leader_default->id_usecase, $member_usecase->nik),
	// 		'count_sent_usecase_task' => $this->M_otherDataAssignments->get_usecase_task_member_status($leader_default->id_usecase, $member_usecase->nik, 2)->num_rows(),
	// 		'count_approved_usecase_task' => $this->M_otherDataAssignments->get_usecase_task_member_status($leader_default->id_usecase, $member_usecase->nik, 3)->num_rows(),
	// 		'count_rejected_usecase_task' => $this->M_otherDataAssignments->get_usecase_task_member_status($leader_default->id_usecase, $member_usecase->nik, 4)->num_rows(),
	// 		'usecase' => $usecase,
	// 		'usecase_default' => $usecase_default,
	// 		'all_usecase_task' => $this->M_otherDataAssignments->get_all_usecase_task_nik($nik),
	// 		'usecase_task_not_sent' => $this->M_otherDataAssignments->get_usecase_task_nik_not_sent($leader_default->id_usecase, $nik),
	// 		'usecase_task_waiting_for_approval' => $this->M_otherDataAssignments->get_usecase_task_nik_waiting_for_approval($leader_default->id_usecase, $nik),
	// 		'member_dsc' => $this->M_memberDsc->get_all_member(),
	// 		'status' => $this->M_otherDataMember->get_status(),
	// 		'posisi' => $this->M_otherDataMember->get_posisi(),
	// 		'band' => $this->M_otherDataMember->get_band(),
	// 		'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
	// 		'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
	// 		'cluster_ed_selected' => '',
	// 		'ed_bg_selected' => '',
	// 		'number_of_usecase' => $this->M_memberInAssignments->get_number_of_usecase(),
	// 		'member_usecase' => $this->M_memberInAssignments->get_member_in_assignment(),
	// 		'mdscNotInUsecase' => $this->M_memberInAssignments->mdscNotInUsecase(),
	// 		'groups' => $this->M_otherDataAssignments->get_groups(),
	// 		'tribe' => $this->M_otherDataAssignments->get_tribe(),
	// 		'squad' => $this->M_otherDataAssignments->get_squad(),
	// 		'usecase' => $this->M_otherDataAssignments->get_usecase(),
	// 		'footnote' => $this->M_footnote->getFootnoteTable('13'),
	// 		'group_selected' => '',
	// 		'tribe_selected' => '',
	// 		'squad_selected' => '',
	// 		'usecase_selected' => '',
	// 		'usecase_task' => $this->M_otherDataAssignments->get_usecase_task_member($leader_default->id_usecase, $nik),
	// 		'usecase_task_leader' => $this->M_otherDataAssignments->get_usecase_task_leader($leader_default->id_usecase, $nik),
	// 		'judul' => 'Daily Timesheet | Leader',
	// 		'konten' => 'adm_views/dailyTimesheet/leader',
	// 		'admModal' => ['dailyTimesheet/leader'],
	// 		'footerGraph' => [],
	// 		'nik' => $nik
	// 	);
	// 	$this->load->view('adm_layout/master', $data);
	// }

	public function leader_assigned($id_usecase)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		$nik = $this->session->userdata['username'];
		$this->M_auditTrail->auditTrailRead('Daily Timesheet Leader ', $this->session->userdata['type']);

		$leader = $this->M_otherDataAssignments->get_leader($nik);
		$leader_default = $this->M_otherDataAssignments->get_leader_default_assigned($nik, $id_usecase);
		$usecase = $this->M_otherDataAssignments->get_member_detail_usecase_inprogress($nik);
		$usecase_default = $this->M_otherDataAssignments->get_member_detail_usecase_inprogress_default($nik);

		$data = array(
			'leader' => $leader,
			'count_leader' => $leader->num_rows(),
			'leader_default' => $leader_default,
			'leader_usecase' => $this->M_otherDataAssignments->get_leader_usecase($leader_default->id_usecase),
			'member_in_usecase' => $this->M_otherDataAssignments->get_member_in_usecase($leader_default->id_usecase),
			'all_member_usecase' => $this->M_otherDataAssignments->get_all_member_usecase(),
			'all_member_dsc_in_usecase' => $this->M_otherDataAssignments->get_all_member_dsc_in_usecase($leader_default->id_usecase),
			'member_usecase' => $this->M_otherDataAssignments->get_member_usecase($leader_default->id_usecase),
			'member_usecase_nik' => $this->M_otherDataAssignments->get_member_usecase($leader_default->id_usecase, $member_usecase->nik),
			'count_all_usecase_task' => $this->M_otherDataAssignments->count_get_usecase_task_nik($leader_default->id_usecase, $member_usecase->nik),
			'count_sent_usecase_task' => $this->M_otherDataAssignments->get_usecase_task_member_status($leader_default->id_usecase, $member_usecase->nik, 2)->num_rows(),
			'count_approved_usecase_task' => $this->M_otherDataAssignments->get_usecase_task_member_status($leader_default->id_usecase, $member_usecase->nik, 3)->num_rows(),
			'count_rejected_usecase_task' => $this->M_otherDataAssignments->get_usecase_task_member_status($leader_default->id_usecase, $member_usecase->nik, 4)->num_rows(),
			'usecase' => $usecase,
			'usecase_default' => $usecase_default,
			'all_usecase_task' => $this->M_otherDataAssignments->get_all_usecase_task_nik($nik),
			'usecase_task_not_sent' => $this->M_otherDataAssignments->get_usecase_task_nik_not_sent($leader_default->id_usecase, $nik),
			'usecase_task_waiting_for_approval' => $this->M_otherDataAssignments->get_usecase_task_nik_waiting_for_approval($leader_default->id_usecase, $nik),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'status' => $this->M_otherDataMember->get_status(),
			'posisi' => $this->M_otherDataMember->get_posisi(),
			'band' => $this->M_otherDataMember->get_band(),
			'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
			'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
			'cluster_ed_selected' => '',
			'ed_bg_selected' => '',
			'number_of_usecase' => $this->M_memberInAssignments->get_number_of_usecase(),
			// 'member_usecase' => $this->M_memberInAssignments->get_member_in_assignment(),
			'mdscNotInUsecase' => $this->M_memberInAssignments->mdscNotInUsecase(),
			'groups' => $this->M_otherDataAssignments->get_groups(),
			'tribe' => $this->M_otherDataAssignments->get_tribe(),
			'squad' => $this->M_otherDataAssignments->get_squad(),
			// 'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'footnote' => $this->M_footnote->getFootnoteTable('13'),
			'group_selected' => '',
			'tribe_selected' => '',
			'squad_selected' => '',
			'usecase_selected' => '',
			'usecase_task' => $this->M_otherDataAssignments->get_usecase_task_member($leader_default->id_usecase, $nik),
			'usecase_task_leader' => $this->M_otherDataAssignments->get_usecase_task_leader($leader_default->id_usecase, $nik),
			'judul' => 'Daily Timesheet | Leader',
			'konten' => 'adm_views/dailyTimesheet/leader',
			'admModal' => ['dailyTimesheet/leader'],
			'footerGraph' => [],
			'nik' => $nik
		);
		$this->load->view('adm_layout/master', $data);
	}

	// public function member()
	// {
	// 	if ($this->session->userdata('status') !== 'admin_logged_in') {
	// 		redirect('pages/Login');
	// 	}

	// 	$nik = $this->session->userdata['username'];
	// 	$this->M_auditTrail->auditTrailRead('Daily Timesheet Member ', $this->session->userdata['type']);

	// 	$usecase = $this->M_otherDataAssignments->get_member_detail_usecase_inprogress($nik);
	// 	$usecase_default = $this->M_otherDataAssignments->get_member_detail_usecase_inprogress_default($nik);

	// 	$data = array(
	// 		'judul' => 'Daily Timesheet | Member',
	// 		'usecase' => $usecase,
	// 		'usecase_default' => $usecase_default,
	// 		'member_dsc' => $this->M_memberDsc->get_all_member(),
	// 		'usecase_task' => $this->M_otherDataAssignments->get_usecase_task_nik_filter($usecase_default->id_usecase, $nik, date('m'), date('Y')),
	// 		'usecase_task_leader' => $this->M_otherDataAssignments->get_usecase_task_leader($leader_default->id_usecase, $nik),
	// 		'all_member_dsc_in_usecase' => $this->M_otherDataAssignments->get_all_member_dsc_in_usecase($usecase_default->id_usecase),
	// 		'all_usecase_task' => $this->M_otherDataAssignments->get_all_usecase_task_nik($nik),
	// 		'usecase_task_not_sent' => $this->M_otherDataAssignments->get_usecase_task_nik_not_sent($usecase_default->id_usecase, $nik),
	// 		'usecase_task_waiting_for_approval' => $this->M_otherDataAssignments->get_usecase_task_nik_waiting_for_approval($leader_default->id_usecase, $nik),
	// 		'konten' => 'adm_views/dailyTimesheet/member',
	// 		'admModal' => ['dailyTimesheet/member'],
	// 		'footerGraph' => [],
	// 		'nik' => $nik
	// 	);
	// 	$this->load->view('adm_layout/master', $data);
	// }

	public function member_detail($id_usecase)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		$nik = $this->session->userdata['username'];
		$this->M_auditTrail->auditTrailRead('Daily Timesheet Member ', $this->session->userdata['type']);

		$usecase = $this->M_otherDataAssignments->get_member_detail_usecase_inprogress($nik);
		$usecase_default = $this->M_otherDataAssignments->get_member_detail_usecase_inprogress_default_assigned($nik, $id_usecase);
		// $leader_default = $this->M_otherDataAssignments->get_leader_default_assigned($nik, $id_usecase);

		$data = array(
			'judul' => 'Daily Timesheet | Member',
			'usecase' => $usecase,
			'usecase_default' => $usecase_default,
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'all_member_dsc_in_usecase' => $this->M_otherDataAssignments->get_all_member_dsc_in_usecase($usecase_default->id_usecase),
			'usecase_task' => $this->M_otherDataAssignments->get_usecase_task_nik_filter($usecase_default->id_usecase, $nik, date('m'), date('Y')),
			// 'usecase_task_leader' => $this->M_otherDataAssignments->get_usecase_task_leader($leader_default->id_usecase, $nik),
			'all_usecase_task' => $this->M_otherDataAssignments->get_all_usecase_task_nik($nik),
			'usecase_task_not_sent' => $this->M_otherDataAssignments->get_usecase_task_nik_not_sent($usecase_default->id_usecase, $nik),
			// 'usecase_task_waiting_for_approval' => $this->M_otherDataAssignments->get_usecase_task_nik_waiting_for_approval($leader_default->id_usecase, $nik),
			'konten' => 'adm_views/dailyTimesheet/member',
			'admModal' => ['dailyTimesheet/member'],
			'footerGraph' => [],
			'nik' => $nik
		);
		$this->load->view('adm_layout/master', $data);
	}

	public function add_usecase_task()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			

			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'task_name' => $this->input->post('task_name'),
				'task_description' => $this->input->post('task_description'),
				'id_reporter' => $this->input->post('id_reporter'),
				'id_assignee' => $this->input->post('id_assignee'),
				'date' => $this->input->post('date'),
				'start_time' => $this->input->post('start_time'),
				'end_time' => $this->input->post('end_time'),
				'status' => 1,
			);

			if ($this->M_otherDataAssignments->add_usecase_task($data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case Task', $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/member_detail/'.$data['id_usecase']);
			};
		}
	}

	public function add_usecase_task_leader()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {

			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'task_name' => $this->input->post('task_name'),
				'task_description' => $this->input->post('task_description'),
				'id_reporter' => $this->input->post('id_reporter'),
				'id_assignee' => $this->input->post('id_assignee'),
				'date' => $this->input->post('date'),
				'start_time' => $this->input->post('start_time'),
				'end_time' => $this->input->post('end_time'),
				'status' => 2,
			);

			if ($this->M_otherDataAssignments->add_usecase_task($data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case Task', $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/leader_assigned/'.$data['id_usecase']);
			};
		}
	}

	public function send_usecase_task($id_usecase_task)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$data = array(
				'status' => 2
			);

			$id_usecase = $this->M_otherDataAssignments->get_id_usecase($id_usecase_task);

			if ($this->M_otherDataAssignments->edit_usecase_task($id_usecase_task, $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Task successfully sent!</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Task, ID: ' . $id_usecase_task, $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/member_detail/' . $id_usecase);
			};
		}
	}

	public function send_usecase_task_leader($id_usecase_task)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$id_usecase = $this->M_otherDataAssignments->get_id_usecase($id_usecase_task);

			$data = array(
				'status' => 3
			);

			if ($this->M_otherDataAssignments->edit_usecase_task($id_usecase_task, $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Task successfully approved!</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Task, ID: ' . $id_usecase_task, $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/leader_assigned/' . $id_usecase);
			};
		}
	}

	public function send_all_usecase_task()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$id_usecase = $this->input->post('id_usecase_send_all');

			$nik = $this->session->userdata['username'];

			$data = array(
				'status' => 2
			);

			if ($this->M_otherDataAssignments->send_all_usecase_task_member($id_usecase, $nik, $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Task successfully sent!</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Send All Use Case Task', $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/member_detail/' . $id_usecase);
			};
		}
	}

	public function send_all_usecase_task_leader()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$id_usecase = $this->input->post('id_usecase_send_all');

			$nik = $this->session->userdata['username'];

			$data = array(
				'status' => 3
			);

			if ($this->M_otherDataAssignments->send_all_usecase_task_leader($id_usecase, $nik, $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Task successfully approved!</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Send All Use Case Task', $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/leader_assigned/' . $id_usecase);
			};
		}
	}

	public function approve_usecase_task($id_usecase_task, $nik, $id_usecase)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$data = array(
				'status' => 3
			);

			if ($this->M_otherDataAssignments->edit_usecase_task($id_usecase_task, $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Task successfully approved!</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Task, ID: ' . $id_usecase_task, $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/detail_member/' . $nik . '/' . $id_usecase);
			};
		}
	}

	public function approve_all_usecase_task($nik, $id_usecase)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$data = array(
				'status' => 3
			);

			if ($this->M_otherDataAssignments->approve_all_usecase_task($nik, $id_usecase, $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Task successfully approved!</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Task, ID: ' . $id_usecase_task, $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/detail_member/' . $nik . '/' . $id_usecase);
			};
		}
	}

	public function reject_usecase_task($id_usecase_task, $nik, $id_usecase)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$data = array(
				'status' => 4
			);

			if ($this->M_otherDataAssignments->edit_usecase_task($id_usecase_task, $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Use Case Task successfully rejected!</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Task, ID: ' . $id_usecase_task, $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/detail_member/' . $nik . '/' . $id_usecase);
			};
		}
	}

	public function edit_usecase_task()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase_edit'),
				'date' => $this->input->post('date_edit'),
				'start_time' => $this->input->post('start_time_edit'),
				'end_time' => $this->input->post('end_time_edit'),
				'task_name' => $this->input->post('task_name_edit'),
				'task_description' => $this->input->post('task_description_edit'),
				'id_reporter' => $this->input->post('id_reporter_edit'),
				'id_assignee' => $this->input->post('id_assignee_edit'),
				'status' => 1
			);

			if ($this->M_otherDataAssignments->edit_usecase_task($this->input->post('id_usecase_task_edit'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Edited data has been saved!</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Task, ID : ' . $this->input->post('id_usecase_task_edit'), $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/member_detail/'.$data['id_usecase']);
			}
		}
	}

	public function edit_usecase_task_leader()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$data = array(
				'id_usecase_task' => $this->input->post('id_usecase_task_edit'),
				'id_usecase' => $this->input->post('id_usecase_edit'),
				'date' => $this->input->post('date_edit'),
				'start_time' => $this->input->post('start_time_edit'),
				'end_time' => $this->input->post('end_time_edit'),
				'task_name' => $this->input->post('task_name_edit'),
				'task_description' => $this->input->post('task_description_edit'),
				'id_reporter' => $this->input->post('id_reporter_edit'),
				'id_assignee' => $this->input->post('id_assignee_edit'),
				'status' => 2
			);

			if ($this->M_otherDataAssignments->edit_usecase_task($this->input->post('id_usecase_task_edit'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Edited data has been saved!</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Task, ID : ' . $this->input->post('id_usecase_task_edit'), $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/leader_assigned/'.$data['id_usecase']);
			}
		}
	}

	public function delete_usecase_task($id_usecase_task, $id_usecase)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			if ($this->M_otherDataAssignments->delete_usecase_task($id_usecase_task, $id_usecase)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Task successfully deleted!</div><br>');
				$this->M_auditTrail->auditTrailDelete('Use Case Task, ID: ' . $id_usecase_task, $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/member_detail/'.$id_usecase);
			};
		}
	}

	public function delete_member_usecase($nik, $id_usecase)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			if ($this->M_otherDataAssignments->delete_member_usecase($nik, $id_usecase)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Member Use Case has been deleted!</div><br>');
				$this->M_auditTrail->auditTrailDelete('Member Use Case, ID: ' . $nik, $id_usecase, $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/leader_assigned/'.$id_usecase);
			};
		}
	}

	public function delete_usecase_task_leader($id_usecase_task, $id_usecase)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			if ($this->M_otherDataAssignments->delete_usecase_task($id_usecase_task, $id_usecase)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Task successfully deleted!</div><br>');
				$this->M_auditTrail->auditTrailDelete('Use Case Task, ID: ' . $id_usecase_task, $this->session->userdata['type']);
				redirect('pages/DailyTimesheet/leader_assigned/'.$id_usecase);
			};
		}
	}

	public function update_datatable_usecase_task()
	{
		$id_usecase = $this->input->post('id_usecase');

		$nik = $this->input->post('nik');

		$month_year = $this->input->post('month_year');

		$month = substr($month_year, 0, 2);

		$year = substr($month_year, 3, 4);

		$usecase_task = $this->M_otherDataAssignments->get_usecase_task_nik_filter($id_usecase, $nik, $month, $year);

		$i = 1;

		$string1 = '';

		$usecase_task_not_sent = $this->M_otherDataAssignments->get_usecase_task_nik_not_sent($id_usecase, $nik);
		$usecase_task_waiting_for_approval = $this->M_otherDataAssignments->get_usecase_task_nik_waiting_for_approval($leader_default->id_usecase, $nik);

		foreach ($usecase_task->result() as $use_task) {

			$string1 .= "
            <tr>
                <td>$i</td>";

			if ($use_task->start_date == '00:00:00' or $use_task->end_time == '00:00:00') {
				$string1 .= "<td>$use_task->date</td>";
			} else {
				$string1 .= "<td>$use_task->date, <br>" . substr($use_task->start_time, 0, -3) . '-' . substr($use_task->end_time, 0, -3) . "</td>";
			}

			$string1 .= "<td>$use_task->task_name</td>
            <td>$use_task->task_description</td>
            <td>$use_task->reporter</td>
            <td>$use_task->assignee</td>
            <td>$use_task->feedback</td>
            ";

			if ($use_task->status == 1 || $use_task->status == 4) {
				$string1 .= "
                    <td>
                        <div class=\"btn-group-vertical\">
                            <button type=\"button\" class=\"btn btn-sm btn-success mb-1\" data-toggle=\"modal\" data-target=\"#sendUseCaseTask$use_task->id_usecase_task\"><em class=\"fas fa-upload\"></em> Send</button>
                            <button type=\"button\" class=\"btn btn-sm btn-secondary mb-1\" data-toggle=\"modal\" data-target=\"#editUseCaseTask$use_task->id_usecase_task\"><em class=\"fas fa-edit\"></em> Edit</button>
                            <button type=\"button\" class=\"btn btn-sm btn-danger\" data-toggle=\"modal\" data-target=\"#deleteUseCaseTask$use_task->id_usecase_task\"><em class=\"fas fa-trash\"></em> Delete</button>
                        </div>
                    </td>
                    <td>$use_task->nama_status</td>
                </tr>
                ";
			} else {
				$string1 .= "
                    <td>
                        <div class=\"btn-group-vertical\">
                            <button type=\"button\" class=\"btn btn-sm btn-success mb-1\" data-toggle=\"modal\" data-target=\"#sendUseCaseTask$use_task->id_usecase_task\" disabled><em class=\"fas fa-upload\"></em> Send</button>
                            <button type=\"button\" class=\"btn btn-sm btn-secondary mb-1\" data-toggle=\"modal\" data-target=\"#editUseCaseTask$use_task->id_usecase_task\" disabled><em class=\"fas fa-edit\"></em> Edit</button>
                            <button type=\"button\" class=\"btn btn-sm btn-danger\" data-toggle=\"modal\" data-target=\"#deleteUseCaseTask$use_task->id_usecase_task\" disabled><em class=\"fas fa-trash\"></em> Delete</button>
                        </div>
                    </td>
                    <td>$use_task->nama_status</td>
                </tr>
                ";
			}
			$i++;
		}

		if ($usecase_task->num_rows() == 0) {
			$string1 .= "
            <tr>
                <td colspan=\"100\" class=\"text-center\">
                    No data available in table
                </td>
            </tr>
            ";
		}

		$data = [
			'string' => $string1,
			'nama_usecase' => $this->M_otherDataAssignments->get_nama_usecase($id_usecase),
			'id_usecase' => $id_usecase,
			'usecase_task_not_sent' => $usecase_task_not_sent->num_rows(),
			'usecase_task_waiting_for_approval' => $usecase_task_waiting_for_approval->num_rows()
		];

		echo json_encode($data);
	}

	public function update_datatable_member_usecase()
	{
		$id_usecase = $this->input->post('id_usecase');

		$member_usecase = $this->M_otherDataAssignments->get_member_usecase($id_usecase);

		$all_member_dsc_in_usecase = $this->M_otherDataAssignments->get_all_member_dsc_in_usecase($id_usecase);

		$member_dsc = $this->M_memberDsc->get_all_member();

		$leader_usecase = $this->M_otherDataAssignments->get_leader_usecase($id_usecase);

		$string1 = '';

		$string2 = '';

		foreach ($member_usecase->result() as $member_usecase) {

			$count_all_usecase_task = $this->M_otherDataAssignments->count_get_usecase_task_nik($id_usecase, $member_usecase->nik);
			$count_sent_usecase_task = $this->M_otherDataAssignments->get_usecase_task_member_status($id_usecase, $member_usecase->nik, 2)->num_rows();
			$count_approved_usecase_task = $this->M_otherDataAssignments->get_usecase_task_member_status($id_usecase, $member_usecase->nik, 3)->num_rows();
			$count_rejected_usecase_task = $this->M_otherDataAssignments->get_usecase_task_member_status($id_usecase, $member_usecase->nik, 4)->num_rows();

			if ($count_all_usecase_task == $count_approved_usecase_task && $count_all_usecase_task > 0) {
				$status = "Approved";
				$num = 0;
			} elseif ($count_sent_usecase_task > 0 || $count_rejected_usecase_task > 0) {
				$status = "Waiting Approval";
				$num = $count_sent_usecase_task + $count_rejected_usecase_task;
			} else {
				$status = "No Data Available";
				$num = 0;
			}

			$string1 .= "
            <tr>
                <td>$member_usecase->nik</td>
                <td>$member_usecase->nama_member</td>
                <td>$member_usecase->nama_posisi</td>
                <td>$status</td>
                <td>$num</td>
				<td>
					<div class=\"btn-group\">
						<a href=\"detail_member/$member_usecase->nik/$id_usecase\" type=\"button\" class=\"btn btn-sm btn-primary\"><em class=\"fas fa-info\"></em> Detail</a>
						<button type=\"button\" class=\"btn btn-sm btn-danger\" data-toggle=\"modal\" data-target=\"#deleteMember/$member_usecase->nik/$id_usecase\"><em class=\"fas fa-trash\"></em> Delete</button>
					</div>
				</td>
			</tr>
			";
		}

		foreach ($member_dsc->result() as $md) {

			$cek = 0;
			foreach($all_member_dsc_in_usecase->result() as $mb){
				if($md->nik == $mb->nik || $md->nik == $leader_usecase->nik){
					$cek = 1;
				}
			}
			if($cek == 0){
				$string2 .= "<option class=\"text-uppercase\" value=\"$md->nik\">$md->nik - $md->nama_member</option>";
			}

		}

		$data = [
			'string' => $string1,
			'string2' => $string2,
			'nama_usecase' => $this->M_otherDataAssignments->get_nama_usecase($id_usecase),
			'id_usecase' => $id_usecase,
		];

		echo json_encode($data);
	}

	public function update_datatable_detail_member()
	{
		$status = $this->input->post('status');

		$nik = $this->input->post('nik');

		$id_usecase = $this->input->post('id_usecase');

		$month_year = $this->input->post('month_year');

		$month = substr($month_year, 0, 2);

		$year = substr($month_year, 3, 4);

		if ($status == "all") {
			$usecase_task = $this->M_otherDataAssignments->get_usecase_task_nik_filter($id_usecase, $nik, $month, $year);
		} else {
			$usecase_task = $this->M_otherDataAssignments->get_usecase_task_detail_member_filter($id_usecase, $nik, $month, $year, $status);
		}
		$i = 1;

		$string1 = '';

		foreach ($usecase_task->result() as $use_task) {

			$string1 .= "
            <tr>
                    <td>$i</td>
			";

			$string1 .= "<td>$use_task->date, <br>" . substr($use_task->start_time, 0, -3) . '-' . substr($use_task->end_time, 0, -3) . "</td>";

			$string1 .= "
            		<td>$use_task->task_name</td>
                    <td>$use_task->task_description</td>
                    <td>$use_task->reporter</td>
                    <td>$use_task->assignee</td>
            ";

			if ($use_task->status == 3 || $use_task->status == 4) {
				$string1 .= "
					<td>$use_task->feedback</td>
					<td>$use_task->nama_status</td>
                    <td>
						<div class=\"btn-group-vertical\">
							<button type=\"button\" class=\"btn btn-sm btn-success mb-1\" data-toggle=\"modal\" data-target=\"#approveUseCaseTask$use_task->id_usecase_task\" disabled><em class=\"fas fa-upload\"></em> Approve</button>
							<button type=\"button\" class=\"btn btn-sm btn-danger mb-1\" data-toggle=\"modal\" data-target=\"#rejectUseCaseTask$use_task->id_usecase_task\" disabled><em class=\"fas fa-upload\"></em> Reject</button>
						</div>
                    </td>
                </tr>
                ";
			} else {
				$string1 .= "
					<td class=\"feedback\"><input type=\"text\" oninput=\"sendFeedback('$use_task->id_usecase_task')\" id=\"feedback$use_task->id_usecase_task\" placeholder=\"This is feedback\"></td>
                    <td>$use_task->nama_status</td>
                    <td>
						<div class=\"btn-group-vertical\">
							<button type=\"button\" class=\"btn btn-sm btn-success mb-1\" data-toggle=\"modal\" data-target=\"#approveUseCaseTask$use_task->id_usecase_task\"><em class=\"fas fa-upload\"></em> Approve</button>
							<button type=\"button\" class=\"btn btn-sm btn-danger mb-1\" data-toggle=\"modal\" data-target=\"#rejectUseCaseTask$use_task->id_usecase_task\"><em class=\"fas fa-upload\"></em> Reject</button>
						</div>
                    </td>
                </tr>
                ";
			}
			$i++;
		}

		if ($usecase_task->num_rows() == 0) {
			$string1 .= "
            <tr>
                <td colspan=\"100\" class=\"text-center\">
                    No data available in table
                </td>
            </tr>
            ";
		}

		$data = [
			'string' => $string1
		];

		echo json_encode($data);
	}

	public function send_feedback()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$id_usecase_task = $this->input->post('id_usecase_task');

			$data = array(
				'feedback' => $this->input->post('feedback')
			);

			if ($this->M_otherDataAssignments->edit_usecase_task($id_usecase_task, $data)) {
				$this->M_auditTrail->auditTrailUpdate('Use Case Task, ID: ' . $id_usecase_task, $this->session->userdata['type']);
			};
		}
	}

	public function detail_usecase()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		$nik = $this->session->userdata['username'];
		$this->M_auditTrail->auditTrailRead('Leader ', $this->session->userdata['type']);

		$data = array(
			'judul' => 'Daily Timesheet | Member',
			'konten' => 'adm_views/dailyTimesheet/detailAssignedUsecase',
			'admModal' => ['dailyTimesheet/member'],
			'footerGraph' => []
		);
		$this->load->view('adm_layout/master', $data);
	}

	public function detail_member($nik, $id_usecase)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		$this->M_auditTrail->auditTrailRead('Leader ', $this->session->userdata['type']);

		// $usecase_default = $this->M_otherDataAssignments->get_member_detail_usecase_inprogress_default_assigned($nik, $id_usecase);

		$data = array(
			'member_dsc' => $this->M_memberDsc->get_detail_member($nik),
			'usecase_task' => $this->M_otherDataAssignments->get_usecase_task_member($id_usecase, $nik),
			'usecase_task_leader' => $this->M_otherDataAssignments->get_usecase_task_leader($id_usecase, $nik),
			'all_usecase_task' => $this->M_otherDataAssignments->get_all_usecase_task_nik($nik),
			'status_usecase_task' => $this->M_otherDataAssignments->get_all_status_usecase_task(),
			'count_sent_usecase_task' => $this->M_otherDataAssignments->get_usecase_task_member_status($id_usecase, $nik, 2)->num_rows(),
			'nik' => $nik,
			'id_usecase' => $id_usecase,
			// 'usecase_default' => $usecase_default,
			'judul' => 'Daily Timesheet | Detail Member',
			'konten' => 'adm_views/dailyTimesheet/detailMember',
			'admModal' => ['dailyTimesheet/detailMember'],
			'footerGraph' => [],
			'nik' => $nik
		);
		$this->load->view('adm_layout/master', $data);
	}
}
