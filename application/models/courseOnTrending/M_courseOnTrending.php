<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_courseOnTrending extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	//course on trending
	public function getCourseTrend(){
		return $this->db->get('course_trend');
	}
}	


?>