<?php
/** Development */
define("SAVEQUERIES", true);
define("WP_DEBUG", true);
define("SCRIPT_DEBUG", true);

@ini_set("log_errors", "On");
@ini_set("display_errors", "Off");
@ini_set("error_log", dirname( dirname( dirname( __FILE__ ) ) ) . "/php-errors.log");

define("DB_NAME", "dev_wp");
define("DB_USER", "dev_wp");
define("DB_PASSWORD", "dev_wp2018!");

define("DB_HOST", "127.0.0.1");
define("DB_PREFIX", "wp_");

define("WP_ENV", "development");
define("WP_HOME", "http://dev-wp.localhost.pl");
define("WP_SITEURL", "http://dev-wp.localhost.pl/wp");

define('AUTH_KEY', '$nL5)7^E3DRyl2;I-9e>)z:34AC1j*rS4<{1;^[O:&Soy`y?`4J$1I6<LZS>AU}c');
define('SECURE_AUTH_KEY', 'Dn5g7Y*(`!nX1Uw0B(K67kYpacx2heOP8)drS+sz#8Q@Vo/QAL,{f02M*VI#Q#dw');
define('LOGGED_IN_KEY', 'PR,2XKp&yaUeqRd8/M>&nBjbN@yB(2/{aV`/%)s^wvVn4eP5[2,,Ru;SPDvB38Xu');
define('NONCE_KEY', 'Bt#t@zF)wU|*-D.5M`,@PZ%w}FUQ@Oh5!$k!)ST]0YIRASL^nH5-Ty:_NB6^.[Nk');
define('AUTH_SALT', '{+>uyR9H@XBDW>KjfxtF^@,AQDLSK9L-*&q.B=nBRZ6l#LI{JaWWD%g4{<[KhIW3');
define('SECURE_AUTH_SALT', 'FYl5fM0$lwTV%jQ8;O8VsO(V^4nQD3{Zam/dJaB-=OIBBS>Qf^x1@sTRq]%GMzUh');
define('LOGGED_IN_SALT', 'Ad_:0sXZCBB_H{(t:r*n4KcW&BznC|=|`D;HA8|AH8H0#!MD7{`]/{4NFxmp1V8R');
define('NONCE_SALT', 'a2,G*a)XvHoo4UC&,AXKkVn4%t>1!h<o_D2PryCl6@R+>#oouR-3G)6ylmm{$6&K');