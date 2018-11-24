<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<div class="col-md-11">

	<div class="main-content col-content radius bg-white">

	<?php echo form_open($this->uri->uri_string(), 'role="form" class="form-horizontal"'); ?>

			<div class="form-group">

				<label for="bg_ten" class="col-md-2 control-label"><?php echo form_label('Tên bảng giá', 'bg_ten'); ?>:</label>

				<div class="col-md-7">

					<input type="text" name="bg_ten" class="form-control" required/>

				</div>

			</div>

			<div class="form-group">

				<label for="bg_muc1" class="col-md-2 control-label"><?php echo form_label('Mức 1', 'bg_muc1'); ?>:</label>

				<div class="col-md-3">

					<input type="text" name="bg_muc1" class="form-control" placeholder="2 ~ 5 kWh (Nhập: 0)"/>

				</div>

				<label for="bg_gia1" class="col-md-2 control-label"><?php echo form_label('Giá mức 1', 'bg_gia1'); ?>:</label>

				<div class="col-md-2">

					<input type="text" name="bg_gia1" class="form-control" placeholder="VNĐ"/>

				</div>

			</div>

			

			<div class="form-group">

				<label for="bg_muc2" class="col-md-2 control-label"><?php echo form_label('Mức 2', 'bg_muc2'); ?>:</label>

				<div class="col-md-3">

					<input type="text" name="bg_muc2" class="form-control" placeholder="5 ~ 10 triệu (Nhập: 50)"/>

				</div>

				<label for="bg_gia2" class="col-md-2 control-label"><?php echo form_label('Giá mức 2', 'bg_gia2'); ?>:</label>

				<div class="col-md-2">

					<input type="text" name="bg_gia2" class="form-control" placeholder="VNĐ"/>

				</div>

			</div>

		


			<div class="form-group">

				<label for="bg_muc3" class="col-md-2 control-label"><?php echo form_label('Mức 3', 'bg_muc6'); ?>:</label>

				<div class="col-md-3">

					<input type="text" name="bg_muc3" class="form-control" placeholder=">10 tr (Nhập: 10)"/>

				</div>

				<label for="bg_gia6" class="col-md-2 control-label"><?php echo form_label('Giá mức 6', 'bg_gia6'); ?>:</label>

				<div class="col-md-2">

					<input type="text" name="bg_gia3" class="form-control" placeholder="VNĐ"/>

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