<?php
require FCPATH . 'vendor/autoload.php';
use Phpml\Regression\LeastSquares;
class Admin extends My_controller{

	function __construct(){
		parent:: __construct();
		$this->benchmark->mark('code_start');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->Model('Admin_model');
		$this->load->Model('banggia_model','banggia');
		$this->load->Model('Customer_model','customer');
		$this->load->Model('phieucamdo_model','phieucamdo');
	}
	//ten thu muc view giong ten controller, ten file giong ten action
	//load danh sach
	function index()
	{
		$input =array();
		//load ham get_list trong My_model, list chua ds tat ca admin
		$list=$this->Admin_model->get_list($input);
		$this->data['list']=$list;
		$total= $this->Admin_model->get_total();
		$this->data['total']=$total;
		// pre trong comon helper
		//pre($list);
		/* lấy nội dung của message*/
		$message=$this->session->flashdata('message');
		$this->data['message']=$message;

		$this->data['temp']='admin/admin/index';
		//tham so truyen vao $this->data
		$this->load->view('admin/main',$this->data);
	}
	//kiểm tra username tồn tại chưa
	function check_email()
	{
		$email=$this->input->post('email');
		// gọi hàm check exit kiểm tra tồn tại hay k?
		$where = array('email' => $email);
		if($this->Admin_model->check_exists($where)){
			//trả về thông báo lỗi
			$this->form_validation->set_message( __FUNCTION__,'email  này đã tồn tại');
			return false;
		}
		return true;
	}
	public function add_user()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Tên','required');
			$this->form_validation->set_rules('email','email đăng nhập','required|callback_check_email');
			$this->form_validation->set_rules('password','mật khẩu','required|min_length[6]');
			//matches nhập lại giống ô trên
			$this->form_validation->set_rules('repassword','nhập lại mật khẩu','matches[password]');
			$this->form_validation->set_rules('address','địa chỉ','required');
			$this->form_validation->set_rules('phone','số điện thoại','required');
			$this->form_validation->set_rules('idcard','CMT','required');
			// nhập dl chính xác
			if($this->form_validation->run())
				{
					// thêm vào csdl
					$name=$this->input->post('name');
					$password=$this->input->post('password');
					$email=$this->input->post('email');
					$address=$this->input->post('address');
					$phone=$this->input->post('phone');
					$idcard=$this->input->post('idcard');
					$data=array(
						'name' => $name,
						'password' => md5($password),
						'email' => $email,
						'address' => $address,
						'phone' => $phone,
						'idcard' => $idcard
					);
				
					if($this->Admin_model->create($data))
					{
						$this->session->set_flashdata('message','thêm mới thành công');
						redirect (admin_url('admin'));
					}
					else{
						$this->session->set_flashdata('message','thêm mới không thành công');
					}
					
				}

		}

		//thêm mới addmin
		$this->data['temp']='admin/admin/add';

		$this->load->view('admin/main',$this->data);
	}

	function edit()
	{
		//lấy id phân đoạn , tham số truyền vào vị trí phân đoạn trên url
		$id=$this->uri->segment('4');
		
		//lấy thông tin quản trị viên 
		//ép kiểu biến id trả về số nguyên
		$id=intval($id);
		$this->load->library('form_validation');
		$this->load->helper('form');
		$info=$this->Admin_model->get_info($id);
		//pre($info);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên này');
			redirect(admin_url('admin'));
		} 
		//gan info vaof data
		$this->data['info']=$info;
		if($this->input->post())
		{
			//set_rule
			$this->form_validation->set_rules('name','Tên','required|min_length[8]');
			
			if($password){
				$this->form_validation->set_rules('password','mật khẩu','required|min_length[6]');
				$this->form_validation->set_rules('repassword','nhập lại mật khẩu','matches[password]');
			}
			$this->form_validation->set_rules('email','email đăng nhập','required|callback_check_email');
			$this->form_validation->set_rules('address','địa chỉ','required');
			$this->form_validation->set_rules('phone','số điện thoại','required');
			$this->form_validation->set_rules('idcard','CMT','required');
			
			if($this->form_validation->run())
			{
					$name=$this->input->post('name');
					//nếu mà thay đổi mật khẩu thì mới cập nhật dữ liệu
					if($password){
						$data['password']= md5($password);
					}
					$email=$this->input->post('email');
					$address=$this->input->post('address');
					$phone=$this->input->post('phone');
					$idcard=$this->input->post('idcard');
					$data=array(
						'name' => $name,
						'email' => $email,
						'address' => $address,
						'phone' => $phone,
						'idcard' => $idcard
					);	
					if($this->Admin_model->update($id,$data))
					{
						$this->session->set_flashdata('message','cập nhật dữ liệu  thành công');
					}
					else{
						$this->session->set_flashdata('message','cập nhật dữ liệu  không thành công');
					}
					redirect (admin_url('admin'));
			}
		}
		
		$this->data['temp']='admin/admin/edit';
		//tham so truyen vao $this->data
		$this->load->view('admin/main',$this->data);
	}


	function delete()
	{
		$id=$this->uri->segment('4');
		$id=intval($id);
		// lấy thông tin của quản trị viên
		$info=$this->Admin_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','khong ton tai quan tri vien');
			redirect(admin_url('admin'));	
		}
		//thuc hien xoa
		$this->Admin_model->delete($id);
		$this->session->set_flashdata('message','xoa du lieu thanh cong');
		redirect(admin_url('admin'));
	}


	function banggia(){
		$giangay = $this->banggia->lay_banggia('ngay');
		$giatuan = $this->banggia->lay_banggia('tuan');
		$giathang = $this->banggia->lay_banggia('thang');

		if($giangay) {
			foreach($giangay AS &$gia)
			$gia->bg_mucgia = json_decode($gia->bg_data, true);
		}
		if($giatuan) {
			foreach($giatuan AS &$gia)
			$gia->bg_mucgia = json_decode($gia->bg_data, true);
		}
		
		$data['giangay'] = $giangay;
		$data['giatuan']=$giatuan;
		$data['giathang']=$giathang;

		$header['title'] = "Bảng giá lãi suất";
		$header['active'] = 'banggia';
		
		$this->load->view('header', $header);
		$this->load->view('block/left', $header);
		$this->load->view('block/top');
		$this->load->view('admin/admin/banggia', $data);
		$this->load->view('block/right');
		$this->load->view('footer');
		
	}



	function banggia_dien_them() {
			$this->form_validation->set_rules('bg_ten', 'Tên bảng giá', 'required|xss_clean');
			$this->form_validation->set_rules('bg_muc1', 'Mức 1', 'required|xss_clean');
			$this->form_validation->set_rules('bg_gia1', 'Mức giá 1', 'required|xss_clean');
			$this->form_validation->set_rules('bg_muc2', 'Mức 2', 'required|xss_clean');
			$this->form_validation->set_rules('bg_gia2', 'Mức giá 2', 'required|xss_clean');
			$this->form_validation->set_rules('bg_muc3', 'Mức 3', 'required|xss_clean');
			$this->form_validation->set_rules('bg_gia3', 'Mức giá 3', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$header['title'] = "Thêm bảng giá ngày";
				$header['active'] = 'banggia';
				$this->load->view('header', $header);
				$this->load->view('block/left', $header);
				$this->load->view('block/top');
				$this->load->view('admin/admin/banggia_themngay');
				$this->load->view('block/right');
				$this->load->view('footer');
			} else {
				$new_data['bg_ten'] 	= $this->form_validation->set_value('bg_ten', 'Tên bảng giá', 'required|xss_clean');
				
				$text = 'ngay';
				$text .= $this->form_validation->set_value('bg_muc1', 'Mức 1', 'required|xss_clean');
				$mang[$text] = $this->form_validation->set_value('bg_gia1', 'Giá mức 1', 'required|xss_clean');
				
				$text = 'ngay';
				$text .= $this->form_validation->set_value('bg_muc2', 'Mức 2', 'required|xss_clean');
				$mang[$text] =  $this->form_validation->set_value('bg_gia2', 'Giá mức 2 ', 'required|xss_clean');
				
				$text = 'ngay';
				$text .= $this->form_validation->set_value('bg_muc3', 'Mức 3', 'required|xss_clean');
				$mang[$text] = $this->form_validation->set_value('bg_gia3', 'Giá mức 3', 'required|xss_clean');
				
				$mang_json = json_encode($mang);
				
				$new_data['bg_loai'] = 'ngay';
				$new_data['bg_data'] = $mang_json;
				$this->banggia->luu_banggia($new_data);
				$this->session->set_flashdata('success', 'Lưu thành công');
				redirect(admin_url('admin/banggia/'));
			}
		}

	function banggia_tuan_them() {
			$this->form_validation->set_rules('bg_ten', 'Tên bảng giá', 'required|xss_clean');
			$this->form_validation->set_rules('bg_muc1', 'Mức 1', 'required|xss_clean');
			$this->form_validation->set_rules('bg_gia1', 'Mức giá 1', 'required|xss_clean');
			$this->form_validation->set_rules('bg_muc2', 'Mức 2', 'required|xss_clean');
			$this->form_validation->set_rules('bg_gia2', 'Mức giá 2', 'required|xss_clean');
			$this->form_validation->set_rules('bg_muc3', 'Mức 3', 'required|xss_clean');
			$this->form_validation->set_rules('bg_gia3', 'Mức giá 3', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$header['title'] = "Thêm bảng giá ngày";
				$header['active'] = 'banggia';
				$this->load->view('header', $header);
				$this->load->view('block/left', $header);
				$this->load->view('block/top');
				$this->load->view('admin/admin/banggia_themtuan');
				$this->load->view('block/right');
				$this->load->view('footer');
			} else {
				$new_data['bg_ten'] 	= $this->form_validation->set_value('bg_ten', 'Tên bảng giá', 'required|xss_clean');
				
				$text = 'tuan';
				$text .= $this->form_validation->set_value('bg_muc1', 'Mức 1', 'required|xss_clean');
				$mang[$text] = $this->form_validation->set_value('bg_gia1', 'Giá mức 1', 'required|xss_clean');
				
				$text = 'tuan';
				$text .= $this->form_validation->set_value('bg_muc2', 'Mức 2', 'required|xss_clean');
				$mang[$text] =  $this->form_validation->set_value('bg_gia2', 'Giá mức 2 ', 'required|xss_clean');
				
				$text = 'tuan';
				$text .= $this->form_validation->set_value('bg_muc3', 'Mức 3', 'required|xss_clean');
				$mang[$text] = $this->form_validation->set_value('bg_gia3', 'Giá mức 3', 'required|xss_clean');
				
				$mang_json = json_encode($mang);
				
				$new_data['bg_loai'] = 'tuan';
				$new_data['bg_data'] = $mang_json;
				$this->banggia->luu_banggia($new_data);
				$this->session->set_flashdata('success', 'Lưu thành công');
				redirect(admin_url('admin/banggia/'));
			}
		}

	function getIndexCustomer(){
		$customer = $this->customer->getDS();
		$data['customers'] = $customer;
		

		$header['title'] = "Thông tin khách hàng";
		
		
		$this->load->view('header', $header);
		$this->load->view('block/left', $header);
		$this->load->view('block/top');
		$this->load->view('admin/admin/customer', $data);
		$this->load->view('block/right');
		$this->load->view('footer');

	}
	function customer_them() {
			$this->form_validation->set_rules('fullname', 'Họ tên', 'required|xss_clean');
			$this->form_validation->set_rules('phone', 'Số điện thoại', 'required|xss_clean');
			$this->form_validation->set_rules('address', 'Địa chỉ', 'required|xss_clean');
			$this->form_validation->set_rules('CMND', 'Số chứng minh thư', 'required|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$header['title'] = "Thêm khách hàng";
				
				$this->load->view('header', $header);
				$this->load->view('block/left', $header);
				$this->load->view('block/top');
				$this->load->view('admin/admin/customer_them');
				$this->load->view('block/right');
				$this->load->view('footer');
			} else {
				$new_data['fullname'] 	= $this->form_validation->set_value('fullname', 'Họ tên', 'required|xss_clean');
				
				$new_data['phone']= $this->form_validation->set_value('phone', 'Số điện thoại', 'required|xss_clean');

				$new_data['address'] =  $this->form_validation->set_value('address', 'Địa chỉ', 'required|xss_clean');
				
				$new_data['CMND'] = $this->form_validation->set_value('CMND', 'Số chứng minh thư', 'required|xss_clean');
				
				$this->customer->luu_thongtin($new_data);
				$this->session->set_flashdata('success', 'Lưu thành công');
				redirect(admin_url('admin/getIndexCustomer/'));
			}
		}
	function getIndexPhieucamdo(){
		$phieucamdos = $this->phieucamdo->getDS();
		$data['phieucamdos'] = $phieucamdos;
		

		$header['title'] = "Phiếu cầm đồ";
		
		
		$this->load->view('header', $header);
		$this->load->view('block/left', $header);
		$this->load->view('block/top');
		$this->load->view('admin/admin/phieucamdo', $data);
		$this->load->view('block/right');
		$this->load->view('footer');
	}
	function phieucamdo_them(){
		
		$this->form_validation->set_rules('CMND', 'Số chứng minh', 'required|xss_clean');
		$this->form_validation->set_rules('fullname', 'Họ tên', 'required|xss_clean');
		$this->form_validation->set_rules('phone', 'Số điện thoại', 'required|xss_clean');
		$this->form_validation->set_rules('address', 'Địa chỉ', 'required|xss_clean');
		$this->form_validation->set_rules('loaisp', 'Loại sản phẩm', 'required|xss_clean');
		$this->form_validation->set_rules('thongtinsp', 'Thông tin sản phẩm', 'required|xss_clean');
		$this->form_validation->set_rules('banggia', 'Bảng giá', 'required|xss_clean');
		$this->form_validation->set_rules('ngayhethan', 'Ngày hết hạn', 'required|xss_clean');
		$this->form_validation->set_rules('sotien', 'Số tiền vay', 'required|xss_clean');
		// $this->form_validation->set_rules('ngaycam', 'Ngày vay', 'required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$header['title'] = "Thêm phiếu cầm đồ";

			$customers = $this->customer->getDS();
			
			$data['customers'] = $customers;
			$giangay = $this->banggia->lay_banggia('ngay');
			$giatuan = $this->banggia->lay_banggia('tuan');
			$giathang = $this->banggia->lay_banggia('thang');

			if($giangay) {
				foreach($giangay AS &$gia)
				$gia->bg_mucgia = json_decode($gia->bg_data, true);
			}
			if($giatuan) {
				foreach($giatuan AS &$gia)
				$gia->bg_mucgia = json_decode($gia->bg_data, true);
			}
		
			$data['giangay'] = $giangay;
			$data['giatuan']=$giatuan;
		
			$this->load->view('header', $header);
			$this->load->view('block/left', $header);
			$this->load->view('block/top');
			$this->load->view('admin/admin/phieucamdo_them',$data);
			$this->load->view('block/right');
			$this->load->view('footer');
		} else {

			$new_data['fullname'] 	= $this->form_validation->set_value('fullname', 'Họ tên', 'required|xss_clean');
			
			$new_data['phone']= $this->form_validation->set_value('phone', 'Số điện thoại', 'required|xss_clean');

			$new_data['address'] =  $this->form_validation->set_value('address', 'Địa chỉ', 'required|xss_clean');
			
			$new_data['CMND'] = $this->form_validation->set_value('CMND', 'Số chứng minh thư', 'required|xss_clean');
			$check = $this->customer->getCustomerByChungminh($new_data['CMND']);
			
			if(count($check)==0){	
				$this->customer->luu_thongtin($new_data);
			}

			$new_data['loaisp']=$this->form_validation->set_value('loaisp', 'Loại sản phẩm', 'required|xss_clean');
			$new_data['thongtinsp']=$this->form_validation->set_value('thongtinsp', 'Thông tin sản phẩm', 'required|xss_clean');
			$new_data['banggia']=$this->form_validation->set_value('banggia', 'Bảng giá', 'required|xss_clean');
			$new_data['ngayhethan']=$this->form_validation->set_value('ngayhethan', 'Bảng giá', 'required|xss_clean');
			$new_data['ngaycam']=time();
			$new_data['sotien']=$this->form_validation->set_value('sotien', 'Bảng giá', 'required|xss_clean');
			$this->phieucamdo->luu_thongtin($new_data);
			$this->session->set_flashdata('success', 'Lưu thành công');
			redirect(admin_url('admin/getIndexPhieucamdo/'));
		}
	}

	public function dinhgia(){

		$data_loai=['oto','xemay'];
		$data_hang = ['Audi','BMW','Hyunda','Suzuki'];
		$data_dong = ['A8','Q8','A6','Q3','Q5','X5','320i','X4','X3','X7','Accent','Grand I10','Sanraphe','Kona','Celerio','Swift','Ertiga','Vitara'];

		$data_train=[
			'Oto'=>[
				'Audi'=>[
					[0,2018],[0,2017],[1,2018],[1,2017],[2,2018],[2,2017],[3,2018],[3,2017],[4,2018],[4,2017]// A8=1,Q8=2,A6=3,Q3=4,Q5=5,
				],
				'BMW'=>[
					[5,2018],[5,2017],[6,2018],[6,2017],[7,2018],[7,2017],[8,2018],[8,2017],[9,2018],[9,2017]// X5=1,320i=2,x4=3,X3=4,X7=5,
				],
				'Hyunda'=>[
					[10,2018],[10,2017],[11,2018],[11,2017],[12,2018],[12,2017],[13,2018],[13,2017]// Accent=1,Grand110=2,Sanraphe=3,Kona=4
				],
				'Suzuki '=>[
					[14,2018],[14,2017],[15,2018],[15,2017],[15,2018],[15,2017],[16,2018],[16,2017]// celerio=1,swift=2,Ertiga=3,vitara=4
				]
			]
		];
		$targets=[
			'Oto'=>[
				'Audi'=>[5830,5710,4500,4400,2250,2150,1075,992,2666,2500],
				'BMW'=>[3599,3199,1689,1439,2399,2390,2063,1999,4200,3860],
				'Hyunda'=>[475,435,375,340,1200,970,615,585],
				'Suzuki'=>[410,359,549,539,689,639,679,629]

			]
		];
		$loaisp = $this->input->post('loaisp');
		$sanpham = $this->input->post('sanpham');

		$sanpham = $array = explode(' ', $sanpham);
		$hangxe = array_search($sanpham[0], $data_hang);
		$dongxe = array_search($sanpham[1], $data_dong);



		$regression = new LeastSquares();
		$regression->train($data_train[$loaisp][$hangxe], $targets[$loaisp][$hangxe]);

		echo $regression->predict([$dongxe,$sanpham[2]]);
	}

	function logout()
	{
		if($this->session->set_userdata('login'));{
			//xóa login
			$this->session->unset_userdata('login');
		}
		redirect(admin_url('login'));
	}


}