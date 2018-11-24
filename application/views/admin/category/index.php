

<?php $this->load->view('admin/category/head',$this->data)?>


<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">

		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>
			Danh sách sản phẩm			</h6>
			<div class="num f12">Số lượng: <b>0</b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="12">
				<form class="list_filter form" action="index.php/admin/product.html" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>

						<tr>
						
							<select name="category_id" class="form-control">
							<option value=""></option>
							<!-- kiem tra danh muc co danh muc con hay khong -->
							<?php foreach($parents as $parent){ ?>
							<optgroup label="<?php echo $parent->name ?>">
							<?php foreach($lists as $list) {if($list->parent_id == $parent->id){
							echo '<option value="'. $list->id.'">'.$list->name.'</option>'?>
							<?php  }}?>
							</optgroup> <?php } ?>
						
					</select>
							<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
							<td class="item"><input name="id" value="" id="filter_id" type="text" style="width:55px;" /></td>
							
							<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
							<td class="item" style="width:155px;" ><input name="name" value="" id="filter_iname" type="text" style="width:155px;" /></td>
							<td class="label" style="width:40px;"><label for="filter_id">lựa chọn sản phẩm</label></td>
						
							<td style='width:150px'>
								<input type="submit" class="button blueB" value="Lọc" />
								<input type="reset" class="basic" value="Reset" onclick="window.location.href = 'index.php/admin/product.html'; ">
							</td>
							
						</tr>
					</tbody></table>
				</form>
			</td></tr></thead>
			
			<thead>
				<tr>
					
					<td style="width:60px;">Mã số</td>
					<td>Tên Sản Phẩm</td>
					<td>Ghi chú </td>
					<td>Danh mục  </td>
					<td>Người khởi tạo </td>
					<td>Ngày khởi tạo </td>
					<td>Ngày cập nhật  </td>
					<td>Hành động </td>
				</thead>

				<tfoot class="auto_check_pages">
					<tr>
						<td colspan="6">
							<div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="admin/product/del_all.html">
									<span style='color:white;'>Xóa hết</span>
								</a>
							</div>
							
							<div class='pagination'>
							</div>
						</td>
					</tr>
				</tfoot>

				<tbody>
				<?php foreach ($list as $row):?>
				<tr>
						
					 <td><?php echo $row->id ?></td>
					<td><?php echo $row->name ?></td>
					<td><?php echo $row->note ?></td>
					<td><?php echo $row->parent_id ?></td>
					<td><?php echo $row->name ?></td>
					<td><?php echo $row->createdat?></td>
					<td><?php echo $row->updatedat?></td>
					<td class="option">
					 	<a href ="<?php echo admin_url('category/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS "><img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" /></a>
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

	