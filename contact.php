<?php include "includes/db.php"; ?>
<?php include "includes/header.php";
include("admin/includes/functions.php") ?>
<?php include "includes/nav.php";



if (isset($_POST['contact'])) {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $subject = mysqli_real_escape_string($connection, $_POST['subject']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);

}

?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Contact</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                           
                            <div class="form-group">
                                <label for="email" class="sr-only">email</label>
                                <input type="email" name="email" id="username" class="form-control"
                                    placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">subject</label>
                                <input type="text" name="subject" id="email" class="form-control"
                                    placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <label for="message" class="sr-only">message</label>
                                <textarea type="text" name="message" id="" class="form-control"
                                    placeholder="Enter your message here!..." cols="30" rows="5"></textarea>
                            </div>

                            <input type="submit" name="contact" id="btn-login" class="btn btn-custom btn-lg btn-block"
                                value="Submit">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php"; ?>