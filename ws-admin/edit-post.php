<?php 
require_once 'config.php';
check_user(2);

#Get $post_id
	global $post_id;
	$post_id = get_id('post');

#Update Post When Update
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if( isset( $_POST['update-post-button'] ) ){
			$title = clean_input_data($_POST['title'], false);
			$content = str_replace("'", "\'", $_POST['content']);
			$content = trim( strip_tags($content,"<h2><a><img>") );
			$sql = "UPDATE posts SET title='$title', content='$content', updated_time=NOW()
				  WHERE post_id=$post_id
				  LIMIT 1";

			$has_message = $wsdb->update( $sql ) ? 'success' : 'error';
		} elseif( isset( $_POST['delete-post-button'] ) ){
			$sql1 = "DELETE FROM posts WHERE post_id IN ($post_id)";
			$sql2 = "DELETE FROM postmeta WHERE post_id IN ($post_id)";

			if( $wsdb->delete( $sql1 ) && $wsdb->delete( $sql2 ) ){
				header( "Location:" . get_admin_home_url('/manage-pages.php') );
			}
		}
	}

#Get Post By $post_id
	$sql = "SELECT title, slug, content, thumbnail_url
			FROM posts WHERE post_id=$post_id";
#Get $post
	if( ! $result = $wsdb->get_result( $sql ) ) header("Location: ". get_admin_home_url('/manage-posts.php'));
	$post = $result[0];

#Call Some CSS Files
	$cfiles = array('add-edit-post.css');

#Call Header
	$title = $post['title']. " - Edit Post";
	get_admin_header();
?>

<div class="row">

	<div class="col-lg-12">
		<p class="p-view-post-link"><a href="<?php the_permalink( $post_id ); ?>">View Post</a></p>
		
		<section class="panel">
			<header class="panel-heading"><?php echo $post['title']; ?></header>
			<div class="panel-body">
			
		<?php include('inc/edit-post-messages.php'); $update = 'update-post-button'; ?>

				<div class="form">
					<form id="update-post" class="form-validate form-horizontal" method="post">

						<div class="form-group ">
							<div class="col-lg-offset-1 col-sm-10">
								<input name="title" class="form-control input-lg m-bot15" type="text" data-saved="<?php echo $post['title']; ?>" value="<?php echo $post['title']; ?>" required />
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-offset-1 col-sm-10">
								<textarea data-saved="<?php echo $post['content']; ?>" name="content" class="form-control" rows="20" required><?php echo $post['content'] ?></textarea>
								<span class="help-block">Allowed h2, a, img tags.</span>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-offset-1 col-lg-10">
								<button name="<?php echo $update; ?>" class="btn btn-primary" type="submit">Update</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</section>
	</div><!--end .col-lg-12-->
</div><!--end .row-->

<div id="post-meta-widgets">
	<?php include('inc/edit-post-meta-widgets.php');?>
</div>

<?php

$jfiles = array_merge( $jfiles, array(
	'http://malsup.github.com/jquery.form.js',
	'edit-post.js',
	'set-featured-image-ajax.js'
) );

get_admin_footer();