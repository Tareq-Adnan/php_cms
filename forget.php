<?php include "includes/db.php"; ?>
<?php include "includes/header.php";
include("admin/includes/functions.php") ?>
<?php include "includes/nav.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$message='';
//Load Composer's autoloader
require './vendor/autoload.php';
require '/xampp/htdocs/cms_project/vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require("./classes/config.php");




if (!if_method('get') && isset($_GET['forget'])) {

    header("Location: index");

}
if (if_method('post')) {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));

        $query = "SELECT user_email FROM users WHERE user_email='$email'";
        $run = mysqli_query($connection, $query);
        confirmation($run);
        if (mysqli_num_rows($run) > 0) {

            if ($stmt = mysqli_prepare($connection, "UPDATE users SET token='$token' WHERE user_email=?")) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);



                $mail = new PHPMailer(true);

                $mail->isSMTP(); //Send using SMTP
                $mail->Host = config::SMTP_HOST; //Set the SMTP server to send through
                $mail->SMTPAuth = true; //Enable SMTP authentication
                $mail->Username = config::SMTP_USER; //SMTP username
                $mail->Password = config::SMTP_PASSWORD; //SMTP password
                $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
                $mail->Port = config::SMTP_PORT;
                $mail->CharSet = 'UTF-8';
                $mail->isHTML();
                $mail->Body = "<strong>HTML content</strong>";
                $mail->AltBody = "plain text content";

                $mail->setFrom('experiment.hunt@gmail.com', 'Experiment');
                $mail->addAddress($email);
                $mail->Subject = "Test email";
                $mail->Body = "

                <p>Please click to reset your password! <br><br>

                <a style='text-decoration:none; padding:5px 10px; background-color:#75aad8;color:white; border-radius:5px' href='http://localhost/cms_project/reset.php?email=".$email."&token=".$token."'>RESET</a></p>";

                if ($mail->send()) {
                  $message='A reset link is sent to your email.';
                } else {
                   $message='';
                }





            }
        }

    }
}

?>
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <div class="well">

                            <h1 class="text-center">Forget Password?</h1>
                            <p class='text-center'>You can reset your password here!</p>
                            <form action="" method="post" style="margin-bottom:10px">

                                <div class="form-group">
                                    <input name="email" type="text" class="form-control" placeholder="Enter email">
                                </div>
                                <input class="btn btn-primary btn-lg btn-block" type="submit" name="reset"
                                    value="RESET">
                            </form>

                            <!-- /.input-group -->
                            <h3 class='text-center'><?php echo $message ?></h3>
                        </div>
                    </div>
                </div>
                <?php include "includes/footer.php"; ?>