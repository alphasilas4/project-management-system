<?php
    

  if(isset($_POST['checkBoxArray'])){

foreach ($_POST['checkBoxArray'] as $postValueId) {
  // code...
  $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
              case 'published':
                $query = "UPDATE posts set post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";

                    $update_to_published_status = mysqli_query($connection,$query);
                    confirmQuery($update_to_published_status);
                break;

                case 'draft':
                  $query = "UPDATE posts set post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";

                      $update_to_draft_status = mysqli_query($connection,$query);
                      confirmQuery($update_to_draft_status);
                  break;

                  case 'delete':
                  $query = "DELETE FROM posts WHERE post_id = {$postValueId}";

                        $update_to_delete_status = mysqli_query($connection,$query);
                        confirmQuery($update_to_delete_status);
                    break;

                  case 'clone':

                  $query = "SELECT * FROM posts WHERE post_id = $postValueId";
                  $select_posts_query = mysqli_query($connection,$query);

                  while ($row = mysqli_fetch_array($select_posts_query)) {
//                    $post_by = $row['post_by'];
                      $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                  //  $post_image_temp = $_FILES['image']['tmp_name'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];
                        $post_by = $_SESSION['username'];

                    $query = "INSERT INTO posts(post_category_id, post_by, post_title, post_author, post_date,
                    post_image, post_content,post_tags, post_status)";
                    $query .= "VALUE({$post_category_id}, '{$post_by}','{$post_title}','{$post_author}',now(),
                    '{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

                    $create_post_query = mysqli_query($connection,$query);
                       confirmQuery($create_post_query);

                  }

                    break;

            }

}

   }

 ?>


<form class="" action="" method="post">


<table class="table table-bordered table-hover ">

<div id="bulkOptionsContainer" class="col-xs-4">

  <select class="form-control" name="bulk_options">
    <option value="">select Options</option>
    <option value="published">Publish</option>
    <option value="draft">Draft</option>
    <option value="delete">Delete</option>
    <option value="clone">Clone</option>
  </select>

</div>
  <div class="col-xs-4">
    <input type="submit" name="submit" value="Apply" class="btn btn-success">
    <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
  </div>
<br/><hr/>

  <thead>
    <tr>
      <th><input type="checkbox" name="" id="selectAllBoxes">  </th>
      <th>Id</th>
      <th>Supervisor</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>status</th>
      <th>Image</th>
      <th>Pdf</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>
      <th>Post Page</th>
      <th>Edit</th>
      <th>Delete</th>
      <th>Post Views</th>
    </tr>
  </thead>
  <tbody>
   <?php
      
      $post_by = $_SESSION['username'];
      
   $query = "SELECT * FROM posts WHERE post_by = '{$post_by}' ORDER BY post_id DESC";
   $select_posts = mysqli_query($connection,$query);

   while($row = mysqli_fetch_assoc($select_posts)) {
   $post_id = $row['post_id'];
   $post_by = $row['post_by'];
   $post_author = $row['post_author'];
   $post_publisher = $row['post_publisher'];
   $post_title = $row['post_title'];
   $post_cat_id = $row['post_category_id'];
   $post_status = $row['post_status'];
   $post_image = $row['post_image'];
   $post_pdf = $row['post_pdf'];
   $post_tags = $row['post_tags'];
   $post_comment_count = $row['post_comment_count'];
   $post_date = $row['post_date'];
   $post_views_count = $row['post_views_count'];
//       $post_by = $_SESSION['username'];

echo "<tr>";
?>
<td>
 <input type='checkbox' class="checkBoxes" id='selectAllBoxes' name="checkBoxArray[]" value="<?php echo $post_id;?>">
</td>
 <?php
echo "<td>{$post_id}</td>";
echo "<td>{$post_publisher}</td>";
echo "<td>{$post_author}</td>";
echo "<td>{$post_title}</td>";

$query = "SELECT * FROM categories WHERE cat_id = {$post_cat_id}";
$select_categories_id = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_categories_id)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo "<td>{$cat_title}</td>";
}
echo "<td>{$post_status}</td>";
echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
echo "<td><img width='30' src='../img/adobe.png' alt='Pdf file'></td>";
echo "<td>{$post_tags}</td>";

$query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
$send_comment_query = mysqli_query($connection,$query);

$row = mysqli_fetch_array($send_comment_query);
$comment_id = $row['comment_id'];
$count_comments = mysqli_num_rows($send_comment_query);

echo "<td><a class='btn btn-primary' href='post_comments.php?id=$post_id'>[{$count_comments}] commented</a></td>";


echo "<td>{$post_date}</td>";
echo "<td><a class='btn btn-primary' href='../post.php?p_id={$post_id}'>View Post</a></td>";
echo "<td><a class='btn btn-info'  href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";

?>
<form method="post">
<input type="hidden" name="post_id" value="<?php echo $post_id ?>">

<?php echo '<td><input class="btn btn-danger" type="submit" name="delete" Value="Delete"></td>';
 ?>
</form>
<?php

//echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";

echo "<td><a class='btn btn-success' href='posts.php?reset={$post_id}'><b>{$post_views_count}</b><small> Views__</small><i>Click to Reset</i></a></td>";

echo "</tr>";

}
    ?>


   </tbody>
</table>

</form>
<?php

if(isset($_POST['delete'])){

$the_post_id = escape($_POST['post_id']);

$query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
$delete_query = mysqli_query($connection,$query);

//refreshing the page
header("location:./posts.php");

}

if(isset($_GET['reset'])){

$the_post_id = $_GET['reset'];

$query = "UPDATE  posts SET post_views_count = 0 WHERE post_id =" . mysqli_real_escape_string($connection, $_GET['reset']) ." ";
$reset_query = mysqli_query($connection,$query);

//refreshing the page
header("location:./posts.php");

}
 ?>
