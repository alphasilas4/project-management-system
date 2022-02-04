<?php //ob_start(); ?>
<?php //session_start(); ?>
<?php include_once "../functions/db.php" ;?>
<?php include_once "../functions/function.php"; ?>

 <?php //error_reporting (0);
//if(isset($_SESSION['user_role'])) {
//
//
//
//} else {
//
//header("location: ../index.php");
//
//
//} 
?>

<?php //include_once "./functions.php" ?>


<?php  

if(!isset($_SESSION['user_role'])) {



} else {

header("location: ../index.php");


} 
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Fpb com sci project">
    <title>Project MS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
    <link href="css/style.css" rel="stylesheet">


 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/script.js"></script>



</head>

<body style="background-color: aliceblue;">

    