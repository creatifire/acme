<?php
  $true = true;

  if ($true) {
    $title = "This is my title";
    $body = "This is my body text";
  } else {
    $title = "This is my title when true is false.";
    $body = "This is my body when true is false.";
  }

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title><?php echo $title; ?></title>
 </head>
 <body>
   <h1><?php echo $title; ?></h1>
   <p>
     <?php echo $body; ?>
   </p>
 </body>
 </html>
