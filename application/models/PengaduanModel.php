<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class PengaduanModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function getPengaduan() {
		$this->db->select('a.no_pengaduan, a.nama_pelapor, b.name as nama_jabatan, c.name as nama_department, a.nama_tertuju, a.nama_barang, a.status, a.keterangan, a.tanggal_lapor');
		$this->db->from('tbl_pengaduan a');
		$this->db->join('tbl_jabatan b', 'a.jabatan = b.id');
		$this->db->join('tbl_department c', 'a.departemen = c.id');
		$this->db->order_by('a.no_pengaduan', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function store($data){
		$this->db->trans_start();
		$this->db->insert('tbl_pengaduan',$data);
		$signid = $this->db->insert_id();
		$this->db->trans_complete();
		return $signid;
	}
}