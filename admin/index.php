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
                        <small>
                            <?php echo $_SESSION['username']; ?>
                        </small>
                    </h1>
                </div>







                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php

                                        $query = "SELECT * FROM posts";
                                        $run = mysqli_query($connection, $query);

                                        $numberOfPosts = mysqli_num_rows($run);

                                        echo "<div class='huge'>" . $numberOfPosts . "</div>"
                                            ?>



                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php

                                        $query = "SELECT * FROM comments";
                                        $run = mysqli_query($connection, $query);

                                        $numberOfcomment = mysqli_num_rows($run);

                                        echo "<div class='huge'>" . $numberOfcomment . "</div>"
                                            ?>


                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php

                                        $query = "SELECT * FROM users";
                                        $run = mysqli_query($connection, $query);

                                        $numberOfusers = mysqli_num_rows($run);

                                        echo "<div class='huge'>" . $numberOfusers . "</div>"
                                            ?>

                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php

                                        $query = "SELECT * FROM categories";
                                        $run = mysqli_query($connection, $query);

                                        $numberOfcat = mysqli_num_rows($run);

                                        echo "<div class='huge'>" . $numberOfcat . "</div>"
                                            ?>

                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <script type="text/javascript">
                        google.charts.load('current', { 'packages': ['bar'] });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],
                                ['posts', <?php echo $numberOfPosts?>],
                                ['Comments', <?php echo $numberOfcomment?>],
                                ['Users', <?php echo $numberOfusers?>],
                                ['Categories', <?php echo $numberOfcat?>],
                              
                            ]);

                            var options = {
                                
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>
                  
                </div>
                <div id="columnchart_material" style="width: 100%; height: 500px;"></div>








                <script src="js/jquery.js"></script>
                <script src="js/bootstrap.min.js"></script>

                </body>

                </html>