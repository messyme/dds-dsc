<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_talentCapability extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//add Talent Capability
	public function add_talent_capability($data)
	{
		return $this->db->insert('talent_capability', $data);
	}

	public function update_avg_proficiency($id_skill_list)
	{
		return $this->db->query(
			"UPDATE minimum_proficiency_level 
		SET avg_proficiency = (SELECT CAST(AVG(id_proficiency_level) as decimal(10,2))
		FROM talent_capability 
		WHERE talent_capability.id_skill_list = '$id_skill_list') 
		WHERE minimum_proficiency_level.id_skill_list = '$id_skill_list'"
		);
	}

	public function update_prov_weight($id_skill_list)
	{
		return $this->db->query(
			"UPDATE minimum_proficiency_level 
		SET provisional_weight = 6 - avg_proficiency
		WHERE id_skill_list = '$id_skill_list'"
		);
	}


	//result Talent Capability
	public function get_total_responden_role()
	{
		return $this->db->query(
			"SELECT nama_posisi,count(x.total) as total
		from (select nama_posisi,count(distinct id_posisi_type) as total
		FROM talent_capability as tc  
		join member_dsc as md on md.nik=tc.nik 
		join posisi on posisi.id_posisi = md.id_posisi group by md.nik) x
		group by nama_posisi"
		)->result();
	}

	public function get_total_responden_level()
	{
		return $this->db->query(
			"SELECT nama_posisi_type,count(y.total) as total
		from (SELECT nama_posisi_type,count(distinct md.id_posisi_type)as total FROM talent_capability
		as tc  join member_dsc as md on md.nik=tc.nik 
		join posisi_type on posisi_type.id_posisi_type = md.id_posisi_type group by tc.nik) y
		group by nama_posisi_type"
		)->result();
	}

	public function get_total_responden()
	{
		$query = $this->db->query(
			"SELECT distinct nik as total_responden from talent_capability"
		);
		return $query->num_rows();
	}

	public function get_total_skill()
	{
		$query = $this->db->query(
			"SELECT id_skill_list, name_skill from skill_list"
		);
		return $query->num_rows();
	}

	public function get_skill_general_mandatory()
	{
		return $this->db->query(
			"SELECT name_category_skill,name_skill from skill_list as s 
		join category_skill as c on c.id_category_skill=s.id_category_skill  
		where id_skill_list_type = 1 and id_skill_list_require=1 order by id_skill_list"
		)->result();
	}

	public function get_skill_general_nice_to_have()
	{
		return $this->db->query(
			"SELECT name_category_skill,name_skill from skill_list as s
		join category_skill as c on c.id_category_skill=s.id_category_skill
		where id_skill_list_type = 1 and id_skill_list_require=2 order by id_skill_list DESC"
		)->result();
	}

	public function get_skill_specific_mandatory()
	{
		return $this->db->query(
			"SELECT name_category_skill,name_skill from skill_list as s 
		join category_skill as c on c.id_category_skill=s.id_category_skill  
		where id_skill_list_type = 2 and id_skill_list_require=1 order by id_skill_list"
		)->result();
	}

	public function get_skill_specific_nice_to_have()
	{
		return $this->db->query(
			"SELECT name_category_skill,name_skill from skill_list as s
		join category_skill as c on c.id_category_skill=s.id_category_skill
		where id_skill_list_type = 2 and id_skill_list_require=2 order by id_skill_list DESC"
		)->result();
	}


	public function get_skill_mapping()
	{
		return $this->db->query(
			"SELECT name_skill, name_category_skill,name_skill_list_type,name_skill_list_require,j1,j2,j3,m1,m2,m3,s1,s2,s3,
		provisional_weight from minimum_proficiency_level as mp 
		join skill_list as sl on sl.id_skill_list = mp.id_skill_list 
		join category_skill as c on c.id_category_skill = sl.id_category_skill 
		join skill_list_type as st on st.id_skill_list_type  = sl.id_skill_list_type 
		join skill_list_require as sr on sr.id_skill_list_require = sl.id_skill_list_require order by mp.provisional_weight DESC"
		);
	}

	public function get_skill_mapping_filter_by_category($id_category_skill)
	{
		return $this->db->query(
			"SELECT name_skill, name_category_skill,name_skill_list_type,name_skill_list_require,j1,j2,j3,m1,m2,m3,s1,s2,s3,
		provisional_weight from minimum_proficiency_level as mp 
		join skill_list as sl on sl.id_skill_list = mp.id_skill_list 
		join category_skill as c on c.id_category_skill = sl.id_category_skill 
		join skill_list_type as st on st.id_skill_list_type  = sl.id_skill_list_type 
		join skill_list_require as sr on sr.id_skill_list_require = sl.id_skill_list_require
		where sl.id_category_skill = $id_category_skill
		order by mp.provisional_weight DESC"
		);
	}

	public function get_overall_average()
	{
		return $this->db->query(
			"SELECT a.id_category_skill, 
		a.name_category_skill, 
		round(a.target_overall, 2) as target_overall,
		round(coalesce(b.real_overall, 0), 2) as real_overall,
		round(coalesce((b.real_overall/a.target_overall*100), 0), 2) as achievement
		from (
		select category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(((avg(j1)+avg(j2)+avg(j3)+avg(m1)+avg(m2)+avg(m3)+avg(s1)+avg(s2)+avg(s3))/9), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a 
		left outer join 
		(SELECT category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) b 
		on a.id_category_skill = b.id_category_skill
		order by achievement desc"
		);
	}

	public function get_junior_average()
	{
		return $this->db->query(
			"SELECT a.id_category_skill, 
		a.name_category_skill, 
		round(a.target_overall, 2) as target_overall,
		round(coalesce(b.real_overall, 0), 2) as real_overall,
		round(coalesce((b.real_overall/a.target_overall*100), 0), 2) as achievement
		from (
		select category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(((avg(j1)+avg(j2)+avg(j3))/3), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a 
		left outer join 
		(SELECT category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		where posisi_type.id_posisi_type = 1
		group by category_skill.id_category_skill) b 
		on a.id_category_skill = b.id_category_skill
		order by achievement desc"
		);
	}

	public function get_middle_average()
	{
		return $this->db->query(
			"SELECT a.id_category_skill, 
		a.name_category_skill, 
		round(a.target_overall, 2) as target_overall, 
		round(coalesce(b.real_overall, 0), 2) as real_overall,
		round(coalesce((b.real_overall/a.target_overall*100), 0), 2) as achievement
		from (
		select category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(((avg(m1)+avg(m2)+avg(m3))/3), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a 
		left outer join 
		(SELECT category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		where posisi_type.id_posisi_type = 2
		group by category_skill.id_category_skill) b 
		on a.id_category_skill = b.id_category_skill
		order by achievement desc"
		);
	}

	public function get_senior_average()
	{
		return $this->db->query(
			"SELECT a.id_category_skill, 
		a.name_category_skill, 
		round(a.target_overall, 2) as target_overall, 
		round(coalesce(b.real_overall, 0), 2) as real_overall,
		round(coalesce((b.real_overall/a.target_overall*100), 0), 2) as achievement
		from (
		select category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(((avg(s1)+avg(s2)+avg(s3))/3), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a 
		left outer join 
		(SELECT category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		where posisi_type.id_posisi_type = 3
		group by category_skill.id_category_skill) b 
		on a.id_category_skill = b.id_category_skill
		order by achievement desc"
		);
	}

	public function get_avg_target()
	{
		$avg_target = $this->db->query("SELECT round(coalesce(((avg(j1)+avg(j2)+avg(j3)+avg(m1)+avg(m2)+avg(m3)+avg(s1)+avg(s2)+avg(s3))/9), 0), 2) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type
		group by category_skill.id_category_skill");
		//where category_skill.id_category_skill = '$id_category_skill'");
		$row = $avg_target->row();
		return $row->target_overall;
	}

	public function get_avg_real()
	{
		$avg_real = $this->db->query("SELECT round(coalesce(avg(talent_capability.id_proficiency_level), 0), 2) as real_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill");
		//where category_skill.id_category_skill = '$id_category_skill'
		$row = $avg_real->row();
		return $row->real_overall;
	}

	public function get_avg_avg_real_overall()
	{
		$avg = $this->db->query("SELECT round(coalesce(avg(a.real_overall), 0), 2) as average from(
		SELECT coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall
		from minimum_proficiency_level
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list
		left outer join member_dsc on talent_capability.nik = member_dsc.nik
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type
		group by category_skill.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}

	public function get_avg_avg_real_junior()
	{
		$avg = $this->db->query("SELECT round(coalesce(avg(a.real_overall), 0), 2) as average from(
		SELECT coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall
		from minimum_proficiency_level
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list
		left outer join member_dsc on talent_capability.nik = member_dsc.nik
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type
		where posisi_type.id_posisi_type = 1
		group by category_skill.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}

	public function get_avg_avg_real_middle()
	{
		$avg = $this->db->query("SELECT round(coalesce(avg(a.real_overall), 0), 2) as average from(
		SELECT coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall
		from minimum_proficiency_level
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list
		left outer join member_dsc on talent_capability.nik = member_dsc.nik
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type
		where posisi_type.id_posisi_type = 2
		group by category_skill.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}

	public function get_avg_avg_real_senior()
	{
		$avg = $this->db->query("SELECT round(coalesce(avg(a.real_overall), 0), 2) as average from(
		SELECT coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall
		from minimum_proficiency_level
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list
		left outer join member_dsc on talent_capability.nik = member_dsc.nik
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type
		where posisi_type.id_posisi_type = 3
		group by category_skill.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}

	public function get_avg_avg_target_overall()
	{
		$avg = $this->db->query("SELECT round(coalesce(avg(a.target_overall), 0), 2) as average from(
		SELECT coalesce(((avg(j1)+avg(j2)+avg(j3)+avg(m1)+avg(m2)+avg(m3)+avg(s1)+avg(s2)+avg(s3))/9), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}

	public function get_avg_avg_target_junior()
	{
		$avg = $this->db->query("SELECT round(coalesce(avg(a.target_overall), 0), 2) as average from(
		SELECT coalesce(((avg(j1)+avg(j2)+avg(j3))/3), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}

	public function get_avg_avg_target_middle()
	{
		$avg = $this->db->query("SELECT round(coalesce(avg(a.target_overall), 0), 2) as average from(
		SELECT coalesce(((avg(m1)+avg(m2)+avg(m3))/3), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}

	public function get_avg_avg_target_senior()
	{
		$avg = $this->db->query("SELECT round(coalesce(avg(a.target_overall), 0), 2) as average from(
		SELECT coalesce(((avg(s1)+avg(s2)+avg(s3))/3), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}

	public function get_avg_achievement_overall()
	{
		$avg = $this->db->query("SELECT round(coalesce((avg(real_overall)/avg(a.target_overall)*100), 0), 2) as average 
		from(
		SELECT a.id_category_skill, 
		a.name_category_skill, 
		a.target_overall, 
		coalesce(b.real_overall, 0) as real_overall,
		coalesce((b.real_overall/a.target_overall*100), 0) as achievement
		from (
		select category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(((avg(j1)+avg(j2)+avg(j3)+avg(m1)+avg(m2)+avg(m3)+avg(s1)+avg(s2)+avg(s3))/9), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a 
		left outer join 
		(SELECT category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) b 
		on a.id_category_skill = b.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}

	public function get_avg_achievement_junior()
	{
		$avg = $this->db->query("SELECT round(coalesce((avg(real_overall)/avg(a.target_overall)*100), 0), 2) as average 
		from(
		SELECT a.id_category_skill, 
		a.name_category_skill, 
		a.target_overall, 
		coalesce(b.real_overall, 0) as real_overall,
		coalesce((b.real_overall/a.target_overall*100), 0) as achievement
		from (
		select category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(((avg(j1)+avg(j2)+avg(j3))/3), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a 
		left outer join 
		(SELECT category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		where posisi_type.id_posisi_type = 1
		group by category_skill.id_category_skill) b 
		on a.id_category_skill = b.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}

	public function get_avg_achievement_middle()
	{
		$avg = $this->db->query("SELECT round(coalesce((avg(real_overall)/avg(a.target_overall)*100), 0), 2) as average 
		from(
		SELECT a.id_category_skill, 
		a.name_category_skill, 
		a.target_overall, 
		coalesce(b.real_overall, 0) as real_overall,
		coalesce((b.real_overall/a.target_overall*100), 0) as achievement
		from (
		select category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(((avg(m1)+avg(m2)+avg(m3))/3), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a 
		left outer join 
		(SELECT category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		where posisi_type.id_posisi_type = 2
		group by category_skill.id_category_skill) b 
		on a.id_category_skill = b.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}

	public function get_avg_achievement_senior()
	{
		$avg = $this->db->query("SELECT round(coalesce((avg(real_overall)/avg(a.target_overall)*100), 0), 2) as average 
		from(
		SELECT a.id_category_skill, 
		a.name_category_skill, 
		a.target_overall, 
		coalesce(b.real_overall, 0) as real_overall,
		coalesce((b.real_overall/a.target_overall*100), 0) as achievement
		from (
		select category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(((avg(s1)+avg(s2)+avg(s3)/3)), 0) as target_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		group by category_skill.id_category_skill) a 
		left outer join 
		(SELECT category_skill.id_category_skill, 
		category_skill.name_category_skill, 
		coalesce(avg(talent_capability.id_proficiency_level), 0) as real_overall 
		from minimum_proficiency_level 
		inner join skill_list on minimum_proficiency_level.id_skill_list = skill_list.id_skill_list 
		inner join category_skill on skill_list.id_category_skill = category_skill.id_category_skill 
		left outer join talent_capability on talent_capability.id_skill_list = skill_list.id_skill_list 
		left outer join member_dsc on talent_capability.nik = member_dsc.nik 
		left outer join posisi_type on member_dsc.id_posisi_type = posisi_type.id_posisi_type 
		where posisi_type.id_posisi_type = 3
		group by category_skill.id_category_skill) b 
		on a.id_category_skill = b.id_category_skill) a
		");
		$row = $avg->row();
		return $row->average;
	}


	public function capability_summary()
	{
		return $this->db->query(
			"SELECT skill_list.name_skill, minimum_proficiency_level.avg_proficiency
			FROM minimum_proficiency_level
			JOIN skill_list ON skill_list.id_skill_list = minimum_proficiency_level.id_skill_list order by minimum_proficiency_level.avg_proficiency desc"
		);
	}

	public function get_usecase_difficultly()
	{
		return $this->db->query(
			"SELECT usecase_difficultly.id_usecase, usecase.nama_usecase, usecase_difficultly.industry
			FROM usecase_difficultly
			JOIN usecase on usecase.id_usecase = usecase_difficultly.id_usecase
			GROUP BY usecase.nama_usecase"
		);
	}
	public function average_pw()
	{
		return $this->db->query(
			"SELECT usecase_difficultly.id_usecase, CAST(AVG(minimum_proficiency_level.provisional_weight) as decimal(10,2)) as avg
			FROM usecase_difficultly
			left JOIN minimum_proficiency_level ON minimum_proficiency_level.id_minimum_proficiency_level = usecase_difficultly.id_minimum_capability
			GROUP BY usecase_difficultly.id_usecase order by avg desc"
		);
	}

	//talent capability summary
	public function get_talent_capability_summary()
	{
		return $this->db->query(
			"SELECT distinct md.nik,nama_member,nama_posisi_type,nama_posisi_level, tc.timestamp,
		coalesce(DESCRIPTIVE,0) as descriptive,
		coalesce(INFERENTIAL,0) as inferential,
		coalesce(PROBABILITY,0) as probability,
		coalesce(TIME_SERIES,0) as time_series,
		coalesce(CALCULUS,0) as calculus,
		coalesce(LINEAR_ALGEBRA,0) as linear_algebra,
		coalesce(SUPERVISED_LEARNING,0) as supervised,
		coalesce(UNSUPERVISED_LEARNING,0) as unsupervised,
		coalesce(REINFORCEMENT_LEARNING,0) as reinforcement,
		coalesce(ANN,0) as ann,
		coalesce(CNN,0) as cnn,
		coalesce(RNN,0) as rnn,
		coalesce(FACE_RECOGNITION,0) as face_recognition,
		coalesce(OBJECT_DETECTION,0) as object_detection,
		coalesce(OCR,0) as ocr,
		coalesce(NLP,0) as nlp,
		coalesce(RPA,0) as rpa,
		coalesce(CUSTOMER,0) as customer,
		coalesce(GROWTH_HACKING,0) as growth_hacking,
		coalesce(MARKETING,0) as marketing,
		coalesce(PRODUCT,0) as product,
		coalesce(EXPLORATORY_DATA_ANALYSIS,0) as exploratory_data_analysis,
		coalesce(DESCRIPTIVE_ANALYTICS,0) as descriptive_analytics,
		coalesce(DIAGNOSTIC,0) as diagnostic,
		coalesce(PREDICTIVE,0) as predictive,
		coalesce(PRESCRIPTIVE,0) as prescriptive,
		coalesce(CLASSIFICATION,0) as classification,
		coalesce(CLUSTERING,0) as clustering,
		coalesce(ASSOCIATION,0) as association,
		coalesce(REGRESSION,0) as regression,
		coalesce(SQL_SQL,0) as sql_sql,
		coalesce(NOSQL,0) as nosql,
		coalesce(HADOOP,0) as hadoop,
		coalesce(SPARK,0) as spark,
		coalesce(AIRFLOW,0) as airflow,
		coalesce(PENTAHO,0) as pentaho,
		coalesce(DOCKER_KUBERNETES,0) as docker_kubernetes,
		coalesce(KAFKA,0) as kafka,
		coalesce(PYTHON_R_LIBRARY,0) as python_r_library,
		coalesce(POWER_BI,0) as power_bi,
		coalesce(TABLEAU,0) as tableau,
		coalesce(GOOGLE_DATA_STUDIO,0) as google_data_studio,
		coalesce(D3_JS,0) as d3_js,
		coalesce(PARALEL_COMPUTING,0) as paralel_computing,
		coalesce(EDGE_COMPUTING,0) as edge_computing,
		coalesce(PYTHON,0) as python,
		coalesce(R,0) as r,
		coalesce(PHP,0) as php,
		coalesce(NODEJS,0) as nodejs,
		coalesce(JAVASCRIPT,0) as javascript,
		coalesce(C,0) as c,
		coalesce(SHELL_SCRIPTING,0) as shell_scripting,
		coalesce(GIT,0) as git,
		coalesce(ELASTICSEARCH,0) as elastic_search,
		
		coalesce(total_pts,0)as total_pts,
		
		CASE  
			WHEN (char_length(md.nik) = 6  AND substring(md.nik,1,2)>6) THEN YEAR(CURRENT_DATE())-(1900+substring(md.nik,1,2))
			WHEN (char_length(md.nik) = 6  AND substring(md.nik,1,2)<5) THEN YEAR(CURRENT_DATE())-(2000+substring(md.nik,1,2)) 
			ELSE '-'
			END AS age 

		FROM member_dsc as md left join skill_list_pivot as slp on slp.nik = md.nik
		join posisi_type as pt on pt.id_posisi_type =  md.id_posisi_type
		join posisi_level as pl on pl.id_posisi_level =  md.id_posisi_level
		left outer join talent_capability as tc on tc.nik =  md.nik
		ORDER BY total_pts DESC"
		);
	}

	//skill visualizations
	public function get_proficiency_level_counter($id_skill_list)
	{
		return $this->db->query(
			"SELECT 1 as proficiency_level, COUNT(*) as counter FROM talent_capability WHERE id_skill_list = '$id_skill_list' and id_proficiency_level = 1
			union 
			SELECT 2 as proficiency_level, COUNT(*) as counter FROM talent_capability WHERE id_skill_list = '$id_skill_list' and id_proficiency_level = 2
			union
			SELECT 3 as proficiency_level, COUNT(*) as counter FROM talent_capability WHERE id_skill_list = '$id_skill_list' and id_proficiency_level = 3
			union
			SELECT 4 as proficiency_level, COUNT(*) as counter FROM talent_capability WHERE id_skill_list = '$id_skill_list' and id_proficiency_level = 4
			union
			SELECT 5 as proficiency_level, COUNT(*) as counter FROM talent_capability WHERE id_skill_list = '$id_skill_list' and id_proficiency_level = 5"
		)->result();
	}

	public function get_experts($id_skill_list)
	{
		return $this->db->query(
			"SELECT nama_member 
			FROM member_dsc, talent_capability 
			WHERE member_dsc.nik = talent_capability.nik 
			AND id_skill_list = '$id_skill_list' 
			AND id_proficiency_level = 5"
		)->result();
	}

	public function get_proficients($id_skill_list)
	{
		return $this->db->query(
			"SELECT nama_member 
			FROM member_dsc, talent_capability 
			WHERE member_dsc.nik = talent_capability.nik 
			AND id_skill_list = '$id_skill_list'
			AND id_proficiency_level = 4"
		)->result();
	}


	// VISUALISASI - PROGRAMMING
	public function python_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 46);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function python_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 46);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_python()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 46 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function graph_R()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 47 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function R_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 47);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function R_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 47);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function graph_PHP()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 48 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function PHP_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 48);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function PHP_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 48);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_CPLUS()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 51 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function CPLUS_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 51);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function CPLUS_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 51);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_shell()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 52 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function shell_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 52);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function shell_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 52);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_git()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 53 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function git_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 53);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function git_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 53);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_elastic()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 54 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function elastic_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 54);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function elastic_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 54);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_pythonr()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 39 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function pythonr_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 39);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function pythonr_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 39);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_powerbi()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 40 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function powerbi_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 40);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function powerbi_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 40);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function graph_tableau()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 41 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function tableau_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 41);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function tableau_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 41);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_GDS()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 42 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function GDS_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 42);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function GDS_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 42);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function graph_d3js()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 43 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function d3js_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 43);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function d3js_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 43);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	// END VISUALISASI PROGRAMMING

	// VISUALISASI DATABASE
	public function graph_SQL()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 31 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function SQL_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 31);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function SQL_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 31);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function graph_NOSQL()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 32 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function NOSQL_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 32);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function NOSQL_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 32);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	// END VIS DATABASE


	// BIGDATA
	public function graph_HADOOP()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 33 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function HADOOP_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 33);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function HADOOP_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 33);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_spark()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 34 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function spark_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 34);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function spark_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 34);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	// END VIS BIG DATA

	// DATA MINING
	public function graph_classification()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 27 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function classification_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 27);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function classification_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 27);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_clustering()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 28 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function clustering_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 28);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function clustering_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 28);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_Association()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 29 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function Association_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 29);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function Association_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 29);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_Regression()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 30 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function Regression_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 30);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function Regression_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 30);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	// END VIS DATA MINING

	// DATA MINING
	public function graph_Supervised()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 7 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function Supervised_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 7);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function Supervised_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 7);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_Unsupervised()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 8 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function Unsupervised_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 8);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function Unsupervised_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 8);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	public function graph_Reinforcement()
	{
		return $this->db->query(
			"SELECT member_dsc.nama_member, skill_list.name_skill, proficiency_level.value, 
			COUNT(talent_capability.id_talent_capability) as total  
			FROM `talent_capability`
			JOIN member_dsc on member_dsc.nik = talent_capability.nik
			JOIN skill_list ON skill_list.id_skill_list = talent_capability.id_skill_list
			JOIN proficiency_level ON proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level
			WHERE talent_capability.id_skill_list = 9 GROUP BY proficiency_level.name_proficiency_level"
		);
	}

	public function Reinforcement_proficient()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 4);
		$this->db->where('talent_capability.id_skill_list', 9);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}
	public function Reinforcement_expert()
	{
		$this->db->join('skill_list', 'skill_list.id_skill_list = talent_capability.id_skill_list');
		$this->db->join('proficiency_level', 'proficiency_level.id_proficiency_level = talent_capability.id_proficiency_level');
		$this->db->join('member_dsc', 'member_dsc.nik = talent_capability.nik');
		$this->db->where('talent_capability.id_proficiency_level', 5);
		$this->db->where('talent_capability.id_skill_list', 9);
		$this->db->group_by("member_dsc.nama_member");
		return $this->db->get('talent_capability');
	}

	// END VIS Machine Learning
	public function get_member_talent($nik)
	{
		return $this->db->query(
			"SELECT * from skill_list_pivot as slp 
			join talent_capability as tc on tc.nik = slp.nik 
			WHERE slp.nik ='$nik' 
			ORDER BY timestamp DESC LIMIT 1 ;"
		);
	}
}