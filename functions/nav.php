 
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <span title="Project Management System">Project MS</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#">About</a></li>
            
            
            
            <?php 
            if(isset($_SESSION['user_role'])): ?>
   <a href="functions/logout.php" class="nav-link scrollto" name="logout">Logout</a>
            
   <?php else:?>         
            
          <li><a class="nav-link scrollto" href="signin.php">Sign In</a></li>
          <li><a class="nav-link scrollto" href="registration.php">Sign Up</a></li>
            
<?php endif; ?>        
        <li><a class="nav-link scrollto" href="admin">Admin/Upload</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

              
 <?php
//      if(isset($_SESSION['user_role'])){
//          
//           if(is_admin($_SESSION['username'])){
//          
//          if(isset($_GET['p_id'])){                            
//     $the_post_id = $_GET['p_id'];
//     
//              echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
//          }
//          }
//
//      }
//      

  ?>
        
    </div>
  </header>