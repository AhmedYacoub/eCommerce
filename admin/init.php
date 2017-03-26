<?php
// Database PDO connection
include "config.php";

// Directories pathes
$p_templates = "includes/templates/";	// templates directory
$p_functions = "includes/functions/";	// functions directory
$p_languages = "includes/languages/";	// languages directory
$p_libraries = "includes/libraries/";	// libraries directory

/* Files pathes */

// Bootstrap files CDN
$BootstrapCSS = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css";	// Bootstrap.min.css (CSS)
$BootstrapJS  = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js";		// Bootstrap.min.js  (JS)
$FontAwesome  = "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
// jQuery files CDN
$jQuery = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js";	// jquery.min.js

// Custom CSS & JS directories
$CSS = "layout/css/";	// CSS
$JS  = "layout/js/";	// JS

// Include Header and English files...
include $p_functions."functions.php"; 	// Functions file, Location: admin/includes/functions/functions.php
include $p_templates."header.php";  	// Header file, Location: admin/includes/templates/header.php
include $p_languages."en.php";      	// English version file, Location: admin/includes/languages/en.php.

// Don't include navbar.php for some pages.
// if $noNav is not set to the script, by default it will appear in all pages unless it will be like: $noNav = ""
if ( !isset($noNav) ) {
  include $p_templates."navbar.php";	// True: include the navbar to the page
}
