<?php
include('config.php');
check_user(2);
$term_id = get_id('term');

	if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
		
		$name = clean_input_data($_POST['name'], false);
		$parent = clean_input_data($_POST['parent'], false);
		
		$sql = "UPDATE terms SET name='$name', parent=$parent
			  WHERE term_id=$term_id
			  LIMIT 1";
		
		$has_message = $wsdb->update( $sql ) ? 'success' : "fail";
		
	}
	
	$sql = "SELECT name, slug, parent,taxonomy FROM terms
		  WHERE term_id=$term_id LIMIT 1";
	$result = $wsdb->get_result( $sql );
	$name = $result[0]['name'];
	$slug = $result[0]['slug'];
	$parent = $result[0]['parent'];
	$taxonomy = $result[0]['taxonomy'];

	$redirect = ($taxonomy == 'category') ? 'categories' : 'tags';
	if( ! $result ) header("Location: ". get_admin_home_url() . "/manage-$redirect.php");

	$title = "$name - Edit ". ucfirst($taxonomy);

get_admin_header();
?>

<div class="row">

	<div class="col-lg-12">
	
		<section class="panel">

			<header class="panel-heading"><?php echo $name ?></header>
			<div class="panel-body">

			<?php
				if(isset($has_message)):
					if($has_message == 'success'){
						$class = 'alert alert-success fade in';
						$message_report = "<strong>Well done!</strong> Updated $taxonomy successfully.";
					} else if($has_message == 'fail'){
						$class = 'alert alert-block alert-danger fade in';
						$message_report = '<strong>Oh snap!</strong> Could not update your changes due to a system error.';
					}
			?>
				<div class="<?php echo $class ?>">
					<button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
					<?php echo $message_report ?>
				</div>
			<?php endif ?>

				<div class="form">
					<form class="form-validate form-horizontal" method="post">
						<div class="form-group ">
							<label for="name" class="control-label col-lg-2">Name <span class="required">*</span></label>
							<div class="col-lg-10">
								<input value="<?php echo $name ?>" name="name" id="name" class="form-control input-lg m-bot15" type="text" required />
							</div>
						</div>

						<div class="form-group ">
							<label for="parent" class="control-label col-lg-2">Parent</label>
							<div class="col-lg-4">
							<?php $selected = 'selected="selected"' ?>
								<select name="parent" class="form-control m-bot15">
									<option value="0" <?php if($parent==0) echo $selected ?>>------------------------ No Parents ------------------------</option>

							<?php
								$sql = "SELECT term_id, name from terms where taxonomy='category' and parent=0";

								if( $result = $wsdb->get_result( $sql ) ) :
									foreach( $result as $row ) :
							?>
									<option value="<?php echo $row['term_id'] ?>" <?php if( $parent==$row['term_id'] ) echo $selected ?>><?php echo $row['name'] ?></option>
							<?php endforeach; endif ?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-primary" type="submit">Update</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</section>
	</div><!--end .col-lg-12-->
</div><!--end .row-->

<?php 
//if( !isset($custom_jquery_scripts) ) $custom_jquery_scripts = ''; 
//$custom_jquery_scripts .= '<script src="js/custom-scripts/upload-post-thumbnail-image.js"></script>'; 
get_admin_footer();