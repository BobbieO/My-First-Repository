<?php
//define constants to sub into dbc
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'employees');
define('DB_USER', 'vagrant');
define('DB_PASS', 'vagrant');


REQUIRE 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";


?>