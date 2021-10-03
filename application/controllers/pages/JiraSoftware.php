<?php
defined('BASEPATH') || exit('No direct script access allowed');

class JiraSoftware extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// DSC Members
		$this->load->model('dscMembers/M_memberDsc');
		// Jira Software
		$this->load->model('jiraSoftware/M_rewardingJira');
		$this->load->model('jiraSoftware/M_monitoringJira');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');
		// Footnote
		$this->load->model('footnote/M_footnote');
	}

	// Jira Sofware
	// Rewarding Jira
	public function index(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		}
		
		$this->M_auditTrail->auditTrailRead('Rewarding Jira', $this->session->userdata['type']);

		if(empty($this->input->get('datepicker'))){
			$data = array(
				'data_rewarding_jira' => $this->M_rewardingJira->get_data_rewarding_jira(),
				'member_dsc' => $this->M_memberDsc->get_all_member(),
				'footnote' => $this->M_footnote->getFootnoteTable('20'),
				'judul' => 'Rewarding Jira - INSIGHT',
				'konten' => 'adm_views/jiraSoftware/rewardingJira',
				'admModal' => ['jiraSoftware/adm_modal_rewardingJira'],
				'footerGraph' => []
			);
			$this->load->view('adm_layout/master', $data);
		}
		else{
			$date = $this->input->get('datepicker');
			$data = array(
				'data_rewarding_jira' => $this->M_rewardingJira->get_data_rewarding_jira_filter($date),
				'member_dsc' => $this->M_memberDsc->get_all_member(),
				'footnote' => $this->M_footnote->getFootnoteTable('20'),
				'judul' => 'Rewarding Jira - INSIGHT',
				'konten' => 'adm_views/jiraSoftware/rewardingJira',
				'admModal' => ['jiraSoftware/adm_modal_rewardingJira'],
				'footerGraph' => []
			);
			$this->load->view('adm_layout/master', $data);
		}
	}

	public function add_member_jira(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			foreach($this->input->post('multinik[]') as $nik){
				$data = array(
					'nik' => $nik,
					'date_point' => date("Y-m-d H:i:s"),
					'last_updated' => date("Y-m-d H:i:s"),
				);

				if($this->M_rewardingJira->add_data_rewarding_jira($data)){ 
					if($this->input->post('code') === 'private'){
						$this->M_auditTrail->auditTrailInsert('Member in Jira',$this->session->userdata['type']);
					}
				}

				$nama = $this->M_rewardingJira->get_nama($nik);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'added',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				$this->M_footnote->editFootnoteTable('20', $footnote);

			}
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added<?= $data ?> </div><br>');
			redirect('pages/JiraSoftware');
		}
	}

	public function delete_member_jira($id){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			if(empty($id)){
				redirect('pages/JiraSoftware');
			} else {
				$nik = $this->M_rewardingJira->get_nik($id);

				$nama = $this->M_rewardingJira->get_nama($nik);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_rewardingJira->delete_data_rewarding_jira($id)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID '.$id.' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Member in Jira, ID : '.$id, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('20', $footnote);
					redirect('pages/JiraSoftware');}}}}

	public function update_member_jira($id){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){

			$wv = round(($this->input->post('raw')*0.3)/23,2);

			$wv_noa = round(($this->input->post('raw_noa')*0.35),2);

			$average = 0;
			$a[] = $this->input->post('score1');
			$a[] = $this->input->post('score2');
			$a[] = $this->input->post('score3');
			$a[] = $this->input->post('score4');
			$a[] = $this->input->post('score5');
			$a[] = $this->input->post('score6');
			$a[] = $this->input->post('score7');
			$a[] = $this->input->post('score8');
			$a[] = $this->input->post('score9');
			$a[] = $this->input->post('score10'); 
			$a[] = $this->input->post('score11'); 
			$a[] = $this->input->post('score12'); 
			$a[] = $this->input->post('score13'); 
			$a[] = $this->input->post('score14');
			$a[] = $this->input->post('score15');  
			$a = array_filter($a);
			if(count($a)) {
				$average = round(array_sum($a)/count($a),2);
				unset($a);
			}else {
				$average = 0;
			}
			
			$wvrawmean = round($average*0.65,2);

			$pwanoa = round(($this->input->post('raw_noa')*0.35)/15,2);

			$pwalod = $wvrawmean/100;

			$totalpwa = round(($pwanoa + $pwalod)*0.7,2);

			$tmp = round(($pwanoa + $pwalod)*0.7 + ($this->input->post('raw')*0.3)/23,4);

			$ra = $tmp * 100;

			$data = array(
				'last_updated' => date("Y-m-d H:i:s"),
				'raw' => $this->input->post('raw'),
				'raw_noa' => $this->input->post('raw_noa'),
				'score1' => $this->input->post('score1'),
				'score2' => $this->input->post('score2'),
				'score3' => $this->input->post('score3'),
				'score4' => $this->input->post('score4'),
				'score5' => $this->input->post('score5'),
				'score6' => $this->input->post('score6'),
				'score7' => $this->input->post('score7'),
				'score8' => $this->input->post('score8'),
				'score9' => $this->input->post('score9'),
				'score10' => $this->input->post('score10'),
				'score11' => $this->input->post('score11'),
				'score12' => $this->input->post('score12'),
				'score13' => $this->input->post('score13'),
				'score14' => $this->input->post('score14'),
				'score15' => $this->input->post('score15'),
				'key1' => $this->input->post('key1'),
				'key2' => $this->input->post('key2'),
				'key3' => $this->input->post('key3'),
				'key4' => $this->input->post('key4'),
				'key5' => $this->input->post('key5'),
				'key6' => $this->input->post('key6'),
				'key7' => $this->input->post('key7'),
				'key8' => $this->input->post('key8'),
				'key9' => $this->input->post('key9'),
				'key10' => $this->input->post('key10'),
				'key11' => $this->input->post('key11'),
				'key12' => $this->input->post('key12'),
				'key13' => $this->input->post('key13'),
				'key14' => $this->input->post('key14'),
				'key15' => $this->input->post('key15'),
				'epic_tracking' => $this->input->post('epic_tracking'),
				'wv' => $wv,
				'wv_noa' => $wv_noa,
				'raw_mean' => $average,
				'wv_raw_mean' => $wvrawmean,
				'pwa_noa' => $pwanoa,
				'pwa_lod' => $pwalod,
				'total_pwa' => $totalpwa,
				'ra' => $ra
			);

			$nik = $this->M_rewardingJira->get_nik($id);

			$nama = $this->M_rewardingJira->get_nama($nik);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $nama,
				'timestamp' => date("Y-m-d H:i:s")
			);

			if(empty($id)){
				redirect('pages/JiraSoftware');
			} else {
				if($this->M_rewardingJira->update_data_rewarding_jira($id, $data)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited</div><br>');
					$this->M_footnote->editFootnoteTable('20', $footnote);
					redirect('pages/JiraSoftware');}}}}
	// end of Rewarding Jira

	// Monitoring Jira
	public function monitoring_jira()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Monitoring Jira', $this->session->userdata['type']);

		$data = array(
			'data_monitoring_jira' => $this->M_monitoringJira->get_data_monitoring_jira(),
			'usecase' => $this->M_monitoringJira->get_member_usecase(),
			'footnote' => $this->M_footnote->getFootnoteTable('19'),
			'judul' => 'Monitoring Jira - INSIGHT',
			'konten' => 'adm_views/jiraSoftware/monitoringjira',
			'admModal' => ['jiraSoftware/adm_modal_monitoring'],
			'footerGraph' => []
		);
		if ($this->M_monitoringJira->get_data_monitoring_jira()  !== null) {
			if ($this->M_monitoringJira->get_monitoring7days()) {
				$this->db->query("UPDATE `jiramonitoring` SET updating = 'Not Yet' WHERE last_updated >= DATE(NOW()) + INTERVAL -7 DAY AND last_updated < DATE(NOW()) + INTERVAL 0 DAY");
			}
			$update = array(
				'monitored' => date("Y-m-d H:i:s")
			);
			$this->db->set($update);
			$this->db->update('jiramonitoring');
		}
		$this->load->view('adm_layout/master', $data);
	}

	public function add_monitoring_jira()
	{
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if (isset($_POST)) {
			if ($this->input->post('todo') == "0" && $this->input->post('in_progress') == "0" && $this->input->post('done') == "0") {

				$data = array(
					'id_usecase' => $this->input->post('id_usecase'),
					'key' => $this->input->post('key'),
					'kanban' => $this->input->post('kanban'),
					'todo' => $this->input->post('todo'),
					'in_progress' => $this->input->post('in_progress'),
					'done' => $this->input->post('done'),
					'last_updated' => date("Y-m-d H:i:s"),
					'performance' => 'Not Performed',
					'updating' => 'Updated',

				);

				$nama = $this->M_monitoringJira->get_nama_usecase($this->input->post('id_usecase'));

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'added',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				$this->M_footnote->editFootnoteTable('19', $footnote);

				if ($this->M_monitoringJira->add_data_monitoring_jira($data)) {
					if ($this->input->post('code') === 'private') {
						$this->M_auditTrail->auditTrailInsert('Monitoring in Jira', $this->session->userdata['type']);
					}
				}
			} else {
				$data = array(
					'id_usecase' => $this->input->post('id_usecase'),
					'key' => $this->input->post('key'),
					'kanban' => $this->input->post('kanban'),
					'todo' => $this->input->post('todo'),
					'in_progress' => $this->input->post('in_progress'),
					'done' => $this->input->post('done'),
					'last_updated' => date("Y-m-d H:i:s"),
					'performance' => 'Performed',
					'updating' => 'Updated'
				);

				$nama = $this->M_monitoringJira->get_nama_usecase($this->input->post('id_usecase'));

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'added',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);
				
				$this->M_footnote->editFootnoteTable('19', $footnote);

				if ($this->M_monitoringJira->add_data_monitoring_jira($data)) {
					if ($this->input->post('code') === 'private') {
						$this->M_auditTrail->auditTrailInsert('Monitoring in Jira', $this->session->userdata['type']);
					}
				}
			}

			if ($this->M_monitoringJira->get_data_monitoring_jira()  !== null) {
				if ($this->M_monitoringJira->get_monitoring7days()) {

					$this->db->query("UPDATE `jiramonitoring` SET updating = 'Not Yet' WHERE last_updated >= DATE(NOW()) + INTERVAL -7 DAY AND last_updated < DATE(NOW()) + INTERVAL 0 DAY");
				}
				$update = array(
					'monitored' => date("Y-m-d H:i:s")
				);
				$this->db->set($update);
				$this->db->update('jiramonitoring');
			}
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
			redirect('pages/JiraSoftware/monitoring_jira');
		}
	}

	public function update_monitoring()
	{
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if (isset($_POST)) {
			if ($this->input->post('todo') == "0" && $this->input->post('in_progress') == "0" && $this->input->post('done') == "0") {

				$data = array(
					'id_jiramonitor' => $this->input->post('id_jiramonitor'),
					'id_usecase' => $this->input->post('id_usecase'),
					'key' => $this->input->post('key'),
					'kanban' => $this->input->post('kanban'),
					'todo' => $this->input->post('todo'),
					'in_progress' => $this->input->post('in_progress'),
					'done' => $this->input->post('done'),
					'last_updated' => date("Y-m-d H:i:s"),
					'performance' => 'Not Performed',
					'updating' => 'Updated',
				);

				$nama = $this->M_monitoringJira->get_nama_usecase($this->input->post('id_usecase'));

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'edited',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_monitoringJira->update_monitoring($this->input->post('id_jiramonitor'),  $data)) {
					$this->M_footnote->editFootnoteTable('19', $footnote);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited</div><br>');
					$this->M_auditTrail->auditTrailUpdate('Jira Monitoring, id_jiramonitor : ' . $this->input->post('id_jiramonitor'), $this->session->userdata['type']);
					if ($this->M_monitoringJira->get_data_monitoring_jira()  !== null) {
						if ($this->M_monitoringJira->get_monitoring7days()) {
							$this->db->query("UPDATE `jiramonitoring` SET updating = 'Not Yet' WHERE last_updated >= DATE(NOW()) + INTERVAL -7 DAY AND last_updated < DATE(NOW()) + INTERVAL 0 DAY");
						}
						$update = array(
							'monitored' => date("Y-m-d H:i:s")
						);
						$this->db->set($update);
						$this->db->update('jiramonitoring');
					}
					redirect('pages/JiraSoftware/monitoring_jira');
				}
			} else {
				$data = array(
					'id_usecase' => $this->input->post('id_usecase'),
					'key' => $this->input->post('key'),
					'kanban' => $this->input->post('kanban'),
					'todo' => $this->input->post('todo'),
					'in_progress' => $this->input->post('in_progress'),
					'done' => $this->input->post('done'),
					'last_updated' => date("Y-m-d H:i:s"),
					'performance' => 'Performed',
					'updating' => 'Updated',
				);

				$nama = $this->M_monitoringJira->get_nama_usecase($this->input->post('id_usecase'));

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'edited',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_monitoringJira->update_monitoring($this->input->post('id_jiramonitor'),  $data)) {
					$this->M_footnote->editFootnoteTable('19', $footnote);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited </div><br>');
					$this->M_auditTrail->auditTrailUpdate('Jira Monitoring, id_jiramonitor : ' . $this->input->post('id_jiramonitor'), $this->session->userdata['type']);
					if ($this->M_monitoringJira->get_data_monitoring_jira()  !== null) {
						if ($this->M_monitoringJira->get_monitoring7days()) {
							$this->db->query("UPDATE `jiramonitoring` SET updating = 'Not Yet' WHERE last_updated >= DATE(NOW()) + INTERVAL -7 DAY AND last_updated < DATE(NOW()) + INTERVAL 0 DAY");
						}
						$update = array(
							'monitored' => date("Y-m-d H:i:s")
						);
						$this->db->set($update);
						$this->db->update('jiramonitoring');
					}
					redirect('pages/JiraSoftware/monitoring_jira');
				}
			}


			if ($this->M_monitoringJira->get_data_monitoring_jira()  !== null) {
				if ($this->M_monitoringJira->get_monitoring7days()) {
					$this->db->query("UPDATE `jiramonitoring` SET updating = 'Not Yet' WHERE last_updated >= DATE(NOW()) + INTERVAL -7 DAY AND last_updated < DATE(NOW()) + INTERVAL 0 DAY");
				}
				$update = array(
					'monitored' => date("Y-m-d H:i:s")
				);
				$this->db->set($update);
				$this->db->update('jiramonitoring');
			}
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
			redirect('pages/JiraSoftware/monitoring_jira');
		}
	}

	public function delete_monitoring_jira($id_jiramonitor)
	{
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if (isset($_POST)) {
			if (empty($id_jiramonitor)) {
				redirect('pages/JiraSoftware/monitoring_jira');
			} else {
				$id_usecase = $this->M_monitoringJira->get_id_usecase($id_jiramonitor);

				$nama = $this->M_monitoringJira->get_nama_usecase($id_usecase);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if ($this->M_monitoringJira->delete_data_monitoring_jira($id_jiramonitor)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID ' . $id_jiramonitor . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Monitoring in Jira, ID : ' . $id_jiramonitor, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('19', $footnote);
					redirect('pages/JiraSoftware/monitoring_jira');
				}
			}
		}

		if ($this->M_monitoringJira->get_data_monitoring_jira()  !== null) {
			if ($this->M_monitoringJira->get_monitoring7days()) {

				$this->db->query("UPDATE `jiramonitoring` SET updating = 'Not Yet' WHERE last_updated >= DATE(NOW()) + INTERVAL -7 DAY AND last_updated < DATE(NOW()) + INTERVAL 0 DAY");
			}
			$update = array(
				'monitored' => date("Y-m-d H:i:s")
			);
			$this->db->set($update);
			$this->db->update('jiramonitoring');
		}
	}
	// end of Monitoring Jira
	// end of Jira Sofware
}
