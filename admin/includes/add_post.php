<?php

if(isset($_POST['create_post'])){
// $post_by = escape($_POST['post_by']);
$post_title = escape($_POST['title']);
 $post_author = escape($_POST['author']);
 $post_publisher = escape($_POST['post_publisher']);
 $post_category_id = escape($_POST['post_category']);
 $post_status = escape($_POST['post_status']);

 $post_image = $_FILES['image']['name'];
 $post_image_temp = $_FILES['image']['tmp_name'];

// $post_pdf = $_FILES['pdf']['name'];
// $post_pdf_temp = $_FILES['pdf']['tmp_name']; 
    include "pdf_upload.php";

 $post_tags = escape($_POST['post_tags']);
 $post_content = escape(strip_tags($_POST['post_content']));
 $post_date = date('d-m-y');

    move_uploaded_file($post_image_temp, "../images/$post_image");
//    move_uploaded_file($post_pdf_temp, "../pdf/$post_pdf");

   $post_by = $_SESSION['username']; 
    
$query = "INSERT INTO posts(post_category_id, post_by, post_title, post_author, post_publisher, post_date,
post_image, post_pdf, post_content,post_tags, post_status)";
$query .= "VALUE({$post_category_id},'{$post_by}','{$post_title}','{$post_author}','{$post_publisher}',now(),
'{$post_image}','{$dest_file}','{$post_content}','{$post_tags}','{$post_status}')";

$create_post_query = mysqli_query($connection,$query);
//$the_post_id = mysqli_insert_id($connection);
  confirmQuery($create_post_query);

    echo "<p class='bg-success'> Post Added. <a href='./posts.php'>View Post</a></p>";
}
 ?>


<form  action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Project Topic</label>
    <input type="text" name="title" class="form-control">
  </div>

  <div class="form-group">
    <label for="category">Project Category / Department</label>
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
    <label for="author">Project Author</label>
    <input type="text" name="author" class="form-control">
  </div>

  <div class="form-group">
        <select class="" name="post_status">
          <option value="draft">Post Status</option>
          <option value="published">Publish</option>
          <option value="draft">Draft</option>

        </select>
  </div>

  <div class="form-group">
    <label for="image">Project Image</label>
    <input type="file" name="image" >
  </div>
    
    <div class="form-group">
    <label for="pdfFile">Project pdf</label>
    <input	type="file" name="pdfFile" /> 
  </div>

  <div class="form-group">
    <label for="post_tags">Project Tags</label>
    <input type="text" name="post_tags" class="form-control">
  </div>

  <div class="form-group">
    <label for="title">project Content</label>
    <textarea type="text" name="post_content" class="form-control" id="" cols="30" rows="10">
    </textarea>
  </div>
    
    <div class="form-group">
    <label for="post_publisher">Project Supervisor</label>
    <input type="text" name="post_publisher" class="form-control">
  </div>

  <div class="form-group">
    <input type="submit" name="create_post" class="btn btn-primary" value="publish Project">
  </div>
</form>
