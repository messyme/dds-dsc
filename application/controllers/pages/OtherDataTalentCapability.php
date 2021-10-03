<?php
defined('BASEPATH') || exit('No direct script access allowed');

class OtherDataTalentCapability extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Talent Capability
		$this->load->model('talentCapability/M_otherDataTalentCapability');
		$this->load->model('assignments/M_otherDataAssignments');
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
		$this->M_auditTrail->auditTrailRead('Other Data - Talent Capability', $this->session->userdata['type']);

		$data = array(
			'category_skill' => $this->M_otherDataTalentCapability->get_category_skill(),
			'skill_list_type' => $this->M_otherDataTalentCapability->get_skill_list_type(),
			'skill_list_require' => $this->M_otherDataTalentCapability->get_skill_list_require(),
			'skill_list' => $this->M_otherDataTalentCapability->get_skill_list(),
			'proficiency_level' => $this->M_otherDataTalentCapability->get_proficiency_level(),
			'minimum_proficiency_level' => $this->M_otherDataTalentCapability->get_minimum_proficiency_level(),
			'usecase_difficultly' => $this->M_otherDataTalentCapability->get_usecase_difficultly(),
			'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'edit_usecase_difficultly' => $this->M_otherDataTalentCapability->edit_usecase_difficultly(),
			'get_skill_minprof' => $this->M_otherDataTalentCapability->get_skill_minprof(),
			'footnote_category_skill' => $this->M_footnote->getFootnoteTable('47'),
			'footnote_skill_list_type' => $this->M_footnote->getFootnoteTable('48'),
			'footnote_skill_list_require' => $this->M_footnote->getFootnoteTable('49'),
			'footnote_skill_list' => $this->M_footnote->getFootnoteTable('50'),
			'footnote_proficiency_level' => $this->M_footnote->getFootnoteTable('51'),
			'footnote_minimum_proficiency_level' => $this->M_footnote->getFootnoteTable('52'),
			'footnote_usecase' => $this->M_footnote->getFootnoteTable('54'),
			'judul' => 'Other Data - Talent Capability - INSIGHT',
			'konten' => 'adm_views/other_data/otherDataTalentCapability',
			'admModal' => [
				'talentCapability/adm_modal_categorySkill',
				'talentCapability/adm_modal_skillType',
				'talentCapability/adm_modal_skillRequirement',
				'talentCapability/adm_modal_skill_list',
				'talentCapability/adm_modal_proficiency_level',
				'talentCapability/adm_modal_minimum_proficiency_level',
				'talentCapability/adm_modal_usecase_difficultly',
			],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	public function add_category_skill()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'name_category_skill' => $this->input->post('name_category_skill')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('name_category_skill'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->check_nama_category_skill($this->input->post('name_category_skill')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Category skill exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Category Skill', $this->session->userdata['type']);
				redirect('pages/OtherDataTalentCapability');
			} else {
				if ($this->M_otherDataTalentCapability->add_category_skill($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Category Skill', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('47', $footnote);
					redirect('pages/OtherDataTalentCapability');
				}
			}
		}
	}

	public function edit_category_skill()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_category_skill' => $this->input->post('id_category_skill'),
				'name_category_skill' => $this->input->post('name_category_skill')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('name_category_skill'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->edit_category_skill($this->input->post('id_category_skill'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Category skill with name ' . $this->input->post('name_category_skill') . ' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Category Skill, ID: ' . $this->input->post('id_category_skill'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('47', $footnote);
				redirect('pages/OtherDataTalentCapability');
			}
		}
	}

	public function delete_category_skill($id_category_skill)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_category_skill)) {
				redirect('pages/OtherDataTalentCapability');
			} else {
				$nama = $this->M_otherDataTalentCapability->get_nama_category_skill($id_category_skill);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataTalentCapability->delete_category_skill($id_category_skill)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Category skill with ID ' . $id_category_skill . ' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Category Skill, ID: ' . $id_category_skill, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('47', $footnote);
					redirect('pages/OtherDataTalentCapability');
				}
			}
		}
	}

	public function add_skill_list_type()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'name_skill_list_type' => $this->input->post('name_skill_list_type')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('name_skill_list_type'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->check_nama_skill_list_type($this->input->post('name_skill_list_type')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Skill type exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Skill Type', $this->session->userdata['type']);
				redirect('pages/OtherDataTalentCapability');
			} else {
				if ($this->M_otherDataTalentCapability->add_skill_list_type($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Skill Type', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('48', $footnote);
					redirect('pages/OtherDataTalentCapability');
				}
			}
		}
	}

	public function edit_skill_list_type()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_skill_list_type' => $this->input->post('id_skill_list_type'),
				'name_skill_list_type' => $this->input->post('name_skill_list_type')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('name_skill_list_type'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->edit_skill_list_type($this->input->post('id_skill_list_type'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Skill type with name ' . $this->input->post('name_skill_list_type') . ' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Skill Type, ID: ' . $this->input->post('id_skill_list_type'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('48', $footnote);
				redirect('pages/OtherDataTalentCapability');
			}
		}
	}

	public function delete_skill_list_type($id_skill_list_type)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_skill_list_type)) {
				redirect('pages/OtherDataTalentCapability');
			} else {
				$nama = $this->M_otherDataTalentCapability->get_nama_skill_list_type($id_skill_list_type);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataTalentCapability->delete_skill_list_type($id_skill_list_type)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Skill type with ID ' . $id_skill_list_type . ' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Skill Type, ID: ' . $id_skill_list_type, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('48', $footnote);
					redirect('pages/OtherDataTalentCapability');
				}
			}
		}
	}

	public function add_skill_list_require()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'name_skill_list_require' => $this->input->post('name_skill_list_require')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('name_skill_list_require'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->check_nama_skill_list_require($this->input->post('name_skill_list_require')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Skill requirement exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Skill Requirement', $this->session->userdata['type']);
				redirect('pages/OtherDataTalentCapability');
			} else {
				if ($this->M_otherDataTalentCapability->add_skill_list_require($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Skill Requirement', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('49', $footnote);
					redirect('pages/OtherDataTalentCapability');
				}
			}
		}
	}

	public function edit_skill_list_require()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_skill_list_require' => $this->input->post('id_skill_list_require'),
				'name_skill_list_require' => $this->input->post('name_skill_list_require')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('name_skill_list_require'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->edit_skill_list_require($this->input->post('id_skill_list_require'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Skill requirement with name ' . $this->input->post('name_skill_list_require') . ' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Skill Requirement, ID: ' . $this->input->post('id_skill_list_require'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('49', $footnote);
				redirect('pages/OtherDataTalentCapability');
			}
		}
	}

	public function delete_skill_list_require($id_skill_list_require)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_skill_list_require)) {
				redirect('pages/OtherDataTalentCapability');
			} else {
				$nama = $this->M_otherDataTalentCapability->get_nama_skill_list_require($id_skill_list_require);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataTalentCapability->delete_skill_list_require($id_skill_list_require)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Skill requirement with ID ' . $id_skill_list_require . ' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Skill Requirement, ID: ' . $id_skill_list_require, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('49', $footnote);
					redirect('pages/OtherDataTalentCapability');
				}
			}
		}
	}


	// Skill List
	public function add_data_skill_list()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_category_skill' => $this->input->post('category_skill'),
				'id_skill_list_type' => $this->input->post('skill_list_type'),
				'id_skill_list_require' => $this->input->post('skill_list_require'),
				'name_skill' => $this->input->post('skill_name')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('skill_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->check_nama_skill($this->input->post('skill_name')) > 0) {
				$this->session->set_flashdata('msgSkill', '<div class="alert alert-danger">Skill Already Exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Skill List', $this->session->userdata['type']);
				redirect('pages/OtherDataTalentCapability');
			} else {
				if ($this->M_otherDataTalentCapability->add_skill_list($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msgSkill', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Skill List', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('50', $footnote);
					redirect('pages/OtherDataTalentCapability');
				}
			}
		};
	}


	public function edit_data_skill_list()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_skill_list' => $this->input->post('id_skill_list'),
				'id_category_skill' => $this->input->post('category_skill_new'),
				'id_skill_list_type' => $this->input->post('skill_list_type_new'),
				'id_skill_list_require' => $this->input->post('skill_list_require_new'),
				'name_skill' => $this->input->post('skill_name_new')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('skill_name_new'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->edit_skill_list($this->input->post('id_skill_list'), $data) && $this->input->post('code') === 'private') {
				$this->session->set_flashdata('msgSkill', '<div class="alert alert-success" id="msgSkill">Skill List successfully edited. </div><br>');
				$this->M_auditTrail->auditTrailUpdate('Skill List, ID : ' . $this->input->post('id_skill_list'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('50', $footnote);
				redirect('pages/OtherDataTalentCapability');
			}
		}
	}


	public function delete_data_skill_list($id_skill_list)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_skill_list)) {
				redirect('pages/OtherDataTalentCapability');
			} else {

				$nama = $this->M_otherDataTalentCapability->get_name_skill($id_skill_list);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataTalentCapability->delete_skill_list($id_skill_list)) {
					$this->session->set_flashdata('msgSkill', '<div class="alert alert-success" id="msgSkill">Skill successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Skill List, ID : ' . $id_skill_list, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('50', $footnote);
					redirect('pages/OtherDataTalentCapability');
				}
			}
		}
	}
	//------ End of Skill List

	//Minimum Proficiency Level
	public function add_data_minimum_proficiency_level()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			foreach ($this->input->post('multiSkill[]') as $id_skill_list) {
				$data = array(
					'id_skill_list' => $id_skill_list,
					'j1' => $this->input->post('j1'),
					'j2' => $this->input->post('j2'),
					'j3' => $this->input->post('j3'),
					'm1' => $this->input->post('m1'),
					'm2' => $this->input->post('m2'),
					'm3' => $this->input->post('m3'),
					's1' => $this->input->post('s1'),
					's2' => $this->input->post('s2'),
					's3' => $this->input->post('s3')
				);


				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'added',
					'name' => $id_skill_list,
					'timestamp' => date("Y-m-d H:i:s")
				);

				$this->M_footnote->editFootnoteTable('52', $footnote);

				if ($this->M_otherDataTalentCapability->add_minimum_proficiency_level($data)) {
					if ($this->input->post('code') === 'private') {
						$this->M_auditTrail->auditTrailInsert('Minimum Proficiency Level', $this->session->userdata['type']);
					}
				}
			}

			$this->session->set_flashdata('msgMin', '<div class="alert alert-success">New data has been added successfully</div><br>');
			redirect('pages/OtherDataTalentCapability');
		};
	}


	public function edit_data_minimum_proficiency()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_minimum_proficiency_level' => $this->input->post('id_minimum_proficiency_level'),
				'id_skill_list' => $this->input->post('prof_skill_new'),
				'j1' => $this->input->post('j1_new'),
				'j2' => $this->input->post('j2_new'),
				'j3' => $this->input->post('j3_new'),
				'm1' => $this->input->post('m1_new'),
				'm2' => $this->input->post('m2_new'),
				'm3' => $this->input->post('m3_new'),
				's1' => $this->input->post('s1_new'),
				's2' => $this->input->post('s2_new'),
				's3' => $this->input->post('s3_new')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('prof_skill_new'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->edit_minimum_proficiency_level($this->input->post('id_minimum_proficiency_level'), $data) && $this->input->post('code') === 'private') {
				$this->session->set_flashdata('msgMin', '<div class="alert alert-success" id="msgMin">Minimum of Proficiency Level successfully edited. </div><br>');
				$this->M_auditTrail->auditTrailUpdate('Minimum Proficiency, ID : ' . $this->input->post('id_minimum_proficiency_level'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('52', $footnote);
				redirect('pages/OtherDataTalentCapability');
			}
		}
	}

	// ------ End of Proficiency Level

	public function delete_data_minimum_proficiency($id_minimum_proficiency_level)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_minimum_proficiency_level)) {
				redirect('pages/OtherDataTalentCapability');
			} else {

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $id_minimum_proficiency_level,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataTalentCapability->delete_minimum_proficiency_level($id_minimum_proficiency_level)) {
					$this->session->set_flashdata('msgMin', '<div class="alert alert-success" id="msgMin">Minimum of Proficiency Level successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Minimum Proficiency, ID : ' . $id_minimum_proficiency_level, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('52', $footnote);
					redirect('pages/OtherDataTalentCapability');
				}
			}
		}
	}
	//------ End of Minimum Proficiency Level

	//PROFICIENCY LEVEL
	public function add_proficiency_level()
	{
		if ($this->session->userdata('role') == 'admin_logged_in') {
			redirect('pages/Login');
		};

		if (isset($_POST)) {
			$data = array(
				'name_proficiency_level' => $this->input->post('name_proficiency_level'),
				'value' => $this->input->post('value'),

			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('name_proficiency_level'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->add_proficiency_level($data)) {
				$this->session->set_flashdata('msgProficiency_level', '<div class="alert alert-success" id="msgProficiency_level">Data successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Proficiency Level', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('51', $footnote);
				redirect('pages/OtherDataTalentCapability');
			}
		}
	}

	public function edit_proficiency_level()
	{
		if ($this->session->userdata('role') == 'admin_logged_in') {
			redirect('pages/Login');
		};
		if (isset($_POST)) {
			$data = array(
				'id_proficiency_level' => $this->input->post('id_proficiency_level'),
				'name_proficiency_level' => $this->input->post('name_proficiency_level'),
				'value' => $this->input->post('value'),

			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('name_proficiency_level'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->edit_proficiency_level($this->input->post('id_proficiency_level'), $data)) {
				$this->session->set_flashdata('msgProficiency_level', '<div class="alert alert-success" id="msgProficiency_level">Data successfully edited ' . $this->input->post('name_proficiency_level') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Proficiency Level, ID : ' . $this->input->post('id_proficiency_level'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('51', $footnote);
				redirect('pages/OtherDataTalentCapability');
			}
		}
	}

	public function delete_proficiency_level($id_proficiency_level)
	{
		if ($this->session->userdata('role') == 'admin_logged_in') {
			redirect('pages/Login');
		};

		if (isset($_POST)) {
			if (empty($id_proficiency_level)) {
				redirect('pages/OtherDataTalentCapability');
			} else {

				$nama = $this->M_otherDataTalentCapability->get_nama_proficiency_level($id_proficiency_level);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataTalentCapability->delete_proficiency_level($id_proficiency_level)) {
					$this->session->set_flashdata('msgProficiency_level', '<div class="alert alert-success" id="msgProficiency_level">Data Source with ID ' . $id_proficiency_level . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Proficiency Level, ID : ' . $id_proficiency_level, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('51', $footnote);
					redirect('pages/OtherDataTalentCapability');
				}
			}
		}
	}
	//END PROFICIENCY LEVEL

	//USECASE DIFFICULTLY
	public function add_usecase_difficultly()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$name_skill = $this->input->post('name_skill[]');
			for ($i = 0; $i <= count($name_skill); $i++) {
				$data = array(
					'id_usecase' => $this->input->post('id_usecase'),
					'id_minimum_capability' => $name_skill[$i],
					'industry' => $this->input->post('industry'),
				);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'added',
					'name' => $this->input->post('industry'),
					'timestamp' => date("Y-m-d H:i:s")
				);

				$this->M_footnote->editFootnoteTable('54', $footnote);

				if ($this->M_otherDataTalentCapability->add_usecase_difficultly($data)) {
					if ($this->input->post('code') === 'private') {
						$this->M_auditTrail->auditTrailInsert('Talent Capability', $this->session->userdata['type']);
					}
				};
			}


			$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Difficultly successfully added</div><br>');
			redirect('pages/OtherDataTalentCapability');
		}
	}

	public function edit_usecase_difficultly()
	{
		if ($this->session->userdata('role') == 'admin_logged_in') {
			redirect('pages/Login');
		};

		if (!empty($_POST["industri"])) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase3'),
				'industry' => $this->input->post('industry3'),
				//'id_minimum_capability' => $this->input->post('namaskill'),
			);
			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('name_proficiency_level'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataTalentCapability->update_usecase_difficultly($this->input->post('usecase'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Usecase Difficultly successfully edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Usecase Difficultly, ID : ' . $this->input->post('id_usecase3'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('54', $footnote);
			}
		} else {
			$name_skill = $this->input->post('addskill[]');
			for ($i = 0; $i <= count($name_skill); $i++) {
				$data = array(
					'id_usecase' => $this->input->post('id_usecase3'),
					'id_minimum_capability' => $name_skill[$i],
					'industry' => $this->input->post('industry3'),
				);

				$this->M_otherDataTalentCapability->add_usecase_difficultly($data);
			}
		}
		redirect('pages/OtherDataTalentCapability');
	}

	public function delete_usecase_difficultly($id_usecase)
	{
		if ($this->session->userdata('role') == 'admin_logged_in') {
			redirect('pages/Login');
		};

		if (isset($_POST)) {
			if (empty($id_usecase)) {
				redirect('pages/OtherDataTalentCapability');
			} else {

				//$nama = $this->M_otherDataTalentCapability->get_nama_usecase($id_usecase);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $this->input->post('id_usecase'),
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataTalentCapability->delete_usecase_difficultly($id_usecase)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Difficultly successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Proficiency Level, ID : ' . $id_usecase, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('54', $footnote);
					redirect('pages/OtherDataTalentCapability');
				}
			}
		}
	}

	public function delete_skill_usecase()
	{
		if ($this->session->userdata('role') == 'admin_logged_in') {
			redirect('pages/Login');
		};

		if (isset($_POST)) {

			$id = $this->input->post('id');
			//$nama = $this->M_otherDataTalentCapability->get_nama_usecase($id_usecase);

			$this->M_otherDataTalentCapability->delete_skill_usecase($id);
			// echo 1;
			// exit;
		}
	}

	public function update_skill_usecase()
	{

		if ($this->session->userdata('role') == 'admin_logged_in') {
			redirect('pages/Login');
		};
		$skill_id = $this->input->post('value');
		$id = $this->input->post('id');
		if (isset($_POST)) {

			$skill = array(
				'id_minimum_capability' => $skill_id,
			);
			$this->M_otherDataTalentCapability->edit_skill_usecase($id, $skill);

			// echo 1;
			// exit;
		}
	}

	public function add_skill_usecase()
	{

		if (isset($_POST)) {
			$name_skill = $this->input->post('value');
			$get_id =
				$this
				->db
				->select('id_minimum_proficiency_level')
				->where('id_skill_list', $name_skill)
				->get('minimum_proficiency_level');

			//foreach ($get_id->result() as $value) {
			//echo $value;

			for ($i = 0; $i <= count($name_skill); $i++) {
				$data = array(
					'id_usecase' => $this->input->post('usecase'),
					'id_minimum_capability' => $name_skill[$i],
					'industry' => $this->input->post('industri'),
				);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'added',
					'name' => $this->input->post('industri'),
					'timestamp' => date("Y-m-d H:i:s")
				);

				$this->M_footnote->editFootnoteTable('54', $footnote);

				if ($this->M_otherDataTalentCapability->add_usecase_difficultly($data)) {
					if ($this->input->post('code') === 'private') {
						$this->M_auditTrail->auditTrailInsert('Talent Capability', $this->session->userdata['type']);
					}
				};
				//}

				// echo 1;
				// exit;
			}
		}
	}
	//END usecase difficultly
}
