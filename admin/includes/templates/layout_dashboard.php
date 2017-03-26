<!-- Start Dashboard design -->
<!-- Start Container -->
<div class="container text-center dashboard">
  <h1 class="text-center dshb">Dashboard</h1>
  <!-- 1st section -->
  <div class="row">
    <div class="col-sm-3">
      <a class="boxes" href="members.php?action=Manage">
        <div class="status t-members">
          <p><span><i class="fa fa-users fa-la"></i></span> Total Members</p>
          <span class="spn">
            <?php
              echo getCountOf("UserID", "users", "GroupID = 0 AND RegisterStatus = 1"); // $field, $table, $condition
            ?>
          </span>
        </div>
      </a>
    </div>

    <!-- 2nd Section -->
    <div class="col-sm-3">
      <a class="boxes" href="members.php?action=Pmembers">
        <div class="status p-members">
          <p><span><i class="fa fa-user-plus fa-la"></i></span> Pending Members</p>
          <span class="spn">
            <?php
              echo getCountOf("UserID", "users", "GroupID = 0 AND RegisterStatus = 0"); // $field, $table, $condition
            ?>
          </span>
        </div>
      </a>
    </div>

    <!-- 3rd Section -->
    <div class="col-sm-3">
      <a class="boxes" href="item.php?action=Manage">
        <div class="status t-items">
          <p><span><i class="fa fa-tag fa-la"></i></span> Total Items</p>
          <span class="spn">
            <?php
              echo getCountOf("ID", "items"); // $field, $table, $condition
            ?>
          </span>
        </div>
      </a>
    </div>

    <!-- 4th Section -->
    <div class="col-sm-3">
      <a class="boxes" href="members.php?action=Pmembers">
        <div class="status t-comments">
          <p><span><i class="fa fa-comments fa-la"></i></span> Total Comments</p>
         <span class="spn">
            <?php
              echo getCountOf("Comment_ID", "comments"); // $field, $table, $condition
            ?>
          </span>
        </div>
      </div>
    </a>
  </div>
<!-- End Container -->
</div>
<!-- End Dashboard design -->

<!-- Start Panel -->
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span class="left"><i class="fa fa-users"></i> Latest 5 Registered Users</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-down" id="userArrow"></i></span>
        </div>
        <div class="panel-body" id="userSection">
          <table class="table table-striped l-users">
            <thead>
              <tr>
                <td>Username</td>
                <td>Registeration Date</td>
              </tr>
            </thead>
          <?php
            foreach ($rows as $key ) {
              echo "<tr>";
              echo "<td>".$key['Username']."</td>";
              echo "<td> <span class='fa fa-calendar'></span> ".$key['Date']."</td>";
              echo "</tr>";
            }
          ?>
        </table>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span><i class="fa fa-tag"></i> Latest 5 Items<span>
          <span class="pull-right"><i class="fa fa-arrow-circle-down" id="catArrow"></i></span>
        </div>
        <div class="panel-body" id="itemSection">
          <table class="table table-striped l-items"><thead>
            <tr>
              <td>Item</td>
              <td>Category</td>
              <td>Added Date</td>
            </tr>
          </thead>
          <?php
            foreach ($cat as $key ) {
              echo "<tr>";
              echo "<td>".$key['itemName']."</td>";
              echo "<td>".$key['catName']."</td>";
              echo "<td> <span class='fa fa-calendar'></span> ".$key['Date']."</td>";
              echo "</tr>";
            }
          ?>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Panel -->
