<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_auditDurationAdmin extends CI_Model 
{
	public function __construct(){
        parent::__construct();
        $this->load->database();
	}

	public function insertDuration_admin($data)
	{
		return $this->db->insert('duration_access_admin',$data);
	}

	public function getLastDuration_admin()
	{
		return $this->db->limit(1)->order_by('nomor','DESC')->get('duration_access_admin')->row();
	}

	public function updateDuration_admin($id,$data)
	{
		$this->db->where('nomor',$id);
		$this->db->update('duration_access_admin',$data);
	}

	public function readDuration_admin()
	{
		return $this->db->get_where('duration_access_admin', array('type_user' => 'admin'))->result();
	}

	public function readDuration_superadmin()
	{
		return $this->db->get_where('duration_access_admin', array('type_user' => 'superadmin'))->result();
	}

	public function readDuration_guest()
	{
		return $this->db->get_where('duration_access_admin', array('type_user' => 'user'))->result();
	}

    public function readDuration_member()
	{
		return $this->db->get_where('duration_access_admin', array('type_user' => 'member'))->result();
	}

}
