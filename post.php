<?php
include("includes/db.php");
include("includes/header.php");
include("includes/nav.php");
include("admin/includes/functions.php");

?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
            if (isset($_GET['p_id'])) {
                $id = $_GET['p_id'];

                $qu = "UPDATE posts SET post_views=post_views+1 WHERE post_id=$id";
                $e = mysqli_query($connection, $qu);

                $query = "SELECT * FROM posts WHERE post_id=$id";
                $execute = mysqli_query($connection, $query);

                while ($data = mysqli_fetch_assoc($execute)) {

                    $postTitle = $data['post_title'];
                    $postAuthor = $data['post_author'];
                    $date = $data['post_date'];
                    $content = $data['post_content'];
                    $post_Image = $data['post_image'];

                    ?>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#">
                            <?php echo $postTitle; ?>
                        </a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php">
                            <?php echo $postAuthor; ?>
                        </a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on
                        <?php echo $date; ?>
                    </p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $data['post_image']; ?>" alt="">
                    <hr>
                    <p>
                        <?php echo $data['post_content']; ?>
                    </p>

                    <hr>




                <?php }
            } else {
                header("Location: index.php");
            }

            ?>

            <!-- Blog Comments -->

            <?php

            if (isset($_POST['create_comment'])) {
                $id = $_GET['p_id'];
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $commnet_content = $_POST['comment_content'];

                if (empty($comment_author) && empty($comment_email) && empty($comment_content)) {
                    echo "<p style='color:red;'>Field Can't be empty</p>";

                } else {
                    
                    $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES($id,'$comment_author','$comment_email','$commnet_content','pending',now())";
                    $up = mysqli_query($connection, $query);

                    confirmation($up);


                    $CommentNumber = "UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id=$id";
                    $updateCommnetCount = mysqli_query($connection, $CommentNumber);

                    confirmation($updateCommnetCount);
                }




            }
            ?>




            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>

                <form action="" method="post" role="form">

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" name="comment_author">
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="comment_email">
                    </div>

                    <div class="form-group">
                        <textarea name="comment_content" class="form-control" rows="3"></textarea>
                    </div>
                    <button name="create_comment" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->


            <?php

            $query = "SELECT * FROM comments WHERE comment_post_id=$id AND comment_status='Approved' ORDER BY comment_id DESC";
            $run = mysqli_query($connection, $query);

            confirmation($run);

            while ($data = mysqli_fetch_assoc($run)) {

                $commentDate = $data['comment_date'];
                $comment_content = $data['comment_content'];
                $comment_author = $data['comment_author'];
                ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <?php echo $comment_author; ?>
                            <small>
                                <?php echo $commentDate; ?>
                            </small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>



            <?php }


            ?>










        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include("includes/sidebar.php"); ?>

    </div>
    <!-- /.row -->

    <hr>
    <?php include("includes/footer.php") ?>