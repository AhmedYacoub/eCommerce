<?php
ob_start();
session_start();			// Start the session
$pageTitle = "Dashboard";	// set page title

if ( isset($_SESSION['username']) ) {	// if the session is set
  include "init.php";	# include init.php file to include the required files
  $rows = DB_read("Username, Date", "users", "RegisterStatus = 1 ORDER BY Date DESC LIMIT 5");

  // Inner Joing between items table and categories table.
  /**
   * 	SELECT items.Name AS itemName, categories.Name AS catName, items.addDate as Date
		FROM items
		INNER JOIN categories
		ON items.Cat_ID = categories.ID
		LIMIT 5
   */
  $cat  = DB_read("items.Name AS itemName, 
  				   categories.Name AS catName, 
  				   items.addDate as Date", 

  				  "items INNER JOIN categories ON items.Cat_ID = categories.ID ORDER BY Date DESC LIMIT 5");

  include $p_templates."layout_dashboard.php";
  include $p_templates."footer.php";	# Include footer
} else {	// if the session is not set, show unauthorized message
  echo "You are not Authorized to view this page...";
  unset($_SESSION['username']);
  header("Location: index.php");
}
ob_end_flush();
