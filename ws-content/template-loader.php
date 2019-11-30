<?php

if( is_404() ){
	$template = get_404_template();
} elseif( is_single() ){
	$template = get_single_template();
} elseif( is_page() ){
	$template = get_page_template();
} elseif( is_author() ){
	$template = get_author_template();
} elseif( is_term() ){
	$template = get_term_template();
} elseif( is_search() ){
	$template = get_search_template();
} else {
	$template = get_index_template();
}

require_once $template;
