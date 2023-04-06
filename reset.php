<?php include "includes/db.php"; ?>
<?php include "includes/header.php";
include("admin/includes/functions.php") ?>

<!-- Navigation -->

<?php include "includes/nav.php";
$message = "";

if (!isset($_GET['email']) && !isset($_GET['token'])) {
    header("Location: index");
}


$query = "SELECT username, user_email,token FROM users WHERE token='{$_GET['token']}'";
$exec = mysqli_query($connection, $query);
confirmation($exec);
while ($data = mysqli_fetch_assoc($exec)) {
    $username = $data['username'];
    $email = $data['user_email'];
    $token = $data['token'];
}


if (isset($_POST['reset'])) {

    if ($_POST['password'] === $_POST['cpassword']) {
        $resetPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "UPDATE users SET password='$resetPass',token='' WHERE user_email='{$_GET['email']}' ";
        $run = mysqli_query($connection, $query);
        if ($run) {
            echo "updated";
            header("Location: login.php");
        } else {
            echo "not updated";
        }
    }
}


?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1 class="text-center">Reset Password</h1>
                        <form role="form" action="reset.php" method="post" id="login-form" autocomplete="off">

                            <h6 class="text-center">
                                <?php echo $message; ?>
                            </h6>
                            <div class="form-group">
                                <label for="password" class="sr-only">username</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Passowrd">
                            </div>
                            <div class="form-group">
                                <label for="cpassowrd" class="sr-only">Email</label>
                                <input type="password" name="cpassword" id="cpassword" class="form-control"
                                    placeholder="Confrim passowrd">
                            </div>

                            <input type="submit" name="reset" id="btn-login" class="btn btn-custom btn-lg btn-block"
                                value="Save Passowrd">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <hr>
    <?php include "includes/footer.php"; ?>