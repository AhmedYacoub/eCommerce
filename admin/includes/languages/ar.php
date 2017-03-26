<?php

function lang( $phrase ){
  static $language = array(
    "MESSAGE" => "مرحبا",
    "ADMIN"   => "بك"
  );

  return $language[$phrase];
}

 ?>
