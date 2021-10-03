<?php
defined('BASEPATH') || exit('No direct script access allowed');

class TalentCapability extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// DSC Members
		$this->load->model('dscMembers/M_memberDsc');

		//Talent Capability
		$this->load->model('talentCapability/M_talentCapability');
		$this->load->model('talentCapability/M_otherDataTalentCapability');

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

		$nik = $this->session->userdata['username'];
		$this->M_auditTrail->auditTrailRead('Talent Capability', $this->session->userdata['type']);

		$data = array(
			'member_dsc' => $this->M_memberDsc->get_detail_member($nik),
			'level_skill' => $this->M_otherDataTalentCapability->get_proficiency_level(),
			'skill_list' => $this->M_otherDataTalentCapability->get_skill_list(),
			'member_talent' => $this->M_talentCapability->get_member_talent($nik),
			'footnote' => $this->M_footnote->getFootnoteTable('53'),
			'judul' => 'Talent Capability - INSIGHT',
			'konten' => 'adm_views/trainedCertifiedMember/formTalentCapability',
			'footerGraph' => [],
		);

		$this->load->view('adm_layout/master', $data);
	}

	//add talent capability
	public function add_data_talent_capability()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		if (isset($_POST)) {
			$skill_list = $this->input->post('skill[]');
			$value_list = $this->input->post('value[]');
			for ($i = 0; $i <= count($skill_list); $i++) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'timestamp' => $this->input->post('timestamp'),
					'id_skill_list' => $skill_list[$i],
					'id_proficiency_level' => $value_list[$i],
					'analytic_tools' => $this->input->post('tools'),
				);

				$footnote = array(
					'username_admin' => $this->session->userdata['username'],
					'activity' => 'added',
					'name' => $this->input->post('nik'),
					'timestamp' => date("Y-m-d H:i:s")
				);

				$this->M_footnote->editFootnoteTable('53', $footnote);

				if ($this->M_talentCapability->add_talent_capability($data)) {
					if ($this->input->post('code') === 'private') {
						$this->M_auditTrail->auditTrailInsert('Form Talent Capability', $this->session->userdata['type']);
					}
					$this->M_talentCapability->update_avg_proficiency($data['id_skill_list']);
					$this->M_talentCapability->update_prov_weight($data['id_skill_list']);
				};
			}


			$this->session->set_flashdata('msg_add_talent', '<div class="alert alert-success">Talent Capability successfully added</div><br>');
			redirect('pages/TalentCapability');
		}
	}

	// Talent Capability
	public function talent_capability_result()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Talent Capability', $this->session->userdata['type']);

		$data = array(
			'total_responden_role' => $this->M_talentCapability->get_total_responden_role(),
			'total_responden_level' => $this->M_talentCapability->get_total_responden_level(),
			'total_responden' => $this->M_talentCapability->get_total_responden(),
			'total_skill' => $this->M_talentCapability->get_total_skill(),
			'skill_general_mandatory' => $this->M_talentCapability->get_skill_general_mandatory(),
			'skill_general_nice_to_have' => $this->M_talentCapability->get_skill_general_nice_to_have(),
			'skill_specific_mandatory' => $this->M_talentCapability->get_skill_specific_mandatory(),
			'skill_specific_nice_to_have' => $this->M_talentCapability->get_skill_specific_nice_to_have(),
			'skill_mapping' => $this->M_talentCapability->get_skill_mapping(),
			'category_skill' => $this->M_otherDataTalentCapability->get_category_skill(),
			'overall_average' => $this->M_talentCapability->get_overall_average(),
			'junior_average' => $this->M_talentCapability->get_junior_average(),
			'middle_average' => $this->M_talentCapability->get_middle_average(),
			'senior_average' => $this->M_talentCapability->get_senior_average(),
			'avg_avg_real_overall' => $this->M_talentCapability->get_avg_avg_real_overall(),
			'avg_avg_real_junior' => $this->M_talentCapability->get_avg_avg_real_junior(),
			'avg_avg_real_middle' => $this->M_talentCapability->get_avg_avg_real_middle(),
			'avg_avg_real_senior' => $this->M_talentCapability->get_avg_avg_real_senior(),
			'avg_avg_target_overall' => $this->M_talentCapability->get_avg_avg_target_overall(),
			'avg_avg_target_junior' => $this->M_talentCapability->get_avg_avg_target_junior(),
			'avg_avg_target_middle' => $this->M_talentCapability->get_avg_avg_target_middle(),
			'avg_avg_target_senior' => $this->M_talentCapability->get_avg_avg_target_senior(),
			'avg_achievement_overall' => $this->M_talentCapability->get_avg_achievement_overall(),
			'avg_achievement_junior' => $this->M_talentCapability->get_avg_achievement_junior(),
			'avg_achievement_middle' => $this->M_talentCapability->get_avg_achievement_middle(),
			'avg_achievement_senior' => $this->M_talentCapability->get_avg_achievement_senior(),
			'colors_min_prof' => array(1 => "#D83737", 2 => "#E8761D", 3 => "#F5B503", 4 => "#82A92E", 5 => "#0E9D58"),

			'usecase_difficultly' => $this->M_talentCapability->get_usecase_difficultly(),
			'average_pw' => $this->M_talentCapability->average_pw(),
			'capability_summary' => $this->M_talentCapability->capability_summary(),
			'judul' => 'Talent Capability Result - INSIGHT',
			'konten' => 'adm_views/trainedCertifiedMember/talentCapability',
			'admModal' => [],
			'footerGraph' => ['talentCapabilitySummary/summary']
		);

		$this->load->view('adm_layout/master', $data);
	}

	public function update_table_skill_mapping()
	{
		$filter = $this->input->post('filter');
		$i = 1;




		$string1 = '';

		if ($filter == 'All Category') {
			$skill_mapping = $this->M_talentCapability->get_skill_mapping();
			$colors_min_prof = array(1 => "#D83737", 2 => "#E8761D", 3 => "#F5B503", 4 => "#82A92E", 5 => "#0E9D58");


			foreach ($skill_mapping->result() as $sm) {
				$string1 .= "
			<tr>
              <td>$i</td>
              <td class=\"text-uppercase\">$sm->name_skill </td>
              <td class=\"text-uppercase\">$sm->name_category_skill </td>
              <td class=\"text-uppercase\">$sm->name_skill_list_type </td>
              <td class=\"text-uppercase\">$sm->name_skill_list_require </td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->j1];
				$string1 .= ";\">$sm->j1 </td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->j2];
				$string1 .= ";\">$sm->j2 </td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->j3];
				$string1 .= ";\">$sm->j3 </td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->m1];
				$string1 .= ";\">$sm->m1 </td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->m2];
				$string1 .= ";\">$sm->m2 </td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->m3];
				$string1 .= ";\">$sm->m3 </td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->s1];
				$string1 .= ";\">$sm->s1 </td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->s2];
				$string1 .= ";\">$sm->s2 </td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->s3];
				$string1 .= ";\">$sm->s3 </td>
              <td class=\"text-uppercase pw\">$sm->provisional_weight </td>             
             
            </tr>";
				$i++;
			}


			if ($skill_mapping->num_rows() == 0) {
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
			$skill_mapping_filter = $this->M_talentCapability->get_skill_mapping_filter_by_category($filter);
			$colors_min_prof = array(1 => "#D83737", 2 => "#E8761D", 3 => "#F5B503", 4 => "#82A92E", 5 => "#0E9D58");

			foreach ($skill_mapping_filter->result() as $sm) {
				$string1 .= "
			<tr>
              <td>$i</td>
              <td class=\"text-uppercase\">$sm->name_skill </td>
              <td class=\"text-uppercase\">$sm->name_category_skill </td>
              <td class=\"text-uppercase\">$sm->name_skill_list_type </td>
              <td class=\"text-uppercase\">$sm->name_skill_list_require </td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->j1];
				$string1 .= ";\">$sm->j1</td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->j2];
				$string1 .= ";\">$sm->j2</td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->j3];
				$string1 .= ";\">$sm->j3</td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->m1];
				$string1 .= ";\">$sm->m1</td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->m2];
				$string1 .= ";\">$sm->m2</td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->m3];
				$string1 .= ";\">$sm->m3</td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->s1];
				$string1 .= ";\">$sm->s1</td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->s2];
				$string1 .= ";\">$sm->s2</td>
              <td class=\"text-uppercase\" style=\"background-color:";
				$string1 .= $colors_min_prof[$sm->s3];
				$string1 .= ";\">$sm->s3</td>
              <td class=\"text-uppercase pw\">$sm->provisional_weight </td>             
            </tr>
			";
				$i++;
			}

			if ($skill_mapping_filter->num_rows() == 0) {
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

	// Talent Capability Summary
	public function talent_capability_summary()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Talent Capability', $this->session->userdata['type']);

		$data = array(
			'minimum_proficiency_level' => $this->M_otherDataTalentCapability->get_minimum_proficiency_level(),
			'talent_capability_summary' => $this->M_talentCapability->get_talent_capability_summary(),
			'judul' => 'Talent Capability Summary - INSIGHT',
			'konten' => 'adm_views/trainedCertifiedMember/talentCapabilitySummary',
			'admModal' => [],
			'footerGraph' => []
		);

		$this->load->view('adm_layout/master', $data);
	}


	//jenis skill visualisation
	public function talent_capability_section_1()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Talent Capability', $this->session->userdata['type']);

		$data = array(
			'statistics_descriptive' => $this->M_talentCapability->get_proficiency_level_counter(1),
			'statistics_descriptive_proficients' => $this->M_talentCapability->get_proficients(1),
			'statistics_descriptive_experts' => $this->M_talentCapability->get_experts(1),
			'statistics_inferential' => $this->M_talentCapability->get_proficiency_level_counter(2),
			'statistics_inferential_proficients' => $this->M_talentCapability->get_proficients(2),
			'statistics_inferential_experts' => $this->M_talentCapability->get_experts(2),
			'statistics_probability' => $this->M_talentCapability->get_proficiency_level_counter(3),
			'statistics_probability_proficients' => $this->M_talentCapability->get_proficients(3),
			'statistics_probability_experts' => $this->M_talentCapability->get_experts(3),
			'statistics_time_series' => $this->M_talentCapability->get_proficiency_level_counter(4),
			'statistics_time_series_proficients' => $this->M_talentCapability->get_proficients(4),
			'statistics_time_series_experts' => $this->M_talentCapability->get_experts(4),
			'mathematics_calculus' => $this->M_talentCapability->get_proficiency_level_counter(5),
			'mathematics_calculus_proficients' => $this->M_talentCapability->get_proficients(5),
			'mathematics_calculus_experts' => $this->M_talentCapability->get_experts(5),
			'mathematics_linear_algebra' => $this->M_talentCapability->get_proficiency_level_counter(6),
			'mathematics_linear_algebra_proficients' => $this->M_talentCapability->get_proficients(6),
			'mathematics_linear_algebra_experts' => $this->M_talentCapability->get_experts(6),
			'eda_eda' => $this->M_talentCapability->get_proficiency_level_counter(22),
			'eda_eda_proficients' => $this->M_talentCapability->get_proficients(22),
			'eda_eda_experts' => $this->M_talentCapability->get_experts(22),
			'business_understanding_customer' => $this->M_talentCapability->get_proficiency_level_counter(18),
			'business_understanding_customer_proficients' => $this->M_talentCapability->get_proficients(18),
			'business_understanding_customer_experts' => $this->M_talentCapability->get_experts(18),
			'business_understanding_growth_hacking' => $this->M_talentCapability->get_proficiency_level_counter(19),
			'business_understanding_growth_hacking_proficients' => $this->M_talentCapability->get_proficients(19),
			'business_understanding_growth_hacking_experts' => $this->M_talentCapability->get_experts(19),
			'business_understanding_marketing' => $this->M_talentCapability->get_proficiency_level_counter(20),
			'business_understanding_marketing_proficients' => $this->M_talentCapability->get_proficients(20),
			'business_understanding_marketing_experts' => $this->M_talentCapability->get_experts(20),
			'business_understanding_product' => $this->M_talentCapability->get_proficiency_level_counter(21),
			'business_understanding_product_proficients' => $this->M_talentCapability->get_proficients(21),
			'business_understanding_product_experts' => $this->M_talentCapability->get_experts(21),
			'analytics_level_descriptive' => $this->M_talentCapability->get_proficiency_level_counter(23),
			'analytics_level_descriptive_proficients' => $this->M_talentCapability->get_proficients(23),
			'analytics_level_descriptive_experts' => $this->M_talentCapability->get_experts(23),
			'analytics_level_diagnostic' => $this->M_talentCapability->get_proficiency_level_counter(24),
			'analytics_level_diagnostic_proficients' => $this->M_talentCapability->get_proficients(24),
			'analytics_level_diagnostic_experts' => $this->M_talentCapability->get_experts(24),
			'analytics_level_predictive' => $this->M_talentCapability->get_proficiency_level_counter(25),
			'analytics_level_predictive_proficients' => $this->M_talentCapability->get_proficients(25),
			'analytics_level_predictive_experts' => $this->M_talentCapability->get_experts(25),
			'analytics_level_prescriptive' => $this->M_talentCapability->get_proficiency_level_counter(26),
			'analytics_level_prescriptive_proficients' => $this->M_talentCapability->get_proficients(26),
			'analytics_level_prescriptive_experts' => $this->M_talentCapability->get_experts(26),
			'judul' => 'Talent Capability Result - INSIGHT',
			'konten' => 'adm_views/trainedCertifiedMember/talentCapabilitySectionSatu',
			'admModal' => [],
			'footerGraph' => ['talentCapabilitySummary/section1']
		);
		$this->load->view('adm_layout/master', $data);
	}
	public function talent_capability_section_2()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}

		$this->M_auditTrail->auditTrailRead('Talent Capability', $this->session->userdata['type']);

		$data = array(
			'python_expert' => $this->M_talentCapability->python_expert(),
			'python_proficient' => $this->M_talentCapability->python_proficient(),
			'graph_python' => $this->M_talentCapability->graph_python(),
			'R_expert' => $this->M_talentCapability->R_expert(),
			'R_proficient' => $this->M_talentCapability->R_proficient(),
			'graph_R' => $this->M_talentCapability->graph_R(),
			'PHP_expert' => $this->M_talentCapability->PHP_expert(),
			'PHP_proficient' => $this->M_talentCapability->PHP_proficient(),
			'graph_PHP' => $this->M_talentCapability->graph_PHP(),
			'CPLUS_expert' => $this->M_talentCapability->CPLUS_expert(),
			'CPLUS_proficient' => $this->M_talentCapability->CPLUS_proficient(),
			'graph_CPLUS' => $this->M_talentCapability->graph_CPLUS(),
			'shell_expert' => $this->M_talentCapability->shell_expert(),
			'shell_proficient' => $this->M_talentCapability->shell_proficient(),
			'graph_shell' => $this->M_talentCapability->graph_shell(),
			'git_expert' => $this->M_talentCapability->git_expert(),
			'git_proficient' => $this->M_talentCapability->git_proficient(),
			'graph_git' => $this->M_talentCapability->graph_git(),
			'elastic_expert' => $this->M_talentCapability->elastic_expert(),
			'elastic_proficient' => $this->M_talentCapability->elastic_proficient(),
			'graph_elastic' => $this->M_talentCapability->graph_elastic(),
			'pythonr_expert' => $this->M_talentCapability->pythonr_expert(),
			'pythonr_proficient' => $this->M_talentCapability->pythonr_proficient(),
			'graph_pythonr' => $this->M_talentCapability->graph_pythonr(),
			'powerbi_expert' => $this->M_talentCapability->powerbi_expert(),
			'powerbi_proficient' => $this->M_talentCapability->powerbi_proficient(),
			'graph_powerbi' => $this->M_talentCapability->graph_powerbi(),
			'tableau_expert' => $this->M_talentCapability->tableau_expert(),
			'tableau_proficient' => $this->M_talentCapability->tableau_proficient(),
			'graph_tableau' => $this->M_talentCapability->graph_tableau(),

			'd3js_expert' => $this->M_talentCapability->d3js_expert(),
			'd3js_proficient' => $this->M_talentCapability->d3js_proficient(),
			'graph_d3js' => $this->M_talentCapability->graph_d3js(),
			'GDS_expert' => $this->M_talentCapability->GDS_expert(),
			'GDS_proficient' => $this->M_talentCapability->GDS_proficient(),
			'graph_GDS' => $this->M_talentCapability->graph_GDS(),
			'judul' => 'Talent Capability - INSIGHT',
			'konten' => 'adm_views/trainedCertifiedMember/talentCapabilitySectionDua',
			'footerGraph' => ['talentCapabilitySummary/programming']
		);

		$this->load->view('adm_layout/master', $data);
	}



	public function talent_capability_section_3()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Talent Capability', $this->session->userdata['type']);

		$data = array(
			'de_airflow' => $this->M_talentCapability->get_proficiency_level_counter(35),
			'de_airflow_expert' => $this->M_talentCapability->get_experts(35),
			'de_airflow_proficiency' => $this->M_talentCapability->get_proficients(35),
			'de_pentaho' => $this->M_talentCapability->get_proficiency_level_counter(36),
			'de_pentaho_expert' => $this->M_talentCapability->get_experts(36),
			'de_pentaho_proficiency' => $this->M_talentCapability->get_proficients(36),
			'de_docker' => $this->M_talentCapability->get_proficiency_level_counter(37),
			'de_docker_expert' => $this->M_talentCapability->get_experts(37),
			'de_docker_proficiency' => $this->M_talentCapability->get_proficients(37),
			'de_kafka' => $this->M_talentCapability->get_proficiency_level_counter(38),
			'de_kafka_expert' => $this->M_talentCapability->get_experts(38),
			'de_kafka_proficiency' => $this->M_talentCapability->get_proficients(38),
			'SQL_expert' => $this->M_talentCapability->SQL_expert(),
			'SQL_proficient' => $this->M_talentCapability->SQL_proficient(),
			'graph_SQL' => $this->M_talentCapability->graph_SQL(),
			'NOSQL_expert' => $this->M_talentCapability->NOSQL_expert(),
			'NOSQL_proficient' => $this->M_talentCapability->NOSQL_proficient(),
			'graph_NOSQL' => $this->M_talentCapability->graph_NOSQL(),
			'HADOOP_expert' => $this->M_talentCapability->HADOOP_expert(),
			'HADOOP_proficient' => $this->M_talentCapability->HADOOP_proficient(),
			'graph_HADOOP' => $this->M_talentCapability->graph_HADOOP(),
			'spark_expert' => $this->M_talentCapability->spark_expert(),
			'spark_proficient' => $this->M_talentCapability->spark_proficient(),
			'graph_spark' => $this->M_talentCapability->graph_spark(),
			'classification_expert' => $this->M_talentCapability->classification_expert(),
			'classification_proficient' => $this->M_talentCapability->classification_proficient(),
			'graph_classification' => $this->M_talentCapability->graph_classification(),
			'clustering_expert' => $this->M_talentCapability->clustering_expert(),
			'clustering_proficient' => $this->M_talentCapability->clustering_proficient(),
			'graph_clustering' => $this->M_talentCapability->graph_clustering(),
			'Association_expert' => $this->M_talentCapability->Association_expert(),
			'Association_proficient' => $this->M_talentCapability->Association_proficient(),
			'graph_Association' => $this->M_talentCapability->graph_Association(),
			'Regression_expert' => $this->M_talentCapability->Regression_expert(),
			'Regression_proficient' => $this->M_talentCapability->Regression_proficient(),
			'graph_Regression' => $this->M_talentCapability->graph_Regression(),

			'Supervised_expert' => $this->M_talentCapability->Supervised_expert(),
			'Supervised_proficient' => $this->M_talentCapability->Supervised_proficient(),
			'graph_Supervised' => $this->M_talentCapability->graph_Supervised(),

			'Unsupervised_expert' => $this->M_talentCapability->Unsupervised_expert(),
			'Unsupervised_proficient' => $this->M_talentCapability->Unsupervised_proficient(),
			'graph_Unsupervised' => $this->M_talentCapability->graph_Unsupervised(),

			'Reinforcement_expert' => $this->M_talentCapability->Reinforcement_expert(),
			'Reinforcement_proficient' => $this->M_talentCapability->Reinforcement_proficient(),
			'graph_Reinforcement' => $this->M_talentCapability->graph_Reinforcement(),
			'judul' => 'Talent Capability Result - INSIGHT',
			'konten' => 'adm_views/trainedCertifiedMember/talentCapabilitySectionTiga',
			'admModal' => [],
			'footerGraph' => [
				'talentCapabilitySummary/datamining'
			]
		);

		$this->load->view('adm_layout/master', $data);
	}

	public function talent_capability_section_4()
	{
		if ($this->session->userdata('status') !== 'admin_logged_in') {
			redirect('pages/Login');
		}
		$this->M_auditTrail->auditTrailRead('Talent Capability', $this->session->userdata['type']);

		$data = array(
			'dl_ann' => $this->M_talentCapability->get_proficiency_level_counter(10),
			'dl_ann_expert' => $this->M_talentCapability->get_experts(10),
			'dl_ann_proficiency' => $this->M_talentCapability->get_proficients(10),
			'dl_cnn' => $this->M_talentCapability->get_proficiency_level_counter(11),
			'dl_cnn_expert' => $this->M_talentCapability->get_experts(11),
			'dl_cnn_proficiency' => $this->M_talentCapability->get_proficients(11),
			'dl_rnn' => $this->M_talentCapability->get_proficiency_level_counter(12),
			'dl_rnn_expert' => $this->M_talentCapability->get_experts(12),
			'dl_rnn_proficiency' => $this->M_talentCapability->get_proficients(12),
			'cv_face_recognition' => $this->M_talentCapability->get_proficiency_level_counter(13),
			'cv_face_recoginition_expert' => $this->M_talentCapability->get_experts(13),
			'cv_face_recoginition_proficiency' => $this->M_talentCapability->get_proficients(13),
			'cv_object_detection' => $this->M_talentCapability->get_proficiency_level_counter(14),
			'cv_object_detection_expert' => $this->M_talentCapability->get_experts(14),
			'cv_object_detection_proficiency' => $this->M_talentCapability->get_proficients(14),
			'cv_ocr' => $this->M_talentCapability->get_proficiency_level_counter(15),
			'cv_ocr_expert' => $this->M_talentCapability->get_experts(15),
			'cv_ocr_proficiency' => $this->M_talentCapability->get_proficients(15),
			'nlp_nlp' => $this->M_talentCapability->get_proficiency_level_counter(16),
			'nlp_nlp_experts' => $this->M_talentCapability->get_experts(16),
			'nlp_nlp_proficients' => $this->M_talentCapability->get_proficients(16),
			'hpc_pc' => $this->M_talentCapability->get_proficiency_level_counter(44),
			'hpc_pc_experts' => $this->M_talentCapability->get_experts(44),
			'hpc_pc_proficients' => $this->M_talentCapability->get_proficients(44),
			'hpc_ec' => $this->M_talentCapability->get_proficiency_level_counter(45),
			'hpc_ec_experts' => $this->M_talentCapability->get_experts(45),
			'hpc_ec_proficients' => $this->M_talentCapability->get_proficients(45),
			'rpa_rpa' => $this->M_talentCapability->get_proficiency_level_counter(17),
			'rpa_rpa_experts' => $this->M_talentCapability->get_experts(17),
			'rpa_rpa_proficients' => $this->M_talentCapability->get_proficients(17),
			'judul' => 'Talent Capability Result - INSIGHT',
			'konten' => 'adm_views/trainedCertifiedMember/talentCapabilitySectionEmpat',
			'admModal' => [],
			'footerGraph' => ['talentCapabilitySummary/talentCapabilityGraph']
		);

		$this->load->view('adm_layout/master', $data);
	}
}
