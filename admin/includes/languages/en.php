<?php

function lang( $phrase ){
  static $language = array(
    "DASHBORD" => "Dashboard",
    "ADMIN"   => "Admin Area",
    "CATEGORIES" => "Categories",
    "CATEGORIES1" => "1- Manage Categories",
    "CATEGORIES2" => "2- Add New Category",
    "ITEMS" => "Items",
    "ITEMS1" => "1- Manage items",
    "ITEMS2" => "2- Add new item",
    "MEMBERS"   => "Members",
    "MEMBERS1" => "2- Add New User",
    "MEMBERS2" => "3- Pending Members",
    "MEMBERS3" => "1- Manage Members",
    "COMMENT" => "Comments",
    "STATISTICS"   => "Statistics",
    "LOGS"   => "Logs",
    "PROFILE1" => "Edit Profile",
    "PROFILE2" => "Settings"
  );

  return $language[$phrase];
}

 ?>
