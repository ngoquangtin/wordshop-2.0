<?php
include('config.php');
check_user(1);

/*
	$limit = 5;
	if( isset($_GET['start']) && is_numeric($_GET['start']) && ($_GET['start']>=0) ){
		$start = $_GET['start'];
		$start = $start - ($start%$limit);
	} else {
		$start = 0;
	}
	
	$current_page = ( $start/$limit ) + 1;
*/
	$sql = "SELECT post_id, title
		  FROM posts WHERE post_type='page'
		  ORDER BY post_id DESC";
		  #LIMIT $start,$limit";

	#$r = confirm_query( $dbc, $sql );

#$title = 'Manage Pages';

get_admin_header();

	if( $result = $wsdb->get_result( $sql ) ) : 
		$jfiles[] = 'delete-item-ajax.js';		
?>

<div class="row">
	<div class="col-lg-12">

<section class="panel">
	<header class="panel-heading"><?php echo $title ?></header>

	<table class="table table-striped table-advance table-hover">
		<tbody>
			<tr>
				<th>Title</th>
				<th>Excerpt</th>
				<th>Action</th>
			</tr>
			
			<?php foreach( $result as $row ) : $row = (object) $row ?>
			<tr>
				<td><?php echo $row->title ?></td>
				<td><?php the_excerpt( array( 'post_id' => $row->post_id, 'chars_num' => 200 ) ) ?></td>
				
				<td>
					<div class="btn-group">
						<a class="btn btn-primary" href="edit_page.php?page_id=<?php echo $row->page_id ?>"><i class="icon_plus_alt2"></i></a>
						<!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
						<a class="btn btn-danger a-delete-item" data-table="pages" data-type="page" data-id="<?php echo $row->page_id ?>" href="#"><i class="icon_close_alt2"></i></a>
					</div>
				</td>
			</tr>
			<?php endforeach ?>

		</tbody>
	</table>
</section>

	</div><!--end .col-lg-12-->
</div><!--end .row-->

<!--<img class="loading-img" src="<?php echo get_home_url().'/images/loading.gif' ?>" style="margin: 0 auto 20px;display: none;" alt="loading ..." />-->

<?php

#$id_field = 'page_id'; $table = 'pages';
#include('incs/pagination.php');
endif;

get_admin_footer();
