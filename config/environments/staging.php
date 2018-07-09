<?php
/** Staging */
define("SAVEQUERIES", true);
define("WP_DEBUG", true);
define("SCRIPT_DEBUG", true);

@ini_set("log_errors", "On");
@ini_set("display_errors", "Off");
@ini_set("error_log", dirname( dirname( dirname( __FILE__ ) ) ) . "/php-errors.log");

define("DB_NAME", "dev_wp");
define("DB_USER", "dev_wp");
define("DB_PASSWORD", "dev_wp2018!");

define("WP_ENV", "staging");
define("WP_HOME", "http://dev-wp.blackballoon.pl");
define("WP_SITEURL", "http://dev-wp.blackballoon.pl/wp");