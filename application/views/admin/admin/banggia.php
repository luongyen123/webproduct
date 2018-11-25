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
							</tr>
						</thead>
						<tbody>
							<?php foreach ($giangay AS $gia) { $muc = $gia->bg_mucgia;?>
							
							<tr>
								<td><?php echo $gia->bg_ten;?></td>
								<td class="text-center"><?php echo $muc['ngay2'];?>%</td>
								<td class="text-center"><?php echo $muc['ngay5'];?>%</td>
								<td class="text-center"><?php echo $muc['ngay10'];?>%</td>
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