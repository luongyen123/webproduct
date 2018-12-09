<?php (defined('BASEPATH')) OR exit('No direct script access allowed');?>

<?php
class customer_model extends My_model
{
 
     public function getDS(){
        $query = $this->db->get('customer');

        return $query->result();
     }

     public function getCustomerByChungminh($chungminh){

        $this->db->select('CMND');
        $this->db->where('CMND', $chungminh);
        $query = $this->db->get('customer');
        
        return $query->result();
     }
     

     public function luu_thongtin($data) {

        $this->db->insert('customer', $data);

        return true;

    }

    public function edit_customer($id,$data){

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('customer');

        return true;
    }

    public function delete_customer($id){
        $this->db->delete('customer', array('id' => $id));
    
    }

}?>