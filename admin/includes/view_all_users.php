<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>User Id</th>
            <th>Username</th>
            <th>password</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>User Type</th>
            <th>Date</th>
            <th>Admin</th>
            <th>Subscriber</th>
            <th>Edit</th>
            <th>Delete</th>
            

        </tr>
    </thead>
    <tbody>
        <?php

        $query = "SELECT * FROM users";
        $exe = mysqli_query($connection, $query);

        while ($data = mysqli_fetch_assoc($exe)) {
            $user_id=$data['user_id'];
            $userType = $data['userType'];


            ?>

            <tr>
                <td>
                    <?php echo $data['user_id']; ?>
                </td>
                <td>
                    <?php echo $data['username']; ?>
                </td>
                <td>
                    <?php echo substr($data['password'],0,20); ?>
                </td>
                <td>
                    <?php echo $data['first_name']; ?>
                </td>
                <td>
                <?php echo $data['last_name']; ?>
                </td>
                <td>
                    <?php echo $data['user_email']; ?>
                </td>
                <td>
                    <?php echo substr($data['user_image'],0,10); ?>
                </td>
                <td>
                    <?php echo $data['userType']; ?>
                </td>
                <td>
                    <?php echo $data['date']; ?>
                </td>

                <td><a href="users.php?makeAdmin=<?php echo $user_id; ?>">Make Admin</a></td>
                <td><a href="users.php?makeSub=<?php echo $user_id; ?>">Make Subscriber</a></td>
                <td><a href="users.php?source=editUser&u_id=<?php echo $user_id; ?>" >EDIT</a></td>
                <td><a onClick="javascript:return confirm('Are you sure want to delete?');" href="users.php?delete=<?php echo $user_id; ?>">DELETE</a></td>

            </tr>
        <?php }
        delete_user();
        makeAdmin();
        makeSub();
       
        ?>
    </tbody>
</table>