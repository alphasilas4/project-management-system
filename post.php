<!-- db_connection -->
<?php include "functions/db.php";?>
<!-- header -->
<?php include "functions/header.php";?>

    <!-- Navigation -->
<?php include "functions/nav.php";?>

  <!-- ======= Breadcrumbs ======= -->
    <section class="hero">
      <div class="container">
        <div class="row">
          
          <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/hero-img.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
</section>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-10">

              <?php

if(isset($_GET['p_id'])){

  $the_post_id = $_GET['p_id'];
 
$view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id";
$send_query = mysqli_query($connection,$view_query);
  if (!$send_query) {
die("QUERY FAILED");
  }

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                  $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                  $select_all_posts_query = mysqli_query($connection,$query);
             }else {
               $query = "SELECT * FROM posts WHERE post_id = $the_post_id AND post_status = 'published'";
               $select_all_posts_query = mysqli_query($connection,$query);
                           }

     if (mysqli_num_rows($select_all_posts_query) < 1) {
               echo "<h1 class='text-center'>NO Post available</h1>";
     }else {

              $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
              $select_all_posts_query = mysqli_query($connection,$query);

              while($row = mysqli_fetch_assoc($select_all_posts_query)) {
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_pdf = $row['post_pdf'];
              $post_content = $row['post_content'];
              $post_publisher = $row['post_publisher'];
               $post_id = $row['post_id'];    
                  
 
              ?> 

              <!-- First Blog Post -->
               <h2>
                  <a href="post.php?p_id=<?php echo "$post_id"; ?>" style="color:#c6164e;"><?php echo "$post_title"; ?></a>
              </h2>
              <p class="lead">
                by  <?php echo "$post_author"; ?>
              </p><br/>
              <p>Project Supervisor  <?php echo $post_publisher; ?><span class="glyphicon glyphicon-time"></span>
                  <br/>
                  <?php echo "$post_date"; ?></p>
              <hr>
                
                <div class="col-md-6 embed-responsive embed-responsive-16by9 quotes">                      
     <?php 
                   if ( $post_pdf != $post_pdf ) {
                       echo "<iframe class='embed-reponsive-item' src='pdf/adobe.pdf'></iframe>";
                   }else{
                  echo "<iframe class='embed-reponsive-item' src='pdf/$post_pdf'></iframe>";
        
    echo "<div class='col-md-8' style='background-color: aliceblue;'>";
              echo   "<a href='pdf/$post_pdf'>Download Pdf</a></p>";
             
    echo "</div>";  
                echo  "</div>";
                  }
                 
       ?>
              
              <hr/>
 <br/>
        
                <p><?php echo $post_content; ?></p>
             
  <?php
        } }
}
     ?>
<br/><br/>
 
          <hr/>  
                            </div>


    
</div>
</div>
</div> 
        <!-- Footer -->
    <?php include "functions/footer.php";?>
