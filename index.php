<!-- db_connection -->
<?php include "functions/db.php";?>
<!-- header -->
<?php include "functions/header.php";?>

    <!-- Navigation -->
<?php include "functions/nav.php";?>

  
  <main id="main">

     <!-- ======= Breadcrumbs ======= -->
    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Modern Project Management System</h1>
            <h2 data-aos="fade-up" data-aos-delay="400">We take care of all the pain of organizing your projects with a fast and better way of storing and retrieving projects</h2>
            <div data-aos="fade-up" data-aos-delay="600">
              <div class="text-center text-lg-start">
                <a href="registration.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Get Started</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/hero-img.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->
  
   


<!-- Page Content -->
     <div class="container">

         <div class="row">

             <!-- Blog Entries Column -->

             <div class="col-md-8">

              <?php
              $per_page = 5;

             if(isset($_GET['page'])) {
             $page = $_GET['page'];
             } else {
                 $page = "";
             }
             if($page == "" || $page == 1) {
                 $page_1 = 0;
             } else {
                 $page_1 = ($page * $per_page) - $per_page;
             }
     if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ) {

         $post_query_count = "SELECT * FROM posts";

     } else {
      // $post_query_count = "SELECT * FROM posts";
     $post_query_count = "SELECT * FROM posts WHERE post_status = 'published'";
//if ($post_status == 'published') {
   }


$find_count = mysqli_query($connection,$post_query_count);
$count = mysqli_num_rows($find_count);

                  if($count < 1) {
                      echo "<h1 class='text-center'>No posts available</h1>";

                  } else {
                  $count = ceil($count / $per_page);

              $query = "SELECT * FROM posts LIMIT $page_1, $per_page";
              $select_all_posts_query = mysqli_query($connection,$query);

              while($row = mysqli_fetch_assoc($select_all_posts_query)) {
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_publisher = $row['post_publisher'];
              $post_content = substr($row['post_content'], 0,100);
              $post_status = $row['post_status'];
              $post_pdf= $row['post_pdf'];
               
                  
              ?>

<?php //if ($post_status == 'published') {
  // code...
?> 

              <!-- First Blog Post -->
              <h2>
                  <a href="post.php?p_id=<?php echo "$post_id"; ?>" style="color:#c6164e;"><?php echo "$post_title"; ?></a>
              </h2>
              <p class="lead">
                by   <?php echo "$post_author"; ?>  
              </p><br/>
              <p>Project Supervisor  <?php echo $post_publisher; ?><span class="glyphicon glyphicon-time"></span>
                  <br/>
                  <?php echo "$post_date"; ?></p>
              <hr>
              <img class="img-responsive" src="images/<?php echo "$post_image"?>" alt="">
            
              <hr>
              <p><?php echo $post_content; ?></p>
              <a style="background-color:#c6164e;" class="btn btn-primary" href="post.php?p_id=<?php echo "$post_id"; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
 <a style="background-color:#c6164e;" class="btn btn-primary" href="post.php?p_id=<?php echo "$post_id"; ?>">Download <span class="glyphicon glyphicon-chevron-down"></span></a>
              <br/>


  <?php } } //}?>
                </div>
 
         </div>
        <!-- /.row -->
</div>
        <hr/>
<center >
      <ul class="pager list-unstyled" >
      <?php
      for($i =1; $i <= $count; $i++){

      if ($i == $page) {
      echo "<li '><a class='active_link' href='index.php?page=$i'>{$i}</a></li>";
      }else {
      echo "<li '><a href='index.php?page=$i'>{$i}</a></li>";

      }
      }

      ?>

      </ul>
</center>    

<section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>How easy it is</h2>
          <p>The process of getting started</p>
        </header>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="fade-up" data-aos-delay="200">
              <img src="assets/img/values-1.png" class="img-fluid" alt="">
              <h3>Do you have a project you want to Upload?</h3>
              <p>The registration process is so easy and painless</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="400">
              <img src="assets/img/values-2.png" class="img-fluid" alt="">
              <h3>Do you have a project you are looking for?</h3>
              <p>You are just one click away from finding it.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="600">
              <img src="assets/img/values-3.png" class="img-fluid" alt="">
              <h3>You see what you want Immediately.</h3>
              <p>You want to search? or upload? It happens Immediately.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

     <!-- Footer -->
 
    <?php include "functions/footer.php";?>
