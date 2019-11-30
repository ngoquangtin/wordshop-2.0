<?php
require_once '../config.php';

$table = clean_input_data($_GET['table'], false);
$field = clean_input_data($_GET['type'], false).'_id';
$value = clean_input_data($_GET['id'], false);

$sql = "DELETE from $table where $field=$value limit 1";

echo ( $wsdb->delete( $sql ) ) ? 'success' : 'error';