 
<?php include_once "../functions/db.php" ;?>
<?php include_once "../functions/function.php"; ?>

 <?php include "includes/header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
            <small> <?php 
                if(isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                            }
           ?>
                            </small>
                        </h1>
                        <!--Posts table-->
<?php
if(isset($_GET['source'])){

  $source = $_GET['source'];
}else {
  $source = '';
}

switch ($source) {

    case 'add_post':
      // code...
     include "includes/add_post.php";
      break;
        
         case 'users_posts':
      // code...
     include "includes/users_posts.php";
      break;

      case 'edit_post':
        // code...
        include "includes/edit_post.php";
        break;

  default:
  include "includes/view_all_post.php";
    break;
}

 ?>




   </div>
                <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

                </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php" ?>
