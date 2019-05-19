<?php
/**
 * Return debugging information of a Webserver.
 * 
 * Store the file `luyacheck.php` on your webserver and open it via Browser Url or run in console with `php luyacheck.php`.
 * 
 * @see https://luya.io
 * @see https://github.com/luyadev/luya
 */

// tests
$tests = [
	"in_array('mod_rewrite', apache_get_modules())",
	"ini_get('short_open_tag')",
	"ini_get('error_reporting')",
	"phpversion()",
	"php_ini_loaded_file()",
	"php_sapi_name()",
	'isset($_SERVER[\'SERVER_SOFTWARE\']) ? $_SERVER[\'SERVER_SOFTWARE\'] : unknown',
];
// foreach and dump test results
foreach ($tests as $i => $test) {
	printf("%2d: [%s] %s<br />", ++$i, $test, var_export(eval('return ' . $test . ';'), true));
}