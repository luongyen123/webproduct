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
						<th class="text-center">Chứng minh thư</th>
						<th class="text-center">Số điện thoại</th>
						<th class="text-center"> Tiền vay</th>
						<th class="text-center">Ngày cầm</th>
						<th class="text-center">Ngày hết hạn</th>
						<th class="text-center">Loại sản phẩm</th>
						<th class="text-center">Thông tin sản phẩm</th>
						<th>Lãi </th>
					</tr>

				</thead>

				<tbody>

				 <?php foreach ($phieucamdos AS $phieucamdo) {?>

					

					<tr>

						<td><?php echo $phieucamdo->fullname;?></td>

						<td class="text-center"><?php echo $phieucamdo->CMND;?></td>

						<td class="text-center"><?php echo $phieucamdo->phone;?></td>
						<td class="text-center"><?php echo $phieucamdo->sotien;?></td>

						<td class="text-center"><?php echo(date("Y-m-d",$phieucamdo->ngaycam));?></td>
						<td class="text-center"><?php echo $phieucamdo->ngayhethan;?></td>
						<td class="text-center"><?php echo $phieucamdo->loaisp;?></td>
						<td class="text-center"><?php echo $phieucamdo->thongtinsp;?></td>
						
					</tr>

				<?php } ?> 

				</tbody>

			</table>

			

	

	</div>

</div>