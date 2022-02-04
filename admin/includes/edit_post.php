<?php

  if(isset($_GET['p_id'])){

    $the_get_post_id = $_GET['p_id'];

$query = "SELECT * FROM posts WHERE post_id = $the_get_post_id";
$select_posts_by_id = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts_by_id)) {
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_cat_id = $row['post_category_id'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$dest_file = $row['post_pdf'];
$post_tags = $row['post_tags'];
$post_comment_count = $row['post_comment_count'];
$post_date = $row['post_date'];
$post_content = $row['post_content'];
$post_publisher = $row['post_publisher'];
}
}
    if(isset($_POST['update_post'])){

      $post_title = escape($_POST['title']);
      $post_author = escape($_POST['author']);
      $post_publisher = escape($_POST['post_publisher']);
      $post_category = escape($_POST['post_category']);
      $post_status = escape($_POST['post_status']);
      $post_image = $_FILES['image']['name'];
      $post_image_temp = $_FILES['image']['tmp_name']; 
      $post_tags = escape($_POST['post_tags']);
      $post_content = escape(strip_tags($_POST['post_content']));
            include "pdf_upload.php";
     


  move_uploaded_file($post_image_temp, "../images/$post_image");
         
    //retaining the image of the post
          if(empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = $the_get_post_id ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_image)) {
            $post_image = $row['post_image'];
          }
        } 
       
              
        

              $query = "UPDATE posts SET ";
              $query .="post_title = '{$post_title}', ";
              $query .="post_category_id = '{$post_category}', ";
              $query .="post_date = 'now()', ";
              $query .="post_author = '{$post_author}', ";
              $query .="post_publisher = '{$post_publisher}', ";
              $query .="post_status = '{$post_status}', ";
              $query .="post_tags = '{$post_tags}', ";
              $query .="post_content = '{$post_content}', ";
              $query .="post_pdf = '{$dest_file}', ";
              $query .="post_image = '{$post_image}' ";
              $query .="WHERE post_id = {$post_id}";

                $update_query = mysqli_query($connection,$query);

                confirmQuery($update_query);

                echo "<p class='bg-success'> Post Updated. <a href='./posts.php'>View Post</a></p>";
    }

 ?>

<form  action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Post Title</label>
    <input value='<?php echo $post_title; ?>' type="text" name="title" class="form-control">
  </div>

  <div class="form-group">
    <label for="title">Post Category Id</label>
    <select name="post_category" id="">
      <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection,$query);

          confirmQuery($select_categories);

            while($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

    echo "<option value='$cat_id'>$cat_title</option>";
  }
       ?>
     </select>
  </div>

  <div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" name="author" class="form-control" value='<?php echo $post_author; ?>'>
  </div>

<div class="form-group">
<select name="post_status" id="">
<?php
echo "<option value='$post_status'>$post_status</option>";


    if ($post_status == 'published'){
  echo "<option value='draft'>Draft</option>";
}else {
 echo "<option value='published'>Publish</option>";
 }

 ?>

</select>
</div>

  <div class="form-group">
    <label for="title">Post Image</label>
<img width="100" src="../images/<?php echo $post_image; ?>" alt="image">
<input type="file" name="image" >
  </div>

     <div class="form-group">
    <label for="pdfFile">Post pdf</label>
    <input	type="file" name="pdfFile" src=".../<?php echo $dest_file; ?>" /> 
  </div>

  <div class="form-group">
    <label for="title">Post Tags</label>
    <input value='<?php echo $post_tags; ?>' type="text" name="post_tags" class="form-control">
  </div>

  <div class="form-group">
    <label for="title">Post Content</label>
    <textarea type="text" name="post_content" class="form-control" id="" cols="30" rows="10">
  <?php echo str_replace('\r\n', '</br>', $post_content); ?>  </textarea>
  </div>

    <div class="form-group">
    <label for="post_publisher">Post Publisher</label>
    <input type="text" name="post_publisher" class="form-control" value='<?php echo $post_publisher; ?>' />
  </div>
    
  <div class="form-group">
    <input type="submit" name="update_post" class="btn btn-primary" value="Update post">
  </div>
</form>
