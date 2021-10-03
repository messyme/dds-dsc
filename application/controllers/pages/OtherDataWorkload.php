<?php
defined('BASEPATH') || exit('No direct script access allowed');

class OtherDataWorkload extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Workload
		$this->load->model('workload/M_otherDataWorkload');
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
		$this->M_auditTrail->auditTrailRead('Other Data - Workload', $this->session->userdata['type']);

		$data = array(
			'workload_point_member' => $this->M_otherDataWorkload->get_workload_point_member(),
			'workload_point_usecase' => $this->M_otherDataWorkload->get_workload_point_usecase(),
			'workload_threshold_member' => $this->M_otherDataWorkload->get_workload_threshold_member(),
			'workload_threshold_usecase' => $this->M_otherDataWorkload->get_workload_threshold_usecase(),
            'workload_usecase_level' => $this->M_otherDataWorkload->get_workload_usecase_level(),
            'posisi_type' => $this->M_otherDataWorkload->get_posisi_type(),
            'posisi_level' => $this->M_otherDataWorkload->get_posisi_level(),
			'footnote_workload_threshold_member' => $this->M_footnote->getFootnoteTable('60'),
			'footnote_workload_threshold_usecase' => $this->M_footnote->getFootnoteTable('59'),
			'footnote_workload_point_member' => $this->M_footnote->getFootnoteTable('58'),
			'footnote_workload_point_usecase' => $this->M_footnote->getFootnoteTable('57'),
			'footnote_workload_usecase_level' => $this->M_footnote->getFootnoteTable('56'),
			'judul' => 'Other Data - Workload - INSIGHT',
			'konten' => 'adm_views/other_data/otherDataWorkload',
			'admModal' => ['workload/adm_modal_workload_usecase_level', 'workload/adm_modal_workload_point', 'workload/adm_modal_workload_threshold'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	public function add_workload_usecase_level(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_workload_usecase_level' => $this->input->post('id_workload_usecase_level'),
				'nama_workload_usecase_level' => $this->input->post('nama_workload_usecase_level')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_workload_usecase_level'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataWorkload->check_nama_workload_usecase_level($this->input->post('nama_workload_usecase_level'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Use case level exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Use Case Level', $this->session->userdata['type']);
				redirect('pages/OtherDataWorkload');
			} else {
				if($this->M_otherDataWorkload->add_workload_usecase_level($data) && $this->input->post('code') === 'private'){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Use Case Level', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('56', $footnote);
					redirect('pages/OtherDataWorkload');
				}
			}
		}
	}

	public function edit_workload_usecase_level(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		}; 
		if(isset($_POST)){
			$data = array(
				'id_workload_usecase_level' => $this->input->post('id_workload_usecase_level'),
				'nama_workload_usecase_level' => $this->input->post('nama_workload_usecase_level')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_workload_usecase_level'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_otherDataWorkload->edit_workload_usecase_level($this->input->post('id_workload_usecase_level'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Use case level with name '.$this->input->post('nama_workload_usecase_level').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Level, ID: '.$this->input->post('id_workload_usecase_level'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('56', $footnote);
				redirect('pages/OtherDataWorkload');
			}
		}
	}

	public function delete_workload_usecase_level($id_workload_usecase_level){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($id_workload_usecase_level)){
				redirect('pages/OtherDataWorkload');
			} else {
				$nama = $this->M_otherDataWorkload->get_nama_workload_usecase_level($id_workload_usecase_level);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataWorkload->delete_workload_usecase_level($id_workload_usecase_level)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Level with ID '.$id_workload_usecase_level.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case Level, ID: '.$id_workload_usecase_level, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('56', $footnote);
					redirect('pages/OtherDataWorkload');
				}
			}
		}
	}

	public function add_workload_point_usecase(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_workload_point_usecase' => $this->input->post('id_workload_point_usecase'),
				'level' => $this->input->post('level'),
				'point' => $this->input->post('point'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('id_workload_point_usecase'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataWorkload->check_level_workload_point_usecase($this->input->post('level'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Use case workload point exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Use Case Workload Point', $this->session->userdata['type']);
				redirect('pages/OtherDataWorkload');
			} else {
				if($this->M_otherDataWorkload->add_workload_point_usecase($data) && $this->input->post('code') === 'private'){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Use Case Workload Point', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('57', $footnote);
					redirect('pages/OtherDataWorkload');
				}
			}
		}
	}

	public function edit_workload_point_usecase()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_workload_point_usecase' => $this->input->post('id_workload_point_usecase'),
				'level' => $this->input->post('level'),
				'point' => $this->input->post('point'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('id_workload_point_usecase'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataWorkload->edit_workload_point_usecase($this->input->post('id_workload_point_usecase'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID: ' . $this->input->post('id_workload_point_usecase') . ' successfully edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Workload Point, ID: ' . $this->input->post('id_workload_point_usecase'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('57', $footnote);
				redirect('pages/OtherDataWorkload');
			}
		}
	}

	public function delete_workload_point_usecase($id_workload_point_usecase){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($id_workload_point_usecase)){
				redirect('pages/OtherDataWorkload');
			} else {
				$nama = $id_workload_point_usecase;

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataWorkload->delete_workload_point_usecase($id_workload_point_usecase)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case Workload Point with ID '.$id_workload_point_usecase.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case Workload Point, ID: '.$id_workload_point_usecase, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('57', $footnote);
					redirect('pages/OtherDataWorkload');
				}
			}
		}
	}

	public function add_workload_point_member(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_workload_point_member' => $this->input->post('id_workload_point_member'),
				'posisi_type' => $this->input->post('posisi_type'),
				'posisi_level' => $this->input->post('posisi_level'),
				'point' => $this->input->post('point'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('id_workload_point_member'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataWorkload->check_level_workload_point_member($this->input->post('posisi_type'), $this->input->post('posisi_level'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Member workload point exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Use Case Workload Point', $this->session->userdata['type']);
				redirect('pages/OtherDataWorkload');
			} else {
				if($this->M_otherDataWorkload->add_workload_point_member($data) && $this->input->post('code') === 'private'){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Member Workload Point', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('58', $footnote);
					redirect('pages/OtherDataWorkload');
				}
			}
		}
	}

	public function edit_workload_point_member()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_workload_point_member' => $this->input->post('id_workload_point_member'),
				'posisi_type' => $this->input->post('posisi_type'),
				'posisi_level' => $this->input->post('posisi_level'),
				'point' => $this->input->post('point'),
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('id_workload_point_member'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataWorkload->edit_workload_point_member($this->input->post('id_workload_point_member'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID: ' . $this->input->post('id_workload_point_member') . ' successfully edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case Workload Point, ID: ' . $this->input->post('id_workload_point_member'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('58', $footnote);
				redirect('pages/OtherDataWorkload');
			}
		}
	}

	public function delete_workload_point_member($id_workload_point_member){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($id_workload_point_member)){
				redirect('pages/OtherDataWorkload');
			} else {
				$nama = $id_workload_point_member;

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataWorkload->delete_workload_point_member($id_workload_point_member)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Member Workload Point with ID '.$id_workload_point_member.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Member Workload Point, ID: '.$id_workload_point_member, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('58', $footnote);
					redirect('pages/OtherDataWorkload');
				}
			}
		}
	}

	public function delete_data_workloadthresholdmember($id_workload_threshold_member){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		}; 

		if(isset($_POST)){
			if(empty($id_workload_threshold_member)){
				redirect('pages/OtherDataWorkload');
			} else {

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataWorkload->delete_workload_threshold_member($id_workload_threshold_member)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID '.$id_workload_threshold_member.' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Workload Threshold Member, ID : '.$id_workload_threshold_member, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('60', $footnote);
					redirect('pages/OtherDataWorkload');}}}}

	public function delete_data_workloadthresholdusecase($id_workload_threshold_usecase){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		}; 

		if(isset($_POST)){
			if(empty($id_workload_threshold_usecase)){
				redirect('pages/OtherDataWorkload');
			} else {

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataWorkload->delete_workload_threshold_usecase($id_workload_threshold_usecase)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID '.$id_workload_threshold_usecase.' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Workload Threshold Usecase, ID : '.$id_workload_threshold_usecase, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('59', $footnote);
					redirect('pages/OtherDataWorkload');}}}}
	
	public function add_workload_threshold_member()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
				
		if (isset($_POST)) {
			$data = array(
				'posisi_type' => $this->input->post('id_posisi_type'),
				'posisi_level' => $this->input->post('id_posisi_level'),
				'threshold' => $this->input->post('member_threshold')
			);
				
			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('id_posisi_type'),
				'timestamp' => date("Y-m-d H:i:s")
			);
			
			if ($this->M_otherDataWorkload->add_workload_threshold_member($data) && $this->input->post('code') === 'private') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('Workload Threshold Member', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('60', $footnote);
				redirect('pages/OtherDataWorkload');
			}
		}
	}
	
	public function add_workload_threshold_usecase()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
				
		if (isset($_POST)) {
			$data = array(
				'level' => $this->input->post('id_level'),
				'threshold' => $this->input->post('usecase_threshold')
			);
				
			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('id_level'),
				'timestamp' => date("Y-m-d H:i:s")
			);
			
			if ($this->M_otherDataWorkload->add_workload_threshold_usecase($data) && $this->input->post('code') === 'private') {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('Workload Threshold usecase', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('59', $footnote);
				redirect('pages/OtherDataWorkload');
			}
		}
	}

	public function edit_workload_threshold_member()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_workload_threshold_member' => $this->input->post('id_workload_threshold_member'),
				'posisi_type' => $this->input->post('id_posisi_type'),
				'posisi_level' => $this->input->post('id_posisi_level'),
				'threshold' => $this->input->post('member_threshold')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('id_posisi_type'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataWorkload->edit_workload_threshold_member($this->input->post('id_workload_threshold_member'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Workload Threshold Member with ID ' . $this->input->post('id_workload_threshold_member') . ' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Workload Threshold Member, ID: ' . $this->input->post('id_skill_list_type'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('60', $footnote);
				redirect('pages/OtherDataWorkload');
			}
		}
	}

	public function edit_workload_threshold_usecase()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			$data = array(
				'id_workload_threshold_usecase' => $this->input->post('id_workload_threshold_usecase'),
				'level' => $this->input->post('id_level'),
				'threshold' => $this->input->post('usecase_threshold')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('id_workload_threshold_usecase'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataWorkload->edit_workload_threshold_usecase($this->input->post('id_workload_threshold_usecase'), $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Workload Threshold Usecase with ID ' . $this->input->post('id_workload_threshold_usecase') . ' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Workload Threshold Member, ID: ' . $this->input->post('id_skill_list_type'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('59', $footnote);
				redirect('pages/OtherDataWorkload');
			}
		}
	}
}
