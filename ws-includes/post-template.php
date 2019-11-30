<?php

//'get-excerpt',

//'get-single-post-content',
//'get-post-categories-list'
//'title'


// the_excerpt

function get_single_post_content($content){
	$c = "<p>$content";
	$c = str_replace( array("\r\n","\n",'<img','/>'), array('<p>','</p>','<div class="post_media"><img','/></div>'), $c );
	return $c;
}

function get_the_categories( $separate=', ', $edit_url = false, $post_id = null ){
	global $wsdb;

	if( is_null( $post_id ) ){
		global $post;
		$post_id = $post['post_id'];
	}

	$sql = "SELECT pm.term_id, t.name
		  FROM postmeta AS pm INNER JOIN terms AS t USING(term_id)
		  WHERE pm.post_id=$post_id AND t.taxonomy='category'
		  ORDER BY term_id ASC";

	$output = '';
	if( $result = $wsdb->get_result( $sql ) ){
		$i = 1;
		foreach( $result as $term ){
			$term_id = $term['term_id'];
			$name = $term['name'];

			if($i>1) $output .= $separate;

			$term_url = ( $edit_url ) ? get_edit_term_url( $term_id ) : get_term_url( $term_id );
			$output .= '<a href="'. $term_url .'">'.$name.'</a>';

			$i++;
		}
	}

	return $output;
}


function the_categories( $separate=', ', $edit_url = false, $post_id = null ){
	echo get_the_categories( $separate, $edit_url, $post_id );
}

function get_the_title( $post_id = null ){

	if( is_null( $post_id ) ){
		global $post;
		$title = $post['title'];
	} else {
		global $wsdb;
		$sql = "SELECT title FROM posts WHERE post_id=$post_id";
		if( $result = $wsdb->get_result( $sql ) ){
			$title = $result[0]['title'];
		}
	}

	return $title;
}

function the_title( $post_id = null ){
	echo get_the_title( $post_id );
}

function get_the_excerpt( $args = array() ){

	$default = array(
		'chars_num' => 600,
		'post_id' => null,
		'readmore' => ' [...]'
	);

	$args = ws_parse_args( $args, $default );

	if( is_null( $args['post_id'] ) ){
		//In the loop
		global $post;
		$content = $post['content'];
	} else {
		//Not in the loop
		global $wsdb;

		$sql = "SELECT content FROM posts WHERE post_id=". $args['post_id'];
		if( $result = $wsdb->get_result( $sql ) ){
			$content = $result[0]['content'];
		}
	}

	$content = strip_tags($content);
	$content = substr( $content, 0, $args['chars_num'] );
	$content = substr( $content, 0, strrpos($content, ' ',0) );
	
	return $content . $args['readmore'];
}

function the_excerpt( $args = array() ){
	echo get_the_excerpt( $args );
}

function get_the_content( $post_id = null ){

	if( is_null( $post_id ) ){
		global $post;
		$content = $post['content'];
	} else {
		$sql = "SELECT content FROM posts WHERE post_id=$post_id";

		if( $result = $wsdb->get_result( $sql ) ){
			$content = $result[0]['content'];
		}
	}

	return $content;
}

function the_content( $post_id = null ){
	echo get_the_content( $post_id );
}

function the_time(){
	global $post;
	echo $post['day'];
}

function get_the_post_thumbnail_url( $post_id = null ){

	if( is_null( $post_id ) ){
		global $post;
		$url = $post['thumbnail_url'];
	} else {
		global $wsdb;
		$sql = "SELECT thumbnail_url FROM posts WHERE post_id=$post_id";
		if( $result = $wsdb->get_result( $sql ) ){
			$url = $result[0]['thumbnail_url'];
		}
	}

	if( ! is_null( $url ) ){
		return $url;
	}

	return get_default_post_thumbnail_url();

}

function the_post_thumbnail_url( $post_id = null ){
	echo get_the_post_thumbnail_url( $post_id );
}

function the_post_thumbnail( $post_id = null ){
	echo '<img src="'. get_the_post_thumbnail_url( $post_id ) .'" alt="'. get_the_title( $post_id ) .'" />';
}