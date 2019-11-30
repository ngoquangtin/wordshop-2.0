<?php

define('ABSPATH', 'D:/xampp/htdocs/wordshop/');
define('WS_CONTENT', 'ws-content/');
define('WS_INC', 'ws-includes/');

require_once ABSPATH . 'ws-settings.php';

$GLOBALS['in_the_loop'] = false;
$GLOBALS['post'] = array();
$GLOBALS['wsdb'] = new WSDB();

$query_vars = array(
	'post_type' => 'post',
	'orderby' => 'post_id',
	'order' => 'desc',
	'post_id' => false,
	'user_id' => false,
	'term_id' => false,
	's'		  => false,
);

if( isset( $_GET['post_id'] ) ){
	$query_vars['post_id'] = $_GET['post_id'];
} elseif( isset( $_GET['page_id'] ) ){
	$query_vars['post_type'] = 'page';
	$query_vars['post_id']	 = $_GET['page_id'];
} elseif( isset( $_GET['user_id'] ) ){

	$GLOBALS['user'] = get_userdata( $_GET['user_id'] );
	$query_vars['user_id'] = $_GET['user_id'];
} elseif( isset( $_GET['term_id'] ) ){

	$GLOBALS['term'] = get_termdata( $_GET['term_id'] );
	$query_vars['term_id'] = $_GET['term_id'];
} elseif( isset( $_GET['s'] ) ){
	$query_vars['s'] = $_GET['s'];
}

$GLOBALS['ws_query'] = new WS_Query( $query_vars );
