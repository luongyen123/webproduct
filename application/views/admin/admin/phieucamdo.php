<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
<div class="col-md-11">
	<div class="main-content col-content radius bg-white">
		<h5>Danh sách phiếu cầm đồ</h5>
		<a href="<?php echo admin_url('admin/phieucamdo_
		them');?>" class="btn btn-success col-md-12"> Thêm phiếu cầm đồ</a>
		
		
		
		<table class="table table-hover">
			<thead>
				<tr class="success">
					<th>Họ tên</th>
					<th class="text-center">Số điện thoại</th>
					<th class="text-center">Loại sản phẩm</th>
					<th class="text-center">Thông tin sản phẩm</th>
					<th class="text-center">Tiền vay</th>
					<th class="text-center">Ngày cầm</th>
					<th class="text-center">Ngày hết hạn</th>
					<th>Lãi </th>
					<th>Trạng thái</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($phieucamdos AS $phieucamdo) {?>
				<?php if($phieucamdo->trangthai==0){?>
				<tr>
					<td><?php echo $phieucamdo->fullname;?></td>
					<td class="text-center"><?php echo $phieucamdo->phone;?></td>
					
					<td class="text-center"><?php echo $phieucamdo->loaisp;?></td>
					<td class="text-center"><?php echo $phieucamdo->thongtinsp;?></td>
					<td class="text-center"><?php echo $phieucamdo->sotien;?></td>
					<td class="text-center"><?php echo(date("Y-m-d",$phieucamdo->ngaycam));?></td>
					<td class="text-center"><?php echo $phieucamdo->ngayhethan;?></td>
					<td>
						<button type="button" class="btn btn-info btn-xs donglai" data-toggle="modal" data-target="#myModal<?php echo $phieucamdo->phieucam_id?>" id="<?php echo $phieucamdo->phieucam_id?>" lai="<?php echo $phieucamdo->banggia;?>"
						tiengoc="<?php echo $phieucamdo->sotien;?>" laidong='<?php echo $phieucamdo->tienlai;?>' ngaydong="<?php echo(date("Y-m-d",$phieucamdo->ngaycam));?>" title="Đóng lãi"><i class="glyphicon glyphicon-plus"></i></button>
						<button type="button" class="btn btn-success btn-xs donglai" title="Thanh lý hợp đồng" data-toggle="modal" data-target="#thanhly<?php echo $phieucamdo->phieucam_id?>" id="<?php echo $phieucamdo->phieucam_id?>" lai="<?php echo $phieucamdo->banggia;?>" tiengoc="<?php echo $phieucamdo->sotien;?>" laidong='<?php echo $phieucamdo->tienlai;?>' ngaydong="<?php echo(date("Y-m-d",$phieucamdo->ngaycam));?>"><i class="glyphicon glyphicon-ok"></i></button>
					</td>
					<td>
						<?php echo ($phieucamdo->trangthai==1)? "Đã thanh lý" :"Còn thời hạn";?>
					</td>
					<!-- Form đóng lãi -->
					<div id="myModal<?php echo $phieucamdo->phieucam_id?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Đóng lãi</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
											<p style="font-size: 14px; font-weight: bold;">Số tiền lãi tính đến ngày hôm nay:</h5>
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												<p class="laisuat"></p>
											</div>
										</div>
										<form action="<?php echo admin_url('admin/donglai');?>" method="POST">
											<input type="hidden" name="phieucamdo" value='<?php echo $phieucamdo->phieucam_id;?>'>
											<input type="hidden" name="nguoinop" value="<?php echo $phieucamdo->fullname;?>">
											<input type="hidden" name="sochungminh" value="<?php echo $phieucamdo->CMND;?>">
											<input type="hidden" name="diachi" value="<?php echo $phieucamdo->address;?>">
											<input type="hidden" name="sodienthoai" value="<?php echo $phieucamdo->phone;?>">
											<input type="hidden" name="tienlai" value='<?php echo $phieucamdo->tienlai;?>'>
											<div class="form-group">
												<label for="pwd">Ngày đóng:</label>
												<input type="date" class="form-control" name="ngaydong" required>
											</div>
											<div class="form-group">
												<label for="pwd">Số tiền đóng:</label>
												<input type="text" class="form-control" name="sotiendong" required>
											</div>
											
											
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-default">Submit</button>
										</form>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!-- End form -->
						<!-- Form thanh ly hop dong -->
						<div id="thanhly<?php echo $phieucamdo->phieucam_id?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Thông tin thanh lý hợp đồng</h4>
									</div>
									<div class="modal-body">
										<form action="<?php echo admin_url('admin/thanhly');?>" method="POST">
											<input type="hidden" name="thanhly_id" value="<?php echo $phieucamdo->phieucam_id;?>">
											<input type="hidden" name="diachi" value="<?php echo $phieucamdo->address;?>">
											<input type="hidden" name="sodienthoai" value="<?php echo $phieucamdo->phone;?>">
											<div class="form-group">
												<div class="row">
													<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
														<label for="pwd">Khách hàng</label>
														<input type="hidden" name="khachhang" value="<?php echo $phieucamdo->fullname;?>">
														<input type="text" name="thanhly_khachhang" value="<?php echo $phieucamdo->fullname;?>" class="form-control" disabled>
													</div>
													<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
														<label for="pwd">Số chứng minh</label>
														<input type="hidden" name="chungminh" value="<?php echo $phieucamdo->CMND;?>">
														<input type="text" name="thanhly_chungminh" value="<?php echo $phieucamdo->CMND;?>" class="form-control" disabled>
													</div>
												</div>
												
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
														<label for="pwd">Số tiền gốc</label>
														<input type="hidden" name="tiengoc" value="<?php echo $phieucamdo->sotien;?>">
														<input type="text" name="thanhly_goc" value="<?php echo $phieucamdo->sotien;?>" class="form-control" disabled>
													</div>
													<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
														<label for="pwd">Số tiền lãi:</label>
														<input type="text" name="thanhly_lai" value="" class="form-control thanhly_lai" readonly >
													</div>
												</div>
												
											</div>
											<div class="form-group">
												<label for="pwd">Tổng tiền thanh lý</label>
												<input type="text" name="thanhly_tong" value="" class="form-control thanhly_tong" readonly>
											</div>
											
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Thanh lý</button>
										</form>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
							<!-- Endform -->
						</div>
					</tr>
					<?php }else{?>
					<tr style="color:red">
						<td><?php echo $phieucamdo->fullname;?></td>
						<td class="text-center"><?php echo $phieucamdo->phone;?></td>
						
						<td class="text-center"><?php echo $phieucamdo->loaisp;?></td>
						<td class="text-center"><?php echo $phieucamdo->thongtinsp;?></td>
						<td class="text-center"><?php echo $phieucamdo->sotien;?></td>
						<td class="text-center"><?php echo(date("Y-m-d",$phieucamdo->ngaycam));?></td>
						<td class="text-center"><?php echo $phieucamdo->ngayhethan;?></td>
						<td>
							<button type="button" class="btn btn-info btn-xs donglai" data-toggle="modal" data-target="#myModal<?php echo $phieucamdo->phieucam_id?>" id="<?php echo $phieucamdo->phieucam_id?>" lai="<?php echo $phieucamdo->banggia;?>"
							tiengoc="<?php echo $phieucamdo->sotien;?>" laidong='<?php echo $phieucamdo->tienlai;?>' ngaydong="<?php echo(date("Y-m-d",$phieucamdo->ngaycam));?>" title="Đóng lãi" disabled><i class="glyphicon glyphicon-plus"></i></button>
							<button type="button" class="btn btn-success btn-xs donglai" title="Thanh lý hợp đồng" data-toggle="modal" data-target="#thanhly<?php echo $phieucamdo->phieucam_id?>" id="<?php echo $phieucamdo->phieucam_id?>" lai="<?php echo $phieucamdo->banggia;?>" tiengoc="<?php echo $phieucamdo->sotien;?>" laidong='<?php echo $phieucamdo->tienlai;?>' ngaydong="<?php echo(date("Y-m-d",$phieucamdo->ngaycam));?>" disabled><i class="glyphicon glyphicon-ok"></i></button>
						</td>
						<td>
							<?php echo ($phieucamdo->trangthai==1)? "Đã thanh lý" :"Còn thời hạn";?>
						</td>
						<!-- Form đóng lãi -->
						<div id="myModal<?php echo $phieucamdo->phieucam_id?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Đóng lãi</h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
												<p style="font-size: 14px; font-weight: bold;">Số tiền lãi tính đến ngày hôm nay:</h5>
												</div>
												<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
													<p class="laisuat">
														
													</p>
												</div>
											</div>
											<form action="<?php echo admin_url('admin/donglai');?>" method="POST">
												<input type="hidden" name="phieucamdo" value='<?php echo $phieucamdo->phieucam_id;?>'>
												<input type="hidden" name="nguoinop" value="<?php echo $phieucamdo->fullname;?>">
												<input type="hidden" name="sochungminh" value="<?php echo $phieucamdo->CMND;?>">
												<input type="hidden" name="diachi" value="<?php echo $phieucamdo->address;?>">
												<input type="hidden" name="sodienthoai" value="<?php echo $phieucamdo->phone;?>">
												<input type="hidden" name="tienlai" value='<?php echo $phieucamdo->tienlai;?>'>
												<div class="form-group">
													<label for="pwd">Ngày đóng:</label>
													<input type="date" class="form-control" name="ngaydong" required>
												</div>
												<div class="form-group">
													<label for="pwd">Số tiền đóng:</label>
													<input type="text" class="form-control" name="sotiendong" required>
												</div>
												
												
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-default">Submit</button>
											</form>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- End form -->
							<!-- Form thanh ly hop dong -->
							<div id="thanhly<?php echo $phieucamdo->phieucam_id?>" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Thông tin thanh lý hợp đồng</h4>
										</div>
										<div class="modal-body">
											<form action="<?php echo admin_url('admin/thanhly');?>" method="POST">
												<input type="hidden" name="thanhly_id" value="<?php echo $phieucamdo->phieucam_id;?>">
												<input type="hidden" name="diachi" value="<?php echo $phieucamdo->address;?>">
												<input type="hidden" name="sodienthoai" value="<?php echo $phieucamdo->phone;?>">
												<div class="form-group">
													<div class="row">
														<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
															<label for="pwd">Khách hàng</label>
															<input type="hidden" name="khachhang" value="<?php echo $phieucamdo->fullname;?>">
															<input type="text" name="thanhly_khachhang" value="<?php echo $phieucamdo->fullname;?>" class="form-control" disabled>
														</div>
														<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
															<label for="pwd">Số chứng minh</label>
															<input type="hidden" name="chungminh" value="<?php echo $phieucamdo->CMND;?>">
															<input type="text" name="thanhly_chungminh" value="<?php echo $phieucamdo->CMND;?>" class="form-control" disabled>
														</div>
													</div>
													
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
															<label for="pwd">Số tiền gốc</label>
															<input type="hidden" name="tiengoc" value="<?php echo $phieucamdo->sotien;?>">
															<input type="text" name="thanhly_goc" value="<?php echo $phieucamdo->sotien;?>" class="form-control" disabled>
														</div>
														<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
															<label for="pwd">Số tiền lãi:</label>
															<input type="text" name="thanhly_lai" value="" class="form-control thanhly_lai" readonly>
														</div>
													</div>
													
												</div>
												<div class="form-group">
													<label for="pwd">Tổng tiền thanh lý</label>
													<input type="text" name="thanhly_tong" value="" class="form-control thanhly_tong" readonly >
												</div>
												
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-success">Thanh lý</button>
											</form>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
								<!-- Endform -->
							</div>
						</tr>
						
						<?php }} ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- Modal -->
<script src="http://localhost/webproduct/style/js/jquery.min.js"></script>
<script type="text/javascript">
	$('.donglai').click(function() {
		var phieucam_id = $(this).attr('id');
		var banggia = $(this).attr('lai');
		var sotien = $(this).attr('tiengoc');
		var tienlai = $(this).attr('laidong');
		var ngaycam = $(this).attr('ngaydong');
		
		$.ajax({
			url: 'http://localhost/webproduct/admin/admin/tinhlai',
			type: 'POST',
			data: {'phieucam': phieucam_id,'banggia':banggia, 'sotien':sotien,'tienlai':tienlai, 'ngaydong': ngaycam},
			success: function(data){
				console.log(data);
				var x=document.getElementsByClassName('laisuat');
				for(var i=0;i<x.length;i++){
					x[i].innerHTML=(JSON.parse(data)).tienloi+" VNĐ";
				}
				// document.getElementsByClassName('laisuat').innerHTML
				x=document.getElementsByClassName('thanhly_lai');
				for(var i=0;i<x.length;i++){
					x[i].value=(JSON.parse(data)).tienloi+" VNĐ";
				}
				x=document.getElementsByClassName('thanhly_tong');
				for(var i=0;i<x.length;i++){
					x[i].value=(JSON.parse(data)).laisuat+" VNĐ";
				}
			}
		});
	});
</script>