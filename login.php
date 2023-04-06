<?php include "includes/db.php"; ?>
<?php include "includes/header.php";
include("admin/includes/functions.php") ?>
<?php include "includes/nav.php";

?>
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <div class="well">



                            <h1 class="text-center">Login</h1>
                            <form action="includes/login.php" method="post" style="margin-bottom:10px">

                                <div class="form-group">
                                    <input name="username" type="text" class="form-control"
                                        placeholder="Enter username">
                                </div>

                                <div class="form-group">
                                    <input name="password" type="password" class="form-control"
                                        placeholder="Enter passowrd">
                                </div>
                                <input class="btn btn-primary btn-lg btn-block" type="submit" name="login"
                                    value="Login">
                            </form>
                            
                            <a style="margin-top: 30px;" href="forget.php">Forget Password?</a>
                         




                            <!-- /.input-group -->
                        </div>
                    </div>
                </div>
                <?php include "includes/footer.php"; ?>