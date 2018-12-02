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
		$data_dong = ['A8','Q8','A6','Q3','Q5','X5','320i','X4','X3','X7','Accent','Grand I10','Sanraphe','Kona','Celerio','Swift','Ertiga','Wave Alpha','Fulture','Wave RSX','SH Mode','Jupiter','Nozza Grander','Janus','Sirius','VIVA'];
		
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
				'Suzuki'=>[
					[14,2018],[14,2017],[15,2018],[15,2017],[15,2018],[15,2017],[16,2018],[16,2017]// celerio=1,swift=2,Ertiga=3,vitara=4
				]
			],
			'xemay'=>[
				'Honda'=>[
					[17,2018],[17,2017],[17,2016],[18,2018],[18,2017],[18,2016],[19,2018],[19,2017],[19,2016],[20,2018],[20,2017],[20,2016]
				],
				'Yamaha'=>[
					[21,2018],[21,2017],[21,2016],[22,2018],[22,2017],[22,2016],[23,2018],[23,2017],[23,2016],[24,2018],[24,2017],[24,2016]
				],
				'Suzuki'=>[
					[19,2018],[19,2017],[19,2016],[19,2017]
				],
				
			],
			
		];
		$targets=[
			'Oto'=>[
				'Audi'=>[5830000000,5710000000,4500000000,4400000000,2250000000,2150000000,1075000000,992000000,2666000000,2500000000],
				'BMW'=>[3599000000,3199000000,1689000000,1439000000,2399000000,2390000000,2063000000,1999000000,4200000000,3860000000],
				'Hyunda'=>[475000000,435000000,375000000,340000000,1200000000,970000000,615000000,585000000],
				'Suzuki'=>[410000000,359000000,549000000,539000000689000000,639000000,679000000,629000000]

			],
			'xemay'=>[
				'Honda'=>[17790000,17700000,17000000,31200000,30990000,29990000,22490000,21500000,21990000,68500000,60400000,50490000],
				'Yamaha'=>[29000000,28000000,26000000,43990000,41990000,39990000,33800000,31490000,29500000,22000000,19800000,19100000],
				'Suzuki'=>[22990000,21600000,20000000,19800000]

			]
		];
		$loaisp = $this->input->post('loaisp');

		$sanpham = $this->input->post('sanpham');

		$sanpham = $array = explode(' ', $sanpham);
		
		$tendong='';

		for($i=1;$i<count($sanpham)-1;$i++){
			$tendong.=$sanpham[$i]." ";
		}
		
		$dongxe = array_search(trim($tendong), $data_dong);
		
		$regression = new LeastSquares();
		
		
		// echo var_dump($targets[trim($loaisp)][trim($sanpham[0])]);
		$regression->train($data_train[trim($loaisp)][trim($sanpham[0])], $targets[trim($loaisp)][trim($sanpham[0])]);

		echo number_format(round(($regression->predict([$dongxe,(int)$sanpham[count($sanpham)-1]]))/1000,0)*1000);
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
	function logout()
	{
		if($this->session->set_userdata('login'));{
			//xóa login
			$this->session->unset_userdata('login');
		}
		redirect(admin_url('login'));
	}


}