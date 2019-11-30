<?php
require_once 'config.php';

check_user(1);

/*
	$limit = 10;
	if( isset($_GET['start']) && is_numeric($_GET['start']) && ($_GET['start']>=0) ){
		$start = $_GET['start'];
		$start = $start - ($start%$limit);
	} else {
		$start = 0;
	}
	
	$current_page = ( $start/$limit ) + 1;
*/

	$sql = "SELECT p.post_id, p.title, DATE_FORMAT(p.posted_time, '%d-%m-%Y') AS posted_time, u.display_name
		  FROM posts AS p INNER JOIN users AS u USING(user_id)
		  ORDER BY post_id DESC";
		  #LIMIT $start,$limit";

	#$result = confirm_query( $dbc, $sql );

get_admin_header();

	if( $result = $wsdb->get_result( $sql ) ) : 
		$jfiles[] = 'delete-item-ajax.js';
?>

<div class="row">
	<div class="col-lg-12">

		<section class="panel">
			<header class="panel-heading">Manage Posts</header>

			<table class="table table-striped table-advance table-hover">
				<tbody>
					<tr>
						<th>Title</th>
						<th>Author</th>
						<th>Categories</th>
						<th>Tags</th>
						<th>Posted Time</th>
						<th><i class="icon_cogs"></i> Action</th>
					</tr>
					
				<?php foreach( $result as $row ) : ?>
					<tr>
						<td><?php echo $row['title']; ?></td>
						<td><?php echo $row['display_name']; ?></td>
						<td><?php the_categories( ', ', true, $row['post_id'] ); ?></td>
						<td>asd</td>
						<td><?php echo $row['posted_time']; ?></td>
						
						<td>
							<div class="btn-group">
								<a class="btn btn-primary" href="<?php edit_post_url( $row['post_id'] ) ?>"><i class="icon_plus_alt2"></i></a>
								<a data-table="posts" data-type="post" data-id="<?php echo $row['post_id']; ?>" class="btn btn-danger a-delete-item" href="#"><i class="icon_close_alt2"></i></a>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>

				</tbody>
			</table>
		</section>

	</div><!--end .col-lg-12-->
</div><!--end .row-->

<!--<img class="loading-img" src="<?php echo get_home_url().'/images/loading.gif'; ?>" style="margin: 0 auto 20px;display: none;" alt="loading ..." />-->

<?php
#$id_field = 'post_id'; $table = 'posts';
#include('inc/pagination.php');
endif;

get_admin_footer();
