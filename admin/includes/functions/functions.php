<?php

/**
 ** getTitle() v 1.0
 ** Type: void
 ** functions that Echo page title in case a page
 ** has the variable $pageTitle and echo Default title for other pages.
 */
function getTitle() {
  global $pageTitle;

  if(isset($pageTitle)) {
    echo $pageTitle;
  } else{
    echo "Default";
  }
}


/**
 * redirect() v 1.0
 * Type: void
 * Redirect function [ accept parameters ]
 * $errMessage = echo the error message.
 * $seconds    = seconds before redirecting, default value is 3 seconds.
 */
function redirect( $errMessage, $seconds = 3 ) {
	echo "<div class='alert alert-danger text-center'>".$errMessage."</div>";
	echo "<div class='alert alert-danger text-center'>You will be redirect in $seconds</div>";
	header("refresh:$seconds; url=index.php");
	exit();
}

/**
 *  DB_check() v 1.0
 *  Type: Boolean
 *  function to check a field in Database [Accept Parameters]
 *  $field => a db table field that to be selected, it could be many fields.
 *  $table => a db table that to be selected.
 *  $value => a db table values to be selected.
 *  $option => query condition or some option.
 */

function DB_check( $field, $table, $value) {
  global $con;

  $statement = $con->prepare("SELECT `$field` FROM `$table` WHERE `$field` = ?");
  $statement->execute(array($value));

  if ( ($statement->rowCount()) > 0 )
    return true;
  else
    return false;
}

/************************************
 *    C R U D    F u n c t i o n s
 ************************************/

/**
 *  DB_read v 1.0
 *  Type: array of string
 *  function to read and retrieve a field or a row in a table.
 *  $field: field to be selected.
 *  $table: table that the required fields is to be selected.
 *  $condition: condition of the query.
 */

 function DB_read( $field, $table, $condition ="") {
   global $con;

   if($condition != "")
    $condition = "WHERE ".$condition;
   $statement = $con->prepare("SELECT $field FROM $table  $condition");
   $statement->execute();
   return $statement->fetchAll();
 }

/**
 * DB_update v 1.0
 * Type: boolean
 * function to update a row(rows) in a table [accept parameters]
 * $table
 * $field
 * $condition
 */
function DB_update ( $table, $field, $condition ) {
  global $con;
  $stmt = $con->prepare("UPDATE $table SET $field WHERE $condition");
  $stmt->execute();
  return true;
}

/**
 * DB_create() v 1.0
 * type: boolean.
 * function to insert new value in a table [accept parameters]
 * $table
 * $field: field's name, it maybe an array contains fields name.
 * $value: field's value, it maybe an array contains fields values.
 */
function DB_create( $table, $field, $value ) {
  global $con;
  $value = "'".implode("', '", $value)."'";   // A miraculous method to convert an array into string ex: 'itemname', 'description'
  $stmt = $con->prepare("INSERT INTO $table ($field) VALUES ($value)");
  $stmt->execute();

  if($stmt->rowCount() > 0)
    return true;
  else
    return false;
}


/**
 * DB_create_classic() v 1.0
 * type: boolean.
 * function to insert new value in a table [accept parameters]
 * $table
 * $field: field's name, it maybe an array contains fields name.
 * $value: field's value, it maybe an array contains fields values.
 */
function DB_create_classic( $table, $field, $value ) {
  global $con;
  $stmt = $con->prepare("INSERT INTO $table ($field) VALUES ($value)");
  $stmt->execute();

  if($stmt->rowCount() > 0)
    return true;
  else
    return false;
}

/**
 * DB_delete() v 1.0
 * type: boolean.
 * function to delete a row in a db table [accept parameters]
 * $table
 * $condition
 */
function DB_delete($table, $condition) {
  global $con;

  $stmt = $con->prepare("DELETE FROM $table WHERE $condition");
  $stmt->execute();

  return true;
}


/**
 * getCountOf() v 1.0
 * Type: int
 * function to get the number or the count of rows [accept parameters]
 * $field: a unique field.
 * $table: db table.
 * $condition: query condition.
 */
function getCountOf( $field, $table, $condition ="") {
  global $con;
  if($condition != "")
    $condition = "WHERE ".$condition;
  $stmt = $con->prepare("SELECT COUNT($field) FROM $table  $condition");
  $stmt->execute();
  return $stmt->fetchColumn();
}


/**
 * Secuerity functions
 */
function filterVariables( $var, $type ) {
  switch ($type) {
    case 'int':
      $var = filter_var($var, FILTER_SANITIZE_NUMBER_INT);
      break;

    case 'float':
      $var = filter_var($var, FILTER_SANITIZE_NUMBER_FLOAT);
      break;

    case 'string':
      $var = stripslashes($var);
      $var = filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
      $var = filter_var($var, FILTER_SANITIZE_STRING);
      break;

    case 'email':
      $var = stripslashes($var);
      $var = filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
      $var = filter_var($var, FILTER_SANITIZE_EMAIL);
      break;

    default:
      break;
  }

  return $var;
}

function checkNumber( $var, $varName, $length ) {
  if (strlen($var) < $length) {
    return $varName." must be more than ".$length." characters.";
  }
  return "";
}

/**
 * yesANDno v 1.0
 * function to convert int values to yes(0) and no(1) [accept parameters]
 * $value
 */
function yesANDno($value, $word) {
  if ($value == 0) {
    return "<span class='Yes yn'>$word: Yes</span>";
  } elseif ($value == 1){
    return "<span class='No yn'>$word: No</span>";
  }
}


/**
 * oneRecord() v 1.0
 * function to retrieve one record only from a db table [accept parameters].
 * $field
 * $table
 */
function oneRecord( $field, $table, $condition) {
  global $con;
  $stmt = $con->prepare("SELECT $field FROM $table WHERE $condition");
  $stmt->execute();
  return $stmt->fetchColumn();
}

/**
 * rate() v 1.0
 * function to take an integer values and return (New, Like New, Used...) [Accept Parameters]
 * $rate
 */
function rate($rate) {
  switch ($rate) {
    case 0:
      return 'New';
      break;
    case 1:
      return 'Like New';
      break;
    case 2:
      return 'Used';
      break;
    case 3:
      return 'Very Old';
      break;
    default:
      break;
  }
  return 'undefined';
}


/**
 * stars v 1.0
 * function that takes int values to draw stars using font-awesome icon [accept parameters]
 * $star
 */

function stars($star) {
  $count = 0;
  switch ($star) {
    case '1':
      $count = 1;
      break;
    case '2':
      $count = 2;
      break;
    case '3':
      $count = 3;
      break;
    case '4':
      $count = 4;
      break;
    case '5':
      $count = 5;
      break;
    default:
      # code...
      break;
  }

echo "<span class='description' style='color: gold;'>";
  for ($i=0; $i < $count; $i++) { 
    echo "<i class='fa fa-star fa-2x'></i>";
  }
echo "</span>";
}