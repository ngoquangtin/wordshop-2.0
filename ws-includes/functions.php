<?php session_start();

$files = array(

	//'confirm-query',
	//'trigger-form-missing-error',
	'clean-input-data',
	'save-input',
	'save-textarea',
	'is-logged-in',
	'check-user',
	'the-pagination',
	'create-fields-list-sql',
	'create-unique-file-name',
	'create-unique-slug',
	
	'get-options',
	'get-id',
);

foreach($files as $f){
	require_once "function-scripts/function-$f.php";
}

function ws_parse_args( $new_args, $default_args ){

	foreach( $default_args as $arg => $value ){
		if( ! isset( $new_args[$arg] ) ){
			$new_args[$arg] = $value;
		}
	}

	return $new_args;
}

function get_userdata( $user_id = null ){

	global $wsdb;

	if( is_null( $user_id ) ){
		global $post;
		$user_id = $post['user_id'];
	}

	$sql = "SELECT display_name, bio, avatar_url FROM users WHERE user_id=$user_id";

	if( $result = $wsdb->get_result( $sql ) ){
		$user = (object) $result[0];

		if( is_null( $user->avatar_url ) ){
			$user->avatar_url = get_default_user_avatar_url();
		}
	}

	if( isset( $user ) ){
		return $user;
	}

	return false;
}

function get_termdata( $term_id ){
	global $wsdb;

	$sql = "SELECT name, taxonomy FROM terms WHERE term_id=$term_id";

	if( $result = $wsdb->get_result( $sql ) ){
		$term = (object) $result[0];
	}

	if( isset( $term ) ){
		return $term;
	}

	return false;
}
