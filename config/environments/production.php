<?php
/** Production */

/*
ini_set('display_errors', 0);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', false);
define('DISALLOW_FILE_MODS', true);
*/

define("SAVEQUERIES", true);
define("WP_DEBUG", true);
define("SCRIPT_DEBUG", true);

@ini_set("log_errors", "On");
@ini_set("display_errors", "Off");
@ini_set("error_log", dirname( dirname( dirname( __FILE__ ) ) ) . "/php-errors.log");

define("DB_NAME", "28120170_dev_wp");
define("DB_USER", "28120170_dev_wp");
define("DB_PASSWORD", "dev_wp2018!");

define("WP_ENV", "production");
define("WP_HOME", "http://piotrbienias.pl");
define("WP_SITEURL", "http://piotrbienias.pl/wp");
