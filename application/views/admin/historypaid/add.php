
	<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>CẦM ĐỒ</h5>
			<span>Quản lý hợp đồng cầm đồ </span>
		</div>
		
		<div class="horControlB menu_action">
			
		</div>
		
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>
<div class="wrapper">
<div class="widget">
	<div class="title">
			<h6>Thêm mới hồ sơ</h6>
		</div>
		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
			<fieldset>
			<div class="formRow">
				<label class="formLeft" for="fullname">Tên khách hàng:<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo"><input name="fullname" value="<?php echo set_value('fullname')?>" id="fullname"_autocheck="true" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"> <?php echo form_error('fullname')?></div>
				</div>
				<div class="clear"></div>
			</div>

			<!-- <div class="formRow">
				<label class="formLeft" for="id">Mã hợp đồng:<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo"><input name="id" value="<?php echo set_value('id')?>" id="id"_autocheck="true" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"> <?php echo form_error('id')?></div>
				</div>
				<div class="clear"></div>
			</div> -->

			<div class="formRow">
				<label class="formLeft" for="interested_id">Số CMND:<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo"><input name="interested_id" value="<?php echo set_value('interested_id')?>" id="interested_id"_autocheck="true" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"> <?php echo form_error('interested_id')?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow">
				<label class="formLeft" for="phone">Số điện thoại:<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo"><input name="phone" value="<?php echo set_value('phone')?>" id="param_name"_autocheck="true" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"> <?php echo form_error('phone')?></div>
				</div>
				<div class="clear"></div>
			</div>

		<div class="formRow">
				<label class="formLeft" for="address">Địa chỉ:<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo"><input name="address" <?php echo set_value('address')?> id="address" _autocheck="true" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"> <?php echo form_error('address')?></div>
				</div>
				<div class="clear"></div>
		</div>

		<div class="formRow">
				<label class="formLeft" for="customer_id">Loại sản phẩm  :<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo">
					<select name="category_id" class="form-control">
					<?php foreach($ds as $row){?>
						<option value="<?php echo $row->id?>"><?php echo $row->manufacture?></option>
							<?php }?>
					</select>
				</span>
				<div name="name_error" class="clear error"> <?php echo form_error('category_id')?></div>
				</div>
				<div class="clear"></div>
		</div>

		<div class="formRow">
				<label class="formLeft" for="bks">Biển kiểm soát :<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo"><input name="bks" <?php echo set_value('bks')?> id="param_name" _autocheck="true" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"> <?php echo form_error('bks')?></div>
				</div>
				<div class="clear"></div>
		</div>
		<div class="formRow">
				<label class="formLeft" for="sk">số khung :<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo"><input name="sk" <?php echo set_value('sk')?> id="sk" _autocheck="true" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"> <?php echo form_error('sk')?></div>
				</div>
				<div class="clear"></div>
		</div>
		<div class="formRow">
				<label class="formLeft" for="sm">Số máy :<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo"><input name="sm" <?php echo set_value('sm')?> id="sm" _autocheck="true" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"> <?php echo form_error('sm')?></div>
				</div>
				<div class="clear"></div>
		</div>

		<div class="formRow">
				<label class="formLeft" for="money">Số tiền cầm :<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo"><input name="money" <?php echo set_value('money')?> id="money" _autocheck="true" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"> <?php echo form_error('money')?></div>
				</div>
				<div class="clear"></div>
		</div>

		<div class="formRow">
				<label class="formLeft" for="typepaid">Hình thức lãi :<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo">
					<select name="typepaid" class="form-control">
						<option value="1">Lãi ngày</option>
						<option value="2">Lãi tháng </option>
					</select>
				</span>
				<div name="name_error" class="clear error"> <?php echo form_error('typepaid')?></div>
				</div>
				<div class="clear"></div>
		</div>

		<div class="formRow">
				<label class="formLeft" for="type">Lãi xuất  :<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo">
					<select name="type" class="form-control">
						<option value="3">Lãi 3%</option>
						<option value="4">Lãi 4%</option>
					</select>
				</span>
				<div name="name_error" class="clear error"> <?php echo form_error('type')?></div>
				</div>
				<div class="clear"></div>
		</div>
		<div class="formRow">
				<label class="formLeft" for="paiddate">Ngày vay :<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo"><input name="paiddate" <?php echo set_value('paiddate')?> id="paiddate" _autocheck="true" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"> <?php echo form_error('paiddate')?></div>
				</div>
				<div class="clear"></div>
		</div>

		<div class="formRow">
				<label class="formLeft" for="param_name">Ghi chú :<span class="req">*</span></label>
				<div class="formRight">
				<span class="oneTwo"><input name="note" <?php echo set_value('note')?> id="param_name" _autocheck="true" type="text" /></span>
				<span name="name_autocheck" class="autocheck"></span>
				<div name="name_error" class="clear error"> <?php echo form_error('note')?></div>
				</div>
				<div class="clear"></div>
		</div>
		
		<div class="formSubmit">
	    	<input type="submit" value="Cập nhật " class="redB"/>   			
	     </div>

			</fieldset>
		</form>
	</div>
</div>

		 	
