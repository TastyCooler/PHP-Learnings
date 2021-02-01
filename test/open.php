<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    // Name
    if(isset($_POST['name'])){

    $name = $_POST['name'];
    echo "Your Name is: ".$name;

    }
    // Password
    if(isset($_POST['pass'])){

      $pass = $_POST['pass'];

      if($pass == "dream"){

        echo "<b> <font color='green'> Your Password is Right! </font> </b>";
      }
      else{

        echo"<b> <font color='red'> Your Password is Wrong!</font> </b>";
      }

    }

// NUR ZAHLEN!

if(isset($_POST['num1']) && $_POST['num1'] != null){

function square($s){
  $s = $s * $s;
  return $s;
}

$num1 = $_POST['num1'];
$sq = square($num1);
echo "Your Square: ".$sq;

} else {
  echo "No Number chosen. Please enter a number ";
}
     ?>

  </body>
</html>
