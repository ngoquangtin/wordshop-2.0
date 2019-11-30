<?php

class WSDB
{
	public $dbc;

	public function __construct(){
		$dbc = mysqli_init();

		mysqli_real_connect ( $dbc, 'localhost', 'root', '', 'wordshop') or die('Die');
		$this->dbc = $dbc;
	}

	public function query( $sql ){
		$query = mysqli_query( $this->dbc, $sql ) or die('Die '. $sql . '<strong>' . mysqli_error($this->dbc) . '</strong>');

		return $query;
	}

	public function get_result( $sql ){

		$query = $this->query( $sql );

		if( mysqli_num_rows( $query ) > 0 ){
			$return = array();

			while( $row = mysqli_fetch_assoc( $query ) ){
				$return[] = $row;
			}

			return $return;
		}

		return false;

	}

	public function delete( $sql ){
		$query = $this->query( $sql );

		if( mysqli_affected_rows( $this->dbc ) > 0 ){
			return true;
		}

		return false;
	}

	public function update( $sql ){
		$query = $this->query( $sql );

		if( mysqli_affected_rows( $this->dbc ) > 0 ){
			return true;
		}

		return false;
	}

	public function insert( $sql ){
		$query = $this->query( $sql );

		if( mysqli_affected_rows( $this->dbc ) > 0 ){
			return true;
		}

		return false;
	}
}