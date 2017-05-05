<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'PhotoFolio';

/* End config file */

$db = new PDO('mysql:host='.$db_host.';
				dbname='.$db_database,
				$db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>