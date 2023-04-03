<?php

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
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

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


?>