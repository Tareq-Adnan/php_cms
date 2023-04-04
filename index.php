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

            if(isset($_GET['page'])){
                $page=$_GET['page'];
            }else{
                $page="";
            }

            if($page=="" ||$page==1){
                $page_1=0;
            }else{
                $page_1=($page*2)-2;
            }


            $query = "SELECT * FROM posts";
            $execute = mysqli_query($connection, $query);
            $num = mysqli_num_rows($execute);
            $num=floor($num/2);


            $query = "SELECT * FROM posts LIMIT $page_1,2";
            $execute = mysqli_query($connection, $query);

            while ($data = mysqli_fetch_assoc($execute)) {
                $id = $data['post_id'];
                $postTitle = $data['post_title'];
                $postAuthor = $data['post_author'];
                $date = $data['post_date'];
                $content = substr($data['post_content'], 0, 50);

                ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $id ?>"><?php echo $postTitle; ?></a>
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
                <a href="post.php?p_id=<?php echo $id ?>">
                    <img class="img-responsive" src="images/<?php echo $data['post_image']; ?>" alt=""></a>
                <hr>
                <p>
                    <?php echo $content; ?>
                </p>

                <a class="btn btn-primary" href="post.php?p_id=<?php echo $id ?>">Read More <span
                        class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>




            <?php } ?>




        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include("includes/sidebar.php"); ?>

    </div>
    <!-- /.row -->
   
    <ul class="pager">
    <?php
       for($i=1;$i<=$num;$i++){
        ?>
        <li><a href="index.php?page=<?php echo $i?>"><?php echo $i ?></a></li>
       <?php }?>
    </ul>
    <hr>
    <?php include("includes/footer.php") ?>

   