		</section>
	</section><!--main content end-->
</section><!-- container section end -->

	<!-- javascripts -->
	<script src="<?php admin_home_url('/js/jquery.js') ?>"></script>
	<script src="<?php admin_home_url('/js/bootstrap.min.js') ?>"></script>
	<!-- nice scroll -->
	<script src="<?php admin_home_url('/js/jquery.scrollTo.min.js') ?>"></script>
	<script src="<?php admin_home_url('/js/jquery.nicescroll.js') ?>" type="text/javascript"></script>

	<!-- jquery ui -->
	<script src="<?php admin_home_url('/js/jquery-ui-1.9.2.custom.min.js') ?>"></script>

	<!--custom checkbox & radio-->
	<script type="text/javascript" src="<?php admin_home_url('/js/ga.js') ?>"></script>
	<!--custom switch-->
	<script src="<?php admin_home_url('/js/bootstrap-switch.js') ?>"></script>
	<!--custom tagsinput-->
	<script src="<?php admin_home_url('/js/jquery.tagsinput.js') ?>"></script>

	<!-- colorpicker -->

	<!-- bootstrap-wysiwyg -->
	<script src="<?php admin_home_url('/js/jquery.hotkeys.js') ?>"></script>
	<script src="<?php admin_home_url('/js/bootstrap-wysiwyg.js') ?>"></script>
	<script src="<?php admin_home_url('/js/bootstrap-wysiwyg-custom.js') ?>"></script>
	<script src="<?php admin_home_url('/js/moment.js') ?>"></script>
	<script src="<?php admin_home_url('/js/bootstrap-colorpicker.js') ?>"></script>
	<script src="<?php admin_home_url('/js/daterangepicker.js') ?>"></script>
	<script src="<?php admin_home_url('/js/bootstrap-datepicker.js') ?>"></script>
	<!-- ck editor -->
	<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
	<!-- custom form component script for this page-->
	<script src="<?php admin_home_url('/js/form-component.js') ?>"></script>
	<!-- custome script for all page -->
	<script src="<?php admin_home_url('/js/scripts.js') ?>"></script>

<?php
	if( $jfiles ){
		$jtags = '';
		foreach($jfiles as $file){
			$jtags .= '<script type="text/javascript" src="';
			$jtags .= (strpos($file, "http")===false) ? get_admin_home_url("/js/custom-scripts/$file") : $file;
			$jtags .= '"></script>';
		}
		echo str_replace("</script><script", '</script>
		<script', $jtags);
	}
?>

</body>

</html>