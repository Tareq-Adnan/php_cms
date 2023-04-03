<?php 

if(isset($_GET['p_id'])){

     $id=$_GET['p_id'];
}
     $query = "SELECT * FROM posts WHERE post_id=$id";
     $up=mysqli_query($connection,$query);

     while($POST=mysqli_fetch_assoc($up)){
        $post_title=$POST['post_title'];
        $post_author=$POST['post_author'];
        $post_category_id=$POST['post_category_id'];
        $post_status=$POST['post_status'];
    
        $post_image=$POST['post_image'];
    
        $post_tags=$POST['post_tags'];
        $post_content=$POST['post_content'];
        $post_date=$POST['post_date'];
        $post_comment_count= $POST['post_comment_count'];

     }

if(isset($_POST['update_post'])){

    $post_title=$_POST['post_title'];
    $post_author=$_POST['post_author'];
    $post_category_id=$_POST['post_category'];
    $post_status=$_POST['post_status'];

    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];

    $post_tags=$_POST['post_tags'];
    $post_content=$_POST['post_content'];
    $post_date=date('d-m-y');
    $post_comment_count= 4;
    
    move_uploaded_file($post_image_temp,"../images/$post_image");

    if(empty($post_image)){
        
        $query="SELECT * FROM posts WHERE post_id=$id";
        $e=mysqli_query($connection,$query);

        while($data=mysqli_fetch_assoc($e)){
            $post_image=$data['post_image'];
        }
    }

    $query = "UPDATE posts SET post_tags='$post_tags',post_comment_count=$post_comment_count,post_status='$post_status',post_category_id='$post_category_id',post_title='$post_title',post_author='$post_author',post_date=now(),post_image='$post_image',post_content='$post_content' WHERE post_id=$id";
    $up=mysqli_query($connection,$query);


    confirmation($up);
    header("Location: posts.php");
}

?>





<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
</div>

<div class="form-group">
    <label for="post_category">Post Category Id</label><br>
    <select style="padding: 10px" name="post_category" id="">
  
  <?php 

    $query="SELECT * FROM categories";
    $exec=mysqli_query($connection,$query);

    confirmation($exec);
    while($data=mysqli_fetch_assoc($exec)){
        $id=$data['cat_id'];
        $title=$data['cat_title'];

        echo "<option  value='$id'>$title</opiton>";
    }

    
    ?>

    </select>
</div>

<div class="form-group">
    <label for="post_author">Post Author</label>
    <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
</div>

<div class="form-group">
    <label for="post_status">Post Status</label><br>
    <select name="post_status" id="" style="padding: 10px">
        <option value="<?php echo $post_status; ?>" ><?php echo $post_status?></option>
        <option value="Published">Published</option>
        <option value="Draft">Draft</option>
    </select>
</div>

<div class="form-group">
    <label for="post_image">Post image</label><br>
    <img src="../images/<?php echo $post_image; ?>" name="post_image" ><br>
    <input type="file" class="form-control" name="image">


</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea type="text" class="form-control" id="editor" cols="30" rows="10" name="post_content" placeholder="Write Something here..!"><?php echo $post_content; ?></textarea>
</div>

<div class="form-group">
    <input type="submit" style="padding: 5px 50px;" class="btn btn-primary" value="Update" name="update_post">
</div>




</form>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
