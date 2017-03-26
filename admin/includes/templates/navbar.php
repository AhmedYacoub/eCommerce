<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dashboard.php"><?php echo lang("DASHBORD"); ?></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href=""><?php echo lang("CATEGORIES"); ?>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="category.php?action=Manage" ><?php echo lang("CATEGORIES1"); ?></a></li>
              <li><a href="category.php?action=Add" ><?php echo lang("CATEGORIES2"); ?></a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href=""><?php echo lang("ITEMS"); ?>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="item.php?action=Manage" ><?php echo lang("ITEMS1"); ?></a></li>
              <li><a href="item.php?action=Add" ><?php echo lang("ITEMS2"); ?></a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href=""><?php echo lang("MEMBERS"); ?>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="members.php?action=Manage"><?php echo lang("MEMBERS3"); ?></a></li>
              <li><a href="members.php?action=Add"><?php echo lang("MEMBERS1"); ?></a></li>
              <li><a href="members.php?action=Pmembers"><?php echo lang("MEMBERS2"); ?></a></li>
            </ul>
          </li>
        </ul>

        <li class="active"><a href="comments.php"><?php echo lang("COMMENT"); ?></a></li>
        <li class="active"><a href="#"><?php echo lang("STATISTICS"); ?></a></li>
        <li class="active"><a href="#"><?php echo lang("LOGS"); ?></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href=""><?php echo $_SESSION['username']; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="members.php?action=Edit"><?php echo lang("PROFILE1"); ?></a></li>
            <li><a href="members.php?action=Settings"><?php echo lang("PROFILE2"); ?></a></li>
          </ul>
        </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>

    </div>

    </nav>
