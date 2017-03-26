<?php

/*
****************************************************
**              Manage users using CRUD           **
****************************************************
*/
// Start the session.
session_start();
// Page title diplayed in browser tab.
$pageTitle = "Comments";


if (isset($_SESSION['username'])) {	// if there is a session
  include "init.php";	// Include inti.php file

  // if members.php?action= a value, True: get that value, False: $action = Manage
  $action = isset( $_GET['action'] ) ? $_GET['action'] : "Manage";

/************************************************
 *        M A N A G E    S E C T I O N
 ************************************************/
  if ( $action == "Manage" ) {	// ?action=Manage
    $rows = DB_read("*", "comments");  // double inner join between table comments, items and users.
    $rows  = DB_read("comments.Comment_ID , 
                      comments.Comment, 
                      comments.Comment_Date,
                      comments.Status,
                      items.Name ,
                      users.Username", 

                  "comments 
                      INNER JOIN items ON items.ID = comments.Item_ID 
                      INNER JOIN users ON users.UserID = comments.User_ID");
    // Show up the Users Table.
    include $p_templates."Table_comments.php";
}


/***********************************************
 **       P E N D I N G     C O M M E N T S
 **********************************************/
 elseif ( $action == "pcom") {  // ?action=pcom

   $id = isset($_GET['id']) ? $_GET['id'] : 0;
   DB_update("comments", "Status = 1", "Comment_ID = $id");
   header("Location: comments.php");
}


/***********************************************
 **           E D I T   S E C T I O N
 ***********************************************/
  elseif ( $action == "Edit" ){ 			// ?action=Edit

    // $userID = isset( $_SESSION['ID'] ) && !empty( $_SESSION['ID'] ) ?  $_SESSION['ID'] : 0;   // if ID SESSION isset and is not empty, get that ID, or 0

    $userID = isset( $_GET['id'] ) ? $_GET['id'] : $_SESSION['ID'];

    $stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");  // SQL query to select that user.
    $stmt->execute( array($userID) );   // execute the query.
    $row = $stmt->fetch();              // fetch the required data and store it in an associative array called $row.
    $count = $stmt->rowCount();         // get the numbers of the returned rows.

    if ( $count > 0 ) {
      $oldUsername = $row['Username'];  // Old Username
      $oldPassword = $row['Password'];  // Old Password
      $oldEmail    = $row['Email'];     // Old Email
      $oldFullname = $row['Fullname'];  // Old Fullname

      // Start Editing process.

      # check if the request method is POST incoming from the editing from.
      if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
        // New Data variables.
        $newUsername = filter_var ( $_POST['username'], FILTER_SANITIZE_STRING );  // New username, authenticate username.
        $newPassword = sha1( $_POST['password'] );  // New Password
        $newEmail    = filter_var ( $_POST['email']   , FILTER_SANITIZE_EMAIL );     // New Email , authenticate email.
        $newFullname = filter_var ( $_POST['fullname'], FILTER_SANITIZE_STRING );  // New Fullname, authenticate fullname.
        $UserID = $_SESSION['ID'];          // User Personal ID.
        $formError = array("", "", "");     // Error Messages.
        $formEmpty = array("", "", "");
        if ( strlen($newUsername) < 3 )
          $formError[0] = "Username must be more than 3 characters.";
        if ( strlen($newPassword) < 3 )
          $formError[1] = "Password must be more than 3 characters.";
        if ( strlen($newFullname) < 3 )
          $formError[2] = "Fullname must be more than 3 characters.";


       if ($formEmpty == $formError) {
          $NewData = array();
          $query   = "";
          // // Data without Password field.
          // $NewDataNoPass = array($newUsername, $newEmail, $newFullname, $userID);
          // $queryNoPass  = "UPDATE users SET Username = ?, Email = ?, Fullname = ? WHERE UserID = ?";

          // // Data with Password field.
          // $NewDataWithPass = array($newUsername, $newPassword, $newEmail, $newFullname, $userID);
          // $queryWithPass  = "UPDATE users SET Username = ?, Password = ?, Email = ?, Fullname = ? WHERE UserID = ?";

          if ( empty( $_POST['password']) ) {
            $NewData = array($newUsername, $newEmail, $newFullname, $userID);
            $query = "UPDATE users SET Username = ?, Email = ?, Fullname = ? WHERE UserID = ?";
          } else {
            $NewData = array($newUsername, $newPassword, $newEmail, $newFullname, $userID);
            $query = "UPDATE users SET Username = ?, Password = ?, Email = ?, Fullname = ? WHERE UserID = ?";
          }

          // Check if the user is already exist.
         if (DB_check("Username", "users", $NewData[0])) {
           echo "<h2 class='text-center alert alert-danger'>Username (".$NewData[0].") already exist!</h2>";
         } else {
           # start updating the user.
            $stmt = $con->prepare($query);
            if ( $stmt->execute( $NewData ) ){
              echo "<h2 class='text-center alert alert-success'>".$stmt->rowCount()." rows updated, Please Logout to display your data correctly.</h2>";
            }
         }
        }
       }
         include $p_templates."Form_editMember.php";    // Edit-form page.
    } else {
      echo "User isn't found!";
    }

  }


/****************************************************
 **       S E T T I N G S    S E C T I O N
 ****************************************************/
  elseif ( $action == "Settings" ){			        // ?action=Settings
  	echo "Welcome to Settings page, User: ".$_SESSION['username'].", ID: ".$_SESSION['ID'];;			// actions to be taken in Settings page.
  }


/****************************************************
 **       U P D A T E    S E C T I O N
 ****************************************************/
  elseif ( $action == "Update" ) {
    echo "<h2 class='text-center alert alert-success'>".$_GET['Message']." rows updated, Please Logout to display your data correctly.</h2>";
  }




/******************************************************
 **       A D D    N E W    U S E R    S E C T I O N
 ******************************************************/
   elseif( $action == "Add") {


    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

      // Validate new user data.
      $comInputs = array();
      $comInputs[0] = filterVariables($_POST['comment'], "string");
      $comInputs[1] = $_GET['itemID'];
      $comInputs[2] = $_GET['userID'];
      $insert = DB_create("comments", "Comment, Item_ID, User_ID, Comment_Date", $comInputs);
      if ($insert) {
          echo "<h2 class='text-center alert alert-success'>Comment has been added succesfully.</h2>";
        }
    }
    $header = "Add New Comment";
    include $p_templates."Form_addComment.php";   // Add New User form.

  }

/*****************************************************
 *           D E L E T E    S E C T I O N
 *****************************************************/
  elseif($action == "Delete") {

    // Start Deleting the user.
    $comment = DB_delete("comments", "Comment_ID = ".$_GET['id']);
    if ( $comment ) {
      header("Location: comments.php");
    }

  }  else {
  	echo "The requested page doesn't exist.";	   // ?action=UNDEFINED
  	exit();
  }
  include $p_templates."footer.php";	           // include footer.php
} else{

  include "includes/functions/functions.php";
  redirect("You can't browse this page directly!");
	// header("Location: index.php");		// redirect the user to index.php if there is no session.
	// exit();
}
