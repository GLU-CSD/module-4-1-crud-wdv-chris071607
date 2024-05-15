<?php
session_start();

/**
 * Voor de MAC gebruikers;
 */
// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "root";
// $dbname = "webdev_base";

/**
 * Voor de Windows gebruikers;
 */
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "webshop";

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
}

define("BASEURL","http://localhost/module-4-1-crud-wdv-chris071607/");
define("BASEURL_CMS","http://localhost/module-4-1-crud-wdv-chris071607/admin/");

function prettyDump ( $var ) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}