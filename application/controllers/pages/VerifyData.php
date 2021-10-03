<?php
defined('BASEPATH') || exit('No direct script access allowed');

class VerifyData extends CI_Controller {

	public function __construct(){
		parent::__construct(); 
        // Load Model Auth
		$this->load->model('auth/M_auth');
		$this->load->model('auth/M_auditTrail');

        // Member Dsc
        $this->load->model('dscMembers/M_memberDsc');

        // Data Account
        $this->load->model('dataAccount/M_dataAccount');

        // Dsc Member
		$this->load->model('dscMembers/M_otherDataMember');
	}

	public function index(){
        if($this->session->userdata('role') == 'user_logged_in'){
            redirect('/Err404');
        };

        $nik = $this->session->userdata['username'];

        $memberdsc = $this->M_memberDsc->check_nik_member($this->session->userdata['username']);
        $verify_data = $this->M_memberDsc->get_verify_data($this->session->userdata['username']);

        if(($verify_data == 1 or $verify_data == 2) and $memberdsc > 0){
            redirect('pages/Home');
        }

        $data = array(
            'member_dsc' => $this->M_memberDsc->get_detail_member($nik),
            'status' => $this->M_otherDataMember->get_status(),
			'posisi' => $this->M_otherDataMember->get_posisi(),
            'posisi_type' => $this->M_otherDataMember->get_posisi_type(),
            'posisi_level' => $this->M_otherDataMember->get_posisi_level(),
			'band' => $this->M_otherDataMember->get_band(),
			'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
			'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
        );

        $this->load->view('adm_views/auth/verifyData', $data);
	}

    public function verify(){
        if($this->session->userdata('role') == 'user_logged_in'){
            redirect('/Err404');
        };

        if(isset($_POST)){
            $nik = $this->session->userdata['username'];

            $data = array(
                'nik' => $nik,
                'nama_member' => $this->input->post('nama_member'),
                'id_status' => $this->input->post('id_status'),
                'id_posisi' => $this->input->post('id_posisi'),
                'id_posisi_type' => $this->input->post('id_posisi_type'),
                'id_posisi_level' => $this->input->post('id_posisi_level'),
                'id_band' => $this->input->post('id_band'),
                'id_cluster_ed' => $this->input->post('id_cluster_ed'),
                'id_ed_bg' => $this->input->post('id_ed_bg'),
                'verify_data' => 1,
            );

            if($this->M_memberDsc->edit_member_dsc($nik, $data)){
                redirect('pages/Home');
            }

        }

    }   

}
