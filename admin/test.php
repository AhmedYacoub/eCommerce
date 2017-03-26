<?php

session_start();
include "init.php";

DB_update("categories", "Date = NOW()", "Name = 'Phones'");
