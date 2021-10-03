<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_auditTrail extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function auditTrail($data){
        $this->db->insert('log_access', $data);
    }

    public function auditTrailInsert($value, $typeUser){
        $data = array(
            'activity' => 'Successfully added new data '.$value,
            'type_activity' => 1,
            'username' => $this->session->userdata['username'],
            'type_user' => $this->session->userdata['type'],
            'date_access' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log_access', $data);
    }

    public function auditTrailInsertFalse($value, $typeUser){
        $data = array(
            'activity' => 'Failed to add new data '.$value,
            'type_activity' => 1,
            'username' => $this->session->userdata['username'],
            'type_user' => $this->session->userdata['type'],
            'date_access' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log_access', $data);
    }

    public function auditTrailRead($value, $typeUser){
        $data = array(
            'activity' => $value.' page has been accessed',
            'type_activity' => 2,
            'username' => $this->session->userdata['username'],
            'type_user' => $this->session->userdata['type'],
            'date_access' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log_access', $data);
    }

    public function auditTrailUpdate($value, $typeUser){
        $data = array(
            'activity' => 'Successfully updated data '.$value,
            'type_activity' => 3,
            'username' => $this->session->userdata['username'],
            'type_user' => $this->session->userdata['type'],
            'date_access' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log_access', $data);
    }

    public function auditTrailUpdateFalse($value, $typeUser){
        $data = array(
            'activity' => 'Failed to update data '.$value,
            'type_activity' => 3,
            'username' => $this->session->userdata['username'],
            'type_user' => $this->session->userdata['type'],
            'date_access' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log_access', $data);
    }

    public function auditTrailDelete($value, $typeUser){
        $data = array(
            'activity' => 'Successfully deleted data '.$value,
            'type_activity' => 4,
            'username' => $this->session->userdata['username'],
            'type_user' => $this->session->userdata['type'],
            'date_access' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log_access', $data);
    }

    public function auditTrailDeleteFalse($value, $typeUser){
        $data = array(
            'activity' => 'Failed to delete data '.$value,
            'type_activity' => 4,
            'username' => $this->session->userdata['username'],
            'type_user' => $this->session->userdata['type'],
            'date_access' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log_access', $data);
    }

    public function auditTrailVerify($value, $typeUser){
        $data = array(
            'activity' => 'Successfully verify user with id '.$value,
            'type_activity' => 5,
            'username' => $this->session->userdata['username'],
            'type_user' => $this->session->userdata['type'],
            'date_access' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log_access', $data);
    }

    public function auditTrailRequestForgotPassword($value, $role){
        $data = array(
            'activity' => $value." berhasil request password",
            'type_activity' => 6,
            'username' => $value,
            'type_user' => $role,
            'date_access' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log_access', $data);
    }

    public function auditTrailSendPassword($value, $role){
        $data = array(
            'activity' => "Password telah di-send ke user dengan ID".$value,
            'type_activity' => 7,
            'username' => $value,
            'type_user' => $role,
            'date_access' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log_access', $data);
    }
}

?>
