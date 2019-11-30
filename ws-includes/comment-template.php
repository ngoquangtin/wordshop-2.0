<?php

//'get-comments-num',

// the_comments_number

function get_the_comments_number( $singular_text = 'Comment', $plural_text = 'Comments', $post_id = null ){
	global $wsdb;

	if( is_null( $post_id ) ){
		global $post;
		$post_id = $post['post_id'];
	}

	$sql="SELECT count(comment_id) AS count from comments where post_id=$post_id";
	
	if( $result = $wsdb->get_result( $sql ) ){
		$comments_num = $result[0]['count'];
	} else {
		$comments_num = 0;
	}
	$return = "$comments_num ";
	$return .= ( $comments_num == 1 ) ? $singular_text : $plural_text;

	return $return;
}

function the_comments_number( $singular_text = '', $plural_text = '', $post_id = null ){
	echo get_the_comments_number( 'Comment', 'Comments', $post_id );
}

