<?php


require_once 'messages.php';

//site specific configuration declartion
define('BASE_PATH', 'http://localhost/Access');
define('DB_HOST', 'localhost');
define('DB_NAME', 'smart_invoice_v1');
define('DB_USERNAME','root');
define('DB_PASSWORD','');



define( 'CURRENT_YEAR', date("Y"));

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}

//settings
define('CURRENCY', '$');
define('LOGO', 'img/logo.png');
define('COMPANY_NAME', 'VEO');
define('COMPANY_ADDRESS', '1513 Panther Creek Atl.');
define('PHONE', '6787514016');
define('EMAIL', 'elementcoding300@gmail.com');


//Mailing
define('ADMIN_EMAIL', 'elementcoding300@gmail.com');
define('SENDER_NAME', 'elementcoding300@gmail.com');
define('REPLY_EMAIL', 'elementcoding300@gmail.com');


define('BRANDING_URL', '');


define('CONTACT_ADDRESS', 'elementcoding300@gmail.com');
define('CONTACT_ADDRESS_BY', '');