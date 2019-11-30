<?php

//ws_list_categories

function ws_list_categories( $args = array() ){
	global $wsdb;

	$default = array(
		'items_before' => '<ul>',
		'items_after' => '</ul>',
		'item_before' => '<li>',
		'item_after' => '</li>',
	);

	$args = ws_parse_args( $args, $default );

	$sql = "SELECT term_id, name, slug FROM terms
		  WHERE taxonomy='category' AND parent=0
		  ORDER BY position ASC";

	$result = $wsdb->get_result( $sql );
	$output = '';
	if( $result ){

		$output .= $args['items_before'];

		foreach( $result as $row ){
			$id = $row['term_id'];
			$name = $row['name'];
			$slug = $row['slug'];

			$output .= $args['item_before'] . '<a href="'. get_term_url( $id ) .'">'.$name.'</a>';

			$sql = "SELECT term_id, name, slug FROM terms
				  WHERE taxonomy='category' AND parent=$id";
			#$r1 = confirm_query($dbc, $sql);
			$result1 = $wsdb->get_result( $sql );


			if( $result1 ){
				$output .= '<ul>';

				foreach( $result1 as $row1 ){
					$id1 = $row1['term_id'];
					$name1 = $row1['name'];
					$slug1 = $row1['slug'];

					$output .= $args['item_before'] . '<a href="'. get_term_url( $id1 ) .'">'.$name1.'</a>' . $args['item_after'];
				}

				$output .= '</ul>';
			}
			$output .= $args['item_after'];
		}

		$output .= $args['items_after'];
	}
	echo $output;
}