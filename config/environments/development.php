<?php
/** Development */
define('SAVEQUERIES', true);
define('WP_DEBUG', true);
define('SCRIPT_DEBUG', true);

@ini_set('log_errors', 'On');
@ini_set('display_errors', 'Off');
@ini_set('error_log', dirname( dirname( dirname( __FILE__ ) ) ) . '/php-errors.log');