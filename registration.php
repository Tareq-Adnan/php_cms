<?php include "includes/db.php"; ?>
<?php include "includes/header.php";
include("admin/includes/functions.php") ?>


<!-- Navigation -->

<?php include "includes/nav.php";


if (isset($_POST['register'])) {

    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $pass = mysqli_real_escape_string($connection, $_POST['password']);

    if (!empty($username) && !empty($pass) && !empty($email)) {


        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username,user_email,password,userType,date) VALUES ('$username','$email','$pass','subscriber',now())";
        $exec = mysqli_query($connection, $query);

        confirmation($exec);

        $message = "<p style='color:green;'>Regsitration Successful!</p>";
    } else {
        $message = "<p style='color: red;'>Field can't be empty!</p>";
    }
    
} else {
    $message = "";
}






?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                            <h6 class="text-center">
                                <?php echo $message; ?>
                            </h6>
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="" class="form-control"
                                    placeholder="Password">
                            </div>

                            <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block"
                                value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php"; ?>