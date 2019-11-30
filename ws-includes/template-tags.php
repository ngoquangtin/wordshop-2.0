<?php

require_once ABSPATH . WS_INC . 'general-template.php';
require_once ABSPATH . WS_INC . 'link-template.php';
require_once ABSPATH . WS_INC . 'post-template.php';
require_once ABSPATH . WS_INC . 'comment-template.php';
require_once ABSPATH . WS_INC . 'category-template.php';
require_once ABSPATH . WS_INC . 'author-template.php';
require_once ABSPATH . WS_INC . 'admin-template-tags.php';

function have_posts(){
	global $ws_query;
	return $ws_query->have_posts();
}

function the_post(){
	global $ws_query;
	$ws_query->the_post();
}

function ws_list_pages( $args = array() ){
	global $wsdb;

	$default = array(
		'items_before' => '<ul>',
		'items_after' => '</ul>',
		'item_before' => '<li>',
		'item_after' => '</li>',
	);

	$args = ws_parse_args( $args, $default );

	$output = '';
	$output .= $args['items_before'];
	
	$sql = "SELECT post_id, title FROM posts WHERE post_type='page' ORDER BY position ASC";

	if( $result = $wsdb->get_result( $sql ) ){
		foreach( $result as $row ){
			$output .= $args['item_before'] . '<a href="'. get_home_url() .'/?page_id='. $row['post_id'] .'">'. $row['title'] .'</a>' . $args['item_after'];
		}
	}

	$output .= $args['items_after'];

	echo $output;
}

function ws_title(){
	global $ws_query, $user, $term;
	$title = '';
	if( is_single() || is_page() ){
		$title .= $ws_query->posts[0]['title'];
	} elseif( is_author() ){
		$title .= $user->display_name . " - Author" ;
	} elseif( is_term() ){
		$title .= $term->name . " - Term" ;
	} elseif( is_search() ){
		$title .= $_GET['s'] . " - Search Result";
	}

	if( $title ) $title .= " | ";

	$title .= 'Home Page';

	echo $title;
}

function get_query_template( $template ){
	return get_template_directory() . "/$template.php";
}

function is_home(){
	if( ! ( is_single() || is_page() || is_author() || is_term() || is_search() ) ){
		return true;
	}

	return false;
}

function get_index_template(){
	return get_query_template('index');
}

function is_404(){
	global $ws_query;
	return $ws_query->found_posts == 0 && ! is_search() ? true : false;
}

function get_404_template(){
	return get_query_template('404');
}

function is_single(){
	return isset( $_GET['post_id'] ) ? true : false;
}

function get_single_template(){
	return get_query_template( 'single' );
}

function is_page(){
	return isset( $_GET['page_id'] ) ? true : false;
}

function get_page_template(){
	return get_query_template( 'page' );
}

function is_author(){
	return isset( $_GET['user_id'] ) ? true : false;
}

function get_author_template(){
	return get_query_template( 'author' );
}

function is_term(){
	return isset( $_GET['term_id'] ) ? true : false;
}

function get_term_template(){
	return get_query_template( 'term' );
}

function is_search(){
	return isset( $_GET['s'] ) ? true : false;
}

function get_search_template(){
	return get_query_template( 'search' );
}
