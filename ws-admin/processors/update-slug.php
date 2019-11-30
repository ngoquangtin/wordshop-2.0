<?php
require_once '../config.php';

$post_id = clean_input_data($_GET['post_id'],false);
$slug = clean_input_data($_GET['slug'],false);

$patern = '/^([a-z0-9\-]+)$/';
if( preg_match($patern, $slug ) ){
	$sql = "SELECT post_id FROM posts WHERE slug='$slug'";

	if( ! $result = $wsdb->get_result( $sql ) ){
		$sql = "UPDATE posts SET slug='$slug' WHERE post_id=$post_id LIMIT 1";

		$output = $wsdb->update( $sql ) ? 'The slug has been changed.' : 'Some Problem Occur. Please try it later.';
	} else {
		$output = 'This slug is already used. Please use another.';
	}
} else {
	$output = 'This slug is not valid. Please type a valid slug.';
}
echo $output;