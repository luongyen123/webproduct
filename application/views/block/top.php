<div class="col-right">

<div class="col-md-5">

	<div class="top-bar col-content radius bg-white text-center">

		<strong>Phần mềm quản lý hiệu cầm đồ</strong>

	</div>

</div>

<div class="col-md-5">

	<div class="top-bar col-content radius bg-white text-center">

		<div class="avatar img-radius"><img src="" /> <span class="glyphicon glyphicon-user glyphicon"></span> <?php echo ($this->session->userdata())['logged_in']->name;?><strong><?php echo $this->session->set_userdata('username');?></strong></div>
	<!--  -->

	</div>

</div>



<div class="col-md-1">

	<div class="top-bar col-content radius">
		<a href="<?php echo admin_url('admin/logout')?>" class="btn btn-danger">Thoát</a>
		

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



