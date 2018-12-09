<?php (defined('BASEPATH')) OR exit('No direct script access allowed');



class Dongxe_model extends CI_Model {

	public function getIdDongxe($tenhang,$loaixe){

		$this->db->select('*');
		$this->db->where('tendong', $tenhang);
		$this->db->where('loaixe', $loaixe);
		$query = $this->db->get('dongxe');
		$ret = $query->row();
		if(empty($ret)){
			return null;
		}else{
			return $ret->id;
		}
		
	}

	public function luu_dong($data) {

		$this->db->insert('dongxe', $data);

	}

}