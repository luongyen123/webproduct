<div class="col-right">

<div class="col-md-5">

	<div class="top-bar col-content radius bg-white text-center">

		<strong>Phần mềm quản lý hiệu cầm đồ</strong>

	</div>

</div>

<div class="col-md-5">

	<div class="top-bar col-content radius bg-white text-center">

		<div class="avatar img-radius"><img src="" /> <span class="glyphicon glyphicon-user glyphicon"></span> Quản trị viên: <strong><?php echo $this->session->userdata('username');?></strong></div>

	</div>

</div>



<div class="col-md-1">

	<div class="top-bar col-content radius">

		<?php echo anchor('/auth/logout','Thoát', 'class="btn btn-danger"');?>

	</div>

</div>



<div class="col-md-11" style="margin-top: 10px;">

<?php if($this->session->flashdata('success')) { ?>

	<div class="top-bar col-content radius bg-success">

	<?php echo $this->session->flashdata('success');?>

	</div>

<?php } ?>



<?php if($this->session->flashdata('warning')) { ?>

	<div class="top-bar col-content radius bg-warning">

	<?php echo $this->session->flashdata('warning');?>

	</div>

<?php } ?>



<?php if($this->session->flashdata('danger')) { ?>

	<div class="top-bar col-content radius bg-danger">

	<?php echo $this->session->flashdata('danger');?>

	</div>

<?php } ?>

</div>



