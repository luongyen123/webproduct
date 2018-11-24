<?php 
class Customer extends My_controller{
		function __construct(){
		parent:: __construct();
		$this->load->Model('Customer_model');
	}
	//ten thu muc view giong ten controller, ten file giong ten action
	//load danh sach
	function index()
	{
		$input =array();
		$list=$this->Admin_model->get_list($input);
		$this->data['list']=$list;
		$total= $this->Customer_model->get_total();
		$this->data['total']=$total;
		$message=$this->session->flashdata('message');
		$this->data['message']=$message;

		$this->data['temp']='admin/customer/index';
		$this->load->view('admin/main',$this->data);
	}
}

?>