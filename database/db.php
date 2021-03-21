<?php  
require "./libs/rb.php" ;
  R::setup( 'mysql:host=localhost;dbname=agency',
       'root', '' ); //for both mysql or mariaDB
  if(!R::testConnection()) die('No DB connection!');
      session_start();
?>