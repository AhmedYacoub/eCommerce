<?php

ob_start();
session_start();
$pageTitle = "Manage categories";
include "init.php";

// if action has a value, $page = action_value, else $page = Manage page
$page = isset($_GET['action']) ? $_GET['action'] : "Manage";

/**********************************************************
 *    M A N A G E     I T E M S     S E C T I O N S
 **********************************************************/
if ($page == "Manage") {
  $order = isset($_GET['Arrange']) ? $_GET['Arrange'] : "ASC";
  $rows = DB_read("*", "categories ORDER BY Arrange $order");
  include $p_templates."Table_manageItems.php";
}

/********************************************
 *    A D D     I T E M     S E C T I O N
 *******************************************/
elseif ($page == "Add") {
  if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
    $itemInputs = array();
    $itemInputs['name']        = filterVariables($_POST['name'], "string");
    $itemInputs['description'] = filterVariables($_POST['description'], "string");
    $itemInputs['arrange']     = filterVariables($_POST['arrange'], "int");
    $itemInputs['visible'] = $_POST['visible'];
    $itemInputs['comment'] = $_POST['comment'];
    $itemInputs['ads']     = $_POST['ads'];

    $error = array("", "", "");
    $errorEmpty = array("", "", "");

    $error[0] = checkNumber($itemInputs['name'], "Item name", 4);
    $error[1] = checkNumber($itemInputs['description'], "Item description", 4);
    $error[2] = checkNumber($itemInputs['arrange'], "Item arrange order", 1);

    if ( $errorEmpty == $error ) {
      if (DB_check("Name", "categories", $itemInputs['name'])) {
        echo "<h2 class='text-center alert alert-danger'>Username (".$itemInputs['name'].") already exist!</h2>";
      } else if (DB_check("Arrange", "categories", $itemInputs['arrange']) ) {
        echo "<h2 class='text-center alert alert-danger'>Arrange Order (".$itemInputs['arrange'].") already exist!</h2>";
      }else{
        $insert = DB_create("categories", "Name, Description, Arrange, Visibility, AllowComment, AllowAds", $itemInputs);
        DB_update("categories", "Date = NOW()", "Name = '".$itemInputs['name']."'");
        if ($insert) {
          echo "<h2 class='text-center alert alert-success'>Item had been add succesfully.</h2>";
        }
      }
    }
  }
  $header = "Add New Item";
  include $p_templates."Form_addItem.php";
}


/*************************************
 *    E D I T     S E C T I O N
 *************************************/
elseif ($page == "Edit") {
  $itemID = isset( $_GET['id'] ) ? $_GET['id'] : 0;       // Get item id
  $read = DB_read("*", "categories", "ID = '$itemID'");   // read data from DB
  $itemInputs = array();  // creat itemInputs array stores retrieved data into it
  $nameError = "";
  $arrangeError = "";
// Assign retrieved data to itemInputs array.
  foreach ($read as $key) {
    $itemInputs['name'] = $key['Name'];
    $nameError = $key['Name'];
    $itemInputs['description'] = $key['Description'];
    $itemInputs['arrange'] = $key['Arrange'];
    $arrangeError = $key['Arrange'];
    $itemInputs['visible'] = $key['Visibility'];
    $itemInputs['comment'] = $key['AllowComment'];
    $itemInputs['ads'] = $key['AllowAds'];
  }

// Start retrieving data from the from.
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $itemInputs['name']        = filterVariables($_POST['name'], "string");
    $itemInputs['description'] = filterVariables($_POST['description'], "string");
    $itemInputs['arrange']     = filterVariables($_POST['arrange'], "int");
    $itemInputs['visible'] = $_POST['visible'];
    $itemInputs['comment'] = $_POST['comment'];
    $itemInputs['ads']     = $_POST['ads'];

    $error = array("", "", "");
    $errorEmpty = array("", "", "");

    $error[0] = checkNumber($itemInputs['name'], "Item name", 4);
    $error[1] = checkNumber($itemInputs['description'], "Item description", 4);
    $error[2] = checkNumber($itemInputs['arrange'], "Item arrange order", 1);

    if ( $errorEmpty == $error ) {
      if (DB_check("Name", "categories", $itemInputs['name']) && $itemInputs['name'] != $nameError) {
        echo "<h2 class='text-center alert alert-danger'>Item Name (".$itemInputs['name'].") already exist!</h2>";
        if (DB_check("Arrange", "categories", $itemInputs['arrange']) && $itemInputs['arrange'] != $arrangeError) {
         echo "<h2 class='text-center alert alert-danger'>Arrange Order (".$itemInputs['arrange'].") already exist!</h2>";
       }
      }else{
        $fields = "Name = '".$itemInputs['name'];
        $fields .= "', Description  = '".$itemInputs['description'];
        $fields .= "', Arrange = '".$itemInputs['arrange'];
        $fields .= "', Visibility = '".$itemInputs['visible'];
        $fields .= "', AllowComment = '".$itemInputs['comment'];
        $fields .= "', AllowAds = '".$itemInputs['ads']."'";

        $update = DB_update("categories", $fields, "ID = ".$_GET['id']);
        if ($update) {
          echo "<h2 class='text-center alert alert-success'>Item had been add succesfully.</h2>";
        }
      }
    }
  }

  $header = "Edit item";
  include $p_templates."Form_addItem.php";
}

/******************************************
 *      U P D A T E     S E C T I O N
 ******************************************/
elseif ($page == "Delete") {

if(isset($_GET['id'])){
  DB_delete("categories", "ID = ".$_GET['id']);
  header("Location: category.php");
  echo "<h2 class='text-center alert alert-success'>Item Deleted succesfully!</h2>";
} else{
  header("Location: dashboard.php");
}
}else {
  header("Location: category.php");
  exit();
}

include $p_templates."footer.php";

ob_end_flush();
