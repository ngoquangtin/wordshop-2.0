<?php

require_once ABSPATH . WS_INC . 'functions.php';
require_once ABSPATH . WS_INC . 'functions.ws-scripts.php';
require_once ABSPATH . WS_INC . 'class-ws-query.php';
require_once ABSPATH . WS_INC . 'class-wsdb.php';
require_once ABSPATH . WS_INC . 'class-ws-scripts.php';
require_once ABSPATH . WS_INC . 'template-tags.php';

define( 'BASE_URL', 'http://localhost/wordshop' );
define( 'LIVE', false );
define( 'FILE_NAME', basename($_SERVER['SCRIPT_NAME']) );

require_once get_template_directory(). '/functions.php';