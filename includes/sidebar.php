<div class="col-md-4">

    <?php

    ?>


    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>


    <!-- Blog Login -->


    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php

                    $query = "SELECT * FROM categories";
                    $execute = mysqli_query($connection, $query);

                    while ($data = mysqli_fetch_assoc($execute)) {
                        $id = $data['cat_id'];


                        echo "<li>" . "<a href='category.php?category=$id'>" . $data['cat_title'] . "</a>" . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include("includes/widget.php"); ?>

</div>