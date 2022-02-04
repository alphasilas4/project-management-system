  <?php 

                             if(!is_admin($_SESSION['username'])){

                                 redirect("index.php");
                             } 
//                                else {                       } 
  ?>




<?php

if(isset($_GET['user_id'])){
  $the_user_id = $_GET['user_id'];

  $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
  $select_users_query = mysqli_query($connection,$query);
  while($row = mysqli_fetch_assoc($select_users_query)) {

 $user_id = $row['user_id'];
  $username = $row['username'];
  $user_firstname = $row['user_firstname'];
  $user_lastname = $row['user_lastname'];
  $user_password = $row['user_password'];
  $user_email = $row['user_email'];
  //$user_image = $row['user_image'];
  $user_role = $row['user_role'];

}

if(isset($_POST['edit_user'])){

  $user_firstname = escape($_POST['user_firstname']);
  $user_lastname = escape($_POST['user_lastname']);
  $user_role = escape($_POST['user_role']);
  $username = escape($_POST['username']);
  $user_email = escape($_POST['user_email']);
  $user_password = escape($_POST['user_password']);

  // $post_image = $_FILES['image']['name'];
  // $post_image_temp = $_FILES['image']['tmp_name'];
// move_uploaded_file($post_image_temp, "../images/$post_image");
//
// //retaining the image of the post
//       if(empty($post_image)){
//         $query = "SELECT * FROM posts WHERE post_id $the_get_post_id ";
//         $select_image = mysqli_query($connection,$query);
//
//         while($row = mysqli_fetch_assoc($select_image)) {
//         $post_image = $row['post_image'];
//       }
//     }
//
// $query = "SELECT randsalt FROM users";
// $select_randsalt_query = mysqli_query($connection,$query);
// if (!$select_randsalt_query) {
// die("QUERY FAILED" . mysqli_error($connection));
//}

      // $row = mysqli_fetch_array($select_randsalt_query) ;
      // $salt = $row['randsalt'];
      // //ecrypting password
      // //$hashed_password = crypt($user_password, $salt);
      // $hashed_password  = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 10));
if (!empty($user_password)) {

      $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
      $get_user_query = mysqli_query($connection,$query_password);
        confirmQuery($get_user_query);
      $row = mysqli_fetch_array($get_user_query);

      $db_user_password = $row['user_password'];

        if ($db_user_password != $user_password) {
             $hashed_password  = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 10));


      $query = "UPDATE users SET ";
      $query .="user_firstname = '{$user_firstname}', ";
      $query .="user_lastname = '{$user_lastname}', ";
      $query .="user_role = '{$user_role}', ";
      $query .="username = '{$username}', ";
      $query .="user_email = '{$user_email}', ";
      $query .="user_password = '{$hashed_password}' ";
      $query .="WHERE user_id ={$the_user_id}";

        $edit_user_query = mysqli_query($connection,$query);
        confirmQuery($edit_user_query);

        echo "<p class='bg-success'> user detail Updated. <a href='./users.php'>View user</a></p>";

  }
}
  }

}else {
        header("Location: index.php");

}
 ?>


<form  action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="username">Firstname</label>
    <input type="text" value='<?php echo $user_firstname; ?>' name="user_firstname" class="form-control">
  </div>

  <div class="form-group">
    <label for="username">Lastname</label>
    <input type="text" value='<?php echo $user_lastname; ?>' name="user_lastname" class="form-control">
  </div>


  <div class="form-group">
    <label for="username">Role</label>
    <select name="user_role" id="">
      <option value='<?php echo $user_role; ?>' ><?php echo $user_role; ?></option>
      <?php
if($user_role == 'admin'){
echo "<option value='subscriber'>subscriber</option>";

}else{
  echo "<option value='admin'>admin</option>";
}
       ?>
      </select>
  </div>


  <!-- <div class="form-group">
    <label for="title">Post Image</label>
    <input type="file" name="image" >
  </div> -->

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text"  name="username" class="form-control" value='<?php echo $username; ?>'>
  </div>

  <div class="form-group">
    <label for="username">Email</label>
  <input type="email" name="user_email" class="form-control" value='<?php echo $user_email; ?>'>
  </div>

  <div class="form-group">
    <label for="username">Password</label>
  <input type="password" value='<?php echo $user_password; ?>' name="user_password" class="form-control">
  </div>

  <div class="form-group">
    <input type="submit" name="edit_user" class="btn btn-primary" value="Update User">
  </div>
</form>
