<div class="titleArea">
	<div class="wrapper">
		
		
		<div class="horControlB menu_action">
			<?php if(($this->session->userdata())['logged_in']->role_type == '1'){?>
			<ul>
				<li><a href="<?php echo admin_url('admin/add_user')?>">
					<img src="<?php echo public_url('admin')?>/images/icons/control/16/add.png">
					<span>Thêm mới </span>
				</a></li>
				
				<li><a href="<?php echo admin_url('admin/index')?>/">
					<img src="<?php echo public_url('admin')?>/images/icons/control/16/list.png">
					<span>Danh sách</span>
				</a></li>
			</ul>
		<?php }?>
		</div>
		
		<div class="clear"></div>
	</div>
</div>