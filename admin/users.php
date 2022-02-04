<?php include "includes/header.php" ?>

  
    <?php 

                             if(!is_admin($_SESSION['username'])){

                                 redirect("index.php");
                             } 
//                                else {                       } 
  ?>


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
                            <small>
                            <?php
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

    case 'add_user':
      // code...
     include "includes/add_user.php";
      break;

      case 'edit_user':
        // code...
        include "includes/edit_user.php";
        break;

  default:
  include "includes/view_all_users.php";
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
