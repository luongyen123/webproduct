
<?php $this->load->view('admin/history_interestrate/head',$this->data)?>



<div class="line"></div>
<div class="wrapper">
	<?php $this->load->view('admin/message')?>
<div class="widget">
	<div class="title">
		<span class="titleIcon">
			<div class="checker" id="uniform-titleCheck">
					<span>
						<input type="checkbox" id="titleCheck" name="titleCheck" style="opacity: 0;">
					</span>
			</div>
		</span>
		<h6>
				Danh sách lãi suất 		</h6>
		 	<div class="num f12">Số lượng: <b>0</b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="6">
				<form class="list_filter form" action="index.php/admin/product.html" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
					
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
							<td class="item"><input name="id" value="" id="filter_id" type="text" style="width:55px;" /></td>
							
							<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
							<td class="item" style="width:155px;" ><input name="name" value="" id="filter_iname" type="text" style="width:155px;" /></td>
							<td >
							<input  style="margin-left: 100px" type="submit" class="button blueB" value="Search" />
							<input type="reset" class="basic" value="Reset" onclick="window.location.href = 'index.php/admin/product.html'; ">
							</td>
							
						</tr>
					</tbody></table>
<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin')?>/images/icons/tableArrows.png" /></td>
					<td>Mã số</td>
					<td>Ngày bắt đầu </td>
					<td>Tỷ lệ lãi suất </td>
					<td>ghi chú </td>
					<td>Tên lãi suất </td>
					<td>Ngày  khởi tạo  </td>
					<td>Người  khởi tạo  </td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
 			<tfoot>
			
			</tfoot>
			<tbody>
				<?php foreach ($list as $row):?>
				<tr>
					<td><input type="checkbox" name="id"</td> 	
					 <td><?php echo $row->id ?></td>
					<td><?php echo $row->startdate ?></td>
					<td><?php echo $row->percent?></td>
					<td><?php echo $row->note ?></td>
					<td><?php echo $row->name?></td>
					<td><?php echo $row->createdat ?></td>
					<td><?php echo $row->admin_id ?></td>
					<td class="option">
					 	<a href ="<?php echo admin_url('history_interestrate/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS "><img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" /></a>
						<a href="<?php echo admin_url('category/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" ><img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>	
				<?php endforeach?>
			</tbody>
	</table>
</div>
</div>

<div class="clear mt30"></div>