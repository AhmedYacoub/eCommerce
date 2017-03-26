<?php
  session_start();    // Start the session.
  session_unset();    // Delete all the session.
  session_destroy();  // Destroy all the the data associated with sessions.
  header("Location: index.php");  // after deleting the session, redirect to the index page.
  exit(); // stop the rest of the script.
