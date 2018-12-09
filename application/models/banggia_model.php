<?php (defined('BASEPATH')) OR exit('No direct script access allowed');



class Banggia_model extends CI_Model {



	public function lay_banggia($bg_loai='ngay', $bg_id = 0) {

		$this->db->select('*');

		$this->db->where('bg_loai', $bg_loai);

		if($bg_id != 0) {

			$this->db->where('bg_id', $bg_id);

		}

		$query = $this->db->get('banggia');

		return $query->result();

	}
	public function lay_banggiaId($id){

		$this->db->select('*');

		$this->db->where('bg_id', $id);
		$query = $this->db->get('banggia');

		return $query->result();
	}

	public function luu_doigia_dien($data) {

		$this->db->insert('doigia_dien', $data);

	}

	

	public function luu_doigia_nuoc($data) {

		$this->db->insert('doigia_nuoc', $data);

	}


	public function luu_banggia($new_data) {

		$this->db->insert('banggia', $new_data);

		return true;

	}

	

	public function doi_gia_batch($data) {

		$this->db->update_batch('doituong', $data, 'dt_id'); 

	}

	public function edit_lai_ngay($id,$data){

		$this->db->set($data);
		$this->db->where('bg_id', $id);
		$this->db->update('banggia');

		return true;
	}

	public function delete_banggia($id){
		$this->db->delete('banggia', array('bg_id' => $id));
	
	}
}