<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
<div class="col-md-11">
	<div class="main-content col-content radius bg-white">
		<h5>Danh sách khách hàng</h5>
		
		<a href="<?php echo admin_url('admin/customer_them');?>" class="btn btn-success col-md-12"> Thêm khách hàng</a>
		
		
		
		<table class="table table-hover">
			<thead>
				<tr class="success">
					<th>Tên khách hàng</th>
					<th class="text-center">Số diện thoại</th>
					<th class="text-center">Địa chỉ</th>
					<th class="text-center">Số chứng minh</th>
					<th class="text-center">Tác vụ</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($customers AS $customer) {?>
				
				<tr>
					<td><?php echo $customer->fullname;?></td>
					<td class="text-center"><?php echo $customer->phone;?></td>
					<td class="text-center"><?php echo $customer->address;?></td>
					<td class="text-center"><?php echo $customer->CMND;?></td>
					<td class="text-center">
						<button type="button" class="btn btn-xs donglai" data-toggle="modal" data-target="#myModal<?php echo $customer->id?>"><i class="glyphicon glyphicon-pencil"></i></button>
						<a  href="<?php echo admin_url('admin/delete_customer/'.$customer->id);?>" class="btn btn-xs donglai" onclick="return confirm('Bạn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i></a>
					</td>
					<div id="myModal<?php echo $customer->id?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Sửa thông tin khách hàng</h4>
								</div>
								<div class="modal-body">
									
									<form action="<?php echo admin_url('admin/customer_sua');?>" method="POST">
										<input type="hidden" name="customer_id" value='<?php echo $customer->id;?>'>
										<div class="form-group">
											<label for="fullname" class="col-md-3 control-label"><?php echo form_label('Họ và tên', 'fullname'); ?>:</label>
											<div class="col-md-9">
												<input type="text" name="fullname" class="form-control" placeholder ="Họ và tên" value="<?php echo $customer->fullname;?>"
												required/>
											</div>
										</div>
										<br>
										<br>
										<div class="form-group">
											<label for="phone" class="col-md-3 control-label"><?php echo form_label('Số điện thoại', 'phone'); ?>:</label>
											<div class="col-md-9">
												<input type="text" name="phone" id="phone" class="form-control" placeholder="Số điện thoại" value="<?php echo $customer->phone;?>"/>
											</div>
											
										</div>
										<br>
										<br>
										<div class="form-group">
											<label for="address" class="col-md-3 control-label"><?php echo form_label('Địa chỉ', 'address'); ?>:</label>
											<div class="col-md-9">
												<input type="text" name="address" class="form-control" placeholder="Trâu quỳ- Gia Lâm- Hà Nội" value="<?php echo $customer->address;?>" />
											</div>
										</div>
										<br>
										<br>
										<div class="form-group">
											<label for="CMND" class="col-md-3 control-label"><?php echo form_label('Số chứng minh nhân dân', 'CMND'); ?></label>
											<div class="col-md-9">
												<input type="text" name="CMND" class="form-control" placeholder="Số chứng minh nhân dân (Căn cước)" value="<?php echo $customer->CMND;?>" />
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-default">Sửa</button>
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
</div>