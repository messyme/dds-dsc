<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_trainedMember extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Trained Member
	public function get_trained_member(){ 
		$this->db->join('member_dsc', 'trained_member.nik = member_dsc.nik');
        $this->db->join('pathway', 'trained_member.id_pathway = pathway.id_pathway');
		return $this->db->get('trained_member');
	}

	public function get_trained_memberEdit($id){ 
		$this->db->join('member_dsc', 'trained_member.nik = member_dsc.nik');
        $this->db->join('pathway', 'trained_member.id_pathway = pathway.id_pathway');
		$this->db->where('id_trained_member', $id);
		return $this->db->get('trained_member')->result();
	}

    public function updateDataTrainedMember($id, $data){
		$this->db->set($data);
		$this->db->where('id_trained_member ', $id);
		return $this->db->update('trained_member');
		// echo $this->db->last_query();
	}

    public function get_trained_member_detail($nik){
        $this->db->join('member_dsc', 'trained_member.nik = member_dsc.nik');
        $this->db->join('pathway', 'trained_member.id_pathway = pathway.id_pathway');
		return $this->db->get_where('trained_member', array('trained_member.nik' => $nik));
    }

	// @codeCoverageIgnoreStart
	public function add_trained_member($data){
		return $this->db->insert('trained_member', $data);
	}

	public function edit_trained_member($id_trained_member, $data){
		$this->db->set($data);
		$this->db->where('id_trained_member', $id_trained_member);
		return $this->db->update('trained_member');
	}

	public function delete_trained_member($id_trained_member){
		$this->db->where('id_trained_member', $id_trained_member);
		return $this->db->delete('trained_member');
	}

	public function get_nama_trained_member($nik){
		$user = $this->db->get_where('member_dsc','nik = "'.$nik.'"');
		$row = $user->row();
		return $row->nama_member;
	}

	public function get_nik($id_trained_member){
		$user = $this->db->get_where('trained_member','id_trained_member = "'.$id_trained_member.'"');
		$row = $user->row();
		return $row->nik;
	}

    public function get_pathway(){
		return $this->db->get('pathway');
    }
	// @codeCoverageIgnoreEnd
	//End Of Trained Member
	
	// Training
	// public function get_training_list(){ 
	// 	return $this->db->get('training');
	// }

	// // @codeCoverageIgnoreStart
	// public function add_data_training($data){
	// 	return $this->db->insert('training', $data);
	// }

	// public function edit_data_training($id_training, $data){
	// 	$this->db->set($data);
	// 	$this->db->where('id_training', $id_training);
	// 	return $this->db->update('training');
	// }

	// public function delete_data_training($id_training){
	// 	$this->db->where('id_training', $id_training);
	// 	return $this->db->delete('training');
	// }

	// public function check_nama_training($nama_training){
	// 	$this->db->where('nama_training', $nama_training);
	// 	return $this->db->count_all_results('training');	
	// }

	// public function get_nama_training($id_training){
	// 	$user = $this->db->get_where('training','id_training = "'.$id_training.'"');
	// 	$row = $user->row();
	// 	return $row->nama_training;
	// }
	// @codeCoverageIgnoreEnd
	// end of Training
}	


?>