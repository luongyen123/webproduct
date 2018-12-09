<?php (defined('BASEPATH')) OR exit('No direct script access allowed');



class Hangxe_model extends CI_Model {

	public function getIdHangxe($tenhang,$loaixe){

		$this->db->select('*');
		$this->db->where('tenhang', $tenhang);
		$this->db->where('loaixe', $loaixe);
		$query = $this->db->get('hangxe');
		$ret = $query->row();
		if(empty($ret)){
			return null;
		}else{
			return $ret->id;
		}
		
	}

	public function luu_hang($data) {

		$this->db->insert('hangxe', $data);

	}

}