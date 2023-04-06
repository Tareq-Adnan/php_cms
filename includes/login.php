<?php 
include("../includes/db.php");
include("../admin/includes/functions.php");
include("header.php");
session_start();

if(isset($_POST['login'])){
    userlogin($username=$_POST['username'], $password=$_POST['password']);
}

?>
