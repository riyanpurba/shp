<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UploadImageModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function store($data){
		$this->db->insert('tbl_image_pengaduan', $data);
	}
}