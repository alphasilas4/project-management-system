<?php include "includes/header.php" ?>
<?php //error_reporting (0); ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php" ?>


          <?php 

                             if(!is_admin($_SESSION['username'])){

                                 redirect("index.php");
                             } 
//                                else {                       } 
  ?>

        
  
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?></small>
                        </h1>
                        <!--Add category Form-->
<div class="col-xs-6">

<?php insert_category(); ?>

<form action="" method="post">
<div class="form-group">
<label for="cat_title"> Add category</label>
<input type="text" class="form-control" name="cat_title">
</div>
<div class="form-group">
<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
</div>

</form>
              <?php  ///including update of category
              if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];

                include "includes/Update_category.php";
              }
               ?>
    </div>  <!--End Add category Form-->

    <div class="col-xs-6"><!--Displaying categories -->

    <table class="table table-bordered table-hover ">
    <thead>
    <tr>
    <th>Id</th>
    <th>Category Title</th>
    </tr>
    </thead>
    <tbody>

<?php findAllCategories(); ?>
<?php deleteCategories(); ?>

      </tbody>
    </table>
  </div><!--End Displaying categories -->
                </div>
                <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

                </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php" ?>
