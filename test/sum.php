<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
if(isset($_POST['num1'],$_POST['num2']) && $_POST['num1'] != null && $_POST['num2'] != null){

      function sum($a, $b){
      $c = $a + $b;

      return $c;
    }

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    $sum = sum($num1,$num2);
    echo "Your Sum: ".$sum;

} else{
  echo "No Number chosen. Please enter a number ";
}
     ?>
  </body>
</html>
