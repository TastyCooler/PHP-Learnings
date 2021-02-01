<?php

if(isset($_POST['series'])){
  $code = $_POST['code'];
  $limit = $_POST['limit'];
  $num = $_POST['num'];

  $myno = ""."$code"."$num";

  for ($i=1; $i<=$limit; $i++) {
    echo "<p>".$myno.$i.",</p>";
  }
}
  if(isset($_POST['random'])){
    $code=$_POST['code'];
    $limit=$_POST['limit'];

    for ($i=1; $i<=$limit ; $i++) {
      $rand = substr(str_shuffle("0123456789"),0,7);
      echo "<p>".$code.$rand."</p>";
    }
  }


 ?>
