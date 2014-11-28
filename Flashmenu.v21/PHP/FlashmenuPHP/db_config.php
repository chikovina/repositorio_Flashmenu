<?php

define('DB_USER', "root"); // db user
define('DB_PASSWORD', "root"); // db password (mention your db password here)
define('DB_DATABASE', "mydb"); // database name
define('DB_SERVER', "localhost"); // db server

$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);

mysql_select_db(DB_NAME,$con);

?>