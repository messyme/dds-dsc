<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Profile extends CI_Controller
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
		$this->load->model('dscMembers/M_apprentice');
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
		if ($this->session->userdata('status') == 'member_logged_in') {
			redirect('pages/Login');
		}

		$nik = $this->session->userdata['username'];
		$this->M_auditTrail->auditTrailRead('Profile ' . $nik, $this->session->userdata['type']);

		$id_usecase_nik = $this->M_otherDataAssignments->get_id_usecase_member_detail_usecase_inprogress($this->session->userdata['username']);
        
        $array_id_usecase = array();

        foreach ($id_usecase_nik->result() as $id_nik) {
            array_push($array_id_usecase, $id_nik->id_usecase);
        }

		$data = array(
			'member_dsc' => $this->M_memberDsc->get_detail_member($nik),
			'training' => $this->M_trainedMember->get_trained_member_detail($nik),
			'certification' => $this->M_certifiedMember->get_certified_member_detail($nik),
			'usulan' => $this->M_memberDsc->get_usulan_training($nik),
			'usulan_cert' => $this->M_memberDsc->get_usulan_certification($nik),
			'usecases' => $this->M_otherDataAssignments->get_member_detail_usecase($nik),
			'pathway' => $this->M_otherDataAssignments->get_pathway(),
			'groups' => $this->M_otherDataAssignments->get_groups(),
			'tribe' => $this->M_otherDataAssignments->get_tribe(),
			'squad' => $this->M_otherDataAssignments->get_squad(),
			'usecase_exclude' => $this->M_otherDataAssignments->get_usecase_exclude($nik),
			'okr_member' => $this->M_otherDataAssignments->get_okr_member_by_nik($nik),
			'avg_okr_member' => $this->M_otherDataAssignments->get_avg_progress_okr_member_by_nik($nik),
			'category_okr' => $this->M_otherDataAssignments->get_category_okr(),
			'complexity_okr' => $this->M_otherDataAssignments->get_complexity_okr(),
			'too_okr' => $this->M_otherDataAssignments->get_too_okr(),
			'tof_okr' => $this->M_otherDataAssignments->get_tof_okr(),
			'all_member' => $this->M_memberDsc->get_all_member_asesor($nik),
			'subordinate' => $this->M_memberDsc->get_subordinate($nik),
			'subordinate_internship' => $this->M_apprentice->get_member_internship_leader($nik),
			'universitas' => $this->M_otherDataMember->get_universitas(),
			'cluster_ed' => $this->M_otherDataMember->get_cluster_ed(),
			'ed_bg' => $this->M_otherDataMember->get_ed_bg(),
			'cluster_ed_selected' => '',
			'ed_bg_selected' => '',
			// 'usecase' => $this->M_otherDataAssignments->get_usecase_in_progress(),
			// 'usecase_nik' => $this->M_otherDataAssignments->get_usecase_in_progress_without_id_usecase($array_id_usecase),
			'group_selected' => '',
			'tribe_selected' => '',
			'squad_selected' => '',
			'usecase_selected' => '',
			'judul' => 'My Profile',
			'konten' => 'adm_views/profile/userProfile',
			'admModal' => ['profile/adm_modal_userProfile'],
			'footerGraph' => []
		);
		$this->load->view('adm_layout/master', $data);
	}

	public function request_edit($nik)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};
		if (isset($_POST)) {
			if (empty($nik)) {
				redirect('pages/Profile');
			} else {
				$verify_data = array(
					'verify_data' => 2,
				);

				if ($this->M_memberDsc->edit_member_dsc($nik, $verify_data)) {
					redirect('pages/Profile');
				}
			}
		}
	}

	public function upload_training()
	{
		$this->M_auditTrail->auditTrailInsert('Trained Member', $this->session->userdata['type']);
		$this->load->view('upload_training');
	}

	public function delete_data_trainedmember($id_trained_member)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_trained_member)) {
				redirect('pages/Profile');
			} else {
				if ($this->M_trainedMember->delete_trained_member($id_trained_member)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data with ID ' . $id_trained_member . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Trained Members, ID : ' . $id_trained_member, $this->session->userdata['type']);
					redirect('pages/Profile');
				}
			}
		}
	}

	public function getEditTrainedMember($id)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		};

		$this->M_auditTrail->auditTrailRead('Edit Trained Member, ID : ' . $id, $this->session->userdata['type']);

		$nik = $this->session->userdata['username'];

		$data = array(
			'member_dsc' => $this->M_memberDsc->get_detail_member($nik),
			'member_select' => $this->M_trainedMember->get_trained_memberEdit($id),
			'pathway' => $this->M_otherDataAssignments->get_pathway(),
			'trained_member' => $this->M_trainedMember->get_trained_member(),
			'judul' => 'Edit Trained Members - INSIGHT',
			'konten' => 'adm_views/profile/editTrainedMember',
			'admModal' => [],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	public function updateDataTrainedMember()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		$targetDir = "public/assets/uploads/training/";
		$fileNameTmp = basename($_FILES["bukti_pelatihan"]["name"]);
		$fileName = $_POST['nik'] . '_' . basename($_FILES["bukti_pelatihan"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
		$allowTypes = array('jpg', 'png', 'jpeg', 'pdf');

		$id = $this->input->post('id_trained_member');

		if (empty($fileNameTmp)) {
			$data = array(
				'nik ' => $this->input->post('nik'),
				'nama_pelatihan' => $this->input->post('nama_pelatihan'),
				'id_pathway' => $this->input->post('id_pathway'),
				'tahun_pelatihan' => $this->input->post('tahun_pelatihan'),
			);

			if ($this->M_trainedMember->updateDataTrainedMember($id, $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Trained Member, ID : ' . $id = $this->input->post('id_trained_member'), $this->session->userdata['type']);
				redirect('pages/Profile');
			}
		} else {
			if (in_array($fileType, $allowTypes)) {
				if (move_uploaded_file($_FILES["bukti_pelatihan"]["tmp_name"], $targetFilePath)) {
					$data = array(
						'nik ' => $this->input->post('nik'),
						'nama_pelatihan' => $this->input->post('nama_pelatihan'),
						'id_pathway' => $this->input->post('id_pathway'),
						'tahun_pelatihan' => $this->input->post('tahun_pelatihan'),
						'bukti_pelatihan' => $fileName,
					);

					if ($this->M_trainedMember->updateDataTrainedMember($id, $data)) {
						$this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully edited</div><br>');
						$this->M_auditTrail->auditTrailUpdate('Trained Member, ID : ' . $id = $this->input->post('id_trained_member'), $this->session->userdata['type']);
						redirect('pages/Profile');
					}
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div><br>');
					$this->M_auditTrail->auditTrailUpdateFalse('Trained Member, ID : ' . $id = $this->input->post('id_trained_member'), $this->session->userdata['type']);
					redirect('pages/Profile/getEditTrainedMember/' . $id);
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, only JPG, JPEG, PNG, & PDF files are allowed to upload.</div><br>');
				$this->M_auditTrail->auditTrailUpdateFalse('Trained Member, ID : ' . $id = $this->input->post('id_trained_member'), $this->session->userdata['type']);
				redirect('pages/Profile/getEditTrainedMember/' . $id);
			}
		}
	}

	public function upload_sertifikasi()
	{
		$this->M_auditTrail->auditTrailInsert('Certified Member List', $this->session->userdata['type']);
		$this->load->view('upload_sertifikasi');
	}

	public function delete_data_certifiedmember($id_certified_member)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			if (empty($id_certified_member)) {
				redirect('pages/Profile');
			} else {
				if ($this->M_certifiedMember->delete_certifiedmember($id_certified_member)) {
					$this->session->set_flashdata('msgCertificate', '<div class="alert alert-success">Data with ID ' . $id_certified_member . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Certified Member, ID : ' . $id_certified_member, $this->session->userdata['type']);
					redirect('pages/Profile');
				}
			}
		}
	}

	public function getEditCertifiedMember($id)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		$this->M_auditTrail->auditTrailRead('Edit Certified Member, ID : ' . $id, $this->session->userdata['type']);

		$nik = $this->session->userdata['username'];

		$data = array(
			'member_dsc' => $this->M_memberDsc->get_detail_member($nik),
			'member_select' => $this->M_certifiedMember->get_certified_memberEdit($id),
			'certified_member' => $this->M_certifiedMember->get_certified_member(),
			'pathway' => $this->M_otherDataAssignments->get_pathway(),
			'judul' => 'Edit Certified Members - INSIGHT',
			'konten' => 'adm_views/profile/editCertifiedMember',
			'admModal' => [],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}

	public function updateDataCertifiedMember()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		$targetDir = "public/assets/uploads/sertifikasi/";
		$fileNameTmp = basename($_FILES["bukti_sertifikasi"]["name"]);
		$fileName = $_POST['nik'] . '_' . basename($_FILES["bukti_sertifikasi"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
		$allowTypes = array('jpg', 'png', 'jpeg', 'pdf');

		$id = $this->input->post('id_certified_member');

		if (empty($fileNameTmp)) {
			$data = array(
				'nik ' => $this->input->post('nik'),
				'nama_sertifikasi ' => $this->input->post('nama_sertifikasi'),
				'id_pathway' => $this->input->post('id_pathway'),
				'tahun_sertifikasi' => $this->input->post('tahun_sertifikasi'),
			);

			if ($this->M_certifiedMember->updateDataCertifiedMember($id, $data)) {
				$this->session->set_flashdata('msgCertificate', '<div class="alert alert-success">Data successfully edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Certified Member, ID : ' . $id, $this->session->userdata['type']);
				redirect('pages/Profile');
			}
		} else {
			if (in_array($fileType, $allowTypes)) {
				if (move_uploaded_file($_FILES["bukti_sertifikasi"]["tmp_name"], $targetFilePath)) {
					$data = array(
						'nik ' => $this->input->post('nik'),
						'nama_sertifikasi' => $this->input->post('nama_sertifikasi'),
						'id_pathway' => $this->input->post('id_pathway'),
						'tahun_sertifikasi' => $this->input->post('tahun_sertifikasi'),
						'bukti_sertifikasi' => $fileName,
					);

					if ($this->M_certifiedMember->updateDataCertifiedMember($id, $data)) {
						$this->session->set_flashdata('msgCertificate', '<div class="alert alert-success">Data successfully edited</div><br>');
						$this->M_auditTrail->auditTrailUpdate('Certified Member, ID : ' . $id, $this->session->userdata['type']);
						redirect('pages/Profile');
					}
				} else {
					$this->session->set_flashdata('msgCertificate', '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div><br>');
					$this->M_auditTrail->auditTrailUpdateFalse('Certified Member, ID : ' . $id, $this->session->userdata['type']);
					redirect('pages/Profile/getEditCertifiedMember/' . $id);
				}
			} else {
				$this->session->set_flashdata('msgCertificate', '<div class="alert alert-danger">Sorry, only JPG, JPEG, PNG, & PDF files are allowed to upload.</div><br>');
				$this->M_auditTrail->auditTrailUpdateFalse('Certified Member, ID : ' . $id, $this->session->userdata['type']);
				redirect('pages/Profile/getEditCertifiedMember/' . $id);
			}
		}
	}

	public function add_data_usulan_training()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_training' => $this->input->post('nama_training'),
				'id_pathway' => $this->input->post('id_pathway'),
				'training_source' => $this->input->post('training_source'),
				'kuartal' => $this->input->post('kuartal'),
				'year' => $this->input->post('year')
			);

			if ($this->M_memberDsc->add_usulan_training($data)) {
				$this->session->set_flashdata('msgTrainingSuggestion', '<div class="alert alert-success">Data successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Proposed Training Member', $this->session->userdata['type']);
				redirect('pages/Profile');
			};
		}
	}

	public function delete_data_usulan_training($id_usulan)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			if (empty($id_usulan)) {
				redirect('pages/Profile');
			} else {
				if ($this->M_memberDsc->delete_usulan_training($id_usulan)) {
					$this->session->set_flashdata('msgTrainingSuggestion', '<div class="alert alert-success">Data Proposed Training Dengan ID ' . $id_usulan . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Proposed Training Member, ID : ' . $id_usulan, $this->session->userdata['type']);
					redirect('pages/Profile');
				}
			}
		}
	}

	public function edit_data_usulan_training()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		};

		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_training' => $this->input->post('nama_training'),
				'id_pathway' => $this->input->post('id_pathway'),
				'training_source' => $this->input->post('training_source'),
				'kuartal' => $this->input->post('kuartal'),
				'year' => $this->input->post('year')
			);

			if ($this->M_memberDsc->edit_usulan_training($this->input->post('id_usulan'), $data)) {
				$this->session->set_flashdata('msgTrainingSuggestion', '<div class="alert alert-success">Data successfully edited' . $this->input->post('nama_training') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Proposed Training Member, ID : ' . $this->input->post('id_usulan'), $this->session->userdata['type']);
				redirect('pages/Profile');
			}
		}
	}

	public function add_data_usulan_certification()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_certification' => $this->input->post('nama_certification'),
				'id_pathway' => $this->input->post('id_pathway'),
				'certification_source' => $this->input->post('certification_source'),
				'kuartal' => $this->input->post('kuartal'),
				'year' => $this->input->post('year')
			);

			if ($this->M_memberDsc->add_usulan_certification($data)) {
				$this->session->set_flashdata('msgCertificationSuggestion', '<div class="alert alert-success">Data successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Proposed Certification Member', $this->session->userdata['type']);
				redirect('pages/Profile');
			};
		}
	}

	public function delete_data_usulan_certification($id_usulan_cert)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			if (empty($id_usulan_cert)) {
				redirect('pages/Profile');
			} else {
				if ($this->M_memberDsc->delete_usulan_certification($id_usulan_cert)) {
					$this->session->set_flashdata('msgCertificationSuggestion', '<div class="alert alert-success">Data Proposed Certification with ID ' . $id_usulan_cert . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Proposed Certification Member, ID : ' . $id_usulan_cert, $this->session->userdata['type']);
					redirect('pages/Profile');
				}
			}
		}
	}

	public function edit_data_usulan_certification()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		};

		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_certification' => $this->input->post('nama_certification'),
				'id_pathway' => $this->input->post('id_pathway'),
				'certification_source' => $this->input->post('certification_source'),
				'kuartal' => $this->input->post('kuartal'),
				'year' => $this->input->post('year')
			);

			if ($this->M_memberDsc->edit_usulan_certification($this->input->post('id_usulan_cert'), $data)) {
				$this->session->set_flashdata('msgCertificationSuggestion', '<div class="alert alert-success">Data successfully edited' . $this->input->post('nama_certification') . '</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Proposed Certification Member, ID : ' . $this->input->post('id_usulan_cert'), $this->session->userdata['type']);
				redirect('pages/Profile');
			}
		}
	}

	public function add_data_memberusecase()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		};

		if (isset($_POST)) {
			$data = array(
				'nik' => $this->input->post('nik'),
				'status_member' => $this->input->post('status_member'),
				'id_groups' => $this->M_otherDataAssignments->get_usecase_group($this->input->post('id_usecase')),
				'id_tribe' => $this->M_otherDataAssignments->get_usecase_tribe($this->input->post('id_usecase')),
				'id_squad' => $this->M_otherDataAssignments->get_usecase_squad($this->input->post('id_usecase')),
				'id_usecase' => $this->input->post('id_usecase')
			);

			if ($this->M_memberInAssignments->add_memberusecase($data)) {
				$this->M_auditTrail->auditTrailInsert('Members in Assignments', $this->session->userdata['type']);
			}

			$this->session->set_flashdata('msgUseCase', '<div class="alert alert-success">Data successfully added</div><br>');
			redirect('pages/Profile');
		}
	}

	public function delete_data_memberusecase($id_member_usecase)
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			if (empty($id_member_usecase)) {
				redirect('pages/Profile');
			} else {
				if ($this->M_memberInAssignments->delete_memberusecase($id_member_usecase)) {
					$this->session->set_flashdata('msgUseCase', '<div class="alert alert-success">Data with ID ' . $id_member_usecase . ' successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Members in Assignments, ID : ' . $id_member_usecase, $this->session->userdata['type']);
					redirect('pages/Profile');
				}
			}
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

		$nik = $this->session->userdata['username'];

		$this->M_auditTrail->auditTrailRead('Edit Member in Assignments, ID : ' . $id, $this->session->userdata['type']);

		$data = array(
			'member_select' => $this->M_memberInAssignments->get_member_in_assignmentEdit($id),
			'member_usecase' => $this->M_memberInAssignments->get_member_in_assignment(),
			'member_dsc' => $this->M_memberDsc->get_detail_member($nik),
			'groups' => $this->M_otherDataAssignments->get_groups(),
			'tribe' => $this->M_otherDataAssignments->get_tribe(),
			'squad' => $this->M_otherDataAssignments->get_squad(),
			'usecase' => $this->M_otherDataAssignments->get_usecase(),
			'judul' => 'Edit Members in Assignments - INSIGHT',
			'konten' => 'adm_views/Profile/editMemberAssignment',
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

		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		$data = array(
			'nik' => $this->input->post('nik'),
			'status_member' => $this->input->post('status_memberEdit'),
			'id_groups' => $this->input->post('id_groupsEdit'),
			'id_tribe' => $this->input->post('id_tribeEdit'),
			'id_squad' => $this->input->post('id_squadEdit'),
			'id_usecase' => $this->input->post('id_usecaseEdit')
		);

		$id = $this->input->post('id_member_usecase');

		if ($this->M_memberInAssignments->edit_memberusecase($id, $data)) {
			$this->session->set_flashdata('msgUseCase', '<div class="alert alert-success">Data successfully deleted</div><br>');
			$this->M_auditTrail->auditTrailUpdate('Member in Assignments, id: ' . $id, $this->session->userdata['type']);
			redirect('pages/Profile');
		}
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

            if($this->M_memberDsc->add_subordinate($data)){
                $this->session->set_flashdata('msgSubordinate', '<div class="alert alert-success">New Data has been added successfully</div><br>');
				$this->M_auditTrail->auditTrailInsert('Subordinate Member', $this->session->userdata['type']);
                redirect('pages/Profile');
            };
        }
    }

	public function delete_data_subordinate($id_superior_subordinate){
        if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};

        if(isset($_POST)){
            if(empty($id_superior_subordinate)){
                redirect('pages/Profile');
            } else {

                if($this->M_memberDsc->delete_subordinate($id_superior_subordinate)){
                    $this->session->set_flashdata('msgSubordinate', '<div class="alert alert-success">Subordinate Data with ID '.$id_superior_subordinate.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Subordinate Member, ID : '.$id_superior_subordinate, $this->session->userdata['type']);
                    redirect('pages/Profile');
                }
            }
        }
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

			if ($this->M_apprentice->check_nim_member($this->input->post('nim'))>0) {
				$this->session->set_flashdata('msgSubordinateInternship', '<div class="alert alert-danger">NIM exists!</div><br>');
				$this->M_auditTrail->auditTrailInsertFalse('Apprentice', $this->session->userdata['type']);
				redirect('pages/Profile');
			} else {
				if($this->M_apprentice->add_internship($data)){
					$this->session->set_flashdata('msgSubordinateInternship', '<div class="alert alert-success">New data has been added successfully</div><br>');
					$this->M_auditTrail->auditTrailInsert('Apprentice', $this->session->userdata['type']);
					redirect('pages/Profile');
				}
			}
		}
	}

	public function delete_data_internship($nim){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			if(empty($nim)){
				redirect('pages/Profile');
			} else {
				if($this->M_apprentice->delete_internship($nim)){
					$this->session->set_flashdata('msgSubordinateInternship', '<div class="alert alert-success">Apprentice with NIM '.$nim.' has been deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Apprentice, ID : '.$nim, $this->session->userdata['type']);
					redirect('pages/Profile');
				}
			}
		}
	}

	public function edit_data_internship($nim){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			$data = array(
				'nim' => $nim,
				'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
				'id_cluster_ed' => $this->input->post('id_cluster_ed'),
				'id_ed_bg' => $this->input->post('id_ed_bg'),
				'nik' => $this->input->post('nik'),
				'kode_universitas' => $this->input->post('kode_universitas'),
				'tahun_intern' => $this->input->post('tahun_intern'),
				'kontrak_mulai_internship' => $this->input->post('kontrak_mulai_internship'),
				'kontrak_selesai_internship' => $this->input->post('kontrak_selesai_internship')
			);

			if($this->M_apprentice->edit_internship($nim, $data)){
				$this->session->set_flashdata('msgSubordinateInternship', '<div class="alert alert-success">Apprentice with name '.$this->input->post('nama_mahasiswa').' has been edited</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Apprentice, ID : '.$this->input->post('nim'),$this->session->userdata['type']);
				redirect('pages/Profile');
			}
		}
	}

	public function update_statusAlumni_internship($nim){ 
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
			if(empty($nim)){
				$this->M_auditTrail->auditTrailUpdateFalse('DSC Alumni (Apprentice) resign, nim : '.$nim, $this->session->userdata['type']);
				redirect('pages/Profile');
		} else {

			if($this->M_apprentice->updateStatusIntership($nim,1)){
				$this->session->set_flashdata('msgSubordinateInternship', '<div class="alert alert-success">Apprentice with NIM '.$nim.' has been resigned</div><br>');
				$this->M_auditTrail->auditTrailUpdate('DSC Alumni (Apprentice) resign, nim : '.$nim, $this->session->userdata['type']);
				redirect('pages/Profile');}
			}
		}
	}

	public function add_data_okr_member()
	{
		if ($this->session->userdata('role') == 'user_logged_in') {
			redirect('/Err404');
		};

		if (isset($_POST)) {
			$data = array(
				'id_usecase' => $this->input->post('id_usecase'),
				'member' => $this->input->post('okr_member_member'),
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

			if ($this->M_otherDataAssignments->add_okr_member($data)) {
				$this->session->set_flashdata('msgOKRMember', '<div class="alert alert-success" id="msgOKRMember">OKR Member successfully added</div><br>');
				$this->M_auditTrail->auditTrailInsert('Use Case OKR Member', $this->session->userdata['type']);
				redirect('pages/Profile');
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
				// 'member' => $this->input->post('okr_member_member_new'),
				'kodifikasi' => $this->input->post('okr_member_kodifikasi_new'),
				'category_okr' => $this->input->post('okr_member_category_okr_new'),
				'objective' => $this->input->post('okr_member_objective_new'),
				'key_result' => $this->input->post('okr_member_key_result_new'),
				'definition_of_done' => $this->input->post('okr_member_dod_new'),
				'quarter' => $this->input->post('okr_member_quarter_new'),
				'year' => $this->input->post('okr_member_year_new'),
				// 'assignee' => $this->input->post('okr_member_assignee_new'),
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

			if ($this->M_otherDataAssignments->edit_okr_member($this->input->post('id_okr_member'), $data)) {
				$this->session->set_flashdata('msgOKRMember', '<div class="alert alert-success" id="msgOKRMember">OKR Member successfully edited. </div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case OKR Member, ID : ' . $this->input->post('id_okr_member'), $this->session->userdata['type']);
				redirect('pages/Profile');
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
				redirect('pages/Profile');
			} else {
				if ($this->M_otherDataAssignments->delete_okr_member($id_okr_member)) {
					$this->session->set_flashdata('msgOKRMember', '<div class="alert alert-success" id="msgOKRMember">OKR Member successfully deleted</div><br>');
					$this->M_auditTrail->auditTrailDelete('Use Case OKR Member, ID : ' . $id_okr_member, $this->session->userdata['type']);
					redirect('pages/Profile');
				}
			}
		}
	}
	// @codeCoverageIgnoreEnd
}
