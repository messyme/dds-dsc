<?php
defined('BASEPATH') || exit('No direct script access allowed');

class MemberSkills extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// DSC Members
		$this->load->model('dscMembers/M_memberDsc');
		// Trained Certified
		$this->load->model('trainedCertifiedMember/M_trainedMember');
		$this->load->model('trainedCertifiedMember/M_certifiedMember');
		// Audit Trail
		$this->load->model('auth/M_auditTrail');
		// Footnote
		$this->load->model('footnote/M_footnote');
	}

	// Trained - Certified Menu
	// Trained Member
	public function index(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
		    redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Trained Member', $this->session->userdata['type']);

		$data = array(
			'trained_member' => $this->M_trainedMember->get_trained_member(),
            'pathway' => $this->M_trainedMember->get_pathway(),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'footnote' => $this->M_footnote->getFootnoteTable('9'),
			'judul' => 'Trained Members - INSIGHT',
			'konten' => 'adm_views/trainedCertifiedMember/trainedMember',
			'admModal' => ['trainedCertifiedMember/adm_modal_trainedMember'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	public function getEditTrainedMember($id){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Edit Trained Member, ID : '.$id, $this->session->userdata['type']);
		$data = array(
			'member_select' => $this->M_trainedMember->get_trained_memberEdit($id),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
            'pathway' => $this->M_trainedMember->get_pathway(),
			'judul' => 'Edit Trained Members - INSIGHT',
			'konten' => 'adm_views/trainedCertifiedMember/editTrainedMember',
			'admModal' => [],
			'footerGraph' => []
		);
        
		$this->load->view('adm_layout/master', $data);
	}

	public function updateDataTrainedMember(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		$targetDir = "public/assets/uploads/training/";
		$fileNameTmp = basename($_FILES["bukti_pelatihan"]["name"]);
		$fileName = $_POST['nik'].'_'.basename($_FILES["bukti_pelatihan"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		$allowTypes = array('jpg','png','jpeg','pdf');

		$id = $this->input->post('id_trained_member');
		if(empty($fileNameTmp)){
			$data = array(
				'nik ' => $this->input->post('nik'),
				'nama_pelatihan' => $this->input->post('nama_pelatihan'),
                'id_pathway' => $this->input->post('id_pathway'),
				'tahun_pelatihan' => $this->input->post('tahun_pelatihan'),
			);

			$nama = $this->M_trainedMember->get_nama_trained_member($this->input->post('nik'));

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $nama,
				'timestamp' => date("Y-m-d H:i:s")
			);
			
			if($this->M_trainedMember->updateDataTrainedMember($id, $data)){ 
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Trained Member, ID : '.$id = $this->input->post('id_trained_member'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('9', $footnote);
				redirect('pages/MemberSkills');
			}
		} else {
			if(in_array($fileType, $allowTypes)){
			if(move_uploaded_file($_FILES["bukti_pelatihan"]["tmp_name"], $targetFilePath)){
				$data = array(
                    'nik ' => $this->input->post('nik'),
                    'nama_pelatihan' => $this->input->post('nama_pelatihan'),
                    'id_pathway' => $this->input->post('id_pathway'),
                    'tahun_pelatihan' => $this->input->post('tahun_pelatihan'),
                    'bukti_pelatihan' => $fileName,
				);

				$nama = $this->M_trainedMember->get_nama_trained_member($this->input->post('nik'));
	
				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'edited',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);
				
				if($this->M_trainedMember->updateDataTrainedMember($id, $data)){ 
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited</div><br>');
					$this->M_auditTrail->auditTrailUpdate('Trained Member, ID : '.$id = $this->input->post('id_trained_member'), $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('9', $footnote);
					redirect('pages/MemberSkills');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div><br>');
				$this->M_auditTrail->auditTrailUpdateFalse('Trained Member, ID : '.$id = $this->input->post('id_trained_member'), $this->session->userdata['type']);
				redirect('pages/MemberSkills/getEditTrainedMember/'.$id);
			} 
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, only JPG, JPEG, PNG, & PDF files are allowed to upload.</div><br>');
			$this->M_auditTrail->auditTrailUpdateFalse('Trained Member, ID : '.$id = $this->input->post('id_trained_member'), $this->session->userdata['type']);
			redirect('pages/MemberSkills/getEditTrainedMember/'.$id);
		}
		}
	}

	// @codeCoverageIgnoreStart
		public function delete_data_trainedmember($id_trained_member){
			if($this->session->userdata('role') == 'user_logged_in'){
				redirect('/Err404');
			}; 

			if(isset($_POST)){
				if(empty($id_trained_member)){
					redirect('pages/MemberSkills');
				} else {

					$nik = $this->M_trainedMember->get_nik($id_trained_member);

					$nama = $this->M_trainedMember->get_nama_trained_member($nik);
	
					$footnote = array(
						'username_admin' => $this->session->userdata['username'],
						'activity' => 'deleted',
						'name' => $nama,
						'timestamp' => date("Y-m-d H:i:s")
					);

					if($this->M_trainedMember->delete_trained_member($id_trained_member)){
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID '.$id_trained_member.' successfully deleted</div><br>');
						$this->M_auditTrail->auditTrailDelete('Trained Members, ID : '.$id_trained_member, $this->session->userdata['type']);
						$this->M_footnote->editFootnoteTable('9', $footnote);
						redirect('pages/MemberSkills');}}}}

		public function upload_training(){
			$this->M_auditTrail->auditTrailInsert('Trained Member', $this->session->userdata['type']);

			if(isset($_POST)){

				$nama = $this->M_trainedMember->get_nama_trained_member($this->input->post('nik'));
	
				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'added',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				$this->M_footnote->editFootnoteTable('9', $footnote);
			}

			$this->load->view('upload_training');
		}
		// @codeCoverageIgnoreEnd
	// end of Trained Member

	// Certified Member
	public function certified_member(){
		if($this->session->userdata('status') !== 'admin_logged_in'){
		redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Certified Member', $this->session->userdata['type']);
		
		$data = array(
			'certified_member' => $this->M_certifiedMember->get_certified_member(),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'footnote' => $this->M_footnote->getFootnoteTable('10'),
            'pathway' => $this->M_certifiedMember->get_pathway(),
			'judul' => 'Certified Members - INSIGHT',
			'konten' => 'adm_views/trainedCertifiedMember/certifiedMember',
			'admModal' => ['trainedCertifiedMember/adm_modal_certifiedMember'],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	public function getEditCertifiedMember($id){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
			
		if($this->session->userdata('status') !== 'admin_logged_in'){
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Edit Certified Member, ID : '.$id, $this->session->userdata['type']);

		$data = array(
			'member_select' => $this->M_certifiedMember->get_certified_memberEdit($id),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
            'pathway' => $this->M_certifiedMember->get_pathway(),
			'judul' => 'Edit Certified Members - INSIGHT',
			'konten' => 'adm_views/trainedCertifiedMember/editCertifiedMember',
			'admModal' => [],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
		
	}

	public function updateDataCertifiedMember(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		$targetDir = "public/assets/uploads/sertifikasi/";
		$fileNameTmp = basename($_FILES["bukti_sertifikasi"]["name"]);
		$fileName = $_POST['nik'].'_'.basename($_FILES["bukti_sertifikasi"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		$allowTypes = array('jpg','png','jpeg','pdf');
		$id = $this->input->post('id_certified_member');

		if(empty($fileNameTmp)){
			$data = array(
				'nik ' => $this->input->post('nik'),
				'nama_sertifikasi ' => $this->input->post('nama_sertifikasi'),
                'id_pathway' => $this->input->post('id_pathway'),
				'tahun_sertifikasi' => $this->input->post('tahun_sertifikasi'),
			);

			$nama = $this->M_certifiedMember->get_nama_certified_member($this->input->post('nik'));

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'edited',
				'name' => $nama,
				'timestamp' => date("Y-m-d H:i:s")
			);

			if($this->M_certifiedMember->updateDataCertifiedMember($id, $data)){ 
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Certified Member, ID : '.$id, $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('10', $footnote);
				redirect('pages/MemberSkills/certified_member');
			}	
		} else {
			if(in_array($fileType, $allowTypes)){
				if(move_uploaded_file($_FILES["bukti_sertifikasi"]["tmp_name"], $targetFilePath)){
					$data = array(
						'nik ' => $this->input->post('nik'),
						'nama_sertifikasi' => $this->input->post('nama_sertifikasi'),
                        'id_pathway' => $this->input->post('id_pathway'),
						'tahun_sertifikasi' => $this->input->post('tahun_sertifikasi'),
						'bukti_sertifikasi' => $fileName,
					);

					$nama = $this->M_certifiedMember->get_nama_certified_member($this->input->post('nik'));

					$footnote = array(
						'username_admin' => $this->session->userdata['username'],
						'activity' => 'edited',
						'name' => $nama,
						'timestamp' => date("Y-m-d H:i:s")
					);
					
					if($this->M_certifiedMember->updateDataCertifiedMember($id, $data)){ 
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited</div><br>');
						$this->M_auditTrail->auditTrailUpdate('Certified Member, ID : '.$id, $this->session->userdata['type']);
						$this->M_footnote->editFootnoteTable('10', $footnote);
						redirect('pages/MemberSkills/certified_member');
					}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div><br>');
				$this->M_auditTrail->auditTrailUpdateFalse('Certified Member, ID : '.$id, $this->session->userdata['type']);
				redirect('pages/MemberSkills/getEditCertifiedMember/'.$id);
			} 
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, only JPG, JPEG, PNG, & PDF files are allowed to upload.</div><br>');
				$this->M_auditTrail->auditTrailUpdateFalse('Certified Member, ID : '.$id, $this->session->userdata['type']);
				redirect('pages/MemberSkills/getEditCertifiedMember/'.$id);
			}
		}
	}

	// @codeCoverageIgnoreStart	
	public function delete_data_certifiedmember($id_certified_member){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

		if(isset($_POST)){
			if(empty($id_certified_member)){
				redirect('pages/MemberSkills/certified_member');
			} else {

				$nik = $this->M_certifiedMember->get_nik($id_certified_member);

				$nama = $this->M_certifiedMember->get_nama_certified_member($nik);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'deleted',
					'name' => $nama,
					'timestamp' => date("Y-m-d H:i:s")
				);

				if($this->M_certifiedMember->delete_certifiedmember($id_certified_member)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID '.$id_certified_member.' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Certified Member, ID : '.$id_certified_member,$this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('10', $footnote);
					redirect('pages/MemberSkills/certified_member');}}}}

	public function upload_sertifikasi(){
		$this->M_auditTrail->auditTrailInsert('Certified Member List',$this->session->userdata['type']);

		if(isset($_POST)){

			$nama = $this->M_certifiedMember->get_nama_certified_member($this->input->post('nik'));

			$footnote = array(
				'username_admin' => $this->session->userdata['username'],
				'activity' => 'added',
				'name' => $nama,
				'timestamp' => date("Y-m-d H:i:s")
			);

			$this->M_footnote->editFootnoteTable('9', $footnote);
		}

		$this->load->view('upload_sertifikasi');
	}

    public function proposed_training(){
        if($this->session->userdata('status') !== 'admin_logged_in'){
            redirect('pages/Login');
        }

        $this->M_auditTrail->auditTrailRead('Proposed Training', $this->session->userdata['type']);
        
        $data = array(
            'proposed_training' => $this->M_memberDsc->get_all_usulan_training(),
            'pathway' => $this->M_certifiedMember->get_pathway(),
            'member_dsc' => $this->M_memberDsc->get_all_member(),
            'footnote' => $this->M_footnote->getFootnoteTable('23'),
            'judul' => 'Proposed Trainings - INSIGHT',
            'konten' => 'adm_views/trainedCertifiedMember/proposedTrainings',
            'admModal' => ['trainedCertifiedMember/adm_modal_proposedTraining'],
            'footerGraph' => []
        );

        $this->load->view('adm_layout/master', $data);
    }

    public function proposed_certification(){
        if($this->session->userdata('status') !== 'admin_logged_in'){
            redirect('pages/Login');
        }

        $this->M_auditTrail->auditTrailRead('Proposed Certification', $this->session->userdata['type']);
        
        $data = array(
            'proposed_certification' => $this->M_memberDsc->get_all_usulan_certification(),
            'pathway' => $this->M_certifiedMember->get_pathway(),
            'member_dsc' => $this->M_memberDsc->get_all_member(),
            'footnote' => $this->M_footnote->getFootnoteTable('31'),
            'judul' => 'Proposed Certifications - INSIGHT',
            'konten' => 'adm_views/trainedCertifiedMember/proposedCertifications',
            'admModal' => ['trainedCertifiedMember/adm_modal_proposedCertification'],
            'footerGraph' => []
        );

        $this->load->view('adm_layout/master', $data);
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
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Proposed Training Member', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('23', $footnote);
                redirect('pages/MemberSkills/proposed_training');
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
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited '.$this->input->post('nama_training').'</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Proposed Training Member, ID : '.$this->input->post('id_usulan'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('23', $footnote);
                redirect('pages/MemberSkills/proposed_training');
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
                    $this->session->set_flashdata('msgTrainingSuggestion', '<div class="alert alert-success">Data Proposed Training with ID '.$id_usulan.' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Usulan Training Member, ID : '.$id_usulan, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('23', $footnote);
                    redirect('pages/MemberSkills/proposed_training');
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
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Proposed Certification Member', $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('31', $footnote);
                redirect('pages/MemberSkills/proposed_certification');
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
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited '.$this->input->post('nama_certification').'</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Proposed Certification Member, ID : '.$this->input->post('id_usulan_cert'), $this->session->userdata['type']);
				$this->M_footnote->editFootnoteTable('31', $footnote);
                redirect('pages/MemberSkills/proposed_certification');
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
                    $this->session->set_flashdata('msg', '<div class="alert alert-success">Data Proposed Certification with ID '.$id_usulan_cert.' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Proposed Certification Member, ID : '.$id_usulan_cert, $this->session->userdata['type']);
					$this->M_footnote->editFootnoteTable('31', $footnote);
                    redirect('pages/MemberSkills/proposed_certification');
                }
            }
        }
    }
	// @codeCoverageIgnoreEnd
	// end of Certified Member

	// Training Programs
	// public function training_programs(){
	// 	if($this->session->userdata('status') !== 'admin_logged_in'){
	// 		redirect('pages/Login');
	// 	}
	// 	$this->M_auditTrail->auditTrailRead('Training Programs', $this->session->userdata['type']);

	// 	$data = array(
	// 		'training' => $this->M_trainedMember->get_training_list(),
	// 		'footnote' => $this->M_footnote->getFootnoteTable('11'),
	// 		'judul' => 'Training Programs - INSIGHT',
	// 		'konten' => 'adm_views/trainedCertifiedMember/trainingPrograms',
	// 		'admModal' => ['trainedCertifiedMember/adm_modal_training'],
	// 		'footerGraph' => []
	// 	);

	// 	$this->load->view('adm_layout/master', $data);
	// }

	// @codeCoverageIgnoreStart
	// public function add_data_training(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_training' => $this->input->post('id_training'),
	// 			'nama_training' => $this->input->post('nama_training'),
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'added',
	// 			'name' => $this->input->post('nama_training'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if ($this->M_trainedMember->check_nama_training($this->input->post('nama_training'))>0) {
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data sudah ada</div><br>');
	// 			$this->M_auditTrail->auditTrailInsertFalse('Training Member', $this->session->userdata['type']);
	// 			redirect('pages/MemberSkills/training_programs');
	// 		} else {
	// 			if($this->M_trainedMember->add_data_training($data) && $this->input->post('code') === 'private'){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil menambahkan data baru</div><br>');
	// 				$this->M_auditTrail->auditTrailInsert('Training Member', $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('11', $footnote);
	// 				redirect('pages/MemberSkills/training_programs');}}}}

	// public function edit_data_training(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_training' => $this->input->post('id_training'),
	// 			'nama_training' => $this->input->post('nama_training'),
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'edited',
	// 			'name' => $this->input->post('nama_training'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if($this->M_trainedMember->edit_data_training($this->input->post('id_training'), $data)){
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil mengedit data '.$this->input->post('nama_training').'</div><br>');
	// 			$this->M_auditTrail->auditTrailUpdate('Training Member, ID : '.$this->input->post('id_training'), $this->session->userdata['type']);
	// 			$this->M_footnote->editFootnoteTable('11', $footnote);
	// 			redirect('pages/MemberSkills/training_programs');}}}
	
	// public function delete_data_training($id_training){ 
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};

	// 	if(isset($_POST)){
	// 		if(empty($id_training)){
	// 			redirect('pages/MemberSkills/training_programs');
	// 		} else {

	// 			$nama = $this->M_trainedMember->get_nama_training($id_training);

	// 			$footnote = array(
	// 				'username_admin' => $this->session->userdata['username'],
	// 				'activity' => 'deleted',
	// 				'name' => $nama,
	// 				'timestamp' => date("Y-m-d H:i:s")
	// 			);

	// 			if($this->M_trainedMember->delete_data_training($id_training)){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data Dengan ID '.$id_training.' telah dihapus</div><br>');
	// 				$this->M_auditTrail->auditTrailDelete('Training Member, ID : '.$id_training, $this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('11', $footnote);
	// 				redirect('pages/MemberSkills/training_programs');}}}}
	// @codeCoverageIgnoreEnd
	// end of Training Programs

	// Certification Programs
	// public function certification_programs(){
	// 	if($this->session->userdata('status') !== 'admin_logged_in'){
	// 		redirect('pages/Login');
	// 	}
	// 	$this->M_auditTrail->auditTrailRead('Certification Programs', $this->session->userdata['type']);

	// 	$data = array(
	// 		'sertifikasi' => $this->M_certifiedMember->get_certification_list(),
	// 		'footnote' => $this->M_footnote->getFootnoteTable('12'),
	// 		'judul' => 'Certification Programs - INSIGHT',
	// 		'konten' => 'adm_views/trainedCertifiedMember/certificationPrograms',
	// 		'admModal' => ['trainedCertifiedMember/adm_modal_certification'],
	// 		'footerGraph' => []
	// 	);

	// 	$this->load->view('adm_layout/master', $data);
	// }

	// @codeCoverageIgnoreStart
	// public function add_data_certification(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};
	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_sertifikasi' => $this->input->post('id_sertifikasi'),
	// 			'nama_sertifikasi' => $this->input->post('nama_sertifikasi'),
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'added',
	// 			'name' => $this->input->post('nama_sertifikasi'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if ($this->M_certifiedMember->check_nama_sertifikasi($this->input->post('nama_sertifikasi'))>0) {
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data sudah ada</div><br>');
	// 			$this->M_auditTrail->auditTrailInsertFalse('Certification',$this->session->userdata['type']);
	// 			redirect('pages/MemberSkills/certification_programs');
	// 		} else {
	// 			if($this->M_certifiedMember->add_data_certification($data) && $this->input->post('code') === 'private'){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil menambahkan data baru</div><br>');
	// 				$this->M_auditTrail->auditTrailInsert('Certification',$this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('12', $footnote);
	// 				redirect('pages/MemberSkills/certification_programs');}}}}

	// public function edit_data_certification(){
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};
	// 	if(isset($_POST)){
	// 		$data = array(
	// 			'id_sertifikasi' => $this->input->post('id_sertifikasi'),
	// 			'nama_sertifikasi' => $this->input->post('nama_sertifikasi'),
	// 		);

	// 		$footnote = array(
	// 			'username_admin' => $this->session->userdata['username'],
	// 			'activity' => 'edited',
	// 			'name' => $this->input->post('nama_sertifikasi'),
	// 			'timestamp' => date("Y-m-d H:i:s")
	// 		);

	// 		if($this->M_certifiedMember->edit_data_certification($this->input->post('id_sertifikasi'), $data)){
	// 			$this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil mengedit data '.$this->input->post('nama_sertifikasi').'</div><br>');
	// 			$this->M_auditTrail->auditTrailUpdate('Certification, ID : '.$this->input->post('id_sertifikasi'),$this->session->userdata['type']);
	// 			$this->M_footnote->editFootnoteTable('12', $footnote);
	// 			redirect('pages/MemberSkills/certification_programs');}}}
	
	// public function delete_data_certification($id_sertifikasi){ 
	// 	if($this->session->userdata('role') == 'user_logged_in'){
	// 		redirect('/Err404');
	// 	};
	// 	if(isset($_POST)){
	// 		if(empty($id_sertifikasi)){
	// 			redirect('pages/MemberSkills/certification_programs');
	// 		} else {
				
	// 			$nama = $this->M_certifiedMember->get_nama_sertifikasi($id_sertifikasi);

	// 			$footnote = array(
	// 				'username_admin' => $this->session->userdata['username'],
	// 				'activity' => 'deleted',
	// 				'name' => $nama,
	// 				'timestamp' => date("Y-m-d H:i:s")
	// 			);

	// 			if($this->M_certifiedMember->delete_data_certification($id_sertifikasi)){
	// 				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data Dengan ID '.$id_sertifikasi.' telah dihapus</div><br>');
	// 				$this->M_auditTrail->auditTrailDelete('Certification, ID : '.$id_sertifikasi,$this->session->userdata['type']);
	// 				$this->M_footnote->editFootnoteTable('12', $footnote);
	// 				redirect('pages/MemberSkills/certification_programs');}}}}
	// @codeCoverageIgnoreEnd
	// end of Certification Programs
	// end of Trained - Certified Menu
}
