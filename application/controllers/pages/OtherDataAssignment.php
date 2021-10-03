<?php
defined('BASEPATH') || exit('No direct script access allowed');

class OtherDataAssignment extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// DSC Members
		$this->load->model('assignments/M_otherDataAssignments');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');
		// Footnote
		$this->load->model('footnote/M_footnote');
	}

	// Other Data - Assignment Menu
	// All Other Data - Assignment List
	public function index()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Other Data - Assignments', $this->session->userdata['type']);

		$data = array(
			'category_okr' => $this->M_otherDataAssignments->get_category_okr(),
			'complexity_okr' => $this->M_otherDataAssignments->get_complexity_okr(),
			'tof_okr' => $this->M_otherDataAssignments->get_tof_okr(),
			'too_okr' => $this->M_otherDataAssignments->get_too_okr(),
			'subunit' => $this->M_otherDataAssignments->unit_tribe(),
			'footnote_category_okr' => $this->M_footnote->getFootnoteTable('40'),
			'footnote_unit' => $this->M_footnote->getFootnoteTable('55'),
			'footnote_complexity_okr' => $this->M_footnote->getFootnoteTable('41'),
			'footnote_tof_okr' => $this->M_footnote->getFootnoteTable('42'),
			'footnote_too_okr' => $this->M_footnote->getFootnoteTable('43'),
			'judul' => 'Other Data - Assignments - INSIGHT',
			'konten' => 'adm_views/other_data/otherDataTugas',
			'admModal' => [
				'assignments/adm_modal_category_okr', 'assignments/adm_modal_complexity_okr', 'assignments/adm_modal_tof_okr', 'assignments/adm_modal_too_okr',
				'assignments/adm_modal_subunit_tribe'
			],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	// @codeCoverageIgnoreStart
	public function add_data_category_okr()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_category_okr' => $this->input->post('id_category_okr'),
				'nama_category_okr' => $this->input->post('nama_category_okr')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_category_okr'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->check_nama_category_okr($this->input->post('nama_category_okr')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Category OKR exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Category OKR', $this->session->userdata['type']);
				redirect('pages/OtherDataAssignment');
			} else {
				if ($this->M_otherDataAssignments->add_category_okr($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Category OKR', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('40', $footnote);
					redirect('pages/OtherDataAssignment');
				}
			}
		}
	}

	public function edit_data_category_okr()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_category_okr' => $this->input->post('id_category_okr'),
				'nama_category_okr' => $this->input->post('nama_category_okr')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_category_okr'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_category_okr($this->input->post('id_category_okr'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Category OKR with name ' . $this->input->post('nama_category_okr') . ' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Category OKR, ID : ' . $this->input->post('id_category_okr'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('40', $footnote);
				redirect('pages/OtherDataAssignment');
			}
		}
	}

	public function delete_data_category_okr($id_category_okr)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_category_okr)) {
				redirect('pages/OtherDataAssignment');
			} else {
				$nama = $this->M_otherDataAssignments->get_nama_category_okr($id_category_okr);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_category_okr($id_category_okr)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Category OKR with ID ' . $id_category_okr . ' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Category OKR, ID : ' . $id_category_okr, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('40', $footnote);
					redirect('pages/OtherDataAssignment');
				}
			}
		}
	}
	// @codeCoverageIgnoreEnd
	// end of category_okr

	// @codeCoverageIgnoreStart
	public function add_data_complexity_okr()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_complexity_okr' => $this->input->post('id_complexity_okr'),
				'nama_complexity_okr' => $this->input->post('nama_complexity_okr')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_complexity_okr'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->check_nama_complexity_okr($this->input->post('nama_complexity_okr')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Complexity OKR exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Complexity OKR', $this->session->userdata['type']);
				redirect('pages/OtherDataAssignment');
			} else {
				if ($this->M_otherDataAssignments->add_complexity_okr($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Complexity OKR', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('41', $footnote);
					redirect('pages/OtherDataAssignment');
				}
			}
		}
	}

	public function edit_data_complexity_okr()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_complexity_okr' => $this->input->post('id_complexity_okr'),
				'nama_complexity_okr' => $this->input->post('nama_complexity_okr')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_complexity_okr'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_complexity_okr($this->input->post('id_complexity_okr'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Complexity OKR with name ' . $this->input->post('nama_complexity_okr') . ' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Complexity OKR, ID : ' . $this->input->post('id_complexity_okr'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('41', $footnote);
				redirect('pages/OtherDataAssignment');
			}
		}
	}

	public function delete_data_complexity_okr($id_complexity_okr)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_complexity_okr)) {
				redirect('pages/OtherDataAssignment');
			} else {
				$nama = $this->M_otherDataAssignments->get_nama_complexity_okr($id_complexity_okr);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_complexity_okr($id_complexity_okr)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Complexity OKR with ID ' . $id_complexity_okr . ' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Complexity OKR, ID : ' . $id_complexity_okr, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('41', $footnote);
					redirect('pages/OtherDataAssignment');
				}
			}
		}
	}
	// @codeCoverageIgnoreEnd
	//end of complexity_okr

	// @codeCoverageIgnoreStart
	public function add_data_tof_okr()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_tof_okr' => $this->input->post('id_tof_okr'),
				'nama_tof_okr' => $this->input->post('nama_tof_okr')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_tof_okr'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->check_nama_tof_okr($this->input->post('nama_tof_okr')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Formula Type exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Formula Type', $this->session->userdata['type']);
				redirect('pages/OtherDataAssignment');
			} else {
				if ($this->M_otherDataAssignments->add_tof_okr($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Formula Type', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('42', $footnote);
					redirect('pages/OtherDataAssignment');
				}
			}
		}
	}

	public function edit_data_tof_okr()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_tof_okr' => $this->input->post('id_tof_okr'),
				'nama_tof_okr' => $this->input->post('nama_tof_okr')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_tof_okr'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_tof_okr($this->input->post('id_tof_okr'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Formula Type with name ' . $this->input->post('nama_tof_okr') . ' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Formula Type, ID : ' . $this->input->post('id_tof_okr'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('42', $footnote);
				redirect('pages/OtherDataAssignment');
			}
		}
	}

	public function delete_data_tof_okr($id_tof_okr)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_tof_okr)) {
				redirect('pages/OtherDataAssignment');
			} else {
				$nama = $this->M_otherDataAssignments->get_nama_tof_okr($id_tof_okr);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_tof_okr($id_tof_okr)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Formula Type with ID ' . $id_tof_okr . ' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Formula Type, ID : ' . $id_tof_okr, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('42', $footnote);
					redirect('pages/OtherDataAssignment');
				}
			}
		}
	}
	// @codeCoverageIgnoreEnd
	//end of tof_okr

	// @codeCoverageIgnoreStart
	public function add_data_too_okr()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_too_okr' => $this->input->post('id_too_okr'),
				'nama_too_okr' => $this->input->post('nama_too_okr')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_too_okr'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->check_nama_too_okr($this->input->post('nama_too_okr')) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Output Type exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Output Type', $this->session->userdata['type']);
				redirect('pages/OtherDataAssignment');
			} else {
				if ($this->M_otherDataAssignments->add_too_okr($data) && $this->input->post('code') === 'private') {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Output Type', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('43', $footnote);
					redirect('pages/OtherDataAssignment');
				}
			}
		}
	}

	public function edit_data_too_okr()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_too_okr' => $this->input->post('id_too_okr'),
				'nama_too_okr' => $this->input->post('nama_too_okr')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_too_okr'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_too_okr($this->input->post('id_too_okr'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Output Type with name ' . $this->input->post('nama_too_okr') . ' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Output Type, ID : ' . $this->input->post('id_too_okr'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('43', $footnote);
				redirect('pages/OtherDataAssignment');
			}
		}
	}

	public function delete_data_too_okr($id_too_okr)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_too_okr)) {
				redirect('pages/OtherDataAssignment');
			} else {
				$nama = $this->M_otherDataAssignments->get_nama_too_okr($id_too_okr);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_too_okr($id_too_okr)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Output Type with ID ' . $id_too_okr . ' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Output Type, ID : ' . $id_too_okr, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('43', $footnote);
					redirect('pages/OtherDataAssignment');
				}
			}
		}
	}
	// @codeCoverageIgnoreEnd
	// end of too_okr

	// SUB UNIT TRIBE
	public function add_unit_tribe()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'unit' => $this->input->post('unit')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('unit'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->add_unit_tribe($data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data has been added</div><br>');
				$this->M_auditTrail->auditTrailDelete('Subunit Tribe ', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('55', $footnote);
				redirect('pages/OtherDataAssignment');
			}
		}
	}

	public function edit_unit_tribe()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		$id = $this->input->post('id_unit');

		if (isset($_POST)) {
			$data = array(
				'unit' => $this->input->post('unit')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('unit'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataAssignments->edit_unit_tribe($id, $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data has been edited</div><br>');
				$this->M_auditTrail->auditTrailDelete('Subunit Tribe ', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('55', $footnote);
				redirect('pages/OtherDataAssignment');
			}
		}
	}

	public function delete_unit_tribe($id)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id)) {
				redirect('pages/OtherDataAssignment');
			} else {


				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $id,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_otherDataAssignments->delete_unit_tribe($id)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Output Type with ID ' . $id . ' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Delete Subunit Tribe', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('55', $footnote);
					redirect('pages/OtherDataAssignment');
				}
			}
		}
	}
	// end
	// end of Other Data - Assignment Menu
}
