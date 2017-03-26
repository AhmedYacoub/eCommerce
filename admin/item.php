<?php

ob_start();
session_start();
$pageTitle = "Manage items";  // Page title
include "init.php";

// if action has a value, $page = action_value, else $page = Manage page
$page = isset($_GET['action']) ? $_GET['action'] : "Manage";

/**********************************************************
 *    M A N A G E     I T E M S     S E C T I O N S
 **********************************************************/
if ($page == "Manage") {
  $order = isset($_GET['Arrange']) ? $_GET['Arrange'] : "ASC";
  $rows = DB_read("*", "items ORDER BY ID $order");
  include $p_templates."Table_Items.php";
}

/********************************************
 *    A D D     I T E M     S E C T I O N
 *******************************************/
elseif ($page == "Add") {
  if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
    $itemInputs = array();
    $itemInputs['name']        = filterVariables($_POST['name'], "string");
    $itemInputs['description'] = filterVariables($_POST['description'], "string");
    $itemInputs['price']       = filterVariables($_POST['price'], "int");
    $itemInputs['country']     = filterVariables($_POST['country'], "string");
    $itemInputs['status']      = $_POST['status'];
    $itemInputs['rating']      = $_POST['rating'];
    $itemInputs['catID']       = $_POST['catID'];
    $itemInputs['memID']       = $_POST['memID'];


    $error = array("", "", "", "");
    $errorEmpty = array("", "","", "");

    $error[0] = checkNumber($itemInputs['name'], "Item name", 4);
    $error[1] = checkNumber($itemInputs['description'], "Item description", 5);
    $error[2] = ($itemInputs['price'] == 0) ? "Price must be more than $0": checkNumber($itemInputs['price'], "Item price", 0);
    $error[3] = checkNumber($itemInputs['country'], "Item country", 3);


    if ( $errorEmpty == $error ) {
      if (DB_check("Name", "items", $itemInputs['name'])) {
        echo "<h2 class='text-center alert alert-danger'>Username (".$itemInputs['name'].") already exist!</h2>";
      }else{
        $insert = DB_create("items", "Name, Description, Price, Country, Status, Rating, Cat_ID, Member_ID", $itemInputs);
        DB_update("items", "addDate = NOW()", "Name = '".$itemInputs['name']."'");
        if ($insert) {
          echo "<h2 class='text-center alert alert-success'>Item had been add succesfully.</h2>";
        }
      }
    } 
  }
  $header = "Add New Item";
  $users = DB_read("*", "users", "RegisterStatus = 1");
  $cat   = DB_read("*", "categories");
  include $p_templates."Form_Item.php";
}


/*************************************
 *    E D I T     S E C T I O N
 *************************************/
elseif ($page == "Edit") {
  $itemID = isset( $_GET['id'] ) ? $_GET['id'] : 0;       // Get item id
  $read = DB_read("*", "items", "ID = '$itemID'");   // read data from DB
  $itemInputs = array();  // creat itemInputs array stores retrieved data into it
  $nameError = "";
  $arrangeError = "";
// Assign retrieved data to itemInputs array.
  foreach ($read as $key) {
    $itemInputs['name'] = $key['Name'];
    $nameError = $key['Name'];
    $itemInputs['description'] = $key['Description'];
    $itemInputs['price'] = $key['Price'];
    $itemInputs['country'] = $key['Country'];
    $itemInputs['status'] = $key['Status'];
    $itemInputs['rating'] = $key['Rating'];
    $itemInputs['catID'] = $key['Cat_ID'];
    $itemInputs['memID'] = $key['Member_ID'];
  }

// Start retrieving data from the from.
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $itemInputs['name']        = filterVariables($_POST['name'], "string");
    $itemInputs['description'] = filterVariables($_POST['description'], "string");
    $itemInputs['price']       = filterVariables($_POST['price'], "int");
    $itemInputs['country']     = filterVariables($_POST['country'], "string");
    $itemInputs['status']      = $_POST['status'];
    $itemInputs['rating']      = $_POST['rating'];
    $itemInputs['catID']       = $_POST['catID'];
    $itemInputs['memID']       = $_POST['memID'];

    $error = array("", "", "");
    $errorEmpty = array("", "", "");

    $error[0] = checkNumber($itemInputs['name'], "Item name", 4);
    $error[1] = checkNumber($itemInputs['description'], "Item description", 5);
    $error[2] = ($itemInputs['price'] == 0) ? "Price must be more than $0": checkNumber($itemInputs['price'], "Item price", 0);
    $error[3] = checkNumber($itemInputs['country'], "Item country", 3);

    if ( $errorEmpty == $error ) {
      if (DB_check("Name", "items", $itemInputs['name']) && $itemInputs['name'] != $nameError) {
        echo "<h2 class='text-center alert alert-danger'>Item Name (".$itemInputs['name'].") already exist!</h2>";
      }else{
        $fields = "Name = '".$itemInputs['name'];
        $fields .= "', Description  = '".$itemInputs['description'];
        $fields .= "', Price = '".$itemInputs['price'];
        $fields .= "', Country = '".$itemInputs['country'];
        $fields .= "', Status = '".$itemInputs['status'];
        $fields .= "', Rating = '".$itemInputs['rating'];
        $fields .= "', Cat_ID = '".$itemInputs['catID'];
        $fields .= "', Member_ID = '".$itemInputs['memID']."'";

        $update = DB_update("items", $fields, "ID = ".$_GET['id']);
        if ($update) {
          echo "<h2 class='text-center alert alert-success'>Item had been add succesfully.</h2>";
        }
      }
    }
  }

  $header = "Edit item";
  $users = DB_read("*", "users", "GroupID = 0 AND RegisterStatus = 1");
  $cat   = DB_read("*", "categories");
  include $p_templates."Form_Item.php";
}

/******************************************
 *      D E L E T E     S E C T I O N
 ******************************************/
elseif ($page == "Delete") {

if(isset($_GET['id'])){
  DB_delete("items", "ID = ".$_GET['id']);
  header("Location: item.php");
  echo "<h2 class='text-center alert alert-success'>Item Deleted succesfully!</h2>";
} else{
  header("Location: dashboard.php");
}
}else {
  header("Location: item.php");
  exit();
}

include $p_templates."footer.php";

ob_end_flush();
