<?php
  session_start();      // Start a new session, it must be the first line in any page
  $noNav = "";          // This page has no navbar by assigning $noNav to NOTHING
  $pageTitle = "Login"; // Page Title specified by this variable $pageTitle

  if ( isset($_SESSION['username']) ) {   // if the current user has a session, scip the login page and redirect to dashboard page
    header("Location: dashboard.php");     // Redirect to dashboard page
    exit(); // stop rest of script
  }

  include "init.php"; // contain all files & directories pathes 
?>

<?php
// Check if the user is comming from HTTP POST request

  if ( $_SERVER['REQUEST_METHOD'] == "POST" ) { # if the request method is POST
    $username = $_POST['username'];     # assign the incoming username to $username variable
    $password = $_POST['password'];     # assign the incoming password to $password variable
    $HashedPassword = sha1($password);  # secure $password variable using sha1() function

    // Check if the user exist...
    // prepared SQL statement, GroupID = 1 means that the user type is ADMIN, and GroupID = 0 means the user is Common USER
    $stmt = $con->prepare( "SELECT UserID, Username, Password FROM users 
                            WHERE Username = ? AND Password = ? 
                            AND GroupID = 1 LIMIT 1" );  // Limit 1 means, Select 1 row ONLY.
    $stmt->execute(array($username, $HashedPassword));  // execute the SQL statement
    $row = $stmt->fetch();
    $count = $stmt->rowCount(); // get the selected query rows

    // if $count > 0 , the user exists...

    if ($count > 0) {
      $_SESSION['username'] = $username;      // Register username session var
      $_SESSION['ID']   = $row["UserID"]; // Register UserID session var
      header("Location: dashboard.php");       // Redirect to dashboard page
      exit(); // stop rest of script
    }
  }

?>

<!-- Start of Body -->

<form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
  <h3 class="text-center">Admin Login</h3>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" name="username" class="form-control" placeholder="Enter Username" autocomplete="off" />
  </div>
  <div class="form-group">
    <lable for="password"><b>Password:</b></lable>
    <input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="new-password" />
  </div>
  <button type="submit" class="btn btn-primary btn-block">Login</button>
</form>

<!-- End of Body -->

<?php include $p_templates."footer.php"; // Footer ?>
