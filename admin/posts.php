<?php include("includes/header.php");

?>

<div id="wrapper">
    <?php include("includes/nav.php");
    ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <?php insert_category(); ?>

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to Admin Panel
                        <small>Author</small>
                    </h1>

                    <?php


                    if(isset($_GET['source'])){
                        $source=$_GET['source'];
                    }
                    else{
                        $source="";
                    }

                    switch($source){
                        case "add_post":
                            include("includes/add_post.php");
                            break;

                        case "edit_post":
                                include("includes/edit_post.php");
                                break;

                            default:
                            include("includes/view_all_posts.php");
                            break;
                    }
                    ?>




                </div>
                <!-- /#wrapper -->

                <!-- jQuery -->
                <script src="js/jquery.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="js/bootstrap.min.js"></script>

                </body>

                </html>