<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Base extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata('status') === 'admin_logged_in'){
			redirect('pages/Home');
		} else {
			redirect('pages/Login');
		}
	}
}
?>
