<?php

function get_admin_header(){
	global $wsdb, $title, $jfiles, $post, $post_id;
	require_once 'inc/header.php';
}

function get_admin_footer(){
	global $jfiles, $post, $post_id;
	require_once 'inc/footer.php';
}