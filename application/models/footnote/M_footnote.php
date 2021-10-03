<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_footnote extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getFootnoteTable($id_footnote){
		$this->db->where('id_footnote ', $id_footnote);
		return $this->db->get('footnote_table')->row();
	}

	public function editFootnoteTable($id_footnote, $data){
		$this->db->set($data);
		$this->db->where('id_footnote', $id_footnote);
		return $this->db->update('footnote_table');
	}

}	
?>