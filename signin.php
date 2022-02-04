<?php  include "functions/db.php"; ?>
 <?php  include "functions/header.php"; ?>
 <?php  include_once "functions/function.php";
 
?>
    <!-- Navigation -->
<?php  include "functions/nav.php"; ?>
  <main id="main">
  <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>sign in</li>
        </ol>
        <h2>Sign In</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="hero">
      <div class="container">
        <div class="row ">
      
<?php if(isset($_SESSION['user_role'])): ?>
<h4><b>Logged in as <small><?php echo $_SESSION['username']; ?></small></b></h4>
  <a href="functions/logout.php" class="btn btn-danger" name="logout">
<span class="glyphicon-log-out">Logout</span>
</a>
<?php else:?> 
            
  <form class="col-lg-6 col-md-6 p-3 mx-auto bg-white rounded" action="functions/login.php" method="post">
        <div class="form-group mb-3">
            <input name="username" type="text" class="form-control" placeholder="Enter Username">
        </div>

          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Enter Password">
            <span class="input-group-btn">
               <button class="btn btn-primary glyphicon-log-in" name="login" type="submit">Login</button>
            </span>

        </div>
    </form>
<?php //endif; ?>

        <!-- /.input-group -->
    </div>
        </div>
      </section>
        <hr/>
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

<?php include "functions/footer.php"; ?>
<?php endif; ?>