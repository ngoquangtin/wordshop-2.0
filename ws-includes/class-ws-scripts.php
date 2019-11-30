<?php

class ws_scripts
{
	public $files = array();

	public function add( $handle, $src ){
		$this->files[$handle] = $src;
	}

	public function show(){
		$output = '';
		foreach( $this->files AS $handle=>$src ){
			$output .= '<script id="'.$handle.'" src="'.$src.'" type="text/javascript"></script>';
		}

		echo $output;
	}
}

$GLOBALS['ws_scripts'] = new ws_scripts();
