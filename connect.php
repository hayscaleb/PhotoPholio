<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'DunwoodyUser01';
$db_pass		= 'Z-k*HBqA01zS';
$db_database	= 'DunwoodyCalebHDB';

/* End config file */

$db = new PDO('mysql:host='.$db_host.';
				dbname='.$db_database,
				$db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>