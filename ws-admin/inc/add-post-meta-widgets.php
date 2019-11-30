
<div class="row">
	<div id="set-featured-img-widget" class="col-lg-4">
		<section class="panel">
			<header class="panel-heading">Featured Image</header>
			
			<div class="panel-body">
				<a class="a-open-box" href="#">Set Featured Image</a>
				
				<button class="remove-featured-img-button" style="display: none;">Remove Featured Image</button>
			</div>
		</section>

		<?php include('inc/add-post-set-featured-img-box.php') ?>
	</div><!--end .col-lg-4-->

	<div class="col-lg-4">
		<section class="panel">
			<header class="panel-heading">Categories</header>

			<div class="panel-body">
				<div class="form">
					<form id="publish-post-categories" class="form-validate form-horizontal" method="post">
						<div class="form-group">
							<div class="col-lg-10">

						<?php
							$sql = "SELECT term_id, name FROM terms
								  WHERE taxonomy='category' AND parent=0
								  ORDER BY term_id ASC";
							$result1 = $wsdb->get_result( $sql );
							foreach( $result1 as $hier1 ) :
						?>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="<?php echo $hier1['term_id'] ?>" /><?php echo $hier1['name'] ?>
									</label>
								</div>
							
							<?php
								$sql = " SELECT term_id, name FROM terms
										WHERE taxonomy='category' AND parent=".$hier1['term_id']."
										ORDER BY term_id ASC ";

								if( $result2 = $wsdb->get_result( $sql ) ) :
									foreach( $result2 as $hier2 ) :
							?>
										<div class="checkbox" style="margin-left: 25px;">
											<label>
												<input type="checkbox" value="<?php echo $hier2['term_id'] ?>" /><?php echo $hier2['name'] ?>
											</label>
										</div>
							<?php endforeach; endif ?>
						<?php endforeach ?>


							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>

	<div class="col-lg-4">
	</div><!--end .col-lg-4-->
</div><!--end .row-->