<?php
include('config.php');

check_user(1);

#$title = 'Manage Users';

get_admin_header();

/*
	$limit = 3;
	if( isset($_GET['start']) && is_numeric($_GET['start']) && ($_GET['start']>=0) ){
		$start = $_GET['start'];
		$start = $start - ($start%$limit);
	} else {
		$start = 0;
	}
	
	$current_page = ( $start/$limit ) + 1;
*/	
	$sql = "SELECT 	user_id, account, display_name, email, level, 
					date_format(registration_time, '%d-%m-%Y') AS registration_time 
			FROM users
			WHERE user_id!=1
			ORDER BY user_id DESC";
			#LIMIT $start, $limit";

	if( $result = $wsdb->get_result( $sql ) ) : 
		$jfiles[] = 'delete-item-ajax.js';
?>

<div class="row">
	
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">Manage Users</header>

			<table class="table table-striped table-advance table-hover">
				<tbody>
					<tr>
						<th>Account</th>
						<th>Display Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Registration Date</th>
						<th><i class="icon_cogs"></i> Action</th>
					</tr>
					
					<?php foreach( $result as $row ) : $row = (object) $row; ?>

					<tr>
						<td><?php echo $row->account; ?></td>
						<td><?php echo $row->display_name; ?></td>
						<td><?php echo $row->email; ?></td>
						<td><?php
							switch($row->level){
								case 1: $level = 'admin'; break;
								case 2: $level = 'contributor'; break;
								case 3: $level = 'member'; break;
							}
							echo ucfirst($level);
						?></td>
						<td><?php echo $row->registration_time; ?></td>
						<td>
							<div class="btn-group">
								<a class="btn btn-primary" href="edit_user.php?user_id=<?php echo $row->user_id; ?>"><i class="icon_plus_alt2"></i></a>
								<!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
								<a data-table="users" data-type="user" data-id="<?php echo $row->user_id; ?>" class="btn btn-danger a-delete-item" href="#"><i class="icon_close_alt2"></i></a>
							</div>
						</td>
					</tr>
					
					<?php endforeach; ?>

				</tbody>
			</table>
		</section>
	</div><!--end .col-lg-12-->
</div><!--end .row-->

<!--
<img class="loading-img" src="<?php echo get_home_url().'/images/loading.gif'; ?>" style="margin: 0 auto 20px;display: none;" alt="loading ..." />
-->

<?php
#$id_field = 'user_id'; $table = 'users';
#include('incs/pagination.php');
endif;

get_admin_footer();
