<?php get_header() ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post() ?>
	<div class="post_item radius_shadow">
		<div class="title">
			<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
			<ul class="metadata">
				<li class="publish">Publish by : <a href="<?php the_author_posts_url() ?>"><?php the_author() ?></a></li>
				<li class="cat">Category: <?php the_categories() ?></li>
				<li class="comments"><a href="<?php the_permalink() ?>#comment-form"><?php the_comments_number() ?></a></li>
				<li class="post_time"><?php the_time() ?></li>
			</ul>
		</div><!--end .title-->
		
		<div class="content">
			<a href="<?php the_permalink() ?>" class="thumbnail"><?php the_post_thumbnail() ?></a>
			
			<p class="main_content">
				<!--Only Text In Index-->
				<?php the_excerpt() ?>
			</p>
			
			<p class="edit-post">
				<a href="<?php edit_post_url() ?>">Edit This Post</a>
			</p>
		</div><!--end .content-->
	</div><!--end .post_item-->
<?php endwhile; endif ?>

<?php get_footer();