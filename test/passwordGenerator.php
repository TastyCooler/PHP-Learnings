<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<!-- javascript -->
    <script type="text/javascript">
    function myFunction(){
      var copyText = document.getElementById("myInput");
      //selects the generated password
      copyText.select();
      //copies the password to clipboard
      document.execCommand("Copy");
      //browser alert
      alert("Your Password added to Clipboard: " + copyText.value);
    }
    </script>

    <?php

    if(isset($_POST['limit'])){

    function randomPassword(){
      //Limit = 16,18,20
      $limit = $_POST['limit'];
      $alphabet = 'abcdefghijklmnopqrstuvwxyz!@#$%^&*()_+?>;<:"ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $pass = array();
      // ALength = Länge von Alphabet
      $alphabetLength = strlen($alphabet) - 1;
      for($i = 0; $i < $limit; $i++){
        //Random Zahl zwischen 0 und Alength
        $n = rand(0,$alphabetLength);

        $pass[] = $alphabet[$n];
        }
      //"Join array Elements to a string"
      return implode($pass);
      }

      $p = randomPassword();

      echo '<p><input type="text" value="'.$p.'" id="myInput"/></p>';
      echo '<p><button class="button" onclick="myFunction()">COPY</button></p>';
    }

     ?>
  </body>
</html>
