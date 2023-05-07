<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class SidebarModel extends CI_Model {

    function __construct() {
			parent::__construct();
    }

    public function selectMenu1(){
			$query = $this->db->query("SELECT menu_id, menu_name, menu_class, menu_url, have_submenu FROM tbl_menu1 ORDER BY menu_id ASC");
			return $query->result();
    }

		public function selectMenu2(){
			$query = $this->db->query("SELECT submenu_id, submenu_name, submenu_url, menu_id FROM tbl_menu2 ORDER BY menu_id ASC");
			return $query->result();
    }
}
