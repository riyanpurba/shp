<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class LoginModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function log_in($userID){
        $this->db->where('username',$userID);
        return $this->db->get('vw_user');
    }

    function cekpass($userID,$passID){
        $this->db->where('username',$userID);
        $this->db->where('password',$passID);
        $query = $this->db->get('vw_user');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function simpan_log($info){
        $this->db->trans_start();
        $this->db->insert('tbl_log_history',$info);
        $signid = $this->db->insert_id();
        $this->db->trans_complete();
        return $signid;
    }

    function simpan_log_out($signid){
        $this->db->trans_start();		
        $this->db->query('Update tbl_log_history Set signout=now() Where id='.$signid);
        $this->db->trans_complete();
    }
}