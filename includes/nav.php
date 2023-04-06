<!-- Navigation -->
<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index">The Bloogers</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php

               

                if($_SESSION['username'] !== NULL){
                    $msg=" Logout";
                    $value="includes/logout.php";
                    $admin='Admin';
                    $reg='';

                }else{
                    $msg="Login";
                    $value="./login.php";
                    $admin=NULL;
                    $link="registration";
                    $reg="Registration";
                 

                }

                $query = "SELECT * FROM categories";
                $execute = mysqli_query($connection, $query);

                while ($data = mysqli_fetch_assoc($execute)) {
                    $title = $data['cat_title'];
                    $id = $data['cat_id'];

                    $cat = '';
                    $r_class = '';
                    $regName = 'registration.php';

                    $pageName = basename($_SERVER['PHP_SELF']);

                    if (isset($_GET['category']) && $_GET['category'] == $id) {

                        $cat = 'active';

                    } else if ($pageName == $regName) {
                        $r_class = 'active';
                    }
                    echo "<li class='$cat'><a href='category.php?category=$id'>$title</a></li>";
                }


                
                ?>
                
                
                <li class="navbar-right"><a href="admin"><?php echo $admin?></a></li>
                <li class="<?php echo $r_class; ?>"><a href="<?php echo $link ?>"><?php echo $reg?></a></li>
                <li><a href="contact">Contact</a></li>
                <li class="navbar-right"><a href="<?php echo $value ?>"><?php echo $msg ?></a></li>
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>