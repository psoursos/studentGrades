<?php
//session cookie?
if( isset( $_COOKIE[ session_name()]) ){

  //empty the cookie
  setcookie( session_name(), '', time()-86400,'/');
}
//clear session variables
session_unset();
//destroy session
//session_destroy();
include('header.php');
//include('index.php');
?>
<h1>Logged out <h1>

<?php 
//include('header.php');
?>