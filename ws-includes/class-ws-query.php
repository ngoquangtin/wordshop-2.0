<?php

class WS_Query {
	public $posts = array();
	public $post = array();
	public $found_posts = 0;
	public $query_vars = array();
	public $looped_posts = 0;
	public $sql;

	public function __construct( $query_vars = array() ){

		$default = array(
			'post_type' => 'post',
			'orderby' => 'post_id',
			'order' => 'desc',
			'post_id' => false,
			'user_id' => false,
			'term_id' => false,
			's'		  => false,
		);

		$this->query_vars = ws_parse_args( $query_vars, $default );

		$this->sql();
		$this->query_posts();
	}

	function have_posts(){
		if($this->posts && $this->looped_posts < count($this->posts)){
			return true;
		}

		$GLOBALS['in_the_loop'] = false;
		$GLOBALS['post'] = array();
		$this->post = array();

		return false;
	}

	function the_post(){
		$GLOBALS['in_the_loop'] = true;
		$GLOBALS['post'] = $this->post = $this->posts[$this->looped_posts];
		++$this->looped_posts;
	}

	function sql(){
		$qv = $this->query_vars;

		$select = "SELECT post_id, user_id, title, content, thumbnail_url, posted_time FROM posts";
		$where = " WHERE 1=1 AND post_type='". $qv['post_type'] ."'";
		$order = '';

		if( $qv['post_id'] ){
			$in = '';
			$not_in = '';

			if( $qv['post_id'] > 0 ){
				$in = $qv['post_id'];
			} elseif( $qv['post_id'] < 0 ){
				$not_in = -$qv['post_id'];
			}

			if( $in ) $where .= " AND post_id IN ($in)";
			if( $not_in ) $where .= " AND post_id NOT IN ($not_in)";
		}

		/**
		 * With ID, the user can pass with a number or array
		 	$qv['ID'] = 2;
		 	$qv['ID'] = array( 1,2,3,-4 );
		 */

		if( $qv['term_id'] ){
			$in = '';
			$not_in = '';

			if( is_array( $qv['term_id'] ) ){
				foreach( $qv['term_id'] AS $id ){
					if( $id > 0 ){
						if( $in ) $in .= ",";
						$in .= $id;
					} elseif( $id < 0 ){
						if( $not_in ) $not_in .= ",";
						$not_in .= $id;
					}
				}
			} else {
				
				if( $qv['term_id'] > 0 ){
					$in .= $qv['term_id'];
				} elseif( $qv['term_id'] < 0 ){
					$not_in .= -$qv['term_id'];
				}
			}

			$select .= " INNER JOIN postmeta USING (post_id)";
			if( $in ) $where .= " AND term_id IN ($in)";
			if( $not_in ) $where .= " AND term_id NOT IN ($not_in)";
		}

		if( $qv['user_id'] ){
			$in = '';
			$not_in = '';
			if( is_array( $qv['user_id'] ) ){
				foreach( $qv['user_id'] AS $id ){
					if( $id > 0 ){
						if( $in ) $in .= ",";
						$in .= $id;
					} elseif( $id < 0 ){
						if( $not_in ) $not_in .= ",";
						$not_in .= -$id;
					}
				}
			} else {
				if( $qv['user_id'] > 0 ){
					$in .= $qv['user_id'];
				} elseif( $qv['user_id'] < 0 ){
					$not_in .= -$qv['user_id'];
				}
			}

			if( $in ) $where .= " AND user_id IN ($in)";
			if( $not_in ) $where .= " AND user_id NOT IN ($not_in)";
		}

		if( $qv['s'] ){
			$where .= " AND (content LIKE '%". $qv['s'] ."%' or title LIKE '%". $qv['s'] ."%')";
		}

		if( $qv['orderby'] == 'rand' ){
			$order .= " ORDER BY RAND()";
		} else {
			$order .= " ORDER BY ". $qv['orderby'] ." ". $qv['order'];
		}

		$this->sql = $select . $where . $order;
	}

	function query_posts(){
		global $wsdb;

		if( $result = $wsdb->get_result( $this->sql ) ){
			$this->posts = $result;
			$this->found_posts = count( $result );
			return $this->posts;
		}

		return false;
	}
}