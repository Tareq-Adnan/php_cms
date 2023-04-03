<?php
include("includes/db.php");
include("includes/header.php");
include("includes/nav.php");

?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if(isset($_GET['category'])){
                $c_id=$_GET['category'];
            }

            $query = "SELECT * FROM posts WHERE post_category_id=$c_id";
            $execute = mysqli_query($connection, $query);

            while ($data = mysqli_fetch_assoc($execute)) {
                $id=$data['post_id'];
                $postTitle =$data['post_title'];
                $postAuthor=$data['post_author'];
                $date=$data['post_date'];

                ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $id ?>"><?php echo $postTitle; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $postAuthor;  ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $data['post_image']; ?>" alt="">
                <hr>
                <p><?php echo $data['post_content']; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>




            <?php } ?>




        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include("includes/sidebar.php"); ?>

    </div>
    <!-- /.row -->

    <hr>
    <?php include("includes/footer.php") ?>