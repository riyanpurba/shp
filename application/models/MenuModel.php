<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function getMenu1(){
		$query = $this->db->get('tbl_menu1');
		return $query->result_array();
	}

	public function getMenu2(){
		$this->db->select('a.submenu_id, a.submenu_name, a.submenu_url, a.submenu_class, b.menu_name');
		$this->db->from('tbl_menu2 a');
		$this->db->join('tbl_menu1 b', 'a.menu_id = b.menu_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMenu1ByID($id){
		$this->db->where('menu_id', $id);
		$query = $this->db->get('tbl_menu1');
		return $query->row_array();
	}

	public function storeMenu1($data){
		$this->db->trans_start();
		$this->db->insert('tbl_menu1',$data);
		$signid = $this->db->insert_id();
		$this->db->trans_complete();
		return $signid;
	}

	public function updateMenu1($data, $id){
		$this->db->where('menu_id', $id);
		$this->db->update('tbl_menu1', $data);
	}

	public function destroyMenu1($id){
		$this->db->where('menu_id', $id);
		$result = $this->db->delete('tbl_menu1');
		return $result;
	}

	public function storeMenu2($data){
		$this->db->trans_start();
		$this->db->insert('tbl_menu2',$data);
		$signid = $this->db->insert_id();
		$this->db->trans_complete();
		return $signid;
	}

	public function getMenu2ByID($id){
		$this->db->where('submenu_id', $id);
		$query = $this->db->get('tbl_menu2');
		return $query->row_array();
	}

	public function updateMenu2($data, $id){
		$this->db->where('submenu_id', $id);
		$this->db->update('tbl_menu2', $data);
	}
}