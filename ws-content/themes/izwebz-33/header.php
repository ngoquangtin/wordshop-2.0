<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php ws_title() ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="<?php template_directory_uri('/css/general-style.css') ?>" />
	<?php if( is_single() || is_page() ) : ?>
	<link rel="stylesheet" type="text/css" href="<?php template_directory_uri('/css/single-style.css') ?>" />
	<?php endif ?>

	<?php if( is_author() || is_term() || is_search() || is_404() ) : ?>
	<link rel="stylesheet" type="text/css" href="<?php template_directory_uri('/css/archive-style.css') ?>" />
	<?php endif ?>
</head>

<body>

	<div id="header-wrapper">
		<div id="header">
				
			<div id="top-nav">
			
				<!--
				<ul id="page-menu">
					
					<li><a href="index.html">Home</a></li>
					<li><a href="#">Author</a></li>
					<li><a href="#">Copyright</a></li>
					<li><a href="#">FAQs</a></li>
					<li><a href="#">Contact</a></li>	
				</ul>
				-->

				<?php ws_list_pages(array(
					'items_before' => '<ul id="page-menu">',
					'items_after'  => '</ul>'
				)) ?>
				
				<form method="get" id="search-form" action="<?php home_url() ?>">
					<p><input name="s" type="text" placeholder="Searching here ..." /></p>
				</form>
			
			</div><!--end div#top-nav-->
			
			<a href="<?php echo get_home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="logo" /></a>
			
			
				<!--
			<ul id="category-menu">
				<li><a href="#">Home</a></li>
				<li><a href="#">Newbie</a></li>
				<li><a href="#">Videos</a>
					<ul>
						<li><a href="#">CSS and HTML</a></li>
						<li><a href="#">jQuery</a></li>
						<li><a href="#">PHP</a></li>
						<li><a href="#">Framework</a>
							<ul>
								<li><a href="#">Laravel</a></li>
							</ul>
						</li>
						<li><a href="#">Tổng hợp</a></li>
					</ul>
				</li>
				<li><a href="#">Design</a></li>
				<li><a href="#">jQuery</a></li>
				<li><a href="#">Wordpress</a></li>
				<li><a href="#">Tips</a></li>
			</ul>
				-->
			<?php ws_list_categories(array(
				'items_before' => '<ul id="category-menu">',
				'items_after'  => '</ul>'
			)) ?>
			
			
			<div id="store-in-menu">
				<a href="#">Izwebz store<span>2</span></a>
				
				<div>
					<ul id="list-items-store">
						<li>
							<ul>
								<li><a href="#">+ Cảm nhận của bạn về DVD PSD2HTML ...</a></li>
								<li><a href="#">+ Đặt hàng mới DVD PHP và MySQL ...</a></li>
								<li><a href="#">+ Vâng ! Chúng tôi đangkinh doanh</a></li>
								<li><a href="#">+ DVD mới : PHP và MySQL + izCMS ...</a></li>
								<li><a href="#">+ Cảm nhận của bạn về DVD DVD PHP và MySQL</a></li>
							</ul>
						</li>
						
						<li>
							<h2><a href="#">PSD2HTML + WORDPRESS</a></h2>
							<p class="money bold">Giá : 90.000 đ</p>
							<p class="intro">
								Với 60 Videos và gần 2Gb dữ liệu với những kiến thức cần thiết để bạn trở thành một web Developer thật sự, thì chỉ với 90k VND bạn có thể có tất cả những kiến thức đó...
							</p>
						</li>
						
						<li>
							<h2><a href="#">PHP and MySQL + izCMS</a></h2>
							<p class="money bold">Giá : 230.000 đ</p>
							<p class="intro">
								Đây là một bộ DVD hoàn chỉnh dành cho những ai muốn trở thành một lập trình viên PHP. Bộ đĩa này bao gồm 2 DVD, với 145 video tập trung vào những kiến thức căn bản và nâng cao...
							</p>
						</li>
					</ul>
				</div>
			</div><!--end #store-in-menu-->
			
			<div id="newpost-feed">
				<div id="hot-new-post">
					<p class="uppercase bold">Host <span>new</span> post</p>
					
					<div id="new-post-item">
						<ul>
							<li>
								<img src="images/php.jpg" alt="new post php" />
								<a href="#">Co ban PHP - Bai 1</a>
							</li>
							
							<li>
								<img src="images/jquery.jpg" alt="new post jquery" />
								<a href="#">Gioi thieu ve jQuery</a>
							</li>
							
							<li>
								<img src="images/manbics.png" alt="new post manbics" />
								<a href="#">Photoshop tutorial - Manbics layout</a>
							</li>
						</ul>
					</div><!--end #new-post-item-->
				</div><!--end #hot-new-post-->
				
				<div id="feed-burner">
					<ul id="feed">
						<li id="facebook">
							<h5 id="facebook" class="uppercase bold"><a href="#">Facebook fans</a></h5>
							<p>fans</p>
						</li>
						
						<li id="rss">
							<h5 id="rss" class="uppercase bold"><a href="#">RSS Subscribers</a></h5>
							<p>1036 reader</p>
						</li>
						
						<li id="twitter">
							<h5 id="twitter" class="uppercase bold"><a href="#">Twitter followers</a></h5>
							<p>followers</p>
						</li>
					</ul>
					
					<form method="post" id="newsletter-form" action="">
						<p><input type="text" placeholder="Enter your email to receive our newsletter ..." /></p>
					</form>
				</div><!--end #feed-burner-->
			</div><!--end #newpost-feed-->

		</div><!--end #header-->
	</div><!--end #header-wrapper-->
