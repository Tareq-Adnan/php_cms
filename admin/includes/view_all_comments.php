<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comments</th>
            <th>Email</th>
            <th>In Response to</th>
            <th>Status</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Reject</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody>
        <?php

        $query = "SELECT * FROM comments";
        $exe = mysqli_query($connection, $query);

        while ($data = mysqli_fetch_assoc($exe)) {
            $comment_id=$data['comment_id'];
            $comment_post_id = $data['comment_post_id'];


            ?>

            <tr>
                <td>
                    <?php echo $data['comment_id']; ?>
                </td>
                <td>
                    <?php echo $data['comment_author']; ?>
                </td>
                <td>
                    <?php echo $data['comment_content']; ?>
                </td>
                <td>
                    <?php echo $data['comment_email']; ?>
                </td>
                <td><a href="../post.php?p_id=<?php colink2($comment_post_id); ?>">
                        <?php colink($comment_post_id); ?>
                </a></td>


                <td>
                    <?php echo $data['comment_status']; ?>
                </td>
                <td>
                    <?php echo $data['comment_date']; ?>
                </td>
                <td><a href="comments.php?approve=<?php echo $comment_id; ?>" class="btn btn-success">Approve</a></td>
                <td><a onClick="javascript:return confirm('Are you sure want to Reject?');" href="comments.php?reject=<?php echo $comment_id; ?>" class="btn btn-warning">Reject</a></td>
                <td><a onClick="javascript:return confirm('Are you sure want to delete?');" href="comments.php?delete=<?php echo $comment_id; ?>" class="btn btn-warning">DELETE</a></td>

            </tr>
        <?php }
        d_comment();
        reject_comment();
        approve_comment();
        ?>
    </tbody>
</table>