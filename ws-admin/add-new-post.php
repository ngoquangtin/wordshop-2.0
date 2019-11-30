<?php
require_once 'config.php';
check_user(2);

#Process The Post Publish Form
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		//Sanitize Data To Insert Into Database
			#$user_id = (int)$_SESSION['user']['user_id'];
			$user_id = 1;
			$ptitle = clean_input_data($_POST['title'],false);
			$slug = create_unique_slug($ptitle);
			$content = str_replace("'", "\'", $_POST['content']);
			$content = trim( strip_tags($content,"<h2><a><img>") ); $thumbnail_url = clean_input_data($_POST['thumbnail'],false);
			$thumbnail_url = empty($thumbnail_url) ? "NULL" : "'$thumbnail_url'";

		//Create Query To Insert Post
			$sql_list = create_fields_list_sql(array(
				'user_id',
				'title',
				'slug',
				'content',
				'thumbnail_url',
				'posted_time'
			));
			$sql = "
				INSERT INTO posts ($sql_list) 
				VALUES($user_id, '$ptitle', '$slug', '$content', $thumbnail_url, NOW())
			";

		//Run Query To Insert Post
			#$r_insert = confirm_query($dbc,$sql);
			#$has_message = mysqli_affected_rows($dbc)==1 ? 'success' : 'error';

			$has_message = $wsdb->get_result( $sql ) ? 'success' : 'error';

		//Insert PostMeta
			#Get The Newest Post ID (The Post We Just Inserted Before)
				#$r_id = confirm_query($dbc, "SELECT post_id FROM posts ORDER BY post_id DESC LIMIT 1");
				#list($new_id) = mysqli_fetch_array($r_id,MYSQLI_NUM);

				$sql = "SELECT post_id FROM posts ORDER BY post_id DESC LIMIT 1";
				if( $result = $wsdb->get_result( $sql ) ){
					$new_id = $result[0]['post_id'];
				}

			#Insert Into PostMeta The Category IDs
				$catIdNum = (int)clean_input_data($_POST['catIdNum'],false);
				$sql = "INSERT INTO postmeta (post_id, term_id) VALUES ";
				for ($i=1; $i <= $catIdNum; $i++) {
					if($i>1) $sql .= ",";
					$term_id = (int)clean_input_data($_POST['catId'.$i], false);
					$sql .= "($new_id, $term_id)";
				}
				#$r_meta = confirm_query($dbc, $sql);
				$wsdb->get_result( $sql );
	}

#Set Some Vars To Call In Header
	$cfiles = array('add-edit-post.css','general.css');
	$title = "Add New Post";

#Call Header
	get_admin_header();
?>

<div class="row">

	<div class="col-lg-12">
		<p class="p-view-post-link"><a class="button" href="">View Post</a></p>
		<section class="panel">
			<header class="panel-heading">Add New Post</header>
			<div class="panel-body">
			
		<?php if( isset( $has_message ) ) : ?>

			<?php if( $has_message == 'success' ) : ?>
				<div class="alert alert-success fade in">
					<button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
					<strong>Well done!</strong> You successfully publish this post.
				</div>
			<?php endif ?>

			<?php if( $has_message == 'error' ) : ?>
				<div class="alert alert-block alert-danger fade in">
					<button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
					<strong>Oh snap!</strong> Could not publish your post due to a system error.
				</div>
			<?php endif ?>

		<?php endif ?>
		
		<?php $submit = 'publish-button' ?>

				<div class="form">
					<form id="publish-post" class="form-validate form-horizontal" method="post">
						<input name="thumbnail" type="hidden" value="" />
						<div class="form-group ">
							<div class="col-lg-offset-1 col-sm-10">
								<input name="title" class="form-control input-lg m-bot15" type="text" required />
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-offset-1 col-sm-10">
								<textarea name="content" class="form-control" rows="20" required></textarea>
								<span class="help-block">Allowed h2, a, img tags.</span>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-offset-1 col-lg-10">
								<button name="<?php echo $submit ?>" class="button btn btn-primary" type="submit">Publish</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</section>
	</div><!--end .col-lg-12-->
</div><!--end .row-->

<div id="post-meta-widgets">
	<?php include('inc/add-post-meta-widgets.php');?>
</div>

<?php
$jfiles[] = 'http://malsup.github.com/jquery.form.js';
$jfiles[] = 'add-post.js';
get_admin_footer();