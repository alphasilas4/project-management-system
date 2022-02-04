<div class="container pt-2"> <div class="row">
    <div class="col-xs-6 pb-3" style="background-color: azure;">
  <div class="quotes">
<h4> A summary on leadership by </h4> <i>-Silas Ogochukwu Ugwu</i> <br/>
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-reponsive-item" src="ebook/summary%20of%20leadership.pdf"></iframe>
      </div>
    <br/> 

</div>

</div>
   <div class="col-xs-6" >
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-reponsive-item" src="ebook/Creating%20a%20blog%20from%20scratch%20with%20PHP%20-%20David%20Carr%20_%20Web%20Developer%20Blog.pdf"></iframe>
      </div>
    </div>

   </div> </div>



<!--
 <img src="urmedia/uricons/app_icons/ycs.png" style="width: 50px; height:50px;">
       <a href="urmedia/softwares/Y%20C%20S.apk">Download</a>
-->
     
 

<table cellspacing="4" width=100%><tr><?php if(!$vol){ ?><td bgcolor="eeeeee" width="50%" valign="top">
<h3 style=" text-shadow:#003">Latest News:</h3>

<?php
$latest=mysql_query("select * from articles ORDER BY id DESC LIMIT 1", $link);
while ($article = mysql_fetch_array($latest)) {
$thevolume= $article['volume'];
$title=     $article['title'];
$author=    $article['author_main'];
$abstract=  $article['abstract'];
$pdf=       $article['pdf'];
$im =       new imagick('pdf');
$im->setImageFormat('jpg');

?>
<a href="<?php echo $pdf; ?> "PDF:  ?php echo "$title - $author"; ?>
<img src="<?php echo $im; ?> " WIDTH="98%" border="1" title="<?php echo "$title - $author"; ?>  " caption="Click here to open PDF"  />
</a>

...................


You must to pass as parameter a path to PDF file, not only the string 'pdf': http://php.net/imagick.construct

If $article['pdf'] contains it you must to use:

$im = new imagick(realpath($pdf) . '[0]');
$im still being a resource that contains a object instance of imagick, and not the image or pdf document itself, so you must to do this to inline image in HTML (if you want to use JPEG, I would use PNG):

<img src="data:image/jpg;base64,<?php
echo base64_encode($im->getImageBlob());
?> " WIDTH="98%" border="1" title="<?php
echo htmlspecialchars("$title - $author");
?>  " caption="Click here to open PDF"  />
Note the usage of htmlspecialchars ( http://php.net/htmlspecialchars ) to output strings to navigator and getImageBlob ( http://php.net/imagick.getimageblob ) to get image data (if available) and finally I will encode it in base64 to inline it in HTML document.

If you want to link to a cached version of image you must to save it in a temporary file or create another PHP script to generate the image from PDF file

    
    
    
    
                     gs -o page-1-of-<?php echo "admin/". $post_pdf;?> -sDEVICE=pdfwrite -dPDFLastPage=1 <?php echo "admin/". $post_pdf;?>

    
    pdftk input.pdf cat 1 output page-1-of-input.pdf
    
    
    
    