<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<div class="col-md-11">

	<div class="main-content col-content radius bg-white">

	<?php echo form_open($this->uri->uri_string(), 'role="form" class="form-horizontal"'); ?>

			<div class="form-group">

				<label for="fullname" class="col-md-2 control-label"><?php echo form_label('Họ và tên', 'fullname'); ?>:</label>

				<div class="col-md-7">

					<input type="text" name="fullname" class="form-control" placeholder ="Họ và tên" required/>

				</div>

			</div>

			<div class="form-group">

				<label for="phone" class="col-md-2 control-label"><?php echo form_label('Số điện thoại', 'phone'); ?>:</label>

				<div class="col-md-7">

					<input type="text" name="phone" id="phone" class="form-control" placeholder="Số điện thoại"/>

				</div>

				

			</div>
			<div class="form-group">
				<label for="address" class="col-md-2 control-label"><?php echo form_label('Địa chỉ', 'address'); ?>:</label>

				<div class="col-md-7">

					<input type="text" name="address" class="form-control" placeholder="Trâu quỳ- Gia Lâm- Hà Nội"/>

				</div>
			</div>
			<div class="form-group">
				<label for="CMND" class="col-md-2 control-label"><?php echo form_label('Số chứng minh nhân dân', 'CMND'); ?></label>

				<div class="col-md-7">

					<input type="text" name="CMND" class="form-control" placeholder="Số chứng minh nhân dân (Căn cước)"/>

				</div>
			</div>
			<div class="form-group">

				<div class="col-md-7 col-md-offset-2">

					<?php echo form_submit('submit', 'Lưu', 'class="btn btn-danger"  style="width: 100%"'); ?>

				</div>

			</div>

	<?php echo form_close();?>

	</div>

</div>
