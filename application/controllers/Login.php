<?php 
class Login extends My_controller{
	function __construct(){
		parent:: __construct();
		$this->load->Model('Admin_model');
	}
	function index()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post())
		{
			$this->form_validation->set_rules('login','login','callback_check_login');
			if($this->form_validation->run())
			{
				//set_userdata gán dl cho biến session

				$data=$this->Admin_model->getData($this->input->post('email'));		
				$this->session->set_userdata('logged_in',$data);
				 redirect(admin_url('admin'));
			}
		}
		
		$this->load->view('admin/login/index');
	}
	//kiem tra email,pass
	function check_login()
	{
		$email=$this->input->post('email');
		$password = $this->input->post('password');
		$password = md5($password);
		// điều kiện email ,pass đăng nhập trùng với db
		$where=array('email' => $email,'password' => $password);
		if($this->Admin_model->check_exists($where)){
			$data=$this->Admin_model->getData($email);

			$this->session->set_userdata('logged_in',$data);
			return true;
		}

		else{
			$this->form_validation->set_message( __FUNCTION__,'Không đăng nhập thành công' );
			return false;
		
		}
	}
}

?>