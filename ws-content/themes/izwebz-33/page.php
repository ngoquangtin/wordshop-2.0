<?php get_header() ?>

	<div id="content-sidebar-wrapper">
		
		<div id="primary">
		
			<div id="content">
			
			<?php while( have_posts() ) : the_post() ?>
				<div class="post-item radius-shadow-box">
					<div class="title">
						<h1 class="post-title"><?php the_title() ?></h1>
						<a href="<?php edit_post_url() ?>" class="edit-post-button button">Edit This Page</a>
					</div><!--end .title-->
					
					<div class="content">
						<p><?php the_content() ?></p>
					<!--
						<h2>Bước 1 : RESET CSS</h2>
						<p>
							Xin chào tất cả các bạn, rất vui được gặp lại các bạn trên izwebz, mình là Tommy. Lời đầu tiên tôi xin chân thành cảm ơn tất cả những comments góp ý cũng như ủng hộ của các bạn trong <a href="#">tutorial trước</a> của tôi. Sau này tôi sẽ cố gắng làm thật nhiều tutorials hơn nữa để đáp lại sự ủng hộ nhiệt tình của các bạn.
						</p>
						
						<div class="post-img">
							<img src="images/cautruc.jpg" alt="post img" />
						</div>

						<ul id="content-pagination">
							<li class="current-content-page">1</li>
							<li><a href="#">2</a></li>
						</ul>
					-->
					</div><!--end .content-->

				</div><!--end .post-item-->
			<?php endwhile ?>

			</div><!--end #content-->
			
			<?php get_sidebar() ?>
		
		</div><!--end #primary-->
		
	</div><!--end #content-sidebar-wrapper-->
	
<?php get_footer() ?>