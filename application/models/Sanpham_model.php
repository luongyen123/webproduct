<?php (defined('BASEPATH')) OR exit('No direct script access allowed');



class Sanpham_model extends CI_Model {

	public function getSanPham(){

		$this->db->select('*');	
		$this->db->order_by('loaixe');
		$this->db->order_by('hangxe_id');
		$this->db->order_by('dongxe_id');
		$query = $this->db->get('sanpham');		
		return $query->result();
		
	}

	public function getChitiet(){
		$this->db->select('hangxe.tenhang, dongxe.tendong, sanpham.namsx, sanpham.gia, sanpham.loaixe,sanpham.hangxe_id,sanpham.dongxe_id')
         ->from('sanpham')
         ->join('hangxe', 'hangxe.id = sanpham.hangxe_id')
         ->join('dongxe','dongxe.id=sanpham.dongxe_id');

        $this->db->order_by('loaixe');
		$this->db->order_by('hangxe_id');
		$this->db->order_by('dongxe_id');

        $query=$this->db->get();
        return $query->result();
	}

	public function luu_sanpham($data) {

		$this->db->insert('sanpham', $data);
	}

}