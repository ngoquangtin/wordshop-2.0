<?php get_header() ?>

	<div id="content-sidebar-wrapper">
		
		<div id="primary">
		
			<div id="content">
			
				<div id="big-page-title" class="radius-shadow-box">
					<h4><?php echo ucfirst( $term->taxonomy ) ?>: <?php echo $term->name ?> (<?php $fp = $ws_query->found_posts; echo $fp . " "; echo $fp != 1 ? "Posts" : "Post" ?>)</h4>
				</div><!--end #big-page-title-->
			
			<?php if( have_posts() ) : $i = 0; while( have_posts() ) : the_post() ?>
				<div class="post-item <?php echo $i % 2 == 0 ? 'float-left' : 'float-right' ?> radius-shadow-box">
					<a href="<?php the_permalink() ?>" class="thumbnail"><?php the_post_thumbnail() ?></a>
					<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
					<a href="<?php edit_post_url() ?>" class="edit-post-button button">Edit This Post</a>
					<p><?php the_excerpt( array( 'chars_num' => 300 ) ) ?></p>
					
					<a href="<?php the_permalink() ?>" class="view-more">View More</a>
				</div><!--end .post-item-->
			<?php ++$i; endwhile; unset($i); endif ?>	

			</div><!--end #content-->
			
			<?php get_sidebar() ?>
		
		</div><!--end #primary-->
		
	</div><!--end #content-sidebar-wrapper-->
	
<?php get_footer() ?>