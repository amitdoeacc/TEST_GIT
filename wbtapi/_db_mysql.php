<?php
$host = "localhost";
$port = 3306;
$username = "root";
$password = "";
$database = "webuytek";   // the database will be created if it doesn't exist

date_default_timezone_set("UTC");

$db = new PDO("mysql:host=$host;port=$port",
               $username,
               $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>