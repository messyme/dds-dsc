<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_otherDataTalentCapability extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Category Skill
	public function get_category_skill()
	{
		return $this->db->get('category_skill');
	}

	// @codeCoverageIgnoreStart
	public function add_category_skill($data)
	{
		return $this->db->insert('category_skill', $data);
	}

	public function edit_category_skill($id_category_skill, $data)
	{
		$this->db->set($data);
		$this->db->where('id_category_skill', $id_category_skill);
		return $this->db->update('category_skill');
	}

	public function delete_category_skill($id_category_skill)
	{
		$this->db->where('id_category_skill', $id_category_skill);
		return $this->db->delete('category_skill');
	}

	public function check_nama_category_skill($name_category_skill)
	{
		$this->db->where('name_category_skill', $name_category_skill);
		return $this->db->count_all_results('category_skill');
	}

	public function get_nama_category_skill($id_category_skill)
	{
		$user = $this->db->get_where('category_skill', 'id_category_skill = "' . $id_category_skill . '"');
		$row = $user->row();
		return $row->name_category_skill;
	}
	// @codeCoverageIgnoreEnd
	// End Of Category Skill

	// Skill Type
	public function get_skill_list_type()
	{
		return $this->db->get('skill_list_type');
	}

	// @codeCoverageIgnoreStart
	public function add_skill_list_type($data)
	{
		return $this->db->insert('skill_list_type', $data);
	}

	public function edit_skill_list_type($id_skill_list_type, $data)
	{
		$this->db->set($data);
		$this->db->where('id_skill_list_type', $id_skill_list_type);
		return $this->db->update('skill_list_type');
	}

	public function delete_skill_list_type($id_skill_list_type)
	{
		$this->db->where('id_skill_list_type', $id_skill_list_type);
		return $this->db->delete('skill_list_type');
	}

	public function check_nama_skill_list_type($name_skill_list_type)
	{
		$this->db->where('name_skill_list_type', $name_skill_list_type);
		return $this->db->count_all_results('skill_list_type');
	}

	public function get_nama_skill_list_type($id_skill_list_type)
	{
		$user = $this->db->get_where('skill_list_type', 'id_skill_list_type = "' . $id_skill_list_type . '"');
		$row = $user->row();
		return $row->name_skill_list_type;
	}
	// @codeCoverageIgnoreEnd
	// End Of Skill Type

	// Skill Requirement
	public function get_skill_list_require()
	{
		return $this->db->get('skill_list_require');
	}

	// @codeCoverageIgnoreStart
	public function add_skill_list_require($data)
	{
		return $this->db->insert('skill_list_require', $data);
	}

	public function edit_skill_list_require($id_skill_list_require, $data)
	{
		$this->db->set($data);
		$this->db->where('id_skill_list_require', $id_skill_list_require);
		return $this->db->update('skill_list_require');
	}

	public function delete_skill_list_require($id_skill_list_require)
	{
		$this->db->where('id_skill_list_require', $id_skill_list_require);
		return $this->db->delete('skill_list_require');
	}

	public function check_nama_skill_list_require($name_skill_list_require)
	{
		$this->db->where('name_skill_list_require', $name_skill_list_require);
		return $this->db->count_all_results('skill_list_require');
	}

	public function get_nama_skill_list_require($id_skill_list_require)
	{
		$user = $this->db->get_where('skill_list_require', 'id_skill_list_require = "' . $id_skill_list_require . '"');
		$row = $user->row();
		return $row->name_skill_list_require;
	}
	// @codeCoverageIgnoreEnd
	// End Of Skill Requirement

	// Skil List
	public function add_skill_list($data)
	{
		return $this->db->insert('skill_list', $data);
	}

	public function check_nama_skill($nama_skill)
	{
		$this->db->where('name_skill', $nama_skill);
		return $this->db->count_all_results('skill_list');
	}

	public function get_skill_list()
	{
		$this->db->join('category_skill', 'category_skill.id_category_skill = skill_list.id_category_skill');
		$this->db->join('skill_list_type', 'skill_list_type.id_skill_list_type = skill_list.id_skill_list_type');
		$this->db->join('skill_list_require', 'skill_list_require.id_skill_list_require = skill_list.id_skill_list_require');
		return $this->db->get('skill_list');
	}

	public function edit_skill_list($id_skill_list, $data)
	{
		$this->db->set($data);
		$this->db->where('id_skill_list', $id_skill_list);
		return $this->db->update('skill_list');
	}

	public function delete_skill_list($id_skill_list)
	{
		$this->db->where('id_skill_list', $id_skill_list);
		return $this->db->delete('skill_list');
	}

	public function get_name_skill($id_skill_list)
	{
		$output = $this->db->get_where('skill_list', 'id_skill_list = "' . $id_skill_list . '"');
		$row = $output->row();
		return $row->name_skill;
	}
	// End of Skill List



	// Minimum Proficiency Level
	public function get_minimum_proficiency_level()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = minimum_proficiency_level.id_skill_list');
		return $this->db->get('minimum_proficiency_level');
	}

	public function add_minimum_proficiency_level($data)
	{
		return $this->db->insert('minimum_proficiency_level', $data);
	}


	public function edit_minimum_proficiency_level($id_minimum_proficiency_level, $data)
	{
		$this->db->set($data);
		$this->db->where('id_minimum_proficiency_level', $id_minimum_proficiency_level);
		return $this->db->update('minimum_proficiency_level');
	}

	public function delete_minimum_proficiency_level($id_minimum_proficiency_level)
	{
		$this->db->where('id_minimum_proficiency_level', $id_minimum_proficiency_level);
		return $this->db->delete('minimum_proficiency_level');
	}


	public function get_id_skill($id_minimum_proficiency_level)
	{
		$output = $this->db->get_where('minimum_proficiency_level', 'id_skill_list = "' . $id_minimum_proficiency_level . '"');
		$row = $output->row();
		return $row->id_skill_list;
	}

	// End of Minimum Proficiency Level

	//Proficiency Level
	public function get_proficiency_level()
	{
		return $this->db->get('proficiency_level');
	}

	public function add_proficiency_level($data)
	{
		return $this->db->insert('proficiency_level', $data);
	}

	public function edit_proficiency_level($id_proficiency_level, $data)
	{
		$this->db->set($data);
		$this->db->where('id_proficiency_level', $id_proficiency_level);
		return $this->db->update('proficiency_level');
	}

	public function get_nama_proficiency_level($id_proficiency_level)
	{
		$proficiency_level = $this->db->get_where('proficiency_level', 'id_proficiency_level = "' . $id_proficiency_level . '"');
		$row = $proficiency_level->row();
		return $row->name_proficiency_level;
	}

	public function delete_proficiency_level($id_proficiency_level)
	{
		$this->db->where('id_proficiency_level', $id_proficiency_level);
		return $this->db->delete('proficiency_level');
	}
	//End Proficiency Level
	//usecase difficultly
	public function edit_usecase_difficultly()
	{

		return $this->db->query(
			"SELECT usecase.nama_usecase, usecase_difficultly.id_difficultly, usecase_difficultly.id_usecase, 
			skill_list.id_skill_list, usecase_difficultly.id_minimum_capability, usecase_difficultly.industry , 
			skill_list.name_skill FROM usecase_difficultly 
			JOIN usecase on usecase.id_usecase = usecase_difficultly.id_usecase 
			JOIN minimum_proficiency_level ON minimum_proficiency_level.id_minimum_proficiency_level = usecase_difficultly.id_minimum_capability 
			JOIN skill_list ON skill_list.id_skill_list = minimum_proficiency_level.id_skill_list"
		);
	}

	public function get_usecase_difficultly()
	{
		$this->db->join('usecase', 'usecase.id_usecase = usecase_difficultly.id_usecase', 'left');
		$this->db->join('minimum_proficiency_level', 'minimum_proficiency_level.id_minimum_proficiency_level = usecase_difficultly.id_minimum_capability', 'left');
		$this->db->join('skill_list', 'skill_list.id_skill_list = minimum_proficiency_level.id_skill_list', 'left');
		$this->db->group_by('usecase.nama_usecase');
		return $this->db->get('usecase_difficultly');
	}

	public function add_usecase_difficultly($data)
	{
		return $this->db->insert('usecase_difficultly', $data);
	}

	public function delete_usecase_difficultly($id_usecase)
	{
		$this->db->where('id_usecase', $id_usecase);
		return $this->db->delete('usecase_difficultly');
	}
	public function delete_skill_usecase($id_usecase)
	{
		$this->db->where('id_difficultly', $id_usecase);
		return $this->db->delete('usecase_difficultly');
	}

	public function edit_skill_usecase($id, $update)
	{
		$this->db->set($update);
		$this->db->where('id_difficultly', $id);
		return $this->db->update('usecase_difficultly');
	}
	public function update_usecase_difficultly($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id_usecase', $id);
		return $this->db->update('usecase_difficultly');
	}

	public function get_skill_minprof()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = minimum_proficiency_level.id_skill_list', 'left');
		return $this->db->get('minimum_proficiency_level');

		// return $this->db->query(
		// 	"SELECT minimum_proficiency_level.id_skill_list, minimum_proficiency_level.id_minimum_proficiency_level, 
		// 	skill_list.name_skill 
		// 	FROM minimum_proficiency_level
		// 	JOIN skill_list ON skill_list.id_skill_list = minimum_proficiency_level.id_skill_list "

		// );
	}

	//end
}
