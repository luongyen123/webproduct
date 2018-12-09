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
		$this->load->Model('Hangxe_model','hangxe');
		$this->load->Model('Dongxe_model','dongxe');
		$this->load->Model('Sanpham_model','sanpham');
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
	function delete_banggia()
	{
		$id=$this->uri->segment('4'); 
		
		$id=intval($id);
		// // lấy thông tin của quản trị viên
		$info=$this->banggia->lay_banggiaId($id);
		if(!$info){
			$this->session->set_flashdata('message','khong ton tai quan tri vien');
			redirect(admin_url('admin/banggia'));	
		}
		//thuc hien xoa
		$this->banggia->delete_banggia($id);
		$this->session->set_flashdata('message','xoa du lieu thanh cong');
		redirect(admin_url('admin/banggia'));
	}

	function delete_customer()
	{
		$id=$this->uri->segment('4'); 
		
		$id=intval($id);
		// // // lấy thông tin của quản trị viên
		// $info=$this->banggia->lay_banggiaId($id);
		// if(!$info){
		// 	$this->session->set_flashdata('message','khong ton tai quan tri vien');
		// 	redirect(admin_url('admin/banggia'));	
		// }
		//thuc hien xoa
		$this->customer->delete_customer($id);
		$this->session->set_flashdata('message','xoa du lieu thanh cong');
		redirect(admin_url('admin/getIndexCustomer'));
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

	function banggia_ngay_sua(){
		$this->form_validation->set_rules('bg_id', 'Id', 'required|xss_clean');
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

		$bg_id =$this->form_validation->set_value('bg_id', 'Id', 'required|xss_clean');
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
		$this->banggia->edit_lai_ngay($bg_id,$new_data);
		$this->session->set_flashdata('success', 'Sửa thành công');
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

	function customer_sua() {
			$this->form_validation->set_rules('customer_id', 'ID', 'required|xss_clean');
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
				$customer_id =$this->form_validation->set_value('customer_id', 'ID', 'required|xss_clean');
				$new_data['fullname'] 	= $this->form_validation->set_value('fullname', 'Họ tên', 'required|xss_clean');
				
				$new_data['phone']= $this->form_validation->set_value('phone', 'Số điện thoại', 'required|xss_clean');

				$new_data['address'] =  $this->form_validation->set_value('address', 'Địa chỉ', 'required|xss_clean');
				
				$new_data['CMND'] = $this->form_validation->set_value('CMND', 'Số chứng minh thư', 'required|xss_clean');
				
				$this->customer->edit_customer($customer_id,$new_data);
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
			$data=$new_data;
			$this->session->set_flashdata('success', 'Lưu thành công');
			$this->load->view('admin/admin/hopdong', $data);
		}
	}

	public function dinhgia(){
		$train = $this->sanpham->getSanPham();
		$data_trains = [];
		$targets = [];
		$data_dongxe = [];
		$data_gia = [];
		$data_hangxe_train = [];
		$data_hangxe_target = [];

		//echo var_dump($train);
		foreach($train as $value){
			
			$temp = [(int)$value->dongxe_id, (int)$value->namsx];
			if (empty($data_dongxe)){
				$data_dongxe= [];
			}
			if (empty($data_gia)){
				$data_gia= [];
			}
			if (empty($data_hangxe_train[$value->hangxe_id])){
				$data_dongxe= [];
				$data_hangxe_train[$value->hangxe_id]= [];
			}
			if (empty($data_trains[$value->loaixe])){
				$data_dongxe= [];
				$data_hangxe_train[$value->hangxe_id]= [];
				$data_trains[$value->loaixe]= [];
			}
			if (empty($data_hangxe_target[$value->hangxe_id])){
				$data_gia= [];
				$data_hangxe_target[$value->hangxe_id]= [];
			}
			if (empty($targets[$value->loaixe])){
				$data_gia= [];
				$data_hangxe_target[$value->hangxe_id]= [];
				$data_trains[$value->loaixe]= [];
			}
			array_push($data_dongxe, $temp);
			array_push($data_gia, (float)$value->gia);
			$data_hangxe_train[$value->hangxe_id] = $data_dongxe;
			$data_hangxe_target[$value->hangxe_id] = $data_gia;
			$data_trains[$value->loaixe]=$data_hangxe_train;
			$targets[$value->loaixe]=$data_hangxe_target;
		}
		

		$loaisp = $this->input->post('loaisp');

		$sanpham = $this->input->post('sanpham');

		$sanpham = $array = explode(' ', $sanpham);		

		$hangxe_id = $this->hangxe->getIdHangxe($sanpham[0],$loaisp);
		
		if($hangxe_id == null){
			echo "Chưa có dữ liệu train cho hãng xe này";
		}else{
			$tendong='';

			for($i=1;$i<count($sanpham)-1;$i++){
				$tendong.=$sanpham[$i]." ";
			}
			$dongxe= $this->dongxe->getIdDongxe($tendong,$loaisp);

			// $dongxe = array_search(trim($tendong), $data_dong);
			if($dongxe == null){
				echo "Chưa có dữ liệu train trên cho dòng xe này";
			}else{
				$regression = new LeastSquares();
				
			// echo var_dump($targets[trim($loaisp)][trim($sanpham[0])]);
				$regression->train($data_trains[trim($loaisp)][$hangxe_id], $targets[trim($loaisp)][$hangxe_id]);

				echo number_format(round(($regression->predict([$dongxe,(int)$sanpham[count($sanpham)-1]]))/1000,0)*1000);
			}
		}
		
		
	}
	function tinhlai(){
		$phieucam = $this->input->post('phieucam');
		$banggia= $this->input->post('banggia');
		$sotien = $this->input->post('sotien');
		$tienlai = $this->input->post('tienlai');
		$ngaydong = $this->input->post('ngaydong');
		
		$banggia = $this->banggia->lay_banggiaID($banggia);
		$tienlai = json_decode($tienlai);

		if($tienlai!="" || !empty($tienlai)){
			$ngaydong_lai = [];
			$tienlai_dong = [];
			foreach ($tienlai as $value) {
				$temp = (array)json_decode($value);
				array_push($ngaydong_lai, $temp['ngaydong']);
				array_push($tienlai_dong, $temp['sotiendong']);
			}
		}

		$n = date_diff(date_create(date('d-m-Y')),date_create($ngaydong));
		$n = (int)$n->format("%d");

		$sotien = str_replace('₫', '', $sotien);
		$sotien = str_replace(',', '', $sotien);
		$sotien = (int)$sotien;

		$laisuat = 0;
		if($tienlai="" || empty($tienlai)){
			$laisuat = $this->tinhLaiSuat($banggia, $sotien, $n);
		}else{
			$laisuat = $this->tinhLaiSuat($banggia, $sotien, $n, $ngaydong_lai, $tienlai_dong, $ngaydong);
		}
		
		//echo "\n".$laisuat."\n";

		$tienloi = $laisuat-$sotien;
		$tienloi = number_format((int)$tienloi);
		$data['tienloi']=$tienloi;
		$laisuat= number_format($laisuat);
		$data['laisuat']=$laisuat;
		echo json_encode($data);

	}

	private function tinhLaiSuat($banggia, $sotien, $n, $ngaydong_lai = [], $tienlai_dong = [], $ngaydong=null)
	{
		$laisuat = 0;
		if($banggia[0]->bg_loai == "ngay"){
			$banggia[0]->bg_mucgia = json_decode($banggia[0]->bg_data, true);
			$laisuat = $sotien;
			for ($i=0; $i < $n; $i++) {
				if ($laisuat < 5000000)
				{
					$lai = (int)$banggia[0]->bg_mucgia['ngay2'];
					$lai /= 100;
				}
				else
				{
					if ($laisuat < 10000000)
					{
						$lai = (int)$banggia[0]->bg_mucgia['ngay5'];
						$lai /= 100;
					}
					else
					{
						$lai = (int)$banggia[0]->bg_mucgia['ngay10'];
						$lai /= 100;
					}
				}
				$laisuat += $laisuat * $lai;
				for($j=0; $j<count($ngaydong_lai);$j++){
					$kt = date_diff(date_create($ngaydong),date_create($ngaydong_lai[$j]));
					$kt = (int)$kt->format("%d");
					if( ($kt - 1) == $i){
						$laisuat -= $tienlai_dong[$j];
					}
				}
			}
		}
		return round($laisuat/1000,0) * 1000;;
	}

	function donglai(){
		$id = $this->input->post('phieucamdo');

		$hoadon['hoten']=$this->input->post('nguoinop');
		$hoadon['sochungminh']=$this->input->post('sochungminh');
		$hoadon['diachi']=$this->input->post('diachi');
		$hoadon['sodienthoai']=$this->input->post('sodienthoai');
		$hoadon['sotiendong']=$this->input->post('sotiendong');

		$mang=[];
		$text = 'ngaydong';
		$mang[$text] = $this->input->post('ngaydong');
		$text = 'sotiendong';
		
		$mang[$text] = $this->input->post('sotiendong');
		$mang_json = json_encode($mang);
		
		$tienlai = $this->input->post('tienlai');

		if(empty($tienlai)){
			$tienlai=[];
		}else{
			$tienlai = json_decode($tienlai);
		}
		

		array_push($tienlai,$mang_json);
		$tienlai = json_encode($tienlai);
		
		$this->phieucamdo->donglai($id,$tienlai);
		$data['hoadon']=$hoadon;

		$this->session->set_flashdata('success', 'Lưu thành công');
		$this->load->view('admin/admin/inhoadon',$data);
		
	}

	function thanhly(){

		$data['khachhang']=$this->input->post('khachhang');
		$data['chungminh']=$this->input->post('chungminh');
		$data['tiengoc']=$this->input->post('tiengoc');
		$data['tienlai']=$this->input->post('thanhly_lai');
		$data['diachi']=$this->input->post('diachi');
		$data['sodienthoai']=$this->input->post('sodienthoai');
		$data['tong']=$this->input->post('thanhly_tong');

		$phieucam_id = $this->input->post('thanhly_id');

		$this->phieucamdo->thanhly($phieucam_id);

		$this->load->view('admin/admin/thanhly',$data);
	}

	function inhoadon(){

	}

	function sanphamIndex(){
		$sanpham = $this->sanpham->getChitiet();

		$data['sanphams'] = $sanpham;

		$header['title'] = "Danh sách dữ liệu train";
		$header['active'] = 'sanpham';
		
		$this->load->view('header', $header);
		$this->load->view('block/left', $header);
		$this->load->view('block/top');
		$this->load->view('admin/admin/sanpham', $data);
		$this->load->view('block/right');
		$this->load->view('footer');
	}

	function sanpham_them() {
			$this->form_validation->set_rules('tenhang', 'Hãng sản phẩm', 'required|xss_clean');
			$this->form_validation->set_rules('tendong', 'Dòng sản phẩm', 'required|xss_clean');
			$this->form_validation->set_rules('namsx', 'Năm sản xuất/Dung lượng', 'required|xss_clean');
			$this->form_validation->set_rules('gia', 'Giá sản phẩm', 'required|xss_clean');
			$this->form_validation->set_rules('loaixe', 'Loại xe', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$header['title'] = "Thêm dữ liệu train";
				
				$this->load->view('header', $header);
				$this->load->view('block/left', $header);
				$this->load->view('block/top');
				$this->load->view('admin/admin/sanpham_them');
				$this->load->view('block/right');
				$this->load->view('footer');
			} else {
				$tenhang= $this->form_validation->set_value('tenhang', 'Hãng sản phẩm', 'required|xss_clean');
				$loaixe = $this->form_validation->set_value('loaixe', 'Loại xe', 'required|xss_clean');		
				$tenhang_check = $this->hangxe->getIdHangxe($tenhang,$loaixe);

				if($tenhang_check == null){
					$hang['tenhang']=$tenhang;
					$hang['loaixe']=$loaixe;

					$this->hangxe->luu_hang($hang);

					$new_data['hangxe_id']=$this->hangxe->getIdHangxe($tenhang,$loaixe);
				}else{
					$new_data['hangxe_id']=$tenhang_check;
				}

				$tendong= $this->form_validation->set_value('tendong', 'Dòng sản phẩm', 'required|xss_clean');
				$tendong_check = $this->dongxe->getIdDongxe($tendong,$loaixe);

				if($tendong_check == null){
					$dong['tendong']=$tendong;
					$dong['loaixe']=$loaixe;

					$this->dongxe->luu_dong($dong);

					$new_data['dongxe_id']=$this->dongxe->getIdDongxe($tendong,$loaixe);
				}else{
					$new_data['dongxe_id']=$tendong_check;
				}

				$new_data['namsx'] =  $this->form_validation->set_value('namsx', 'Năm sản xuất/Dung lượng', 'required|xss_clean');
				
				$new_data['gia'] = $this->form_validation->set_value('gia', 'Giá sản phẩm', 'required|xss_clean');
				$new_data['loaixe'] = $this->form_validation->set_value('loaixe', 'Loại xe', 'required|xss_clean');
				
				$this->sanpham->luu_sanpham($new_data);
				$this->session->set_flashdata('success', 'Lưu thành công');
				redirect(admin_url('admin/sanphamIndex/'));
			}
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