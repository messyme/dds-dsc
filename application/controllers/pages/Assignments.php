<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Assignments extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// DSC Members
		$this->load->model('dscMembers/M_memberDsc');
		$this->load->model('dscMembers/M_apprentice');
		// Assignments
		$this->load->model('assignments/M_memberInAssignments');
		$this->load->model('assignments/M_appInAssignments');
		$this->load->model('assignments/M_otherDataAssignments');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');
		// Footnote
		$this->load->model('footnote/M_footnote');
	}

	// Assignments Menu
	// Member in Assignment
	public function index()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Members in Assignments', $this->session->userdata['type']);
		$data = array(
			'number_of_usecase' => $this->M_memberInAssignments->get_number_of_usecase(),
			'member_usecase' => $this->M_memberInAssignments->get_member_in_assignment(),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'mdscNotInUsecase' => $this->M_memberInAssignments->mdscNotInUsecase(),
			'usecase_leader_list' => $this->M_memberInAssignments->get_usecase_leader_list(),
			'usecase_member_list' => $this->M_memberInAssignments->get_usecase_member_list(),
			'groups' => $this->M_otherDataAssignments->get_groups(),
			'tribe' => $this->M_otherDataAssignments->get_tribe(),
			'squad' => $this->M_otherDataAssignments->get_squad(),
			'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'footnote' => $this->M_footnote->getFootnoteTable('13'),
			'group_selected' => '',
			'tribe_selected' => '',
			'squad_selected' => '',
			'usecase_selected' => '',
			'judul' => 'Members in Assignments - INSIGHT',
			'konten' => 'adm_views/assignments/memberInAssignments',
			'admModal' => ['assignments/adm_modal_memberAssignments'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	// @codeCoverageIgnoreStart
	public function add_data_memberusecase()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			foreach ($this->input->post('multinik[]') as $nik) {
				$data = array(
					//'id_member_usecase' => $this->input->post('id_member_usecase'),
					'nik' => $nik,
					'status_member' => $this->input->post('status_member'),
					'usecase_leader' => $this->input->post('usecase_leader'),
					'id_groups' => $this->input->post('id_groups'),
					'id_tribe' => $this->input->post('id_tribe'),
					'id_squad' => $this->input->post('id_squad'),
					'id_usecase' => $this->input->post('id_usecase')
				);

				$nama = $this->M_memberInAssignments->get_nama($nik);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'added',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				$this->M_footnote->editFootnoteTable('13', $footnote);

				if ($this->M_memberInAssignments->add_memberusecase($data)) {
					if ($this->input->post('code') === 'private') {
						$this->M_auditTrail->auditTrailInsert('Members in Assignments', $this->session->userdata['type']);
					}
					$this->M_memberInAssignments->update_occupancy_rate_usecase($data['id_usecase']);
					$this->M_memberInAssignments->update_occupancy_status_usecase($data['id_usecase']);
					$this->M_memberInAssignments->update_occupancy_rate_member($data['nik']);
					$this->M_memberInAssignments->update_occupancy_status_member($data['nik']);
				}
			}
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
			redirect('pages/Assignments');
		}
	}

	public function getMemberAssignmentEdit($id)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Edit Member in Assignments, ID : ' . $id, $this->session->userdata['type']);
		// var_dump($this->M_memberInAssignments->get_member_in_assignmentEdit($id));
		$data = array(
			'member_select' => $this->M_memberInAssignments->get_member_in_assignmentEdit($id),
			'member_usecase' => $this->M_memberInAssignments->get_member_in_assignment(),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'groups' => $this->M_otherDataAssignments->get_groups(),
			'tribe' => $this->M_otherDataAssignments->get_tribe(),
			'squad' => $this->M_otherDataAssignments->get_squad(),
			'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'judul' => 'Edit Members in Assignments - INSIGHT',
			'konten' => 'adm_views/assignments/editMemberAssignment',
			'admModal' => [],
			'footerGraph' => []
		);
		$this->load->view('adm_layout/master', $data);
	}

	public function memberAssignmentEditData()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		$data = array(
			'nik' => $this->input->post('nikEdit'),
			'status_member' => $this->input->post('status_memberEdit'),
			'usecase_leader' => $this->input->post('usecase_leader'),
			'id_groups' => $this->input->post('id_groupsEdit'),
			'id_tribe' => $this->input->post('id_tribeEdit'),
			'id_squad' => $this->input->post('id_squadEdit'),
			'id_usecase' => $this->input->post('id_usecaseEdit')
		);

		$nama = $this->M_memberInAssignments->get_nama($this->input->post('nikEdit'));

		$footnote = array(
			'username_admin' => $this->session->userdata['username'],
			'activity' => 'edited',
			'name' => $nama,
			'timestamp' => date("Y-m-d H:i:s")
		);

		$id = $this->input->post('id_member_usecase');

		if ($this->M_memberInAssignments->edit_memberusecase($id, $data)) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited</div><br>');
			$this->M_auditTrail->auditTrailUpdate('Member in Assignments, id: ' . $id, $this->session->userdata['type']);
			$this->M_footnote->editFootnoteTable('13', $footnote);
			redirect('pages/Assignments');
		}
	}

	public function delete_data_memberusecase($id_member_usecase)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_member_usecase)) {
				redirect('pages/Assignments');
			} else {
				$nik = $this->M_memberInAssignments->get_nik($id_member_usecase);
				$id_usecase = $this->M_memberInAssignments->get_id_usecase($id_member_usecase);
				$nama = $this->M_memberInAssignments->get_nama($nik);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_memberInAssignments->delete_memberusecase($id_member_usecase)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID ' . $id_member_usecase . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Members in Assignments, ID : ' . $id_member_usecase, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('13', $footnote);

					$this->M_memberInAssignments->update_occupancy_rate_member($nik);
					$this->M_memberInAssignments->update_occupancy_status_member($nik);

					$this->M_memberInAssignments->update_occupancy_rate_usecase($id_usecase);
					$this->M_memberInAssignments->update_occupancy_status_usecase($id_usecase);
					redirect('pages/Assignments');
				}
			}
		}
	}
	// @codeCoverageIgnoreEnd
	// end of Member in Assignment

	// Member in Assignment Apprentice
	public function apprentice_in_assignment()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Apprentice in Assignments', $this->session->userdata['type']);

		$data = array(
			'number_of_usecases_app' => $this->M_appInAssignments->get_number_of_usecases_app(),
			'member_usecase' => $this->M_appInAssignments->get_member_in_assignmentApp(),
			'member_dsc_internship' => $this->M_apprentice->get_member_internship(0),
			'appNotInUsecase' => $this->M_appInAssignments->appNotInUsecase(),
			'groups' => $this->M_otherDataAssignments->get_groups(),
			'tribe' => $this->M_otherDataAssignments->get_tribe(),
			'squad' => $this->M_otherDataAssignments->get_squad(),
			'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'footnote' => $this->M_footnote->getFootnoteTable('14'),
			'group_selected' => '',
			'tribe_selected' => '',
			'squad_selected' => '',
			'usecase_selected' => '',
			'judul' => 'Apprentice in Assignments - INSIGHT',
			'konten' => 'adm_views/assignments/apprenticeInAssignments',
			'admModal' => ['assignments/adm_modal_memberAssignmentsApp'],
			'footerGraph' => []
		);

		// var_dump($this->M_apprentice->get_member_internship($this->session->userdata['type'])->result());
		// die;

		$this->load->view('adm_layout/master', $data);
	}

	public function member_in_assignmentAppEdit($id)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Edit Apprentice in Assignments, ID : ' . $id, $this->session->userdata['type']);
		$data = array(
			'member_select' => $this->M_appInAssignments->get_member_in_assignmentAppEdit($id),
			'member_usecase' => $this->M_appInAssignments->get_member_in_assignmentApp(),
			'member_dsc_internship' => $this->M_apprentice->get_member_internship(0),
			'groups' => $this->M_otherDataAssignments->get_groups(),
			'tribe' => $this->M_otherDataAssignments->get_tribe(),
			'squad' => $this->M_otherDataAssignments->get_squad(),
			'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'judul' => 'Edit Apprentice in Assignments - INSIGHT',
			'konten' => 'adm_views/assignments/editMemberAssignmentApp',
			'admModal' => [],
			'footerGraph' => []
		);

		// var_dump($this->center_model->get_member_in_assignmentAppEdit($id));
		// die;

		$this->load->view('adm_layout/master', $data);
	}

	public function add_data_memberusecaseApp()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			foreach ($this->input->post('multinim[]') as $nim) {
				$data = array(
					'nim' => $nim,
					'status_member' => $this->input->post('status_member'),
					'id_groups' => $this->input->post('id_groups'),
					'id_tribe' => $this->input->post('id_tribe'),
					'id_squad' => $this->input->post('id_squad'),
					'id_usecase' => $this->input->post('id_usecase')
				);

				$nama = $this->M_appInAssignments->get_nama($nim);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'added',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				$this->M_footnote->editFootnoteTable('14', $footnote);

				if ($this->M_appInAssignments->add_memberusecaseApp($data)) {
					if ($this->input->post('code') === 'private') {
						$this->M_auditTrail->auditTrailInsert('Apprentice in Assignments', $this->session->userdata['type']);
					}
				}
			}
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
			redirect('pages/Assignments/apprentice_in_assignment');
		}
	}

	public function memberAssignmentAppEditData()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		$data = array(
			'nim' => $this->input->post('nim'),
			'status_member' => $this->input->post('status_member'),
			'id_groups' => $this->input->post('id_groups'),
			'id_tribe' => $this->input->post('id_tribe'),
			'id_squad' => $this->input->post('id_squad'),
			'id_usecase' => $this->input->post('id_usecase')
		);

		$nama = $this->M_appInAssignments->get_nama($this->input->post('nim'));

		$footnote = array(
			'username_admin' => $this->session->userdata['username'],
			'activity' => 'edited',
			'name' => $nama,
			'timestamp' => date("Y-m-d H:i:s")
		);

		$id = $this->input->post('id_member_usecase');

		if ($this->M_appInAssignments->edit_memberusecaseApp($id, $data)) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited</div><br>');
			$this->M_auditTrail->auditTrailUpdate('Apprentice in Assignments, ID : ' . $this->input->post('id_member_usecase'), $this->session->userdata['type']);
			$this->M_footnote->editFootnoteTable('14', $footnote);
			redirect('pages/Assignments/apprentice_in_assignment');
		}
	}

	public function delete_data_memberusecaseApp($id_member_usecase)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('pages/Assignments/apprentice_in_assignment');
		};
		if (isset($_POST)) {
			if (empty($id_member_usecase)) {
				redirect('pages/Assignments/apprentice_in_assignment');
			} else {
				$nim = $this->M_appInAssignments->get_nim($id_member_usecase);

				$nama = $this->M_appInAssignments->get_nama($nim);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_appInAssignments->delete_memberusecaseApp($id_member_usecase)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID ' . $id_member_usecase . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Apprentice in Assignments, ID : ' . $id_member_usecase, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('14', $footnote);
					redirect('pages/Assignments/apprentice_in_assignment');
				}
			}
		}
	}
	// end of Member in Assignment Apprentice

	// Groups
	public function group_list()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		$this->M_auditTrail->auditTrailRead('Group List', $this->session->userdata['type']);

		$data = array(
			'groups' => $this->M_otherDataAssignments->get_groups(),
			'footnote' => $this->M_footnote->getFootnoteTable('15'),
			'judul' => 'Group of Tribe - INSIGHT',
			'konten' => 'adm_views/assignments/groupList',
			'admModal' => ['assignments/adm_modal_group'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	// @codeCoverageIgnoreStart
	public function add_data_group()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_groups' => $this->input->post('id_groups'),
				'nama_groups' => $this->input->post('nama_groups')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_groups'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->check_nama_group($this->input->post('nama_groups')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data already exist!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Group', $this->session->userdata['type']);
				redirect('pages/Assignments/group_list');
			} else {
				if ($this->M_otherDataAssignments->add_group($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
					$this->M_auditTrail->auditTrailInsert('Group', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('15', $footnote);
					redirect('pages/Assignments/group_list');
				}
			}
		}
	}

	public function edit_data_group()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_groups' => $this->input->post('id_groups'),
				'nama_groups' => $this->input->post('nama_groups'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_groups'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_group($this->input->post('id_groups'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited ' . $this->input->post('nama_groups') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Group, ID : ' . $this->input->post('id_groups'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('15', $footnote);
				redirect('pages/Assignments/group_list');
			}
		}
	}

	public function delete_data_group($id_groups)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			if (empty($id_groups)) {
				redirect('pages/Assignments/group_list');
			} else {
				$nama = $this->M_otherDataAssignments->get_nama_groups($id_groups);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_group($id_groups)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID ' . $id_groups . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Group, ID : ' . $id_groups, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('15', $footnote);
					redirect('pages/Assignments/group_list');
				}
			}
		}
	}
	// @codeCoverageIgnoreEnd
	// end of Groups

	// Tribe
	public function tribe_list()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Tribe List', $this->session->userdata['type']);

		$data = array(
			'tribe' => $this->M_otherDataAssignments->get_tribe(),
			'subunit' => $this->M_otherDataAssignments->unit_tribe(),
			'groups' => $this->M_otherDataAssignments->get_groups(),
			'footnote' => $this->M_footnote->getFootnoteTable('16'),
			'judul' => 'Tribes - INSIGHT',
			'konten' => 'adm_views/assignments/tribeList',
			'admModal' => ['assignments/adm_modal_tribe'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	// @codeCoverageIgnoreStart
	public function add_data_tribe()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_tribe' => $this->input->post('id_tribe'),
				'nama_tribe' => $this->input->post('nama_tribe'),
				'tribe_pic' => $this->input->post('tribe_pic'),
				'id_groups' => $this->input->post('id_groups')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_tribe'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->check_nama_tribe($this->input->post('nama_tribe')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data already exist!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Tribes', $this->session->userdata['type']);
				redirect('pages/Assignments/tribe_list');
			} else {
				if ($this->M_otherDataAssignments->add_tribe($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
					$this->M_auditTrail->auditTrailInsert('Tribes', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('16', $footnote);
					redirect('pages/Assignments/tribe_list');
				}
			}
		}
	}

	public function edit_data_tribe()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_tribe' => $this->input->post('id_tribe'),
				'nama_tribe' => $this->input->post('nama_tribe'),
				'id_groups' => $this->input->post('id_groups'),
				'tribe_pic' => $this->input->post('tribe_pic')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_tribe'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_tribe($this->input->post('id_tribe'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited ' . $this->input->post('nama_tribe') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Tribes, ID : ' . $this->input->post('id_tribe'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('16', $footnote);
				redirect('pages/Assignments/tribe_list');
			}
		}
	}

	public function delete_data_tribe($id_tribe)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			if (empty($id_tribe)) {
				redirect('pages/Assignments/tribe_list');
			} else {
				$nama = $this->M_otherDataAssignments->get_nama_tribe($id_tribe);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_tribe($id_tribe)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID ' . $id_tribe . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Tribes, ID : ' . $id_tribe, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('16', $footnote);
					redirect('pages/Assignments/tribe_list');
				}
			}
		}
	}
	// @codeCoverageIgnoreEnd
	// end of Tribe

	// Squad
	public function squad_list()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		$this->M_auditTrail->auditTrailRead('Squad List', $this->session->userdata['type']);

		$data = array(
			'squad' => $this->M_otherDataAssignments->get_squad(),
			'tribe' => $this->M_otherDataAssignments->get_tribe(),
			'footnote' => $this->M_footnote->getFootnoteTable('17'),
			'judul' => 'Squads - INSIGHT',
			'konten' => 'adm_views/assignments/squadList',
			'admModal' => ['assignments/adm_modal_squad'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	// @codeCoverageIgnoreStart
	public function add_data_squad()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_squad' => $this->input->post('id_squad'),
				'nama_squad' => $this->input->post('nama_squad'),
				'id_tribe' => $this->input->post('id_tribe')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_squad'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->check_nama_squad($this->input->post('nama_squad')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data already exist!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Squads', $this->session->userdata['type']);
				redirect('pages/Assignments/squad_list');
			} else {
				if ($this->M_otherDataAssignments->add_squad($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
					$this->M_auditTrail->auditTrailInsert('Squads', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('17', $footnote);
					redirect('pages/Assignments/squad_list');
				}
			}
		}
	}

	public function edit_data_squad()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_squad' => $this->input->post('id_squad'),
				'nama_squad' => $this->input->post('nama_squad'),
				'id_tribe' => $this->input->post('id_tribe')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_squad'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_squad($this->input->post('id_squad'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited ' . $this->input->post('nama_squad') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Squads, ID : ' . $this->input->post('id_squad'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('17', $footnote);
				redirect('pages/Assignments/squad_list');
			}
		}
	}

	public function delete_data_squad($id_squad)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			if (empty($id_squad)) {
				redirect('pages/Assignments/squad_list');
			} else {
				$nama = $this->M_otherDataAssignments->get_nama_squad($id_squad);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_squad($id_squad)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID ' . $id_squad . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Squads, ID : ' . $id_squad, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('17', $footnote);
					redirect('pages/Assignments/squad_list');
				}
			}
		}
	}
	// @codeCoverageIgnoreEnd
	// end of Squad

	// Use Case
	public function usecase_list()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Use Case List', $this->session->userdata['type']);

		$data = array(
			'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'squad' => $this->M_otherDataAssignments->get_squad(),
			'usecase_status' => $this->M_otherDataAssignments->get_usecase_status(),
			'workload_point' => $this->M_memberInAssignments->workload_point(),
			'footnote' => $this->M_footnote->getFootnoteTable('18'),
			'judul' => 'Use Cases - INSIGHT',
			'konten' => 'adm_views/assignments/usecaseList',
			'admModal' => ['assignments/adm_modal_usecase'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	// Detail Use Case
	public function detail_usecase($id_usecase)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Detail Use Case dengan ID ' . $id_usecase, $this->session->userdata['type']);

		$data = array(
			'usecase' => $this->M_otherDataAssignments->get_detail_usecase($id_usecase),
			'usecase_leader' => $this->M_otherDataAssignments->get_usecase_leader($id_usecase),
			'member_usecase' => $this->M_otherDataAssignments->get_member_in_usecase($id_usecase),
			'member_internship_usecase' => $this->M_otherDataAssignments->get_member_internship_in_usecase($id_usecase),
			'usecase_task' => $this->M_otherDataAssignments->get_usecase_task($id_usecase),
			'data_source' => $this->M_otherDataAssignments->get_data_source($id_usecase),
			'output' => $this->M_otherDataAssignments->get_output($id_usecase),
			'okr_product' => $this->M_otherDataAssignments->get_okr_product($id_usecase),
			'avg_okr_product' => $this->M_otherDataAssignments->get_avg_progress_okr_product($id_usecase),
			'okr_dsc' => $this->M_otherDataAssignments->get_okr_dsc($id_usecase),
			'avg_okr_dsc' => $this->M_otherDataAssignments->get_avg_progress_okr_dsc($id_usecase),
			'okr_member' => $this->M_otherDataAssignments->get_okr_member($id_usecase),
			'avg_okr_member' => $this->M_otherDataAssignments->get_avg_progress_okr_member($id_usecase),
			'category_okr' => $this->M_otherDataAssignments->get_category_okr(),
			'complexity_okr' => $this->M_otherDataAssignments->get_complexity_okr(),
			'too_okr' => $this->M_otherDataAssignments->get_too_okr(),
			'tof_okr' => $this->M_otherDataAssignments->get_tof_okr(),
			'training_needs' => $this->M_otherDataAssignments->get_training_needs($id_usecase),
			'skill_existing' => $this->M_otherDataAssignments->get_skill_existing($id_usecase),
			'workload_point' => $this->M_memberInAssignments->workload_point(),
			'tool_needs' => $this->M_otherDataAssignments->get_tool_needs($id_usecase),
			'resource_needs' => $this->M_otherDataAssignments->get_resource_needs($id_usecase),
			'footnoteUsecaseTask' => $this->M_footnote->getFootnoteTable('27'),
			'footnoteDataSource' => $this->M_footnote->getFootnoteTable('28'),
			'footnoteOutput' => $this->M_footnote->getFootnoteTable('29'),
			'footnoteOKR' => $this->M_footnote->getFootnoteTable('32'),
			'footnoteOKRDSCTeam' => $this->M_footnote->getFootnoteTable('33'),
			'footnoteOKRMember' => $this->M_footnote->getFootnoteTable('39'),
			'footnoteProblem' => $this->M_footnote->getFootnoteTable('34'),
			'footnoteResource' => $this->M_footnote->getFootnoteTable('35'),
			'footnoteTrainingNeeds' => $this->M_footnote->getFootnoteTable('36'),
			'footnoteTool' => $this->M_footnote->getFootnoteTable('37'),
			'footnoteSkillExisting' => $this->M_footnote->getFootnoteTable('38'),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'member_internship' => $this->M_apprentice->get_member_internship(0),
			'squad' => $this->M_otherDataAssignments->get_squad(),
			'usecase_status' => $this->M_otherDataAssignments->get_usecase_status(),
			'problem' => $this->M_otherDataAssignments->get_problem($id_usecase),
			'judul' => 'Use Case Details - INSIGHT',
			'admModal' => ['assignments/adm_modal_detail_usecase'],
			'konten' => 'adm_views/assignments/detailUsecase',
			'quarter' => ['q1', 'q2', 'q3', 'q4']
		);

		$this->load->view('adm_layout/master', $data);
	}

	//Usecase Resource Needs -->
	public function add_data_resource()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'role' => $this->input->post('role'),
				'quantity' => $this->input->post('quantity'),
				'level' => $this->input->post('level'),
				'skill' => $this->input->post('skill'),
				'quarter' => $this->input->post('quarter'),
				'year' => $this->input->post('year'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('role'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_resource_needs($data)) {
				$this->session->set_flashdata('msgResource', '<div class="alert alert-success" id="msgResource">Resource Needs successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case Problems', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('35', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function edit_data_resource()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'role' => $this->input->post('role_new'),
				'quantity' => $this->input->post('quantity_new'),
				'level' => $this->input->post('level_new'),
				'skill' => $this->input->post('skill_new'),
				'quarter' => $this->input->post('quarter_new'),
				'year' => $this->input->post('year_new'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('role_new'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_resource_needs($this->input->post('id_usecase_resource_needs'), $data)) {
				$this->session->set_flashdata('msgResource', '<div class="alert alert-success" id="msgResource">Resource Needs successfully edited ' . $this->input->post('role') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Problems, ID : ' . $this->input->post('id_usecase_resource_needs'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('35', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function delete_data_resource($id_usecase_resource_needs)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_usecase_resource_needs)) {
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			} else {

				$nama = $this->M_otherDataAssignments->get_role_resource($id_usecase_resource_needs);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_resource_needs($id_usecase_resource_needs)) {
					$this->session->set_flashdata('msgResource', '<div class="alert alert-success" id="msgTool">Resource Needs successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case Problems, ID : ' . $id_usecase_resource_needs, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('35', $footnote);
					redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
				}
			}
		}
	}

	//End Usecase Tool Needs


	//Usecase Tool Needs -->
	public function add_data_tool()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'tool_name' => $this->input->post('tool'),
				'quarter' => $this->input->post('quarter'),
				'year' => $this->input->post('year'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('tool'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_tool_needs($data)) {
				$this->session->set_flashdata('msgTool', '<div class="alert alert-success" id="msgTool">Tool Needs successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case Problems', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('37', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function edit_data_tool()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_usecase_tool_needs' => $this->input->post('id_usecase_tool_needs'),
				'tool_name' => $this->input->post('tool_new'),
				'quarter' => $this->input->post('quarter_new'),
				'year' => $this->input->post('year_new'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('tool_new'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_tool_needs($this->input->post('id_usecase_tool_needs'), $data)) {
				$this->session->set_flashdata('msgTool', '<div class="alert alert-success" id="msgTool">Tool Needs successfully edited. </div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Problems, ID : ' . $this->input->post('id_usecase_tool_needs'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('37', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function delete_data_tool($id_usecase_tool_needs)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_usecase_tool_needs)) {
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			} else {

				$nama = $this->M_otherDataAssignments->get_nama_tool($id_usecase_tool_needs);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_tool_needs($id_usecase_tool_needs)) {
					$this->session->set_flashdata('msgTool', '<div class="alert alert-success" id="msgTool">Tool Needs successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case Problems, ID : ' . $id_usecase_tool_needs, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('37', $footnote);
					redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
				}
			}
		}
	}

	//End Usecase Tool Needs

	//Usecase OKR Products -->
	public function add_data_okr_product()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'kodifikasi' => $this->input->post('kodifikasi'),
				'category_okr' => $this->input->post('category_okr'),
				'objective' => $this->input->post('objective'),
				'key_result' => $this->input->post('key_result'),
				'definition_of_done' => $this->input->post('dod'),
				'quarter' => $this->input->post('quarter'),
				'year' => $this->input->post('year'),
				'assignee' => $this->input->post('assignee'),
				'complexity' => $this->input->post('complexity'),
				'type_of_output' => $this->input->post('type_of_output'),
				'unit' => $this->input->post('unit'),
				'target' => $this->input->post('target'),
				'start' => $this->input->post('start'),
				'end' => $this->input->post('end'),
				'type_of_formula' => $this->input->post('type_of_formula'),
				'progress' => $this->input->post('progress'),
				'detail_progress' => $this->input->post('detail_progress'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('kodifikasi'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_okr_product($data)) {
				$this->session->set_flashdata('msgOKR', '<div class="alert alert-success" id="msgOKR">OKR Product successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case OKR Product', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('32', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function edit_data_okr_product()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_okr_product' => $this->input->post('id_okr_product'),
				'kodifikasi' => $this->input->post('kodifikasi_new'),
				'category_okr' => $this->input->post('category_okr_new'),
				'objective' => $this->input->post('objective_new'),
				'key_result' => $this->input->post('key_result_new'),
				'definition_of_done' => $this->input->post('dod_new'),
				'quarter' => $this->input->post('quarter_new'),
				'year' => $this->input->post('year_new'),
				'assignee' => $this->input->post('assignee_new'),
				'complexity' => $this->input->post('complexity_new'),
				'type_of_output' => $this->input->post('type_of_output_new'),
				'unit' => $this->input->post('unit'),
				'target' => $this->input->post('target'),
				'start' => $this->input->post('start'),
				'end' => $this->input->post('end'),
				'type_of_formula' => $this->input->post('type_of_formula_new'),
				'progress' => $this->input->post('progress_new'),
				'detail_progress' => $this->input->post('detail_progress_new'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('kodifikasi_new'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_okr_product($this->input->post('id_okr_product'), $data)) {
				$this->session->set_flashdata('msgOKR', '<div class="alert alert-success" id="msgOKR">OKR Product successfully edited. </div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case OKR Product, ID : ' . $this->input->post('id_okr_product'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('32', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}


	public function delete_data_okr_product($id_okr_product)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_okr_product)) {
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			} else {

				$nama = $this->M_otherDataAssignments->get_kodifikasi_okr($id_okr_product);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_okr_product($id_okr_product)) {
					$this->session->set_flashdata('msgOKR', '<div class="alert alert-success" id="msgOKR">OKR Product successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case OKR Product, ID : ' . $id_okr_product, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('32', $footnote);
					redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
				}
			}
		}
	}

	//End Usecase OKR Products 

	public function add_data_okr_dsc_team()
	{

		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'kodifikasi' => $this->input->post('okr_dsc_kodifikasi'),
				'category_okr' => $this->input->post('okr_dsc_category_okr'),
				'objective' => $this->input->post('okr_dsc_objective'),
				'key_result' => $this->input->post('okr_dsc_key_result'),
				'definition_of_done' => $this->input->post('okr_dsc_dod'),
				'quarter' => $this->input->post('okr_dsc_quarter'),
				'year' => $this->input->post('okr_dsc_year'),
				'assignee' => $this->input->post('okr_dsc_assignee'),
				'complexity' => $this->input->post('okr_dsc_complexity'),
				'type_of_output' => $this->input->post('okr_dsc_type_of_output'),
				'unit' => $this->input->post('unit'),
				'target' => $this->input->post('target'),
				'start' => $this->input->post('start'),
				'end' => $this->input->post('end'),
				'type_of_formula' => $this->input->post('okr_dsc_type_of_formula'),
				'progress' => $this->input->post('progress'),
				'detail_progress' => $this->input->post('detail_progress'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('okr_dsc_kodifikasi'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_okr_dsc($data)) {
				$this->session->set_flashdata('msgOKRDSCTeam', '<div class="alert alert-success" id="msgOKRDSCTeam">OKR DSC Team successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case OKR DSC Team', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('33', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function edit_data_okr_dsc_team()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'kodifikasi' => $this->input->post('okr_dsc_kodifikasi_new'),
				'category_okr' => $this->input->post('okr_dsc_category_okr_new'),
				'objective' => $this->input->post('okr_dsc_objective_new'),
				'key_result' => $this->input->post('okr_dsc_key_result_new'),
				'definition_of_done' => $this->input->post('okr_dsc_dod_new'),
				'quarter' => $this->input->post('okr_dsc_quarter_new'),
				'year' => $this->input->post('okr_dsc_year_new'),
				'assignee' => $this->input->post('okr_dsc_assignee_new'),
				'complexity' => $this->input->post('okr_dsc_complexity_new'),
				'type_of_output' => $this->input->post('okr_dsc_type_of_output_new'),
				'unit' => $this->input->post('unit'),
				'target' => $this->input->post('target'),
				'start' => $this->input->post('start'),
				'end' => $this->input->post('end'),
				'type_of_formula' => $this->input->post('okr_dsc_type_of_formula_new'),
				'progress' => $this->input->post('progress_new'),
				'detail_progress' => $this->input->post('detail_progress_new'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('okr_dsc_kodifikasi_new'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_okr_dsc($this->input->post('id_okr_dsc'), $data)) {
				$this->session->set_flashdata('msgOKRDSCTeam', '<div class="alert alert-success" id="msgOKRDSCTeam">OKR DSC Team successfully edited.</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case OKR DSC Team, ID : ' . $this->input->post('id_okr_dsc'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('33', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function delete_data_okr_dsc_team($id_okr_dsc)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_okr_dsc)) {
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			} else {

				$nama = $this->M_otherDataAssignments->get_kodifikasi_okr_dsc($id_okr_dsc);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_okr_dsc($id_okr_dsc)) {
					$this->session->set_flashdata('msgOKRDSCTeam', '<div class="alert alert-success" id="msgOKRDSCTeam">OKR DSC Team successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case OKR DSC Team, ID : ' . $id_okr_dsc, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('33', $footnote);
					redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
				}
			}
		}
	}

	//Usecase OKR Member -->
	public function add_data_okr_member()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'member' => $this->input->post('okr_member_assignee'),
				'kodifikasi' => $this->input->post('okr_member_kodifikasi'),
				'category_okr' => $this->input->post('okr_member_category_okr'),
				'objective' => $this->input->post('okr_member_objective'),
				'key_result' => $this->input->post('okr_member_key_result'),
				'definition_of_done' => $this->input->post('okr_member_dod'),
				'quarter' => $this->input->post('okr_member_quarter'),
				'year' => $this->input->post('okr_member_year'),
				'assignee' => $this->input->post('okr_member_assignee'),
				'complexity' => $this->input->post('okr_member_complexity'),
				'type_of_output' => $this->input->post('okr_member_type_of_output'),
				'unit' => $this->input->post('unit'),
				'target' => $this->input->post('target'),
				'start' => $this->input->post('start'),
				'end' => $this->input->post('end'),
				'type_of_formula' => $this->input->post('okr_member_type_of_formula'),
				'progress' => $this->input->post('progress'),
				'detail_progress' => $this->input->post('detail_progress'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('okr_member_member'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_okr_member($data)) {
				$this->session->set_flashdata('msgOKRMember', '<div class="alert alert-success" id="msgOKRMember">OKR Member successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case OKR Member', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('39', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function edit_data_okr_member()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'member' => $this->input->post('okr_member_member_new'),
				'kodifikasi' => $this->input->post('okr_member_kodifikasi_new'),
				'category_okr' => $this->input->post('okr_member_category_okr_new'),
				'objective' => $this->input->post('okr_member_objective_new'),
				'key_result' => $this->input->post('okr_member_key_result_new'),
				'definition_of_done' => $this->input->post('okr_member_dod_new'),
				'quarter' => $this->input->post('okr_member_quarter_new'),
				'year' => $this->input->post('okr_member_year_new'),
				'assignee' => $this->input->post('okr_member_assignee_new'),
				'complexity' => $this->input->post('okr_member_complexity_new'),
				'type_of_output' => $this->input->post('okr_member_type_of_output_new'),
				'unit' => $this->input->post('unit'),
				'target' => $this->input->post('target'),
				'start' => $this->input->post('start'),
				'end' => $this->input->post('end'),
				'type_of_formula' => $this->input->post('okr_member_type_of_formula_new'),
				'progress' => $this->input->post('progress_new'),
				'detail_progress' => $this->input->post('detail_progress_new'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('okr_member_member_new'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_okr_member($this->input->post('id_okr_member'), $data)) {
				$this->session->set_flashdata('msgOKRMember', '<div class="alert alert-success" id="msgOKRMember">OKR Member successfully edited. </div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case OKR Member, ID : ' . $this->input->post('id_okr_member'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('39', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}


	public function delete_data_okr_member($id_okr_member)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_okr_member)) {
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			} else {

				$nama = $this->M_otherDataAssignments->get_member_okr_member($id_okr_member);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_okr_member($id_okr_member)) {
					$this->session->set_flashdata('msgOKRMember', '<div class="alert alert-success" id="msgOKRMember">OKR Member successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case OKR Member, ID : ' . $id_okr_member, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('39', $footnote);
					redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
				}
			}
		}
	}

	//End Usecase OKR Member


	public function add_data_training_needs()
	{

		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'training_name' => $this->input->post('training_needs_name'),
				'quarter' => $this->input->post('training_needs_quarter'),
				'year' => $this->input->post('training_needs_year'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('training_needs_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_training_needs($data)) {
				$this->session->set_flashdata('msgTrainingNeeds', '<div class="alert alert-success" id="msgTrainingNeeds">Data successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case Training Needs', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('36', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function edit_data_training_needs()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_usecase_training_needs' => $this->input->post('id_usecase_training_needs'),
				'training_name' => $this->input->post('training_name'),
				'quarter' => $this->input->post('training_needs_quarter'),
				'year' => $this->input->post('training_needs_year')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('training_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_training_needs($this->input->post('id_usecase_training_needs'), $data)) {
				$this->session->set_flashdata('msgTrainingNeeds', '<div class="alert alert-success" id="msgTrainingNeeds">Data successfully edited ' . $this->input->post('training_name') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Training Needs, ID : ' . $this->input->post('id_usecase_training_needs'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('36', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function delete_data_training_needs($id_usecase_training_needs)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_usecase_training_needs)) {
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			} else {

				$nama = $this->M_otherDataAssignments->get_nama_training_needs($id_usecase_training_needs);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_training_needs($id_usecase_training_needs)) {
					$this->session->set_flashdata('msgTrainingNeeds', '<div class="alert alert-success" id="msgTrainingNeeds">Data Source with ID ' . $id_usecase_training_needs . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case Training needs, ID : ' . $id_usecase_training_needs, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('36', $footnote);
					redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
				}
			}
		}
	}

	public function add_data_skill_existing()
	{

		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'skill_name' => $this->input->post('skill_existing_name'),
				'quarter' => $this->input->post('skill_existing_quarter'),
				'year' => $this->input->post('skill_existing_year'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('skill_existing_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_skill_existing($data)) {
				$this->session->set_flashdata('msgSkillExisting', '<div class="alert alert-success" id="msgSkillExisting">Data successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case Skill Existing', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('38', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function edit_data_skill_existing()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_usecase_skill_existing' => $this->input->post('id_usecase_skill_existing'),
				'skill_name' => $this->input->post('skill_name'),
				'quarter' => $this->input->post('skill_existing_quarter'),
				'year' => $this->input->post('skill_existing_year')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('skill_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_skill_existing($this->input->post('id_usecase_skill_existing'), $data)) {
				$this->session->set_flashdata('msgSkillExisting', '<div class="alert alert-success" id="msgSkillExisting">Data successfully edited ' . $this->input->post('skill_name') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Skill Existing, ID : ' . $this->input->post('id_usecase_skill_existing'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('38', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function delete_data_skill_existing($id_usecase_skill_existing)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_usecase_skill_existing)) {
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			} else {

				$nama = $this->M_otherDataAssignments->get_nama_skill_existing($id_usecase_skill_existing);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_skill_existing($id_usecase_skill_existing)) {
					$this->session->set_flashdata('msgSkillExisting', '<div class="alert alert-success" id="msgSkillExisting">Data Source with ID ' . $id_usecase_skill_existing . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case Skill Existing, ID : ' . $id_usecase_skill_existing, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('38', $footnote);
					redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
				}
			}
		}
	}

	public function add_data_output()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'output_name' => $this->input->post('output_name'),
				'output_description' => $this->input->post('output_description'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('output_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_output($data)) {
				$this->session->set_flashdata('msgOutput', '<div class="alert alert-success" id="msgOutput">Data successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case Output', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('29', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function edit_data_output()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_output_usecase' => $this->input->post('id_output_usecase'),
				'output_name' => $this->input->post('output_name'),
				'output_description' => $this->input->post('output_description'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('output_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_output($this->input->post('id_output_usecase'), $data)) {
				$this->session->set_flashdata('msgOutput', '<div class="alert alert-success" id="msgOutput">Data successfully edited ' . $this->input->post('output_name') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Output, ID : ' . $this->input->post('id_output_usecase'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('29', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function delete_data_output($id_output_usecase)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_output_usecase)) {
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			} else {

				$nama = $this->M_otherDataAssignments->get_nama_output($id_output_usecase);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_output($id_output_usecase)) {
					$this->session->set_flashdata('msgOutput', '<div class="alert alert-success" id="msgOutput">Data Source with ID ' . $id_output_usecase . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case Output, ID : ' . $id_output_usecase, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('29', $footnote);
					redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
				}
			}
		}
	}

	public function add_data_data_source()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'data_source_name' => $this->input->post('data_source_name'),
				'data_source_detail' => $this->input->post('data_source_detail'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('data_source_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_data_source($data)) {
				$this->session->set_flashdata('msgDataSource', '<div class="alert alert-success" id="msgDataSource">Data successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case Data Source', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('28', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function edit_data_data_source()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_data_source' => $this->input->post('id_data_source'),
				'data_source_name' => $this->input->post('data_source_name'),
				'data_source_detail' => $this->input->post('data_source_detail'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('data_source_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_data_source($this->input->post('id_data_source'), $data)) {
				$this->session->set_flashdata('msgDataSource', '<div class="alert alert-success" id="msgDataSource">Data successfully edited ' . $this->input->post('data_source_name') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Data Source, ID : ' . $this->input->post('id_data_source'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('28', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function delete_data_data_source($id_data_source)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_data_source)) {
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			} else {

				$nama = $this->M_otherDataAssignments->get_nama_data_source($id_data_source);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_data_source($id_data_source)) {
					$this->session->set_flashdata('msgDataSource', '<div class="alert alert-success" id="msgDataSource">Data Source with ID ' . $id_data_source . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case Data Source, ID : ' . $id_data_source, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('28', $footnote);
					redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
				}
			}
		}
	}

	public function add_data_usecase_task()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'task_name' => $this->input->post('task_name'),
				'task_description' => $this->input->post('task_description'),
				'id_reporter' => $this->input->post('id_reporter'),
				'id_assignee' => $this->input->post('id_assignee'),
				'id_status' => $this->input->post('id_status'),
				'date_updated' => date("Y-m-d H:i:s"),
				'date_point' => date("Y-m-d H:i:s"),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('task_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_usecase_task($data)) {
				$this->session->set_flashdata('msgUsecaseTask', '<div class="alert alert-success" id="msgUsecaseTask">Data successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case Task', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('27', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function edit_data_usecase_task()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_usecase_task' => $this->input->post('id_usecase_task'),
				'task_name' => $this->input->post('task_name'),
				'task_description' => $this->input->post('task_description'),
				'id_reporter' => $this->input->post('id_reporter'),
				'id_assignee' => $this->input->post('id_assignee'),
				'id_status' => $this->input->post('id_status'),
				'date_updated' => date("Y-m-d H:i:s"),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('task_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_usecase_task($this->input->post('id_usecase_task'), $data)) {
				$this->session->set_flashdata('msgUsecaseTask', '<div class="alert alert-success" id="msgUsecaseTask">Data successfully edited ' . $this->input->post('task_name') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Task, ID : ' . $this->input->post('id_usecase_task'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('27', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function delete_data_usecase_task($id_usecase_task)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_usecase_task)) {
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			} else {

				$nama = $this->M_otherDataAssignments->get_nama_usecase_task($id_usecase_task);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_usecase_task($id_usecase_task)) {
					$this->session->set_flashdata('msgUsecaseTask', '<div class="alert alert-success" id="msgUsecaseTask">Data Usecase Task with ID ' . $id_usecase_task . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Usulan Training Member, ID : ' . $id_usecase_task, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('27', $footnote);
					redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
				}
			}
		}
	}

	// @codeCoverageIgnoreStart
	public function add_data_usecase()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'nama_usecase' => $this->input->post('nama_usecase'),
				'id_squad' => $this->input->post('id_squad'),
				'id_usecase_status' => $this->input->post('id_usecase_status'),
				'usecase_started' => $this->input->post('usecase_started'),
				'jenis_analisis' => $this->input->post('usecase_type'),
				'usecase_finished' => $this->input->post('usecase_finished'),
				'level_usecase' => $this->input->post('level'),
				//'id_leader' => 'OSR41'
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_usecase'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->check_nama_usecase($this->input->post('nama_usecase')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data already exist!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Use Case', $this->session->userdata['type']);
				redirect('pages/Assignments/usecase_list');
			} else {
				if ($this->M_otherDataAssignments->add_usecase($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
					$this->M_auditTrail->auditTrailInsert('Use Case', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('18', $footnote);
					redirect('pages/Assignments/usecase_list');
				}
			}
		}
	}

	public function edit_data_usecase()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'nama_usecase' => $this->input->post('nama_usecase'),
				'id_squad' => $this->input->post('id_squad'),
				'id_usecase_status' => $this->input->post('id_usecase_status'),
				//'id_leader' => $this->input->post('id_leader'),
				'usecase_started' => $this->input->post('usecase_started'),
				'jenis_analisis' => $this->input->post('usecase_type'),
				'level_usecase' => $this->input->post('level'),
				'usecase_finished' => $this->input->post('usecase_finished')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_usecase'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_usecase($this->input->post('id_usecase'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited ' . $this->input->post('nama_usecase') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case, ID : ' . $this->input->post('id_usecase'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('18', $footnote);

				$this->M_memberInAssignments->update_occupancy_rate_usecase($data['id_usecase']);
				$this->M_memberInAssignments->update_occupancy_status_usecase($data['id_usecase']);

				$member_list = $this->input->post('list_member[]');
				for ($i = 0; $i <= count($member_list); $i++) {
					$this->M_memberInAssignments->update_occupancy_rate_member($member_list[$i]);
					$this->M_memberInAssignments->update_occupancy_status_member($member_list[$i]);
				}

				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function delete_data_usecase($id_usecase)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			if (empty($id_usecase)) {
				redirect('pages/Assignments/usecase_list');
			} else {
				$nama = $this->M_otherDataAssignments->get_nama_usecase($id_usecase);	

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_usecase($id_usecase)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID ' . $id_usecase . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case, ID : ' . $id_usecase, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('18', $footnote);
						
					$member_list = $this->input->post('list_member[]');
					for ($i = 0; $i <= count($member_list); $i++) {
						$this->M_memberInAssignments->update_occupancy_rate_member($member_list[$i]);
						$this->M_memberInAssignments->update_occupancy_status_member($member_list[$i]);
					}
					redirect('pages/Assignments/usecase_list');
				}
			}
		}
	}

	public function add_data_problem()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'descriptions' => $this->input->post('descriptions'),
				'quarter' => $this->input->post('quarter'),
				'year' => $this->input->post('year'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('descriptions'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_problem($data)) {
				$this->session->set_flashdata('msgProblem', '<div class="alert alert-success" id="msgProblem">Data successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case Problems', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('34', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function edit_data_problem()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_usecase_kendala' => $this->input->post('id_usecase_kendala'),
				'descriptions' => $this->input->post('descriptions'),
				'quarter' => $this->input->post('quarter'),
				'year' => $this->input->post('year'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('descriptions'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_problem($this->input->post('id_usecase_kendala'), $data)) {
				$this->session->set_flashdata('msgProblem', '<div class="alert alert-success" id="msgProblem">Data successfully edited ' . $this->input->post('descriptions') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Problems, ID : ' . $this->input->post('id_usecase_kendala'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('34', $footnote);
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			}
		}
	}

	public function delete_data_problem($id_usecase_kendala)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_usecase_kendala)) {
				redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
			} else {

				$nama = $this->M_otherDataAssignments->get_nama_problem($id_usecase_kendala);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_problem($id_usecase_kendala)) {
					$this->session->set_flashdata('msgProblem', '<div class="alert alert-success" id="msgProblem">Data Source with ID ' . $id_usecase_kendala . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case Problems, ID : ' . $id_usecase_kendala, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('34', $footnote);
					redirect('pages/Assignments/detail_usecase/' . $this->input->post('id_usecase'));
				}
			}
		}
	}
	// @codeCoverageIgnoreEnd
	// end of Use Case
	// end of Assignments Menu
}
