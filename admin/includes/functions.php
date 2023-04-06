<?php



function escape($string)
{
    global $connection;
    mysqli_real_escape_string($connection, trim(strip_tags($string)));

}


function confirmation($up)
{
    global $connection;
    if (!$up) {
        die("upload failed!" . mysqli_error($connection));
    }
}


function category_table()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $exe = mysqli_query($connection, $query);

    ?>

    <div class="col-xs-6">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($exe)) {

                    ?>
                    <tr>
                        <td>
                            <?php echo $data['cat_id'] ?>
                        </td>
                        <td>
                            <?php echo $data['cat_title'] ?>
                        </td>
                        <td><a class="btn btn-warning" href="categories.php?delete=<?php echo $data['cat_id'] ?>">Delete</a>
                            <a class="btn btn-success" href="categories.php?edit=<?php echo $data['cat_id'] ?>">Edit</a>
                        </td>
                    </tr>
                <?php }
}

function insert_category()
{

    if (isset($_POST['insert'])) {

        $title = $_POST['cat_title'];

        if ($title == "" || empty($title)) {
            echo "Nothing to be added!";
        } else {
            global $connection;
            $query = "INSERT INTO categories(cat_title) VALUE('$title')";
            $run = mysqli_query($connection, $query);
            if ($run) {
                echo "Category Added!";
            }
        }


    }
}

function colink($comment_post_id)
{
    global $connection;
    $p_query = "SELECT * FROM posts WHERE post_id=$comment_post_id";
    $eex = mysqli_query($connection, $p_query);

    while ($data = mysqli_fetch_assoc($eex)) {
        $Id = $data['post_id'];
        echo $title = $data['post_title'];
    }
}
function colink2($comment_post_id)
{
    global $connection;
    $p_query = "SELECT * FROM posts WHERE post_id=$comment_post_id";
    $eex = mysqli_query($connection, $p_query);

    while ($data = mysqli_fetch_assoc($eex)) {
        echo $Id = $data['post_id'];
        $title = $data['post_title'];
    }
}

function delete_category()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = $id";
        $run = mysqli_query($connection, $query);
        header("Location: categories.php");
        if ($run) {
            die("Deleted Category!");
        }
    }
}

function delete_post()
{
    global $connection;
    if (isset($_POST['delete'])) {
        $id = $_POST['post_id'];

        $query = "DELETE FROM posts WHERE post_id = $id";
        $run = mysqli_query($connection, $query);
        header("Location: posts.php");
        if ($run) {
            die("Deleted Category!");
        }
    }
}

function d_comment()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $query = "DELETE FROM comments WHERE comment_id = $id";
        $run = mysqli_query($connection, $query);
        header("Location: comments.php");
        if ($run) {
            die("Deleted comment!");
        }
    }
}

function reject_comment()
{
    global $connection;
    if (isset($_GET['reject'])) {
        $id = $_GET['reject'];

        $query = "UPDATE comments SET comment_status='Rejected!' WHERE comment_id = $id";
        $run = mysqli_query($connection, $query);
        header("Location: comments.php");
        if ($run) {
            die("Rejected");
        }
    }
}

function approve_comment()
{
    global $connection;
    if (isset($_GET['approve'])) {
        $id = $_GET['approve'];

        $query = "UPDATE comments SET comment_status='Approved' WHERE comment_id = $id";
        $run = mysqli_query($connection, $query);
        header("Location: comments.php");
        if ($run) {
            die("Rejected!");
        }
    }
}


function delete_user()
{
    if (isset($_SESSION['userType'])) {
        if ($_SESSION['userType'] == 'admin') {

            global $connection;
            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];

                $query = "DELETE FROM users WHERE user_id = $id";
                $run = mysqli_query($connection, $query);
                header("Location: users.php");
                if ($run) {
                    die("User Deleted!");
                }
            }
        }

    }

}

function makeAdmin()
{
    global $connection;
    if (isset($_GET['makeAdmin'])) {
        $id = $_GET['makeAdmin'];

        $query = "UPDATE users SET userType='admin' WHERE user_id = $id";
        $run = mysqli_query($connection, $query);
        header("Location: users.php");
        if ($run) {
            die("info Changed!");
        }
    }
}

function reset_count()
{
    global $connection;
    if (isset($_GET['resetCount'])) {
        $id = $_GET['resetCount'];

        $query = "UPDATE posts SET post_views=0 WHERE post_id = $id";
        $run = mysqli_query($connection, $query);
        header("Location: posts.php");
        if ($run) {
            die("info Changed!");
        }
    }
}

function makeSub()
{
    global $connection;
    if (isset($_GET['makeSub'])) {
        $id = $_GET['makeSub'];

        $query = "UPDATE users SET userType='Subscriber' WHERE user_id = $id";
        $run = mysqli_query($connection, $query);
        header("Location: users.php");
        if ($run) {
            die("info Changed!");
        }
    }
}


function pagination()
{
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "";
    }

    if ($page == "" || $page == 1) {
        $page_1 = 0;
    } else {
        $page_1 = ($page * 2) - 2;
    }
}


function onlineUsers()
{
    global $connection;
    $session = session_id();
    $time = time();
    $imeOut = 10;
    $time_out = $time - $imeOut;

    $query = "SELECT * FROM users_online WHERE session='$session'";
    $eq = mysqli_query($connection, $query);
    $count = mysqli_num_rows($eq);

    if ($count == NULL) {
        mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session','$time')");

    } else {
        mysqli_query($connection, "UPDATE users_online SET time='$time' WHERE session='$session'");

    }
    $usersOnline = mysqli_query($connection, "SELECT * FROM users_online WHERE time > $time_out");
    return $countUser = mysqli_num_rows($usersOnline);
}

// function onlineUsers(){

//     if(isset($_GET['onlineusers'])){

//     global $connection;
//     if(!$connection){
//         session_start();
//         include("../includes/db.php");

//         $session=session_id();
//         $time=time();
//         $imeOut=10;
//         $time_out=$time-$imeOut;

//         $query="SELECT * FROM users_online WHERE session='$session'";
//         $eq=mysqli_query($connection,$query);
//         $count= mysqli_num_rows($eq);

//         if($count==NULL){
//             mysqli_query($connection,"INSERT INTO users_online(session,time) VALUES('$session','$time')");

//         }else{
//             mysqli_query($connection,"UPDATE users_online SET time='$time' WHERE session='$session'");

//         }
//         $usersOnline=mysqli_query($connection,"SELECT * FROM users_online WHERE time > $time_out");
//         echo $countUser=mysqli_num_rows($usersOnline);

//     }
// }
// }
// onlineUsers();




function is_admin($username)
{
    global $connection;

    $query = "SELECT userType FROM users WHERE username='$username'";
    $run = mysqli_query($connection, $query);
    confirmation($run);

    $data = mysqli_fetch_array($run);

    if ($data['userType'] !== 'admin') {
        return true;
    } else {
        return false;
    }

}


function checkUsername($username)
{

    global $connection;

    $query = "SELECT username FROM users WHERE username='$username'";
    $run = mysqli_query($connection, $query);
    confirmation($run);
    if (mysqli_num_rows($run) > 0) {
        return true;
    } else {
        return false;
    }

}
function checkEmail($email)
{

    global $connection;

    $query = "SELECT user_email FROM users WHERE user_email='$email'";
    $run = mysqli_query($connection, $query);
    confirmation($run);
    if (mysqli_num_rows($run) > 0) {
        return true;
    } else {
        return false;
    }

}

function register($username, $email, $pass)
{
    global $connection;


    if (checkUsername($username)) {
        return $message = 'username already exits!';

    } else if (checkEmail($email)) {
        return $message = 'already registered with this email!' . " " . "<a href='index.php'>login here</a>";
        ;

    } else if (strlen($username) < 4 || strlen($pass) < 4) {
        return $message = "the input should be greater than 4 character!";

    } else {
        if (!empty($username) && !empty($pass) && !empty($email)) {
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username,user_email,password,userType,date) VALUES ('$username','$email','$pass','subscriber',now())";
            $exec = mysqli_query($connection, $query);

            confirmation($exec);

            return $message = "<p style='color:green;'>Regsitration Successful!</p>";
        } else {
            return $message = "<p style='color: red;'>Field can't be empty!</p>";
        }
    }


}


function userlogin($username, $pass)
{

    global $connection;



    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $pass);

    $query = "SELECT * FROM users WHERE username='{$username}'";
    $run = mysqli_query($connection, $query);
    confirmation($run);


    while ($data = mysqli_fetch_array($run)) {

        $id = $data['user_id'];
        $uname = $data['username'];
        $pass = $data['password'];
        $uType = ['userType'];
        $firstName = ['first_name'];
        $lastName = ['last_name'];

    }
    //  $pass = password_verify($password,$pass);

    if ($username === $uname && password_verify($password, $pass)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $uname;
        $_SESSION['password'] = $pass;
        $_SESSION['userType'] = $uType;
        $_SESSION['first_name'] = $firstName;
        $_SESSION['last_name'] = $lastName;

        header("Location: ../admin");
    } else {
        header("Location: ../index.php");
    }

}

function if_method($method=NULL){
    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
        return true;
    }else{return false;}
}

function isLoggedIn(){
    if(isset($_SESSION['userType'])){
        return true;
    }
    return false;
}




function check(){
global $connection;

if(isset($_GET['email']) && isset($_GET['token'])){
    $ctoken=$_GET['token'];
    $cemail=$_GET['email'];
}

$query = "SELECT username, user_email,token FROM users WHERE token='$ctoken'";
$exec = mysqli_query($connection, $query);
confirmation($exec);
while ($data = mysqli_fetch_assoc($exec)) {
    $username = $data['username'];
    $email = $data['user_email'];
    $token = $data['token'];
}
if($cemail !==$email || $ctoken !== $token){
    header("Location: reset.php");
}
else{
    echo "done";
}
}


function  save(){
    global $connection;
    if (isset($_POST['reset'])) {

        $password = trim(mysqli_real_escape_string($connection, $_POST['password']));
        $cpassword = trim(mysqli_real_escape_string($connection, $_POST['cpassword']));
    
        if ($password === $cpassword) {
            echo "Same";
    
        } else {
            return "Password Not match!";
        }
    
    } else {
    
        return "";
    }
}



?>