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

					</tr>

				</thead>

				<tbody>

				 <?php foreach ($customers AS $customer) {?>

					

					<tr>

						<td><?php echo $customer->fullname;?></td>

						<td class="text-center"><?php echo $customer->phone;?></td>

						<td class="text-center"><?php echo $customer->address;?></td>

						<td class="text-center"><?php echo $customer->CMND;?></td>

					</tr>

				<?php } ?> 

				</tbody>

			</table>

			

	

	</div>

</div>