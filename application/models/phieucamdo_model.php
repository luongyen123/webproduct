
<?php (defined('BASEPATH')) OR exit('No direct script access allowed');?>

<?php
class phieucamdo_model extends My_model
{
 
     public function getDS(){
        $query = $this->db->get('phieucamdo');

        return $query->result();
     }

     // public function getCustomerByChungminh($chungminh){

     //    $this->db->select('CMND');
     //    $this->db->where('CMND', $chungminh);
     //    $query = $this->db->get('customer');

     //    return $query->result();
     // }

     public function luu_thongtin($data) {

        $this->db->insert('phieucamdo', $data);

        return true;

    }

}?>