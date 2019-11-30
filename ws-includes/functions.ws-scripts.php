<?php

function ws_enqueue_script( $handle, $src ){
	global $ws_scripts;

	$ws_scripts->add( $handle, $src );
}

function ws_footer(){
	global $ws_scripts;

	$ws_scripts->show();
}