<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<div class="col-md-11">

	<div class="main-content col-content radius bg-white">

	<?php echo form_open($this->uri->uri_string(), 'role="form" class="form-horizontal"'); ?>

			<div class="form-group">

				<label for="fullname" class="col-md-2 control-label"><?php echo form_label('Hãng sản phẩm', 'tenhang'); ?>:</label>

				<div class="col-md-7">

					<input type="text" name="tenhang" class="form-control" placeholder ="Honda..." required/>

				</div>

			</div>

			<div class="form-group">

				<label for="tendong" class="col-md-2 control-label"><?php echo form_label('Dòng sản phẩm', 'tendong'); ?>:</label>

				<div class="col-md-7">

					<input type="text" name="tendong"  class="form-control" placeholder="Wave RSX"/>

				</div>				

			</div>
			<div class="form-group">
				<label for="address" class="col-md-2 control-label"><?php echo form_label('Năm sản xuất/Dung lượng', 'namsx'); ?>:</label>

				<div class="col-md-7">

					<input type="text" name="namsx" class="form-control" placeholder="2017/32"/>

				</div>
			</div>
			<div class="form-group">
				<label for="CMND" class="col-md-2 control-label"><?php echo form_label('Giá sản phẩm', 'gia'); ?></label>

				<div class="col-md-7">

					<input type="text" name="gia" class="form-control" placeholder="17700000"/>

				</div>
			</div>
			<div class="form-group">
				<label for="CMND" class="col-md-2 control-label"><?php echo form_label('Loại xe', 'loaixe'); ?></label>

				<div class="col-md-7">

					<input type="text" name="loaixe" class="form-control" placeholder="Oto"/>

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
