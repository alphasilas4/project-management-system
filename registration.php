<?php  include "functions/db.php"; ?>
 <?php  include "functions/header.php"; ?>
 <?php  include_once "functions/function.php"; ?>


<?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

      // if (isset($_POST['submit'])) {
        // code...
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

        $error = [

            'username'=>'',
            'email' => '',
            'password'=> ''
        ];

            if(strlen($username) < 4){
              $error['username'] = 'Username needs to be longer';
            }
            if ($username == '') {
              $error['username'] = 'Username cannot be empty';
            }

            if (user_check($username)) {
              $error['username'] = "Username Exists Already";
            }

            if(strlen($email) < 4){
              $error['email'] = 'Email needs to be longer';
            }
            if ($email == '') {
              $error['email'] = 'Email cannot be empty';
            }

            if (email_check($email)) {
                $error['email']  = "Email associated with an existing account, <a href='index.php'>Please login</a>";
            }

            if($password == ''){
              $error['password'] = "Password cannot be empty";
            }



      foreach($error as $key => $value){
          if(empty($value)){
          unset($error[$key]);
          }
      }
        if(empty($error)){
          register_user($username, $email, $password);
          login_user($username,$password);
redirect("admin/index.php");
        }
    }
?>
    <!-- Navigation -->

    <?php  include "functions/nav.php"; ?>


 <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>sign up</li>
        </ol>
        <h2>Sign up</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- Page Content -->
    <div class="container">

        <section class="hero">
      <div class="container">
        <div class="row ">
          
           
                  
        <form class="col-lg-8 col-md-8 mx-auto bg-white p-3 rounded" role="form" action="signin.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
              <input type="text" autocomplete="on" value="<?php echo isset($username)? $username:'' ?>"
               name="username" id="username" class="form-control" placeholder="Enter Desired Username">
 <p><?php echo isset($error['username'])? $error['username']:'' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" autocomplete="on" value="<?php echo isset($email)? $email:'' ?>"
                             name="email" id="email" class="form-control" placeholder="somebody@example.com">
<p><?php echo isset($error['email'])? $error['email']:'' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
<p><?php echo isset($error['password'])? $error['password']:'' ?></p>
                        </div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary glyphicon-log-in" value="Register">
                    </form>
          </div>
    </div> <!-- /.container -->
</section>


        <hr>
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


<?php include "functions/footer.php"; ?>
