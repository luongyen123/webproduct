<?php 
class Historypaid extends My_controller{
	function __construct(){
		parent:: __construct();
		$this->load->Model('Historypaid_model');
		$this->load->model('Customer_model');
	}
	function index()

	{
		$this->load->model('Admin_model');
		$list = $this->Historypaid_model->index();

		$message=$this->session->flashdata('message');
		$this->data['message']=$message;
		$this->data['temp']='admin/historypaid/list';
		$this->data['list']= $list;	
	
		$this->load->view('admin/main',$this->data);       
	}

public function add()
{
	$this->load->library('form_validation');
	$this->load->helper('form');
	$this->load->model('Attribute_model');
	$ds= $this->Attribute_model->get_list();
	$this->load->model('Admin_model');
	$list = $this->Admin_model->get_list();

	$data = array();
	// var_dump($this->input->post());
	if($this->input->post())
	{
		$this->form_validation->set_rules('fullname','tên sản phẩm','required');
		$this->form_validation->set_rules('note','ghi chú','required');
		if($this->form_validation->run())

		{
			
			$fullname=$this->input->post('fullname');
			$interested_id=$this->input->post('interested_id');
			$phone=$this->input->post('phone');
			$address=$this->input->post('address');
			$data_cunstomer = array(
				'fullname'=>$fullname,
				'interested_id'=>$interested_id,
				'phone'=>$phone,
				'address'=>$address
			);
			$id_cunstomer = $this->Customer_model->add_Customer($data_cunstomer);
			$note=$this->input->post('note');
			$data=$this->input->post();
			$i=0;


			foreach ($data as $key => $value) {
				if($i < 4)
					unset($data[$key]);
				$i++;
			}
			$data['customer_id'] = $id_cunstomer;
			if($this->Historypaid_model->create($data))
				{
					$this->session->set_flashdata('message','thêm mới thành công');
					redirect (admin_url('Historypaid'));
				}
				else{
					$this->session->set_flashdata('message','thêm mới không thành công');
				}
		}
	}
	
	$this->data['temp']='admin/historypaid/add';
	$this->data['list'] = $list;

	$this->data['ds'] = $ds;
	
	$this->load->view('admin/main',$this->data);
}

function add_paid(){
	$id=$this->uri->segment('4');
	$data_info = $this->Historypaid_model->info($id);
	$this->load->library('form_validation');
	$this->load->helper('form');
	$data = array();
	
	if($this->input->post())
	{
		$data_paid = $this->input->post();
		$data_paid['id_paid'] = $id;
		$this->Historypaid_model->add_paid_historys($data_paid);
		redirect (admin_url('Historypaid/list_view'));
			
	}
	$list = $this->Historypaid_model->list();
	$message=$this->session->flashdata('message');
	$this->data['message']=$message;
	$this->data['temp']='admin/historypaid/historys';
	$this->data['data_info']=$data_info;
	$this->load->view('admin/main',$this->data); 
}
function list_view(){
	$list = $this->Historypaid_model->list();
	$message=$this->session->flashdata('message');
	$this->data['message']=$message;
	$this->data['temp']='admin/historypaid/historys_list';
	$this->data['list']= $list;	

	$this->load->view('admin/main',$this->data);   
}
}