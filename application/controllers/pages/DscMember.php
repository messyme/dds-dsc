<?php
defined('BASEPATH') || exit('No direct script access allowed');

class DscMember extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// DSC Members
		$this->load->model('dscMembers/M_memberDsc');
		$this->load->model('dscMembers/M_apprentice');
		$this->load->model('dscMembers/M_otherDataMember');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');
		// Footnote
		$this->load->model('footnote/M_footnote');
        // Training & Certification
        $this->load->model('trainedCertifiedMember/M_trainedMember');
        $this->load->model('trainedCertifiedMember/M_certifiedMember');
        // Usecase
        $this->load->model('assignments/M_otherDataAssignments');
		$this->load->model('assignments/M_memberInAssignments');
	}

	// DSC Member Menu
	// All Member DSC List
	public function index(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
		redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('All DSC Member', $this->session->userdata['type']);

		$data = array(
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'status' => $this->M_otherDataMember->get_status(),
			'posisi' => $this->M_otherDataMember->get_posisi(),
			'posisi_level' => $this->M_otherDataMember->get_posisi_level(),
			'posisi_type' => $this->M_otherDataMember->get_posisi_type(),
			'band' => $this->M_otherDataMember->get_band(),
			'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
			'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
			'cluster_ed_selected' => '',
			'ed_bg_selected' => '',
			'footnote' => $this->M_footnote->getFootnoteTable('1'),
			'judul' => 'DSC Members - INSIGHT',
			'konten' => 'adm_views/dscMember/memberDscList',
			'admModal' => ['dscMember/adm_modal_memberDsc'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	public function member_dsc($nik){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
        }
        $this->M_auditTrail->auditTrailRead('Detail Member DSC dengan NIK '.$nik, $this->session->userdata['type']);

        $data = array(
            'member_dsc' => $this->M_memberDsc->get_detail_member($nik),
            'training' => $this->M_trainedMember->get_trained_member_detail($nik),
            'certification' => $this->M_certifiedMember->get_certified_member_detail($nik),
            'usecase' => $this->M_otherDataAssignments->get_member_detail_usecase($nik),
            'subordinate_internship' => $this->M_apprentice->get_member_internship_leader($nik),
            'usulan' => $this->M_memberDsc->get_usulan_training($nik),
            'usulan_cert' => $this->M_memberDsc->get_usulan_certification($nik),
            'project_history' => $this->M_memberDsc->get_project_history($nik),
            'asesor' => $this->M_memberDsc->get_asesor($nik),
            'all_member' => $this->M_memberDsc->get_all_member_asesor($nik),
            'subordinate' => $this->M_memberDsc->get_subordinate($nik),
            'pathway' => $this->M_certifiedMember->get_pathway(),
			'footnoteTrainingSuggestion' => $this->M_footnote->getFootnoteTable('23'),
			'footnoteProjectHistory' => $this->M_footnote->getFootnoteTable('24'),
            'footnoteAsesor' => $this->M_footnote->getFootnoteTable('25'),
            'footnoteSubordinate' => $this->M_footnote->getFootnoteTable('26'),
			'footnoteCertificationSuggestion' => $this->M_footnote->getFootnoteTable('31'),
            'status' => $this->M_otherDataMember->get_status(),
            'posisi' => $this->M_otherDataMember->get_posisi(),
			'posisi_level' => $this->M_otherDataMember->get_posisi_level(),
			'posisi_type' => $this->M_otherDataMember->get_posisi_type(),
            'band' => $this->M_otherDataMember->get_band(),
            'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
			'okr_member' => $this->M_otherDataAssignments->get_okr_member_by_nik($nik),
			'avg_okr_member' => $this->M_otherDataAssignments->get_avg_progress_okr_member_by_nik($nik),
            'judul' => 'DSC Members - Data Science Chapter',
            'konten' => 'adm_views/dscMember/detailMember',
            'admModal' => ['dscMember/adm_modal_detailmemberDsc'],
            'footerGraph' => []
        );

        $this->load->view('adm_layout/master', $data);
	}

    public function add_data_subordinate(){
        if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
        }

        if(isset($_POST)){
            $data = array(
				'nik_superior' => $this->input->post('nik_superior'),
				'nik_subordinate' => $this->input->post('nik_subordinate'),
			);

            $nama = $this->M_memberDsc->get_nama($this->input->post('nik_subordinate'));

            $footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $nama,
				'timestamp' => date("Y-m-d H:i:s")
			);

            if($this->M_memberDsc->add_subordinate($data)){
                $this->session->set_flashdata('msgSubordinate', '<div class="alert alert-success">New Data has been added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('Subordinate Member', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('26', $footnote);
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik_superior'));
            };
        }
    }

    public function delete_data_subordinate($id_superior_subordinate){
        if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

        if(isset($_POST)){
            if(empty($id_superior_subordinate)){
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik_superior'));
            } else {

                $nama = $this->M_memberDsc->get_nama($this->input->post('nik_subordinate'));

                $footnote = array(
                    'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
                );

                if($this->M_memberDsc->delete_subordinate($id_superior_subordinate)){
                    $this->session->set_flashdata('msgSubordinate', '<div class="alert alert-success">Subordinate Data with ID '.$id_superior_subordinate.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Subordinate Member, ID : '.$id_superior_subordinate, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('26', $footnote);
                    redirect('pages/DscMember/member_dsc/'.$this->input->post('nik_superior'));
                }
            }
        }
    }

    public function add_data_asesor(){
        if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
        }

        if(isset($_POST)){
            $data = array(
				'nik_penilai' => $this->input->post('nik_penilai'),
				'nik_dinilai' => $this->input->post('nik_dinilai'),
				'nilai' => $this->input->post('nilai'),
			);

            $nama = $this->M_memberDsc->get_nama($this->input->post('nik_penilai'));

            $footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $nama,
				'timestamp' => date("Y-m-d H:i:s")
			);

            if($this->M_memberDsc->add_asesor($data)){
                $this->session->set_flashdata('msgAsesor', '<div class="alert alert-success">New data has been added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('Asesor Member', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('25', $footnote);
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik_dinilai'));
            };
        }
    }

    public function edit_data_asesor(){
        if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
        }

        if(isset($_POST)){
            $data = array(
				'nik_penilai' => $this->input->post('nik_penilai'),
				'nik_dinilai' => $this->input->post('nik_dinilai'),
				'nilai' => $this->input->post('nilai'),
			);

            $nama = $this->M_memberDsc->get_nama($this->input->post('nik_penilai'));

            $footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $nama,
				'timestamp' => date("Y-m-d H:i:s")
			);

            if($this->M_memberDsc->edit_asesor($this->input->post('id_asesor'), $data)){
                $this->session->set_flashdata('msgAsesor', '<div class="alert alert-success">Assessor with name '.$nama.' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Asesor Member, ID : '.$this->input->post('id_asesor'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('25', $footnote);
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik_dinilai'));
            }
        }
    }

    public function delete_data_asesor($id_asesor){
        if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

        if(isset($_POST)){
            if(empty($id_asesor)){
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik_dinilai'));
            } else {

                $nama = $this->M_memberDsc->get_nama($this->input->post('nik_penilai'));

                $footnote = array(
                    'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
                );

                if($this->M_memberDsc->delete_asesor($id_asesor)){
                    $this->session->set_flashdata('msgAsesor', '<div class="alert alert-success">Assessor with ID '.$id_asesor.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Asesor Member, ID : '.$id_asesor, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('25', $footnote);
                    redirect('pages/DscMember/member_dsc/'.$this->input->post('nik_dinilai'));
                }
            }
        }
    }

    public function add_data_project_history(){
        if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
        }

        if(isset($_POST)){
            $data = array(
				'nik' => $this->input->post('nik'),
				'project_name' => $this->input->post('project_name'),
				'date_start' => $this->input->post('date_start'),
				'date_end' => $this->input->post('date_end'),
                'project_role' => $this->input->post('project_role')
			);

            $footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('project_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

            if($this->M_memberDsc->add_project_history($data)){
                $this->session->set_flashdata('msgProjectHistory', '<div class="alert alert-success">New data has been added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('Project History Member', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('24', $footnote);
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
            };
        }
    }

    public function edit_data_project_history(){
        if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
        }

        if(isset($_POST)){
            $data = array(
				'nik' => $this->input->post('nik'),
				'project_name' => $this->input->post('project_name'),
				'date_start' => $this->input->post('date_start'),
				'date_end' => $this->input->post('date_end'),
                'project_role' => $this->input->post('project_role') 
			);

            $footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('project_name'),
				'timestamp' => date("Y-m-d H:i:s")
			);

            if($this->M_memberDsc->edit_project_history($this->input->post('id_project_history'), $data)){
                $this->session->set_flashdata('msgProjectHistory', '<div class="alert alert-success">Project history with name '.$this->input->post('project_name').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Project History Member, ID : '.$this->input->post('id_project_history'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('24', $footnote);
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
            }
        }
    }

    public function delete_data_project_history($id_project_history){
        if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

        if(isset($_POST)){
            if(empty($id_project_history)){
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
            } else {
                $nama = $this->M_memberDsc->get_nama_project_history($this->input->post('id_project_history'));

                $footnote = array(
                    'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
                );

                if($this->M_memberDsc->delete_project_history($id_project_history)){
                    $this->session->set_flashdata('msgProjectHistory', '<div class="alert alert-success">Project history with ID '.$id_project_history.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Project History Member, ID : '.$id_project_history, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('24', $footnote);
                    redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
                }
            }
        }
    }

    public function add_data_usulan_training(){
        if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
        }

        if(isset($_POST)){
            $data = array(
				'nik' => $this->input->post('nik'),
				'nama_training' => $this->input->post('nama_training'),
                'id_pathway' => $this->input->post('id_pathway'),
				'training_source' => $this->input->post('training_source'),
				'kuartal' => $this->input->post('kuartal'),
                'year' => $this->input->post('year')
			);

            $footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_training'),
				'timestamp' => date("Y-m-d H:i:s")
			);

            if($this->M_memberDsc->add_usulan_training($data)){
                $this->session->set_flashdata('msgTrainingSuggestion', '<div class="alert alert-success">New data has been added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('Proposed Training Member', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('23', $footnote);
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
            };
        }
    }

    public function edit_data_usulan_training(){
        if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
        }

        if(isset($_POST)){
            $data = array(
				'nik' => $this->input->post('nik'),
				'nama_training' => $this->input->post('nama_training'),
                'id_pathway' => $this->input->post('id_pathway'),
				'training_source' => $this->input->post('training_source'),
				'kuartal' => $this->input->post('kuartal'),
                'year' => $this->input->post('year')
			);

            $footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_training'),
				'timestamp' => date("Y-m-d H:i:s")
			);

            if($this->M_memberDsc->edit_usulan_training($this->input->post('id_usulan'), $data)){
                $this->session->set_flashdata('msgTrainingSuggestion', '<div class="alert alert-success">Proposed training with name '.$this->input->post('nama_training').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Proposed Training Member, ID : '.$this->input->post('id_usulan'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('23', $footnote);
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
            }
        }
    }

    public function delete_data_usulan_training($id_usulan){
        if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

        if(isset($_POST)){
            if(empty($id_usulan)){
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
            } else {
                $nama = $this->M_memberDsc->get_nama_usulan_training($this->input->post('id_usulan'));

                $footnote = array(
                    'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
                );

                if($this->M_memberDsc->delete_usulan_training($id_usulan)){
                    $this->session->set_flashdata('msgTrainingSuggestion', '<div class="alert alert-success">Proposed training with ID '.$id_usulan.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Proposed Training Member, ID : '.$id_usulan, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('23', $footnote);
                    redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
                }
            }
        }
    }

    public function add_data_usulan_certification(){
        if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
        }

        if(isset($_POST)){
            $data = array(
				'nik' => $this->input->post('nik'),
				'nama_certification' => $this->input->post('nama_certification'),
                'id_pathway' => $this->input->post('id_pathway'),
				'certification_source' => $this->input->post('certification_source'),
				'kuartal' => $this->input->post('kuartal'),
                'year' => $this->input->post('year')
			);

            $footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_certification'),
				'timestamp' => date("Y-m-d H:i:s")
			);

            if($this->M_memberDsc->add_usulan_certification($data)){
                $this->session->set_flashdata('msgCertificationSuggestion', '<div class="alert alert-success">New data has been added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('Proposed Certification Member', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('31', $footnote);
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
            };
        }
    }

    public function edit_data_usulan_certification(){
        if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
        }

        if(isset($_POST)){
            $data = array(
				'nik' => $this->input->post('nik'),
				'nama_certification' => $this->input->post('nama_certification'),
                'id_pathway' => $this->input->post('id_pathway'),
				'certification_source' => $this->input->post('certification_source'),
				'kuartal' => $this->input->post('kuartal'),
                'year' => $this->input->post('year')
			);

            $footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_certification'),
				'timestamp' => date("Y-m-d H:i:s")
			);

            if($this->M_memberDsc->edit_usulan_certification($this->input->post('id_usulan_cert'), $data)){
                $this->session->set_flashdata('msgCertificationSuggestion', '<div class="alert alert-success">Proposed certification with '.$this->input->post('nama_certification').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Proposed Certification Member, ID : '.$this->input->post('id_usulan_cert'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('31', $footnote);
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
            }
        }
    }

    public function delete_data_usulan_certification($id_usulan_cert){
        if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

        if(isset($_POST)){
            if(empty($id_usulan_cert)){
                redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
            } else {
                $nama = $this->M_memberDsc->get_nama_usulan_certification($this->input->post('id_usulan_cert'));

                $footnote = array(
                    'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
                );

                if($this->M_memberDsc->delete_usulan_certification($id_usulan_cert)){
                    $this->session->set_flashdata('msgCertificationSuggestion', '<div class="alert alert-success">Proposed Certification with ID '.$id_usulan_cert.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Proposed Certification Member, ID : '.$id_usulan_cert, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('31', $footnote);
                    redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));
                }
            }
        }
    }

	public function add_data_memberdsc(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_member' => $this->input->post('nama_member'),
				'id_status' => $this->input->post('id_status'),
				'id_posisi' => $this->input->post('id_posisi'),
				'id_posisi_level' => $this->input->post('id_posisi_level'),
				'id_posisi_type' => $this->input->post('id_posisi_type'),
				'id_band' => $this->input->post('id_band'),
				'id_cluster_ed' => $this->input->post('id_cluster_ed'),
				'id_ed_bg' => $this->input->post('id_ed_bg'),
				'kontrak_mulai' => $this->input->post('kontrak_mulai'),
				'kontrak_selesai' => $this->input->post('kontrak_selesai')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_member'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_memberDsc->check_nik_member($this->input->post('nik'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">NIK already exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('DSC Member', $this->session->userdata['type']);
				redirect('pages/DscMember');
			} else {
				if($this->M_memberDsc->add_member_dsc($data) && $this->input->post('code') === 'private'){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('DSC Member', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('1', $footnote);
				redirect('pages/DscMember');}}}}

	public function getMemberDscEdit($id){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Edit Member DSC, ID : '.$id,$this->session->userdata['type']);
		$data = array(
			'member_select' => $this->M_memberDsc->get_member_dscEdit($id),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'status' => $this->M_otherDataMember->get_status(),
			'posisi' => $this->M_otherDataMember->get_posisi(),
			'posisi_level' => $this->M_otherDataMember->get_posisi_level(),
			'posisi_type' => $this->M_otherDataMember->get_posisi_type(),
			'band' => $this->M_otherDataMember->get_band(),
			'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
			'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
			'judul' => 'Edit Member DSC - INSIGHT',
			'konten' => 'adm_views/dscMember/editMemberDsc',
			'admModal' => [],
			'footerGraph' => []
		);
		$this->load->view('adm_layout/master', $data);
	}

	public function edit_data_memberdsc(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_member' => $this->input->post('nama_member'),
				'id_status' => $this->input->post('id_status'),
				'id_posisi' => $this->input->post('id_posisi'),
				'id_posisi_level' => $this->input->post('id_posisi_level'),
				'id_posisi_type' => $this->input->post('id_posisi_type'),
				'id_band' => $this->input->post('id_band'),
				'id_cluster_ed' => $this->input->post('id_cluster_ed'),
				'id_ed_bg' => $this->input->post('id_ed_bg'),
				'kontrak_mulai' => $this->input->post('kontrak_mulai'),
				'kontrak_selesai' => $this->input->post('kontrak_selesai')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_member'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_memberDsc->edit_member_dsc($this->input->post('nik'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Member with name '.$this->input->post('nama_member').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('DSC Member, NIK : '.$this->input->post('nik'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('1', $footnote);

				$this->M_memberInAssignments->update_occupancy_rate_member($data['nik']);
				$this->M_memberInAssignments->update_occupancy_status_member($data['nik']);

				$usecase = $this->M_otherDataAssignments->get_member_detail_usecase($data['nik']);
				foreach($usecase->result() as $u) {
					$this->M_memberInAssignments->update_occupancy_rate_usecase($u->id_usecase);
					$this->M_memberInAssignments->update_occupancy_status_usecase($u->id_usecase);
				}
				redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));}}}
	
	public function edit_photo_memberdsc(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			$path_parts = pathinfo($_FILES["user_photo"]["name"]);
			$image = file_get_contents($_FILES['user_photo']['tmp_name']);
			$fileType = $path_parts['extension'];
			$data = array(
				'nik' => $this->input->post('nik'),
				'user_photo' => $image,
				'user_photo_type' => $fileType
			);

			$nama = $this->M_memberDsc->get_nama($this->input->post('nik'));

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited photo',
				'name' => $nama,
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_memberDsc->edit_member_dsc($this->input->post('nik'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Member with name '.$this->input->post('nama_member').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('DSC Member Photo, NIK : '.$this->input->post('nik'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('1', $footnote);
				redirect('pages/DscMember/member_dsc/'.$this->input->post('nik'));}}}

	public function delete_data_memberdsc($nik){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($nik)){
				redirect('pages/DscMember');
			} else {
				$nama = $this->M_memberDsc->get_nama($nik);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				$usecase = $this->M_otherDataAssignments->get_member_detail_usecase($nik);
				
				if($this->M_memberDsc->delete_member_dsc($nik)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Member with NIK '.$nik.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('DSC Member, NIK : '.$nik, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('1', $footnote);

					foreach($usecase->result() as $u) {
						$this->M_memberInAssignments->update_occupancy_rate_usecase($u->id_usecase);
						$this->M_memberInAssignments->update_occupancy_status_usecase($u->id_usecase);
					}
					redirect('pages/DscMember');}}}}

	public function upload_photo(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		$this->load->view('upload_photo');
	}

	public function upload_photo_edit_member(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		$this->load->view('upload_photo_edit_member');
	}
	// end of All Member DSC List

	// Member DSC Contract
	public function member_dsc_contract(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('DSC Members (Contract)', $this->session->userdata['type']);

		$data = array(
			'member_dsc' => $this->M_memberDsc->get_member_kontrak(),
			'posisi' => $this->M_otherDataMember->get_posisi(),
			'posisi_level' => $this->M_otherDataMember->get_posisi_level(),
			'posisi_type' => $this->M_otherDataMember->get_posisi_type(),
			'band' => $this->M_otherDataMember->get_band(),
			'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
			'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
			'judul' => 'DSC Members (Contract) - INSIGHT',
			'konten' => 'adm_views/dscMember/memberDscContract',
			'admModal' => [],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}
	// end of Member DSC Contract

	// dsc alumni
	public function retired_member(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Retired Member', $this->session->userdata['type']);

		$data = array(
			'member_dsc' => $this->M_memberDsc->getMemberAlumni(),
			'status' => $this->M_otherDataMember->get_status(),
			'posisi' => $this->M_otherDataMember->get_posisi(),
			'posisi_level' => $this->M_otherDataMember->get_posisi_level(),
			'posisi_type' => $this->M_otherDataMember->get_posisi_type(),
			'band' => $this->M_otherDataMember->get_band(),
			'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
			'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
			'footnote' => $this->M_footnote->getFootnoteTable('2'),
			'judul' => 'Retired Member - INSIGHT',
			'konten' => 'adm_views/dscMember/retiredMember',
			'admModal' => ['dscMember/adm_modal_memberAlumni'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	public function editDataDscAlumni(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_member' => $this->input->post('nama_member'),
				'id_status' => $this->input->post('id_status')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_member'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_memberDsc->edit_member_dsc($this->input->post('nik'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Retired member with name '.$this->input->post('nama_member').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('DSC Alumni, NIK : '.$this->input->post('nik'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('2', $footnote);
				redirect('pages/DscMember/retired_member');
			}
		}
	}
	// end of dsc alumni

	// Member Internship
	public function apprenticeship(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Apprenticeship', $this->session->userdata['type']);

		$data = array(
			'member_internship' => $this->M_apprentice->get_member_internship(0),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'universitas' => $this->M_otherDataMember->get_universitas(),
			'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
			'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
			'cluster_ed_selected' => '',
			'ed_bg_selected' => '',
			'footnote' => $this->M_footnote->getFootnoteTable('3'),
			'judul' => 'Apprenticeship - INSIGHT',
			'konten' => 'adm_views/dscMember/apprenticeship',
			'admModal' => ['dscMember/adm_modal_memberIntern'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	// @codeCoverageIgnoreStart
	public function add_data_internship(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'nim' => $this->input->post('nim'),
				'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
				'id_cluster_ed' => $this->input->post('id_cluster_ed'),
				'id_ed_bg' => $this->input->post('id_ed_bg'),
				'nik' => $this->input->post('nik'),
				'kode_universitas' => $this->input->post('kode_universitas'),
				'tahun_intern' => $this->input->post('tahun_intern'),
				'kontrak_mulai_internship' => $this->input->post('kontrak_mulai_internship'),
				'kontrak_selesai_internship' => $this->input->post('kontrak_selesai_internship')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $this->input->post('nama_mahasiswa'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if ($this->M_apprentice->check_nim_member($this->input->post('nim'))>0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">NIM exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Apprentice', $this->session->userdata['type']);
				redirect('pages/DscMember/apprenticeship');
			} else {
				if($this->M_apprentice->add_internship($data) && $this->input->post('code') === 'private'){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('Apprentice', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('3', $footnote);
				redirect('pages/DscMember/apprenticeship');}}}}

		public function getMemberAppEdit($id){
			if($this->session->userdata('role') == 'user_logged_in'){
				redirect('/Err404');
			};
	
			if($this->session->userdata('status') !== 'admin_logged_in'){
				redirect('pages/Login');
			}
			$this->M_auditTrail->auditTrailRead('Edit Apprentice, ID : '.$id,$this->session->userdata['type']);
			$data = array(
				'member_select' => $this->M_apprentice->get_member_appEdit($id),
				'member_internship' => $this->M_apprentice->get_member_internship(0),
				'member_dsc' => $this->M_memberDsc->get_all_member(),
				'universitas' => $this->M_otherDataMember->get_universitas(),
				'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
				'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
				'judul' => 'Edit Apprentice - INSIGHT',
				'konten' => 'adm_views/dscMember/editMemberApp',
				'admModal' => [],
				'footerGraph' => []
			);
			$this->load->view('adm_layout/master', $data);
		}

	public function edit_data_internship(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			$data = array(
				'nim' => $this->input->post('nim'),
				'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
				'id_cluster_ed' => $this->input->post('id_cluster_ed'),
				'id_ed_bg' => $this->input->post('id_ed_bg'),
				'nik' => $this->input->post('nik'),
				'kode_universitas' => $this->input->post('kode_universitas'),
				'tahun_intern' => $this->input->post('tahun_intern'),
				'kontrak_mulai_internship' => $this->input->post('kontrak_mulai_internship'),
				'kontrak_selesai_internship' => $this->input->post('kontrak_selesai_internship')
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_mahasiswa'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_apprentice->edit_internship($this->input->post('nim'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Apprentice with name '.$this->input->post('nama_mahasiswa').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Apprentice, ID : '.$this->input->post('nim'),$this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('3', $footnote);
				redirect('pages/DscMember/apprenticeship');}}}
	
	public function delete_data_internship($nim){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			if(empty($nim)){
				redirect('pages/DscMember/apprenticeship');
			} else {
				$nama = $this->M_apprentice->get_nama($nim);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_apprentice->delete_internship($nim)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Apprentice with NIM '.$nim.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Apprentice, ID : '.$nim, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('3', $footnote);
					redirect('pages/DscMember/apprenticeship');}}}}
	// @codeCoverageIgnoreEnd
	// end of Member Internship

	// Member Alumni Internship
	public function retired_apprentice(){
		$this->M_auditTrail->auditTrailRead('Retired Apprentice', $this->session->userdata['type']);

		$data = array(
			'member_internship' => $this->M_apprentice->get_member_internship(1),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'universitas' => $this->M_otherDataMember->get_universitas(),
			'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
			'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
			'footnote' => $this->M_footnote->getFootnoteTable('4'),
			'judul' => 'Retired Apprentice - INSIGHT',
			'konten' => 'adm_views/dscMember/retiredApprentice',
			'admModal' => ['dscMember/adm_modal_internAlumni'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	public function update_statusAlumni_internship($nim){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			if(empty($nim)){
				$this->M_auditTrail->auditTrailUpdateFalse('DSC Alumni (Apprentice) resign, nim : '.$nim, $this->session->userdata['type']);
				redirect('pages/DscMember/apprenticeship');
		} else {
			$nama = $this->M_apprentice->get_nama($nim);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'resigned',
				'name' => $nama,
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_apprentice->updateStatusIntership($nim,1)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Apprentice with NIM '.$nim.' has been resigned</div><br>');
				$this->M_auditTrail->auditTrailUpdate('DSC Alumni (Apprentice) resign, nim : '.$nim, $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('3', $footnote);
				redirect('pages/DscMember/apprenticeship');}
			}
		}
	}
	
	public function edit_data_internshipAlumni(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			$data = array(
				'nim' => $this->input->post('nim'),
				'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
				'status_inactive' => 0
			);

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $this->input->post('nama_mahasiswa'),
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_apprentice->edit_internship($this->input->post('nim'), $data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Retired apprentice with name '.$this->input->post('nama_mahasiswa').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('DSC Alumni (Apprentice), nim : '.$this->input->post('nim'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('4', $footnote);
				redirect('pages/DscMember/retired_apprentice');
			}
		}
	}
	// end of Member Alumni Internship

	// // Status
	// public function status(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if($this->session->userdata('status') !== 'admin_logged_in'){
	// 		redirect('pages/Login');
	// 	}
	// 	$this->M_auditTrail->auditTrailRead('Status', $this->session->userdata['type']);

	// 	$data = array(
	// 		'status' => $this->M_otherDataMember->get_status(),
	// 		'footnote' => $this->M_footnote->getFootnoteTable('5'),
	// 		'judul'	=> 'Status - INSIGHT',
	// 		'konten' => 'adm_views/dscMember/statusMember',
	// 		'admModal' => ['dscMember/adm_modal_status'],
	// 		'footerGraph' => []
	// 	);

	// 	$this->load->view('adm_layout/master', $data);
	// }

	// // @codeCoverageIgnoreStart
	// public function add_data_status(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_status' => $this->input->post('id_status'),
	// 			'nama_status' => $this->input->post('nama_status')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'added',
	// 			'name' => $this->input->post('nama_status'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if ($this->M_otherDataMember->check_nama_status($this->input->post('nama_status'))>0) {
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Status exists!</div><br>');
	// 			$this->M_auditTrail->auditTrailInsertFalse('Status', $this->session->userdata['type']);
	// 			redirect('pages/DscMember/status');
	// 		} else {
	// 			if($this->M_otherDataMember->add_status($data) && $this->input->post('code') === 'private'){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
	// 				$this->M_auditTrail->auditTrailInsert('Status', $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('5', $footnote);
	// 				redirect('pages/DscMember/status');}}}}

	// public function edit_data_status(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	}; 
	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_status' => $this->input->post('id_status'),
	// 			'nama_status' => $this->input->post('nama_status')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'edited',
	// 			'name' => $this->input->post('nama_status'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if($this->M_otherDataMember->edit_status($this->input->post('id_status'), $data)){
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-success">Status with name '.$this->input->post('nama_status').' has been edited</div><br>');
	// 			$this->M_auditTrail->auditTrailUpdate('Status, ID : '.$this->input->post('id_status'), $this->session->userdata['type']);
	// 			$this->M_footnote->editFootnoteTable('5', $footnote);
	// 			redirect('pages/DscMember/status');}}}
	
	// public function delete_data_status($id_status){ 
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		if(empty($id_status)){
	// 			redirect('pages/DscMember/status');
	// 		} else {
	// 			$nama = $this->M_otherDataMember->get_nama_status($id_status);

	// 			$footnote = array(
	// 				'username_admin' => $this->session->userdata['username'],
	// 				'activity' => 'deleted',
	// 				'name' => $nama,
	// 				'timestamp' => date("Y-m-d H:i:s")
	// 			);

	// 			if($this->M_otherDataMember->delete_status($id_status)){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">Status with ID '.$id_status.' has been deleted</div><br>');
	// 				$this->M_auditTrail->auditTrailDelete('Status, ID : '.$id_status, $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('5', $footnote);
	// 				redirect('pages/DscMember/status');}}}}
	// // @codeCoverageIgnoreEnd
	// // end of Status

	// // Posisi
	// public function posisi(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if($this->session->userdata('status') !== 'admin_logged_in'){
	// 		redirect('pages/Login');
	// 	}
	// 	$this->M_auditTrail->auditTrailRead('Positions', $this->session->userdata['type']);
	// 	$data = array(
	// 		'posisi' => $this->M_otherDataMember->get_posisi(),
	// 		'footnote' => $this->M_footnote->getFootnoteTable('6'),
	// 		'judul'	=> 'Positions - INSIGHT',
	// 		'konten' => 'adm_views/dscMember/posisiMember',
	// 		'admModal' => ['dscMember/adm_modal_posisi'],
	// 		'footerGraph' => []
	// 	);

	// 	$this->load->view('adm_layout/master', $data);
	// }

	// // @codeCoverageIgnoreStart
	// public function add_data_posisi(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_posisi' => $this->input->post('id_posisi'),
	// 			'nama_posisi' => $this->input->post('nama_posisi')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'added',
	// 			'name' => $this->input->post('nama_posisi'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if ($this->M_otherDataMember->check_nama_posisi($this->input->post('nama_posisi'))>0) {
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Position exists!</div><br>');
	// 			$this->M_auditTrail->auditTrailInsertFalse('Positions', $this->session->userdata['type']);
	// 			redirect('pages/DscMember/posisi');
	// 		} else {
	// 			if($this->M_otherDataMember->add_posisi($data) && $this->input->post('code') === 'private'){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
	// 				$this->M_auditTrail->auditTrailInsert('Positions', $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('6', $footnote);
	// 				redirect('pages/DscMember/posisi');}}}}

	// public function edit_data_posisi(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_posisi' => $this->input->post('id_posisi'),
	// 			'nama_posisi' => $this->input->post('nama_posisi')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'edited',
	// 			'name' => $this->input->post('nama_posisi'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if($this->M_otherDataMember->edit_posisi($this->input->post('id_posisi'), $data)){
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-success">Position with name '.$this->input->post('nama_posisi').' has been edited</div><br>');
	// 			$this->M_auditTrail->auditTrailUpdate('Positions, ID : '.$this->input->post('id_posisi'), $this->session->userdata['type']);
	// 			$this->M_footnote->editFootnoteTable('6', $footnote);
	// 			redirect('pages/DscMember/posisi');}}}
	
	// public function delete_data_posisi($id_posisi){ 
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		if(empty($id_posisi)){
	// 			redirect('pages/DscMember/posisi');
	// 		} else {
	// 			$nama = $this->M_otherDataMember->get_nama_posisi($id_posisi);

	// 			$footnote = array(
	// 				'username_admin' => $this->session->userdata['username'],
	// 				'activity' => 'deleted',
	// 				'name' => $nama,
	// 				'timestamp' => date("Y-m-d H:i:s")
	// 			);

	// 			if($this->M_otherDataMember->delete_posisi($id_posisi)){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">Position with ID '.$id_posisi.' has been deleted</div><br>');
	// 				$this->M_auditTrail->auditTrailDelete('Positions, ID : '.$id_posisi, $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('6', $footnote);
	// 				redirect('pages/DscMember/posisi');}}}}
	// // @codeCoverageIgnoreEnd
	// //end of Posisi

	// // Band
	// public function band(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if($this->session->userdata('status') !== 'admin_logged_in'){
	// 		redirect('pages/Login');
	// 	}
	// 	$this->M_auditTrail->auditTrailRead('Band', $this->session->userdata['type']);
	// 	$data = array(
	// 		'band' => $this->M_otherDataMember->get_band(),
	// 		'footnote' => $this->M_footnote->getFootnoteTable('7'),
	// 		'judul' => 'Band - INSIGHT',
	// 		'konten' => 'adm_views/dscMember/bandMember',
	// 		'admModal' => ['dscMember/adm_modal_band'],
	// 		'footerGraph' => []
	// 	);

	// 	$this->load->view('adm_layout/master', $data);
	// }

	// // @codeCoverageIgnoreStart
	// public function add_data_band(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_band' => $this->input->post('id_band'),
	// 			'nama_band' => $this->input->post('nama_band')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'added',
	// 			'name' => $this->input->post('nama_band'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if ($this->M_otherDataMember->check_nama_band($this->input->post('nama_band'))>0) {
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Band exists!</div><br>');
	// 			$this->M_auditTrail->auditTrailInsertFalse('Band', $this->session->userdata['type']);
	// 			redirect('pages/DscMember/band');
	// 		}else{
	// 			if($this->M_otherDataMember->add_band($data) && $this->input->post('code') === 'private'){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
	// 				$this->M_auditTrail->auditTrailInsert('Band', $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('7', $footnote);
	// 				redirect('pages/DscMember/band');}}}}

	// public function edit_data_band(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_band' => $this->input->post('id_band'),
	// 			'nama_band' => $this->input->post('nama_band')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'edited',
	// 			'name' => $this->input->post('nama_band'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if($this->M_otherDataMember->edit_band($this->input->post('id_band'), $data)){
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-success">Band with name '.$this->input->post('nama_band').' has been edited</div><br>');
	// 			$this->M_auditTrail->auditTrailUpdate('Band, ID : '.$this->input->post('id_band'), $this->session->userdata['type']);
	// 			$this->M_footnote->editFootnoteTable('7', $footnote);
	// 			redirect('pages/DscMember/band');}}}
	
	// public function delete_data_band($id_band){ 
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		if(empty($id_band)){
	// 			redirect('pages/DscMember/band');
	// 		} else {
	// 			$nama = $this->M_otherDataMember->get_nama_band($id_band);

	// 			$footnote = array(
	// 				'username_admin' => $this->session->userdata['username'],
	// 				'activity' => 'deleted',
	// 				'name' => $nama,
	// 				'timestamp' => date("Y-m-d H:i:s")
	// 			);

	// 			if($this->M_otherDataMember->delete_band($id_band)){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">Band with ID '.$id_band.' has been deleted</div><br>');
	// 				$this->M_auditTrail->auditTrailDelete('Band, ID : '.$id_band, $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('7', $footnote);
	// 				redirect('pages/DscMember/band');}}}}
	// // @codeCoverageIgnoreEnd
	// //end of Band

	// // Universitas
	// public function university(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if($this->session->userdata('status') !== 'admin_logged_in'){
	// 		redirect('pages/Login');
	// 	}
	// 	$this->M_auditTrail->auditTrailRead('Univeristy', $this->session->userdata['type']);

	// 	$data = array(
	// 		'universitas' => $this->M_otherDataMember->get_universitas(),
	// 		'footnote' => $this->M_footnote->getFootnoteTable('8'),
	// 		'judul' => 'Universities - INSIGHT',
	// 		'konten' => 'adm_views/dscMember/univApprentice',
	// 		'admModal' => ['dscMember/adm_modal_universitas'],
	// 		'footerGraph' => []
	// 	);

	// 	$this->load->view('adm_layout/master', $data);
	// }

	// // @codeCoverageIgnoreStart
	// public function add_data_univ(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'kode_universitas' => $this->input->post('kode_universitas'),
	// 			'nama_universitas' => $this->input->post('nama_universitas')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'added',
	// 			'name' => $this->input->post('nama_universitas'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if ($this->M_otherDataMember->check_nama_univ($this->input->post('nama_universitas'))>0) {
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-danger">University exists!</div><br>');
	// 			$this->M_auditTrail->auditTrailInsertFalse('University', $this->session->userdata['type']);
	// 			redirect('pages/DscMember/university');
	// 		} else {
	// 			if($this->M_otherDataMember->add_univ($data) && $this->input->post('code') === 'private'){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
	// 				$this->M_auditTrail->auditTrailInsert('University', $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('8', $footnote);
	// 				redirect('pages/DscMember/university');}}}}

	// public function edit_data_univ(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'kode_universitas' => $this->input->post('kode_universitas'),
	// 			'nama_universitas' => $this->input->post('nama_universitas')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'edited',
	// 			'name' => $this->input->post('nama_universitas'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if($this->M_otherDataMember->edit_univ($this->input->post('kode_universitas'), $data)){
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-success">University with name '.$this->input->post('nama_universitas').' has been edited</div><br>');
	// 			$this->M_auditTrail->auditTrailUpdate('University, ID : '.$this->input->post('kode_universitas'), $this->session->userdata['type']);
	// 			$this->M_footnote->editFootnoteTable('8', $footnote);
	// 			redirect('pages/DscMember/university');}}}
	
	// public function delete_data_univ($kode_universitas){ 
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		if(empty($kode_universitas)){
	// 			redirect('pages/DscMember/university');
	// 		} else {
	// 			$nama = $this->M_otherDataMember->get_nama_univ($kode_universitas);

	// 			$footnote = array(
	// 				'username_admin' => $this->session->userdata['username'],
	// 				'activity' => 'deleted',
	// 				'name' => $nama,
	// 				'timestamp' => date("Y-m-d H:i:s")
	// 			);

	// 			if($this->M_otherDataMember->delete_univ($kode_universitas)){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">University with ID '.$kode_universitas.' has been deleted</div><br>');
	// 				$this->M_auditTrail->auditTrailDelete('University, ID : '.$kode_universitas, $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('8', $footnote);
	// 				redirect('pages/DscMember/university');}}}}
	// // @codeCoverageIgnoreEnd
	// // end of Universitas

	// // Cluster Education
	// // public function cluster_education(){
	// // 	if($this->session->userdata('role') == 'user_logged_in'){
	// // 		redirect('/Err404');
	// // 	};

	// // 	if($this->session->userdata('status') !== 'admin_logged_in'){
	// // 		redirect('pages/Login');
	// // 	}
	// // 	$this->M_auditTrail->auditTrailRead('Cluster Education', $this->session->userdata['type']);
	// // 	$data = array(
	// // 		'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
	// // 		'footnote' => $this->M_footnote->getFootnoteTable('22'),
	// // 		'judul' => 'Cluster Education - INSIGHT',
	// // 		'konten' => 'adm_views/dscMember/clusterEducation',
	// // 		'admModal' => ['dscMember/adm_modal_clusterEducation'],
	// // 		'footerGraph' => []
	// // 	);

	// // 	$this->load->view('adm_layout/master', $data);
	// // }

	// // @codeCoverageIgnoreStart
	// public function add_data_cluster_ed(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_cluster_ed' => $this->input->post('id_cluster_ed'),
	// 			'cluster_ed_desc' => $this->input->post('cluster_ed_desc')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'added',
	// 			'name' => $this->input->post('cluster_ed_desc'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if ($this->M_otherDataMember->check_nama_cluster_ed($this->input->post('cluster_ed_desc'))>0) {
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Cluster education exists!</div><br>');
	// 			$this->M_auditTrail->auditTrailInsertFalse('Cluster Education', $this->session->userdata['type']);
	// 			redirect('pages/DscMember/cluster_education');
	// 		}else{
	// 			if($this->M_otherDataMember->add_cluster_ed($data) && $this->input->post('code') === 'private'){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
	// 				$this->M_auditTrail->auditTrailInsert('Cluster Education', $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('22', $footnote);
	// 				redirect('pages/DscMember/education_background');}}}}

	// public function edit_data_cluster_ed(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_cluster_ed' => $this->input->post('id_cluster_ed'),
	// 			'cluster_ed_desc' => $this->input->post('cluster_ed_desc')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'edited',
	// 			'name' => $this->input->post('cluster_ed_desc'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if($this->M_otherDataMember->edit_cluster_ed($this->input->post('id_cluster_ed'), $data)){
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-success">Cluster education with name '.$this->input->post('cluster_ed_desc').' has been edited</div><br>');
	// 			$this->M_auditTrail->auditTrailUpdate('Cluster Education, ID : '.$this->input->post('id_cluster_ed'), $this->session->userdata['type']);
	// 			$this->M_footnote->editFootnoteTable('22', $footnote);
	// 			redirect('pages/DscMember/education_background');}}}
	
	// public function delete_data_cluster_ed($id_cluster_ed){ 
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		if(empty($id_cluster_ed)){
	// 			redirect('pages/DscMember/education_background');
	// 		} else {
	// 			$nama = $this->M_otherDataMember->get_nama_cluster_ed($id_cluster_ed);

	// 			$footnote = array(
	// 				'username_admin' => $this->session->userdata['username'],
	// 				'activity' => 'deleted',
	// 				'name' => $nama,
	// 				'timestamp' => date("Y-m-d H:i:s")
	// 			);

	// 			if($this->M_otherDataMember->delete_cluster_ed($id_cluster_ed)){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">Cluster education with ID '.$id_cluster_ed.' has been deleted</div><br>');
	// 				$this->M_auditTrail->auditTrailDelete('Cluster Education, ID : '.$id_cluster_ed, $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('22', $footnote);
	// 				redirect('pages/DscMember/education_background');}}}}
	// // @codeCoverageIgnoreEnd
	// //end of Cluster Education
	
	// // Education Background
	// public function education_background(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if($this->session->userdata('status') !== 'admin_logged_in'){
	// 		redirect('pages/Login');
	// 	}
	// 	$this->M_auditTrail->auditTrailRead('Education Background', $this->session->userdata['type']);
	// 	$data = array(
	// 		'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
	// 		'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
	// 		'footnote' => $this->M_footnote->getFootnoteTable('23'),
	// 		'judul' => 'Education Background - INSIGHT',
	// 		'konten' => 'adm_views/dscMember/clusterEducation',
	// 		'admModal' => ['dscMember/adm_modal_educationBackground', 'dscMember/adm_modal_clusterEducation'],
	// 		'footerGraph' => []
	// 	);

	// 	$this->load->view('adm_layout/master', $data);
	// }

	// // @codeCoverageIgnoreStart
	// public function add_data_ed_bg(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_ed_bg' => $this->input->post('id_ed_bg'),
	// 			'id_cluster_ed' => $this->input->post('id_cluster_ed'),
	// 			'ed_bg_desc' => $this->input->post('ed_bg_desc')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'added',
	// 			'name' => $this->input->post('ed_bg_desc'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if ($this->M_otherDataMember->check_nama_ed_bg($this->input->post('ed_bg_desc'))>0) {
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Education background exists!</div><br>');
	// 			$this->M_auditTrail->auditTrailInsertFalse('Education Background', $this->session->userdata['type']);
	// 			redirect('pages/DscMember/education_background');
	// 		}else{
	// 			if($this->M_otherDataMember->add_ed_bg($data) && $this->input->post('code') === 'private'){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">New data has been added successfully</div><br>');
	// 				$this->M_auditTrail->auditTrailInsert('Education Background', $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('23', $footnote);
	// 				redirect('pages/DscMember/education_background');}}}}

	// public function edit_data_ed_bg(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_ed_bg' => $this->input->post('id_ed_bg'),
	// 			'id_cluster_ed' => $this->input->post('id_cluster_ed'),
	// 			'ed_bg_desc' => $this->input->post('ed_bg_desc')
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'edited',
	// 			'name' => $this->input->post('ed_bg_desc'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if($this->M_otherDataMember->edit_ed_bg($this->input->post('id_ed_bg'), $data)){
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-success">Education background with name '.$this->input->post('ed_bg_desc').' has been edited</div><br>');
	// 			$this->M_auditTrail->auditTrailUpdate('Education Background, ID : '.$this->input->post('id_ed_bg'), $this->session->userdata['type']);
	// 			$this->M_footnote->editFootnoteTable('23', $footnote);
	// 			redirect('pages/DscMember/education_background');}}}
	
	// public function delete_data_ed_bg($id_ed_bg){ 
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		if(empty($id_ed_bg)){
	// 			redirect('pages/DscMember/education_background');
	// 		} else {
	// 			$nama = $this->M_otherDataMember->get_nama_ed_bg($id_ed_bg);

	// 			$footnote = array(
	// 				'username_admin' => $this->session->userdata['username'],
	// 				'activity' => 'deleted',
	// 				'name' => $nama,
	// 				'timestamp' => date("Y-m-d H:i:s")
	// 			);

	// 			if($this->M_otherDataMember->delete_ed_bg($id_ed_bg)){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">Education background with ID '.$id_ed_bg.' has been deleted</div><br>');
	// 				$this->M_auditTrail->auditTrailDelete('Education Background, ID : '.$id_ed_bg, $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('23', $footnote);
	// 				redirect('pages/DscMember/education_background');}}}}
	// @codeCoverageIgnoreEnd
	//end of Education Background
	// end of DSC Member Menu
}
?>
