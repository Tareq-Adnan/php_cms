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

                <div class="col-xs-6">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add new Category</label>
                            <input type="text" class="form-control" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="insert" class="btn btn-primary" value="Add Categories"
                                name="cat_title">
                        </div>
                    </form>
                    <hr>

                    <?php if (isset($_GET['edit'])) {
                        $id = $_GET['edit'];
                        include("includes/update_categories.php");
                    } ?>


                </div>

                <?php category_table();
                delete_category() ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->