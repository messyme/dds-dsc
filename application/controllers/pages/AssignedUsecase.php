<?php
defined('BASEPATH') || exit('No direct script access allowed');

class AssignedUsecase extends CI_Controller
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
		$this->load->model('dscMembers/M_apprentice');
		$this->load->model('dscMembers/M_apprenticeGraph');
		$this->load->model('dscMembers/M_memberDsc');
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
		$this->M_auditTrail->auditTrailRead('Assigned Usecase ' . $nik, $this->session->userdata['type']);

        // $id_usecase_nik = $this->M_otherDataAssignments->get_id_usecase_member_detail_usecase_inprogress($this->session->userdata['username']);
        
        // $array_id_usecase = array();

        // foreach ($id_usecase_nik->result() as $id_nik) {
        //     array_push($array_id_usecase, $id_nik->id_usecase);
        // }

        $id_usecase_nik = $this->M_otherDataAssignments->get_id_usecase_member_detail_usecase_inprogress($this->session->userdata['username']);
        
        $array_id_usecase = array();

        foreach ($id_usecase_nik->result() as $id_nik) {
            array_push($array_id_usecase, $id_nik->id_usecase);
        }

		$data = array(
			'judul' => 'Assigned Use Case',
            'usecase_leader' => $this->M_otherDataAssignments->get_usecase_leader_idt($nik),
            'usecase_member' => $this->M_otherDataAssignments->get_member_detail_usecase_idt($nik),
			'member_dsc' => $this->M_memberDsc->get_all_member(),
			'groups' => $this->M_otherDataAssignments->get_groups(),
			'tribe' => $this->M_otherDataAssignments->get_tribe(),
			'squad' => $this->M_otherDataAssignments->get_squad(),
            'usecase_exclude' => $this->M_otherDataAssignments->get_usecase_exclude($nik),
            // 'usecase' => $this->M_otherDataAssignments->get_usecase_in_progress(),
			// 'usecase' => $this->M_otherDataAssignments->get_usecase_in_progress_nik($array_id_usecase),
			// 'usecase_nik' => $this->M_otherDataAssignments->get_usecase_in_progress_without_id_usecase($array_id_usecase),
            'group_selected' => '',
			'tribe_selected' => '',
			'squad_selected' => '',
			'usecase_selected' => '',
            // 'coba' => $id_usecase_nik,
			'konten' => 'adm_views/assigned_usecase/listAssignedUsecase',
			'admModal' => ['assigned_usecase/adm_modal_assigned_usecase'],
			'footerGraph' => []
		);
		$this->load->view('adm_layout/master', $data);
	}

    // @codeCoverageIgnoreStart
	public function add_data_memberusecase(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
            $data = array(
                'nik' => $this->input->post('nik'),
                'status_member' => $this->input->post('status_member'),
                'id_groups' => $this->input->post('id_groups'),
                'id_tribe' => $this->input->post('id_tribe'),
                'id_squad' => $this->input->post('id_squad'),
                'id_usecase' => $this->input->post('id_usecase')
            );

            if($this->M_memberInAssignments->add_memberusecase($data)){ 
                if($this->input->post('code') === 'private'){
                    $this->M_auditTrail->auditTrailInsert('Members in Assignments',$this->session->userdata['type']);
                }
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added!</div><br>');
            redirect('pages/AssignedUsecase');
		}
	}

    public function add_data_memberusecase_leader(){
		if($this->session->userdata('role') == 'user_logged_in'){
			redirect('/Err404');
		};
		if(isset($_POST)){
            $id_usecase = $this->input->post('id_usecase_member');
            $data_usecase = $this->M_otherDataAssignments->get_usecase_in_progress_leader($id_usecase);

            $data = array(
                'nik' => $this->input->post('nik'),
                'status_member' => $this->input->post('status_member'),
                'id_groups' => $data_usecase->id_groups,
                'id_tribe' => $data_usecase->id_tribe,
                'id_squad' => $data_usecase->id_squad,
                'id_usecase' => $id_usecase
            );

            if($this->M_memberInAssignments->add_memberusecase($data)){ 
                if($this->input->post('code') === 'private'){
                    $this->M_auditTrail->auditTrailInsert('Members in Assignments',$this->session->userdata['type']);
                }
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Data successfully added!</div><br>');
            redirect('pages/DailyTimesheet/leader_assigned/'.$data['id_usecase']);
		}
	}

    public function update_assigned_usecase($id_usecase)
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$data = array(
				'id_usecase_status' => 2
			);

			if ($this->M_otherDataAssignments->edit_usecase($id_usecase, $data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Use Case has been updated!</div><br>');
				$this->M_auditTrail->auditTrailUpdate('Use Case, ID: ' . $id_usecase, $this->session->userdata['type']);
				redirect('pages/AssignedUsecase');
			};
		}
	}

    public function update_datatable_usecase()
    {
        $filter = $this->input->post('filter');

        $nik = $this->input->post('nik');

        $i = 1;

        $string1 = '';

        if($filter == 'leader'){
            $usecase_leader = $this->M_otherDataAssignments->get_usecase_leader_idt($nik);
            foreach ($usecase_leader->result() as $use_leader) {
                $string1 .= "<tr>
                    <td>$i</td>
                    <td class=\"text-uppercase\">$use_leader->nama_usecase</td>
                    <td class=\"text-uppercase\">Leader</td>
                    <td class=\"text-uppercase\">$use_leader->deskripsi_status</td>
                    <td>
                        <div class=\"btn-group\">
                            <a href=\"";
                            
                $string1 .= base_url();

                $string1 .= "pages/DailyTimesheet/leader_assigned/$use_leader->id_usecase\" type=\"button\" class=\"btn btn-sm btn-primary\"><em class=\"fas fa-info\"></em> Detail</a>
                            <a href=\"AssignedUsecase/update_assigned_usecase/$use_leader->id_usecase\" type=\"button\" class=\"btn btn-sm btn-success\"><em class=\"fas fa-check\"></em> Done</a>
                        </div>
                    </td>
                </tr>";
                $i++;
            }

            if($usecase_leader->num_rows() == 0){
                $string1 .= "
                <tr>
                    <td colspan=\"100\" class=\"text-center\">
                        No data available in table
                    </td>
                </tr>
                ";
            }

            echo json_encode($string1);
        } else if($filter == 'member'){
            $usecase_member = $this->M_otherDataAssignments->get_member_detail_usecase_idt($nik);
            $usecase_leader = $this->M_otherDataAssignments->get_usecase_leader_idt($nik);
            $cek = 0;
            foreach ($usecase_member->result() as $use_member) {
                $cek2 = 0;
                foreach ($usecase_leader->result() as $use_leader) {
                    if ($use_member->id_usecase == $use_leader->id_usecase) {
                        $cek2 = 1;
                        $cek++;
                    }
                }
                if ($cek2 == 0) {
                    $string1 .= "
                    <tr>
                        <td>$i</td>
                        <td class=\"text-uppercase\">$use_member->nama_usecase</td>
                        <td class=\"text-uppercase\">Member</td>
                        <td class=\"text-uppercase\">$use_member->deskripsi_status</td>
                        <td>
                            <div class=\"btn-group\">
                                <a href=\"";
                                
                    $string1 .= base_url();

                    $string1 .= "pages/DailyTimesheet/member_detail/$use_member->id_usecase\" type=\"button\" class=\"btn btn-sm btn-primary\"><em class=\"fas fa-info\"></em> Detail</a>
                            </div>
                        </td>
                    </tr>
                    ";
                    $i++;
                }
            }

            if($usecase_member->num_rows() == 0 || $usecase_member->num_rows() == $cek){
                $string1 .= "
                <tr>
                    <td colspan=\"100\" class=\"text-center\">
                        No data available in table
                    </td>
                </tr>
                ";
            }

            echo json_encode($string1);
        } else {
            $usecase_leader = $this->M_otherDataAssignments->get_usecase_leader_idt($nik);
            foreach ($usecase_leader->result() as $use_leader) {
                $string1 .= "<tr>
                    <td>$i</td>
                    <td class=\"text-uppercase\">$use_leader->nama_usecase</td>
                    <td class=\"text-uppercase\">Leader</td>
                    <td class=\"text-uppercase\">$use_leader->deskripsi_status</td>
                    <td>
                        <div class=\"btn-group\">
                            <a href=\"";

                $string1 .= base_url();

                $string1 .= "pages/DailyTimesheet/leader_assigned/$use_leader->id_usecase\" type=\"button\" class=\"btn btn-sm btn-primary\"><em class=\"fas fa-info\"></em> Detail</a>
                            <a href=\"AssignedUsecase/update_assigned_usecase/$use_leader->id_usecase\" type=\"button\" class=\"btn btn-sm btn-success\"><em class=\"fas fa-check\"></em> Done</a>
                        </div>
                    </td>
                </tr>";
                $i++;
            }

            $usecase_member = $this->M_otherDataAssignments->get_member_detail_usecase_idt($nik);
            foreach ($usecase_member->result() as $use_member) {
                $cek = 0;
                foreach ($usecase_leader->result() as $use_leader) {
                    if ($use_member->id_usecase == $use_leader->id_usecase) {
                        $cek = 1;
                        break;
                    }
                }
                if ($cek == 0) {
                    $string1 .= "
                    <tr>
                        <td>$i</td>
                        <td class=\"text-uppercase\">$use_member->nama_usecase</td>
                        <td class=\"text-uppercase\">Member</td>
                        <td class=\"text-uppercase\">$use_member->deskripsi_status</td>
                        <td>
                            <div class=\"btn-group\">
                                <a href=\"";
                                
                    $string1 .= base_url();

                    $string1 .= "pages/DailyTimesheet/member_detail/$use_member->id_usecase\" type=\"button\" class=\"btn btn-sm btn-primary\"><em class=\"fas fa-info\"></em> Detail</a>
                            </div>
                        </td>
                    </tr>
                    ";
                    $i++;
                }
            }

            if($usecase_member->num_rows() == 0 and $usecase_leader->num_rows() == 0){
                $string1 .= "
                <tr>
                    <td colspan=\"100\" class=\"text-center\">
                        No data available in table
                    </td>
                </tr>
                ";
            }

            echo json_encode($string1);
        }
    }

	public function detailleader()
	{
		if ($this->session->userdata('status') == 'member_logged_in') {
			redirect('pages/Login');
		}

		$nik = $this->session->userdata['username'];
		$this->M_auditTrail->auditTrailRead('Leader ', $this->session->userdata['type']);

		$data = array(
			'judul' => 'Daily Timesheet | Leader',
			'konten' => 'adm_views/Assigned_usecase/detailMemberLeader',
			'admModal' => [],
			'footerGraph' => []
		);
		$this->load->view('adm_layout/master', $data);
	}

	public function detailmember()
	{
		if ($this->session->userdata('status') == 'member_logged_in') {
			redirect('pages/Login');
		}

		$nik = $this->session->userdata['username'];
		$this->M_auditTrail->auditTrailRead('Leader ', $this->session->userdata['type']);

		$data = array(
			'judul' => 'Daily Timesheet | Leader',
			'konten' => 'adm_views/Assigned_usecase/detailMemberAssigned',
			'admModal' => [],
			'footerGraph' => []
		);
		$this->load->view('adm_layout/master', $data);
	}

    // Detail Use Case
    public function detailusecase($id_usecase)
    {
        if ($this->session->userdata('status') == 'user_logged_in') {
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
            'konten' => 'adm_views/assigned_usecase/detailUsecase',
            'quarter' => ['q1', 'q2', 'q3', 'q4']
        );

        $this->load->view('adm_layout/master', $data);
    }
}
