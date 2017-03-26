<?php
/******************************* 
 *	To connect to DB & Debug
 *******************************/

// DB variables...
$dsn = "mysql:host=localhost;dbname=shop";  // define type of DB (ex: MySQL, MS SQL, Oracle...) then set DB name
$user = "root";
$pass = "";
$option = array(
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);

// Try to connect
try {
  $con = new PDO($dsn, $user, $pass, $option);  // Intialize new object of PDO Class to connect and pass connection variables.
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // get exceptions.
}
// Catch error exception...
catch(PDOException $e ) {
  echo "Failed to connect to database, reason: ".$e->getMessage();
}
