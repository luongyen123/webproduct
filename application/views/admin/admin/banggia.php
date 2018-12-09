<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
<div class="col-md-11">
	<div class="main-content col-content radius bg-white">
		<div role="tabpanel">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#ngay" aria-controls="dien" role="tab" data-toggle="tab">Lãi suất ngày</a></li>
				<li role="presentation"><a href="#tuan" aria-controls="tuan" role="tab" data-toggle="tab">Lãi suất tuần</a></li>
				<li role="presentation"><a href="#thang" aria-controls="thang" role="tab" data-toggle="tab">Lãi suất tháng</a></li>
			</ul>
			<div class="tab-content">
				<!-- Điện -->
				<div role="tabpanel" class="tab-pane active" id="ngay">
					<a href="<?php echo admin_url('admin/banggia_dien_them');?>" class="btn btn-success col-md-12"> Thêm bảng lãi suất</a>
					<table class="table table-hover">
						<thead>
							<tr class="success">
								<th>Tên bảng giá</th>
								<th class="text-center">2 triệu– 5 triệu</th>
								<th class="text-center">5 triệu – 10 triệu</th>
								<th class="text-center">> 10 triệu</th>
								<th>Tác vụ</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($giangay AS $gia) { $muc = $gia->bg_mucgia;?>
							
							<tr>
								<td><?php echo $gia->bg_ten;?></td>
								<td class="text-center"><?php echo $muc['ngay2'];?>%</td>
								<td class="text-center"><?php echo $muc['ngay5'];?>%</td>
								<td class="text-center"><?php echo $muc['ngay10'];?>%</td>
								<td class="text-center">
									<button type="button" class="btn btn-xs donglai" data-toggle="modal" data-target="#myModal<?php echo $gia->bg_id?>"><i class="glyphicon glyphicon-pencil"></i></button>
									<a  href="<?php echo admin_url('admin/delete_banggia/'.$gia->bg_id);?>" class="btn btn-xs donglai" onclick="return confirm('Bạn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i></a>
								</td>
								<div id="myModal<?php echo $gia->bg_id?>" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Sửa bảng giá lãi suất</h4>
											</div>
											<div class="modal-body">
												
												<form action="<?php echo admin_url('admin/banggia_ngay_sua');?>" method="POST">
													<input type="hidden" name="bg_id" value='<?php echo $gia->bg_id;?>'>
													<div class="form-group">
														<label for="bg_ten" class="col-md-3 control-label"><?php echo form_label('Tên bảng giá', 'bg_ten'); ?>:</label>
														<div class="col-md-8">
															<input type="text" name="bg_ten" class="form-control" value="<?php echo $gia->bg_ten;?>" required/>
														</div>
													</div>
													<br>
													<br>
													<div class="form-group">
														<label for="bg_muc1" class="col-md-3 control-label"><?php echo form_label('Mức 1', 'bg_muc1'); ?>:</label>
														<div class="col-md-3">
															<input type="text" name="bg_muc1" class="form-control" placeholder="2 ~ 5 kWh (Nhập: 0)" value="2"/>
														</div>
														<label for="bg_gia1" class="col-md-3 control-label"><?php echo form_label('Giá mức 1', 'bg_gia1'); ?>:</label>
														<div class="col-md-3">
															<input type="text" name="bg_gia1" class="form-control" value="<?php echo $muc['ngay2'];?>"placeholder="VNĐ"/>
														</div>
													</div>
													<br>
													<br>
													<div class="form-group">
														<label for="bg_muc2" class="col-md-3 control-label"><?php echo form_label('Mức 2', 'bg_muc2'); ?>:</label>
														<div class="col-md-3">
															<input type="text" name="bg_muc2" class="form-control" placeholder="5 ~ 10 triệu (Nhập: 50)" value="5" />
														</div>
														<label for="bg_gia2" class="col-md-3 control-label"><?php echo form_label('Giá mức 2', 'bg_gia2'); ?>:</label>
														<div class="col-md-3">
															<input type="text" name="bg_gia2" class="form-control" value ="<?php echo $muc['ngay5'];?>" placeholder="VNĐ"/>
														</div>
													</div>
													<br>
													<br>
													<div class="form-group">
														<label for="bg_muc3" class="col-md-3 control-label"><?php echo form_label('Mức 3', 'bg_muc6'); ?>:</label>
														<div class="col-md-3">
															<input type="text" name="bg_muc3" class="form-control" placeholder=">10 tr (Nhập: 10)" value="10" />
														</div>
														<label for="bg_gia6" class="col-md-3 control-label"><?php echo form_label('Giá mức 6', 'bg_gia6'); ?>:</label>
														<div class="col-md-3">
															<input type="text" name="bg_gia3" class="form-control" value="<?php echo $muc['ngay10'];?>" placeholder="VNĐ"/>
														</div>
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
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- Hết Ngày -->
				
				<!-- Tuần -->
				<div role="tabpanel" class="tab-pane" id="tuan">
					
					<a href="<?php echo admin_url('admin/banggia_tuan_them');?>" class="btn btn-success col-md-12"> Thêm bảng lãi suất tuần</a>
					
					<table class="table table-hover">
						<thead>
							<tr class="success">
								<th>Lãi suất tháng</th>
								<th class="text-center">2 triệu– 5 triệu</th>
								<th class="text-center">5 triệu – 10 triệu</th>
								<th class="text-center">> 10 triệu</th>
							</tr>
						</thead>
						<tbody>
							<!--Bảng giá lãi suất tuần-->
							<?php foreach ($giatuan AS $gia) { $muc = $gia->bg_mucgia;?>
							
							<tr>
								<td><?php echo $gia->bg_ten;?></td>
								<td class="text-center"><?php echo $muc['tuan2'];?>%</td>
								<td class="text-center"><?php echo $muc['tuan5'];?>%</td>
								<td class="text-center"><?php echo $muc['tuan10'];?>%</td>
							</tr>
							<?php } ?>
							
						</tbody>
					</table>
				</div>
				<!-- Hết tuần -->
				<div role="tabpanel" class="tab-pane" id="thang">
					
					<a href="<?php echo admin_url('admin/banggia_dien_them');?>" class="btn btn-success col-md-12"> Thêm bảng lãi suất tháng</a>
					
					<table class="table table-hover">
						<thead>
							<tr class="success">
								<th>Lãi suất tháng</th>
								<th class="text-center">2 triệu– 5 triệu</th>
								<th class="text-center">5 triệu – 10 triệu</th>
								<th class="text-center">> 10 triệu</th>
							</tr>
						</thead>
						<tbody>
							<!--Bảng giá nước-->
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>