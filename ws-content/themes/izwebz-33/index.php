<?php get_header() ?>

	<div id="content-sidebar-wrapper">
		
		<div id="primary">
		
			<div id="content">
			
			<?php while( have_posts() ) : the_post() ?>
				<div class="post-item radius-shadow-box">
					<div class="title">
						<h1 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
						<ul class="post-info">
							<li>Publish by : <a href="<?php the_author_posts_url() ?>"><?php the_author() ?></a></li>
							<li>In category : <?php the_categories() ?></li>
							<li><a href="<?php echo get_the_permalink() . '#comment-form' ?>"><?php the_comments_number() ?></a></li>
						</ul>
						<a href="<?php edit_post_url() ?>" class="edit-post-button button">Edit This Post</a>
					</div><!--end .title-->
					
					<div class="content">
						<a href="<?php the_permalink() ?>" class="thumbnail"><?php the_post_thumbnail() ?></a>
						
						<p class="post-excerpt">
							<?php the_excerpt() ?>
						</p>
					</div><!--end .content-->
				</div><!--end .post-item-->
			<?php endwhile ?>

			</div><!--end #content-->
			
			<?php get_sidebar() ?>
		
		</div><!--end #primary-->
		
	</div><!--end #content-sidebar-wrapper-->

<?php get_footer();