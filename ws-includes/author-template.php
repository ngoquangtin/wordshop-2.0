<?php

//the_author_posts_url

function get_the_author_posts_url( $user_id = null ){

	if( is_null( $user_id ) ){
		global $post;
		$user_id = $post['user_id'];
	}

	return get_home_url() . "/?user_id=$user_id";
}

function the_author_posts_url( $user_id = null ){
	#echo get_author_link($user_id);
	echo get_the_author_posts_url( $user_id );
}

function get_the_author( $user_id = null ){
	global $wsdb;
	if( is_null( $user_id ) ){
		global $post;
		$user_id = $post['user_id'];
	}

	$sql = "SELECT display_name FROM users WHERE user_id=$user_id";
	if( $result = $wsdb->get_result( $sql ) ){
		$author = $result[0]['display_name'];
	}

	return $author;
}

function the_author( $user_id = null ){
	echo get_the_author( $user_id );
}

function get_the_user_avatar_url( $user_id = null ){

	$user = get_userdata( $user_id );
	return $user->avatar_url;

}

function the_user_avatar_url( $user_id = null ){
	echo get_the_user_avatar_url( $user_id );
}

function the_user_avatar( $user_id = null ){
	$user = get_userdata( $user_id );
	echo '<img src="'. $user->avatar_url .'" alt="'. $user->display_name .'" />';
}