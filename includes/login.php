<?php 
include("../includes/db.php");
include("../admin/includes/functions.php");

session_start();


if(isset($_POST['login'])){

    $username=$_POST['username'];
   $password=$_POST['password'];


     $username=mysqli_real_escape_string($connection,$username);
     $password=mysqli_real_escape_string($connection,$password);

    $query="SELECT * FROM users WHERE username='{$username}'";
    $run=mysqli_query($connection,$query);
    confirmation($run);


    while($data=mysqli_fetch_array($run)){

        $id=$data['user_id'];
        $uname=$data['username'];
        $pass=$data['password'];
        $uType=['userType'];
        $firstName=['first_name'];
        $lastName=['last_name'];

    }
   //  $pass = password_verify($password,$pass);

    if($username === $uname && password_verify($password,$pass)){
        $_SESSION['user_id']=$id;
        $_SESSION['username']=$uname;
        $_SESSION['password']=$pass;
        $_SESSION['userType']=$uType;
        $_SESSION['first_name']=$firstName;
        $_SESSION['last_name']=$lastName;

        header("Location: ../admin");
    }else{
        header("Location: ../index.php");
    }
}

?>