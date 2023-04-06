<?php 

if(isset($_GET['u_id'])){

    $userId=$_GET['u_id'];
}

    $query= "SELECT * FROM users WHERE user_id=$userId";
    $ex=mysqli_query($connection,$query);

    while($data=mysqli_fetch_assoc($ex)){

        $eusername=$data['username'];
        $epassword=$data['password'];
       
        $euser_image=$data['user_image'];
    
        $efirstName=$data['first_name'];
        $elastName=$data['last_name'];
    
        $eemail=$data['user_email'];
        $euserType=$data['userType'];
        $edate=$data['date'];
    }







if(isset($_POST['update_user'])){

    $username=$_POST['username'];
    $tempPass=$_POST['password'];

    if(empty($tempPass)){
        $password=$epassword;

    }else{
        $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    }
   
   
    $user_image=$_FILES['user_image']['name'];
    $user_image_temp=$_FILES['user_image']['tmp_name'];

    $firstName=$_POST['first_name'];
    $lastName=$_POST['last_name'];

    $email=$_POST['user_email'];
    $userType=$_POST['userType'];
    $date=date('d-m-y');
    
    
    move_uploaded_file($user_image_temp,"../images/$user_image");
    if(empty($user_image)){
        
        $query="SELECT * FROM users WHERE user_id=$userId";
        $e=mysqli_query($connection,$query);

        while($data=mysqli_fetch_assoc($e)){
            $user_image=$data['user_image'];
        }
    }


    $query = "UPDATE users SET username='$username',password='$password',first_name='$firstName',last_name='$lastName',user_email='$email',user_image='$user_image',userType='$userType',date=now() WHERE user_id=$userId";
    $up=mysqli_query($connection,$query);
    header("Location: users.php");
    

    confirmation($up);
}



?>





<form action="" method="post" enctype="multipart/form-data">



<div class="form-group">
    <label for="username">Username</label>
    <input value="<?php echo $eusername ?> " type="text" class="form-control" name="username">
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input value="" type="text" class="form-control" name="password" placeholder="Enter New Password">
</div>

<div class="form-group">
    <label for="user_image">Image</label>
    <img style="height:100px;width:100px;" class="img-responsive" src="../images/<?php echo $euser_image ?>">
    <input  type="file" class="form-control" name="user_image">
</div>

<div class="form-group">
    <label for="first_name">First Name</label>
    <input value="<?php echo $efirstName ?>" type="text" class="form-control" name="first_name">
</div>

<div class="form-group">
    <label for="last_name">Last Name</label>
    <input value="<?php echo $elastName ?>" type="text" class="form-control" name="last_name">
</div>

<div class="form-group">
    <label for="user_email">User Email</label>
    <input value="<?php echo $eemail ?>" type="email" class="form-control" name="user_email">
</div>

<div class="form-group">
    <label for="userType">User Type</label><br>
    <select style="padding: 10px" name="userType" id="">

        <option value="admin">admin</option>
        <option value="subscriber">subscriber</option>
        

    </select>
</div>

<div class="form-group">
    <input type="submit" style="padding: 5px 50px;" class="btn btn-primary text-center" value="Update User" name="update_user">
</div>


</form>