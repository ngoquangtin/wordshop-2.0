<?php

function get_default_post_thumbnail_url(){
	return get_template_directory_uri() . '/images/wordpress-big-icon.png';
}

function get_default_user_avatar_url(){
	return get_template_directory_uri() . '/images/no-avatar.jfif';
}

function get_theme_dir(){
	return 'izwebz-33';
}

function get_template_directory(){
	return ABSPATH . WS_CONTENT . 'themes/' . get_theme_dir();
}

function get_template_directory_uri( $path = '' ){
	return BASE_URL . '/' . WS_CONTENT . 'themes/' . get_theme_dir() . $path;
}

function template_directory_uri( $path = '' ){
	echo get_template_directory_uri( $path );
}

function get_header(){
	global $ws_query, $user, $term;
	require get_template_directory() . '/header.php';
}

function get_footer(){
	require get_template_directory() . '/footer.php';
}

function get_sidebar(){
	require get_template_directory() . '/sidebar.php';
}