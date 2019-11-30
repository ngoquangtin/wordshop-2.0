<!-- user login dropdown start-->
<?php
//$custom_jquery_scripts .= '<script src="js/custom-scripts/header-user-login-dropdownss.js"></script>'; 
?>
<li class="dropdown li-user-login-dropdown">
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
		<span class="profile-ava">								
			<img class="img-avatar" width="30" height="30" alt="" src="<?php echo get_default_user_avatar_url() ?>" />
		</span>
		<span class="username">Admin</span>
		<b class="caret"></b>
	</a>
	
	<ul class="dropdown-menu extended logout">
		<div class="log-arrow-up"></div>
		
		<li class="eborder-top">
			<a href="<?php echo get_home_url(); ?>/my-profile"><i class="icon_profile"></i> My Profile</a>
		</li>
		
		<li>
			<a href="<?php echo get_home_url(); ?>/logout"><i class="icon_key_alt"></i> Log Out</a>
		</li>
	</ul>
</li>