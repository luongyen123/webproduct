<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
<div class="col-md-11">
	<div class="main-content col-content radius bg-white">
		<h5>Danh sách dữ liệu train</h5>
		<a href="<?php echo admin_url('admin/sanpham_them');?>" class="btn btn-success col-md-12"> Thêm dữ liệu</a>
		
		
		
		<table class="table table-hover">
			<thead>
				<tr class="success">
					<th>Hãng sản phẩm</th>
					<th class="text-center">Dòng sản phẩm</th>
					<th class="text-center">Năm sản xuất/Dung lượng</th>
					<th class="text-center">Giá sản phẩm</th>
					<th class="text-center">Loại sản phẩm</th>
					<th>Tác vụ</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($sanphams AS $sanpham) {?>
				<tr>
					<td><?php echo $sanpham->tenhang;?></td>
					<td class="text-center"><?php echo $sanpham->tendong;?></td>				
					<td class="text-center"><?php echo $sanpham->namsx;?></td>
					<td class="text-center"><?php echo number_format((float)$sanpham->gia);?></td>
					<td class="text-center"><?php echo $sanpham->loaixe;?></td>
					<td>
						
					</td>				
					</tr>
				<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- Modal -->
