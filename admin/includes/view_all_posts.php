<?php 

if(isset($_POST["checkBox"])){

  foreach($_POST['checkbox'] as $cb){
    echo $bulkOp=$_POST['bulkOptions'];

  }

}

?>








<form action="" method="post">
<table class="table table-bordered table-hover">

    <div id="bulkOptionsContainer" class="col-xs-4">
        <select class="form-control" name="bulkOptions" id="">

        <option value="">Select Options</option>
        <option value="Published">Published</option>
        <option value="Draft">Draft</option>
        <option value="Delete">Delete</option>

        </select>
      
    </div>
    <div class="col-xs-4 mt-10">
    <input type="submit" name="submit" value="Apply" class="btn btn-success">
    <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
    </div>


                        <thead>
                            <tr>
                                <th><input id="selectAllBoxes" type="checkbox" name=""></th>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>View Post</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM posts";
                            $exe = mysqli_query($connection, $query);
                            while ($data = mysqli_fetch_assoc($exe)) {?>
                            <tr>
                            <td><input class="form-check" type="checkbox" name="checkBox[]" value="<?php echo $data['post_id']; ?>"></td>
                            <td><?php echo $data['post_id']; ?></td>
                            <td><?php echo $data['post_author']; ?></td>
                            <td><?php echo $data['post_title']; ?></td>
                            <td><?php echo $data['post_content']; ?></td>
                            <td><?php echo $data['post_category_id']; ?></td>
                            <td><?php echo $data['post_status']; ?></td>
                            <td><img class="img-responsive" src="../images/<?php echo $data['post_image']; ?>"></td>
                            <td><?php echo $data['post_tags']; ?></td>
                            <td><?php echo $data['post_comment_count']; ?></td>
                            <td><?php echo $data['post_date']; ?></td>
                            <td><a href="../post.php?p_id=<?php echo $data['post_id']; ?>">View Post</a></td>
                            <td><a onClick="javascript:return confirm('Are you sure want to delete?');" href="posts.php?delete=<?php echo $data['post_id']; ?>" class="btn btn-warning">DELETE</a></td>
                            <td><a onClick="javascript:return confirm('Are you sure want to Edit?');"  href="posts.php?source=edit_post&p_id=<?php echo $data['post_id']; ?>" class="btn btn-success">EDIT</a></td>
                            </tr>
                            <?php }
                            delete_post();
                            ?>
                        </tbody>
                    </table>
                    </form>
                    