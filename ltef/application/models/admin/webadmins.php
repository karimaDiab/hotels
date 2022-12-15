<?php

class Webadmins extends CI_Model {

    function Webadmins() {
        parent::__construct();
    }

    function getsettings() {
        $query = $this->db->get('settings');
        return $query->result_array();
    }

  

    function getAdminBy($where, $val) {
        $this->db->select('*');
        $this->db->from('admins');
        $this->db->where($where, $val);
        $query = $this->db->get();
        return $query->row_array();
    }

    function updateAdminById($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('admins', $data);
        if (count($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function countAdmins() {
        return $this->db->count_all('admins');
    }

    function getallAdmins(  ) {
        $this->db->select('*');
        $this->db->from('admins'); 
        $query = $this->db->get();
        return $query->result_array();
    }

    function getAdmins() {
        $this->db->select('*');
        $this->db->from('admins');
        $query = $this->db->get();
        return $query->result_array();
    }

    function deleteAdmin($id) {
        $this->db->where('admin_id', $id);
        $result = $this->db->delete('admins', $data);
        if (count($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function addAdmin($data) {
        if ($this->db->insert('admins', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
