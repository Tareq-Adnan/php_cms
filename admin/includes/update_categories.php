
<form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Update Category</label>
                            <?php

                            if (isset($_GET['edit'])) {
                                $id = $_GET['edit'];

                                $query = "SELECT * FROM categories WHERE cat_id = $id";
                                $run = mysqli_query($connection, $query);


                                while ($data = mysqli_fetch_array($run)) {
                                    $catId = $data['cat_id'];
                                    $catTitle = $data['cat_title'];

                                    ?>

                                    <input type="text" class="form-control" value="<?php echo $catTitle ?>" name="cat_title">
                                <?php }
                            }

                            if (isset($_POST['update'])) {

                                $title = $_POST['cat_title'];
                                $query = "UPDATE categories SET cat_title='{$title}' WHERE cat_id={$id}";
                                $run = mysqli_query($connection, $query);
                                header("Location: index.php");
                                if(!$run){
                                    die("failed");
                                }
                                }


                            ?>


                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-primary" value="Update Categories"
                                name="cat_title">
                        </div>
                    </form>