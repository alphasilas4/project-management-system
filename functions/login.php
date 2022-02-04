<?php session_start(); ?>
<?php include_once "db.php"; ?>
<?php include_once "function.php"; ?>

<?php

if(isset($_POST['login'])) {


	login_user($_POST['username'],$_POST['password']);

       redirect("../admin/posts.php?source=add_post");


}





?>
