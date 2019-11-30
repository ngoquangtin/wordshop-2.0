<?php get_header() ?>

	<div id="content-sidebar-wrapper">
		
		<div id="primary">
		
			<div id="content">
			
			<?php while( have_posts() ) : the_post() ?>
				<div class="post-item radius-shadow-box">
					<div class="title">
						<h1 class="post-title"><?php the_title() ?></h1>
						<ul class="post-info">
							<li>Publish by : <a href="<?php the_author_posts_url() ?>"><?php the_author() ?></a></li>
							<li>In category : <?php the_categories() ?></li>
							<li><a href="#comment-form"><?php the_comments_number() ?></a></li>
						</ul>

						<a href="<?php edit_post_url() ?>" class="edit-post-button button">Edit This Post</a>
					</div><!--end .title-->
					
					<div class="metadata">
						<a href="#" class="thumbnail"><?php the_post_thumbnail() ?></a>
					</div>
					
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


						<p><strong>Tags:</strong> <a href="#">blue</a>, <a href="#">cool</a>, <a href="#">nice</a>, <a href="#">tutorial</a></p>

						<ul id="content-pagination">
							<li class="current-content-page">1</li>
							<li><a href="#">2</a></li>
						</ul>
						-->
					</div><!--end .content-->
					
					<div class="author">
						<a href="<?php the_author_posts_url() ?>"><?php the_user_avatar() ?></a>
						<h3 class="author-name"><a href="<?php the_author_posts_url() ?>"><?php the_author() ?></a></h3>
						<p class="bio">If you want to shine tomorrow, you need to sparkle today.</p>
					</div><!--end .author_info-->
				</div><!--end .post-item-->
			<?php endwhile ?>

			</div><!--end #content-->
			
			<?php get_sidebar() ?>
		
		</div><!--end #primary-->
		
	</div><!--end #content-sidebar-wrapper-->
	
<?php get_footer() ?>