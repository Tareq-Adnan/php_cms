<?php 

if(isset($_POST['create_post'])){

    $post_title=$_POST['post_title'];
    $post_author=$_POST['post_author'];
    $post_category_id=$_POST['post_category'];
    $post_status=$_POST['post_status'];

    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];

    $post_tags=$_POST['post_tags'];
    $post_content=$_POST['post_content'];
    $post_date=date('d-m-y');
    
    
    move_uploaded_file($post_image_temp,"../images/$post_image");


    $query = "INSERT INTO posts(post_tags,post_status,post_category_id,post_title,post_author,post_date,post_image,post_content) VALUES('$post_tags','$post_status','$post_category_id','$post_title','$post_author',now(),'$post_image','$post_content')";
    $up=mysqli_query($connection,$query);
    

    confirmation($up);
}



?>





<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title">
</div>

<div class="form-group">
    <label for="post_category">Post Category</label><br>
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
    <input type="text" class="form-control" name="post_author">
</div>

<div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status">
</div>

<div class="form-group">
    <label for="post_image">Post image</label>
    <input type="file" class="form-control" name="image">
</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control"  id="" name="post_tags">
</div>

<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea type="text" class="form-control" id="editor" cols="30" rows="10" name="post_content" placeholder="Write Something here..!"></textarea>
</div>

<div class="form-group">
    <input type="submit" style="padding: 5px 50px;" class="btn btn-primary text-center" value="Publish" name="create_post">
</div>




</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
