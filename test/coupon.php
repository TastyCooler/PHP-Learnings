<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    if(isset($_GET['cp'])){

    $code = $_GET['cp'];

    if($code == "30%"){
      echo "Your 30% Coupon:".rand();
    } else if($code == "40%"){
      echo "Your 40% Coupon:".rand();
      }
    }
     ?>

  </body>
</html>
