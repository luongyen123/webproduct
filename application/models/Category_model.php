<?php


class Category_model extends My_model
{
    var $table='category';
	public $category = 'category';   
    private $attribute = 'attribute';   

	function __construct() {
        parent::__construct();
    }

    function join() {
    	/*$this->db->select($this->category . '.id,name,note,createdat,updatedat,attribute_id,createdby');
    	$this->db->from($this->category);
    	$this->db->select($this->attribute . '.manufacture');
    	$this->db->from($this->attribute);
    	*/
    	$this->db->select('category.*,attribute.manufacture')->from('category ')->join(' attribute', 'attribute.id = category.attribute_id');
		//$this->db->get();

       // $this->db->join($this->attribute, $this->attribute . '.id = ' . $this->category . '.attribute_id','inner');
    	 $query = $this->db->get();
        return $query->result();


    }

    function join_admin()
    {
        $this->db->select('category.*,admin.name')->from('category ')->join(' admin ', 'admin.id = category.admin_id');
         $query = $this->db->get();
        return $query->result();
    }

}?>