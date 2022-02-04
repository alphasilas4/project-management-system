<?php //error_reporting (0); ?>

  <?php 

                             if(!is_admin($_SESSION['username'])){

                                 redirect("index.php");
                             } 
//                                else {                       } 
  ?>

<table class="table table-bordered table-hover ">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Role</th>
    </tr>
  </thead>
<tbody>
   <?php
   $query = "SELECT * FROM users";
   $select_users = mysqli_query($connection,$query);

   while($row = mysqli_fetch_assoc($select_users)) {
   $user_id = $row['user_id'];
   $username = $row['username'];
   $user_firstname = $row['user_firstname'];
   $user_lastname = $row['user_lastname'];
   $user_password = $row['user_password'];
   $user_email = $row['user_email'];
   $user_image = $row['user_image'];
   $user_role = $row['user_role'];

echo "<tr>";
echo "<td>{$user_id}</td>";
echo "<td>{$username}</td>";
echo "<td>{$user_firstname}</td>";
echo "<td>{$user_lastname}</td>";
echo "<td>{$user_email}</td>";
echo "<td>$user_role</td>";

// $query = "SELECT * FROM comments WHERE comment_id = {$post_cat_id}";
// $select_comments = mysqli_query($connection,$query);
//
// while($row = mysqli_fetch_assoc($select_comments)) {
// $cat_id = $row['cat_id'];
// $cat_title = $row['cat_title'];
//
// echo "<td>{$cat_title}</td>";
// }

$query = "SELECT * FROM users WHERE user_id = 'username' ";
$select_users_by_id_query = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_users_by_id_query)){
  $user_id = $row['user_id'];
  $username = $row['username'];
}

echo "<td><a class='btn btn-primary' href='users.php?change_to_admin=$user_id'>Admin</a></td>";
echo "<td><a class='btn btn-info' href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";
echo "<td><a class='btn btn-success' href='users.php?source=edit_user&user_id=$user_id'>Edit</a></td>";

echo "<td><a class='btn btn-danger' href='users.php?delete=$user_id'>Delete</a></td>";
     
?> 
    
    
<?php
echo "</tr>";
}
    ?>
   </tbody>
</table>

<?php

if(isset($_GET['change_to_admin'])){

$this_user_id = $_GET['change_to_admin'];

$query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$this_user_id}";
$admin_user_query = mysqli_query($connection,$query);

//refreshing the page
header("location:./users.php");
}


if(isset($_GET['change_to_sub'])){

$this_user_id = $_GET['change_to_sub'];

$query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$this_user_id}";
$subscriber_user_query = mysqli_query($connection,$query);

//refreshing the page
header("location:./users.php");
}




if(isset($_GET['delete'])){
  if(isset($_SESSION['user_role'])){
//   if($_SESSION['user_role'] == 'admin'){

//    $this_user_id =mysqli_real_escape_string($connection, $_POST['user_id']);
     $this_user_id = escape($_GET['delete']);
 
    $query = "DELETE FROM users WHERE user_id = $this_user_id";
    $update_to_delete_status = mysqli_query($connection,$query);
    confirmQuery($update_to_delete_status);
 
//refreshing the page
header("location:./users.php");
//    }
}
}



 

?>
