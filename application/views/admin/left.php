<div id="left_content">
	<div id="leftSide" style="padding-top:30px;">
		
		<!-- Account panel -->
		<div class="sideProfile">
			<a href="#" title="" class="profileFace"><img width="40" src="<?php echo public_url('admin')?>/images/user.png">
			</a>
			<span>Xin chào: <strong>admin!</strong></span>
			<span>Hoàng diệu trinh</span>
			<div class="clear"></div>
		</div>
		<div class="sidebarSep"></div>
		<!-- Left navigation -->
		
		<ul id="menu" class="nav">
			<li class="tran">
				
				<a href="<?php echo admin_url('admin/banggia')?>">
					<span>Lãi suất</span>
					<strong>2</strong>
				</a>
				
			</li>
		<?php if(($this->session->userdata())['logged_in']->role_type == '1'){?>
			<li class="account">
				
				<a href="admin/account.html" class="exp inactive">
					<span>Tài khoản</span>
					<strong>3</strong>
				</a>
				<ul class="sub" style="display: none;">
					<li>
						<a href="<?php echo admin_url('admin')?>">Ban quản trị</a>
					</li>
					<li>
						<a href="admin/admin_group.html">
						Nhóm quản trị							</a>
					</li>
					<li>
						<a href="admin/user.html">
						Thành viên							</a>
					</li>
				</ul>
				
			</li>
			<?php }?>
			
		</ul>
		
	</div>
	<div class="clear"></div>
</div>