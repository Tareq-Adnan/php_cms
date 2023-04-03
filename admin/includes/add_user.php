<?php 

if(isset($_POST['add_user'])){

    $username=$_POST['username'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
   
    $user_image=$_FILES['user_image']['name'];
    $user_image_temp=$_FILES['user_image']['tmp_name'];

    $firstName=$_POST['first_name'];
    $lastName=$_POST['last_name'];

    $email=$_POST['user_email'];
    $userType=$_POST['userType'];
    $date=date('d-m-y');
    
    
    move_uploaded_file($user_image_temp,"../images/$user_image");


    $query = "INSERT INTO users(username,password,first_name,last_name,user_email,user_image,userType,date) VALUES('$username','$password','$firstName','$lastName','$email','$user_image','$userType',now())";
    $up=mysqli_query($connection,$query);
    

    confirmation($up);

    echo "User Created!";
}



?>





<form action="" method="post" enctype="multipart/form-data">



<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username">
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="text" class="form-control" name="password">
</div>

<div class="form-group">
    <label for="user_image">Image</label>
    <input type="file" class="form-control" name="user_image">
</div>

<div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" name="first_name">
</div>

<div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" name="last_name">
</div>

<div class="form-group">
    <label for="user_email">User Email</label>
    <input type="email" class="form-control" name="user_email">
</div>

<div class="form-group">
    <label for="userType">User Type</label><br>
    <select style="padding: 10px" name="userType" id="">

        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
       

    </select>
</div>

<div class="form-group">
    <input type="submit" style="padding: 5px 50px;" class="btn btn-primary text-center" value="Add User" name="add_user">
</div>


</form>