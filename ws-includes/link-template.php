<?php

//'get-home-url',
//'get-admin-home-url',
//'get-login-url',
//'get-contact-url',
//'get-404-url',

//'get-permalink',
// the_permalink
//get_permalink_by_id

//'get-author-link',
//'get-term-link',
//'get-page-link',
//'get-edit-post-url',
//'get-img-url',


function get_page_link( $slug ){
	$alias = get_home_url(). '/page/' .$slug;
	return $alias;
}

function get_the_permalink( $post_id = null ){
	
	if( is_null( $post_id ) ){
		global $post;
		$post_id = $post['post_id'];
	}

	return get_home_url() . '/?post_id='. $post_id;

}

function the_permalink( $post_id = null ){
	echo get_the_permalink( $post_id );
}

function get_author_link( $id ){
	/*$alias = get_home_url(). '/author/' .$slug;
	return $alias;*/
	return "author.php?user_id=$id";
}

function get_term_url( $id ){
	return get_home_url(). "/?term_id=$id";
}

function get_edit_term_url( $term_id ){
	return get_admin_home_url( "/edit-term.php?term_id=$term_id" );
}

function edit_term_url( $term_id ){
	echo get_edit_term_url( $term_id );
}

function get_edit_post_url( $post_id = null ){

	if( is_null( $post_id ) ){
		global $post;
		$post_id = $post['post_id'];
	}

	return get_admin_home_url("/edit-post.php?post_id=$post_id");
}

function edit_post_url( $post_id = null ){
	echo get_edit_post_url( $post_id );
}

function get_home_url( $path = '' ){
	return BASE_URL . $path;
}

function home_url( $path = '' ){
	echo get_home_url( $path );
}

function get_admin_home_url( $path = '' ){
	return BASE_URL . '/ws-admin' . $path;
}

function admin_home_url( $path = '' ){
	echo get_admin_home_url( $path );
}

function get_404_url(){
	return get_home_url().'/page-not-found';
}

function get_contact_url(){
	return get_home_url().'/contact';
}

function get_login_url($action='login'){
	$action = ($action!='login') ? '?action='.$action : '';
	return get_home_url().'/login.php'.$action;
}
