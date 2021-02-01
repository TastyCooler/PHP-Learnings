<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php if(isset($_POST['name'])){

$name = $_POST['name'];
echo "Your Name: ".$name."<br>";

$gender = $_POST['gender'];
echo "Your Gender: ".$gender."<br>";

$year = $_POST['year'];
echo "Your Year: ".$year."<br>";

$rv = $_POST['rv'];
echo "Your Review: ".$rv."<br>";

}

 ?>

  </body>
</html>
