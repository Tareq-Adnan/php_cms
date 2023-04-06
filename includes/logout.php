<?php 
session_start();

$_SESSION['username']=null;
$_SESSION['password']=null;
$_SESSION['userType']=null;
$_SESSION['first_name']=null;
$_SESSION['last_name']=null;

header("Location: ../index");

?>