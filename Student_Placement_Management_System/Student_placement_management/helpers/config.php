<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); //write the usernam
define('DB_PASSWORD', ''); //write the password
define('DB_NAME', 'sem3_pro_spm'); //write the db name

/* Attempt to connect to MySQL/MariaDB database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}