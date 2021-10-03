<?php
defined('BASEPATH') || exit('No direct script access allowed');

class OtherDataDscMembers extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// DSC Members
		$this->load->model('dscMembers/M_otherDataMember');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');
		// Footnote
		$this->load->model('footnote/M_footnote');
	}

	// Other Data - DSC Member Menu
	// All Other Data - DSC Member List
	public function index(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Other Data - DSC Members', $this->session->userdata['type']);

		$data = array(
			'status' => $this->M_otherDataMember->get_status(),
			'posisi' => $this->M_otherDataMember->get_posisi(),
			'posisi_level' => $this->M_otherDataMember->get_posisi_level(),
			'posisi_type' => $this->M_otherDataMember->get_posisi_type(),
			'band' => $this->M_otherDataMember->get_band(),
			'universitas' => $this->M_otherDataMember->get_universitas(),
			'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
			'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
			'cluster_ed_selected' => '',
			'ed_bg_selected' => '',
			'footnote_status' => $this->M_footnote->getFootnoteTable('5'),
			'footnote_posisi' => $this->M_footnote->getFootnoteTable('6'),
			'footnote_posisi_level' => $this->M_footnote->getFootnoteTable('45'),
			'footnote_posisi_type' => $this->M_footnote->getFootnoteTable('46'),
			'footnote_band' => $this->M_footnote->getFootnoteTable('7'),
			'footnote_universitas' => $this->M_footnote->getFootnoteTable('8'),
			'footnote_cluster_ed' => $this->M_footnote->getFootnoteTable('44'),
			'footnote_ed_bg' => $this->M_footnote->getFootnoteTable('22'),
			'judul' => 'Other Data - DSC Members - INSIGHT',
			'konten' => 'adm_views/other_data/otherDataMembers',
			'admModal' => ['dscMember/adm_modal_status','dscMember/adm_modal_posisi','dscMember/adm_modal_band','dscMember/adm_modal_universitas','dscMember/adm_modal_posisi_level','dscMember/adm_modal_posisi_type','dscMember/adm_modal_educationBackground', 'dscMember/adm_modal_clusterEducation'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	// @codeCoverageIgnoreStart
	public function add_data_status(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_status' => $this->input->post('id_status'),
				'nama_status' => $this->input->post('nama_status')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_status'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataMember->check_nama_status($this->input->post('nama_status'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Status exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Status', $this->session->userdata['type']);
				redirect('pages/OtherDataDscMembers');
			} else {
				if($this->M_otherDataMember->add_status($data) && $this->input->post('code') === 'private'){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Status', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('5', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}

	public function edit_data_status(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		}; 
		if(isset($_POST)){
			$data = array(
				'id_status' => $this->input->post('id_status'),
				'nama_status' => $this->input->post('nama_status')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_status'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_otherDataMember->edit_status($this->input->post('id_status'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Status with name '.$this->input->post('nama_status').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Status, ID : '.$this->input->post('id_status'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('5', $footnote);
				redirect('pages/OtherDataDscMembers');}}}
	
	public function delete_data_status($id_status){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($id_status)){
				redirect('pages/OtherDataDscMembers');
			} else {
				$nama = $this->M_otherDataMember->get_nama_status($id_status);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataMember->delete_status($id_status)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Status with ID '.$id_status.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Status, ID : '.$id_status, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('5', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}
	// @codeCoverageIgnoreEnd
	// end of Status

	// @codeCoverageIgnoreStart
	public function add_data_posisi(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_posisi' => $this->input->post('id_posisi'),
				'nama_posisi' => $this->input->post('nama_posisi')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_posisi'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataMember->check_nama_posisi($this->input->post('nama_posisi'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Position exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Positions', $this->session->userdata['type']);
				redirect('pages/OtherDataDscMembers');
			} else {
				if($this->M_otherDataMember->add_posisi($data) && $this->input->post('code') === 'private'){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Positions', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('6', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}

	public function edit_data_posisi(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_posisi' => $this->input->post('id_posisi'),
				'nama_posisi' => $this->input->post('nama_posisi')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_posisi'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_otherDataMember->edit_posisi($this->input->post('id_posisi'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Position with name '.$this->input->post('nama_posisi').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Positions, ID : '.$this->input->post('id_posisi'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('6', $footnote);
				redirect('pages/OtherDataDscMembers');}}}
	
	public function delete_data_posisi($id_posisi){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($id_posisi)){
				redirect('pages/OtherDataDscMembers');
			} else {
				$nama = $this->M_otherDataMember->get_nama_posisi($id_posisi);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataMember->delete_posisi($id_posisi)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Position with ID '.$id_posisi.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Positions, ID : '.$id_posisi, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('6', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}
	// @codeCoverageIgnoreEnd
	//end of Posisi

	public function add_data_posisi_level(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_posisi_level' => $this->input->post('id_posisi_level'),
				'nama_posisi_level' => $this->input->post('nama_posisi_level')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_posisi_level'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataMember->check_nama_posisi_level($this->input->post('nama_posisi_level'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Position Level exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Position Level', $this->session->userdata['type']);
				redirect('pages/OtherDataDscMembers');
			} else {
				if($this->M_otherDataMember->add_posisi_level($data) && $this->input->post('code') === 'private'){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Position Level', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('45', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}

	public function edit_data_posisi_level(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_posisi_level' => $this->input->post('id_posisi_level'),
				'nama_posisi_level' => $this->input->post('nama_posisi_level')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_posisi_level'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_otherDataMember->edit_posisi_level($this->input->post('id_posisi_level'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Position Level with name '.$this->input->post('nama_posisi_level').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Position Level, ID : '.$this->input->post('id_posisi_level'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('45', $footnote);
				redirect('pages/OtherDataDscMembers');}}}
	
	public function delete_data_posisi_level($id_posisi_level){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($id_posisi_level)){
				redirect('pages/OtherDataDscMembers');
			} else {
				$nama = $this->M_otherDataMember->get_nama_posisi_level($id_posisi_level);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataMember->delete_posisi_level($id_posisi_level)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Position Level with ID '.$id_posisi_level.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Position Level, ID : '.$id_posisi_level, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('45', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}
	// @codeCoverageIgnoreEnd
	//end of posisi_level

	public function add_data_posisi_type(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_posisi_type' => $this->input->post('id_posisi_type'),
				'nama_posisi_type' => $this->input->post('nama_posisi_type')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_posisi_type'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataMember->check_nama_posisi_type($this->input->post('nama_posisi_type'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Position Type exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Position Type', $this->session->userdata['type']);
				redirect('pages/OtherDataDscMembers');
			} else {
				if($this->M_otherDataMember->add_posisi_type($data) && $this->input->post('code') === 'private'){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Position Type', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('46', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}

	public function edit_data_posisi_type(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_posisi_type' => $this->input->post('id_posisi_type'),
				'nama_posisi_type' => $this->input->post('nama_posisi_type')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_posisi_type'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_otherDataMember->edit_posisi_type($this->input->post('id_posisi_type'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Position Type with name '.$this->input->post('nama_posisi_type').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Position Type, ID : '.$this->input->post('id_posisi_type'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('46', $footnote);
				redirect('pages/OtherDataDscMembers');}}}
	
	public function delete_data_posisi_type($id_posisi_type){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($id_posisi_type)){
				redirect('pages/OtherDataDscMembers');
			} else {
				$nama = $this->M_otherDataMember->get_nama_posisi_type($id_posisi_type);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataMember->delete_posisi_type($id_posisi_type)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Position Type with ID '.$id_posisi_type.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Position Type, ID : '.$id_posisi_type, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('46', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}
	// @codeCoverageIgnoreEnd
	//end of posisi_type

	// @codeCoverageIgnoreStart
	public function add_data_band(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_band' => $this->input->post('id_band'),
				'nama_band' => $this->input->post('nama_band')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_band'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataMember->check_nama_band($this->input->post('nama_band'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Band exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Band', $this->session->userdata['type']);
				redirect('pages/OtherDataDscMembers');
			}else{
				if($this->M_otherDataMember->add_band($data) && $this->input->post('code') === 'private'){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Band', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('7', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}

	public function edit_data_band(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_band' => $this->input->post('id_band'),
				'nama_band' => $this->input->post('nama_band')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_band'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_otherDataMember->edit_band($this->input->post('id_band'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Band with name '.$this->input->post('nama_band').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Band, ID : '.$this->input->post('id_band'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('7', $footnote);
				redirect('pages/OtherDataDscMembers');}}}
	
	public function delete_data_band($id_band){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($id_band)){
				redirect('pages/OtherDataDscMembers');
			} else {
				$nama = $this->M_otherDataMember->get_nama_band($id_band);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataMember->delete_band($id_band)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Band with ID '.$id_band.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Band, ID : '.$id_band, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('7', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}
	// @codeCoverageIgnoreEnd
	//end of Band

	// @codeCoverageIgnoreStart
	public function add_data_univ(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'kode_universitas' => $this->input->post('kode_universitas'),
				'nama_universitas' => $this->input->post('nama_universitas')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_universitas'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataMember->check_nama_univ($this->input->post('nama_universitas'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">University exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('University', $this->session->userdata['type']);
				redirect('pages/OtherDataDscMembers');
			} else {
				if($this->M_otherDataMember->add_univ($data) && $this->input->post('code') === 'private'){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('University', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('8', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}

	public function edit_data_univ(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'kode_universitas' => $this->input->post('kode_universitas'),
				'nama_universitas' => $this->input->post('nama_universitas')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_universitas'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_otherDataMember->edit_univ($this->input->post('kode_universitas'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">University with name '.$this->input->post('nama_universitas').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('University, ID : '.$this->input->post('kode_universitas'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('8', $footnote);
				redirect('pages/OtherDataDscMembers');}}}
	
	public function delete_data_univ($kode_universitas){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($kode_universitas)){
				redirect('pages/OtherDataDscMembers');
			} else {
				$nama = $this->M_otherDataMember->get_nama_univ($kode_universitas);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataMember->delete_univ($kode_universitas)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">University with ID '.$kode_universitas.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('University, ID : '.$kode_universitas, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('8', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}
	// @codeCoverageIgnoreEnd
	// end of Universitas

	// @codeCoverageIgnoreStart
	public function add_data_cluster_ed(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_cluster_ed' => $this->input->post('id_cluster_ed'),
				'cluster_ed_desc' => $this->input->post('cluster_ed_desc')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('cluster_ed_desc'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataMember->check_nama_cluster_ed($this->input->post('cluster_ed_desc'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Cluster education exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Cluster Education', $this->session->userdata['type']);
				redirect('pages/OtherDataDscMembers');
			}else{
				if($this->M_otherDataMember->add_cluster_ed($data) && $this->input->post('code') === 'private'){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Cluster Education', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('44', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}

	public function edit_data_cluster_ed(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_cluster_ed' => $this->input->post('id_cluster_ed'),
				'cluster_ed_desc' => $this->input->post('cluster_ed_desc')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('cluster_ed_desc'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_otherDataMember->edit_cluster_ed($this->input->post('id_cluster_ed'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Cluster education with name '.$this->input->post('cluster_ed_desc').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Cluster Education, ID : '.$this->input->post('id_cluster_ed'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('44', $footnote);
				redirect('pages/OtherDataDscMembers');}}}
	
	public function delete_data_cluster_ed($id_cluster_ed){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($id_cluster_ed)){
				redirect('pages/OtherDataDscMembers');
			} else {
				$nama = $this->M_otherDataMember->get_nama_cluster_ed($id_cluster_ed);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataMember->delete_cluster_ed($id_cluster_ed)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Cluster education with ID '.$id_cluster_ed.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Cluster Education, ID : '.$id_cluster_ed, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('44', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}
	// @codeCoverageIgnoreEnd
	//end of Cluster Education

	// @codeCoverageIgnoreStart
	public function add_data_ed_bg(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_ed_bg' => $this->input->post('id_ed_bg'),
				'id_cluster_ed' => $this->input->post('id_cluster_ed'),
				'ed_bg_desc' => $this->input->post('ed_bg_desc')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('ed_bg_desc'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_otherDataMember->check_nama_ed_bg($this->input->post('ed_bg_desc'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Education background exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Education Background', $this->session->userdata['type']);
				redirect('pages/OtherDataDscMembers');
			}else{
				if($this->M_otherDataMember->add_ed_bg($data) && $this->input->post('code') === 'private'){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Education Background', $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('22', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}

	public function edit_data_ed_bg(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'id_ed_bg' => $this->input->post('id_ed_bg'),
				'id_cluster_ed' => $this->input->post('id_cluster_ed'),
				'ed_bg_desc' => $this->input->post('ed_bg_desc')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('ed_bg_desc'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_otherDataMember->edit_ed_bg($this->input->post('id_ed_bg'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Education background with name '.$this->input->post('ed_bg_desc').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Education Background, ID : '.$this->input->post('id_ed_bg'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('22', $footnote);
				redirect('pages/OtherDataDscMembers');}}}
	
	public function delete_data_ed_bg($id_ed_bg){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($id_ed_bg)){
				redirect('pages/OtherDataDscMembers');
			} else {
				$nama = $this->M_otherDataMember->get_nama_ed_bg($id_ed_bg);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_otherDataMember->delete_ed_bg($id_ed_bg)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Education background with ID '.$id_ed_bg.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Education Background, ID : '.$id_ed_bg, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('22', $footnote);
					redirect('pages/OtherDataDscMembers');}}}}
	// @codeCoverageIgnoreEnd
	//end of Education Background
	// end of Other Data - DSC Member Menu
}
?>
