<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <p>This is HTML</p>

    <?php

$a = "This is PHP";
echo $a;

     ?>
<hr>

     <div class="first">

      <h1>This is a Login</h1>
      <!-- Login  -->
       <form action="open.php" method="post">
        <input type="text" name="name" placeholder="Enter Name">
        <input type="password" name="pass" placeholder="Enter Password" >
        <input type="submit" value="Login" class="button" >
       </form>

     </div>

     <div class="second">

       <hr>
       <h1>This is a Calculator</h1>
       <!-- Square Function -->
       <form action="open.php" method="post">
         <input type="text" name="num1" placeholder="Number1">
         <input type="submit" value="Squareroot" class="Button">
       </form>

       <!-- Sum Function -->
       <form action="sum.php" method="post">
         <input type="text" name="num1" placeholder="Number1">
         <input type="text" name="num2" placeholder="Number2">
         <input type="submit" value="Sum" class="Button">
       </form>

     </div>


     <div class="third">
      <hr>
      <h1>This is a Coupon Generator</h1>
        <form  action="coupon.php" method="post">
          <p><button class="button"><a href="index.php?cp=30%"> 30% Coupon </a></button> </p>
          <p><button class="button"><a href="index.php?cp=40%"> 40% Coupon </a></button> </p>
        </form>

     </div>

<div class="fourth">
  <hr>
  <h1>This is a Form</h1>
  <form action="form.php" method="post">
    <div>
        <h4>Your Name</h4>
        <td><input type="text" name="name" placeholder="Enter your Name">
        <h4>Your Gender</h4>
        <input type="radio" name="gender" value="male" style="width:30px; height:30px"> Male </input>
        <input type="radio" name="gender" value="female" style="width:30px; height:30px"> Female </input>
        <h4>Your Birthyear</h4>
        <select name="year">
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
        </select>
    </div>

    <div>
      <h4>Was this method helpful?</h4>
      <input type="checkbox" name="rv" value="yes" style="width:30px; height:30px"> Yes </input>
      <input type="checkbox" name="rv" value="no" style="width:30px; height:30px"> No </input>
      <input type="submit" class="button">
    </div>
  </form>

</div>

<div>
  <hr>
  <h1>This is a Password Generator</h1>
  <form action="passwordGenerator.php" method="post" enctype="multipart/form-data">
    <select name="limit">
      <option value="16"> 16 Recommended </option>
      <option value="18"> 18 </option>
      <option value="20"> 20 </option>
    </select>
    <input class="button" type="submit"value="GENERATE PASSWORD">
  </form>
</div>


<div>
  <hr>
  <h1>This is a Phone Number Generator</h1>
  <form action="phoneNumberGenerator.php" method="post">
    <select name="limit">
      <option value="2"> 2</option>
      <option value="4"> 4</option>
      <option value="6"> 6</option>
    </select>
    <p><input type ="text" name="code" maxlength="5" placeholder="Network Code"></p>
    <p><input type ="text" name="num" maxlength="6" placeholder="Last 6 Digits Here"></p>
    <p><input class="button" type="submit" name="series" value="SERIES NUMBER"></p>
    <p><input class="button" type="submit" name="random" value="RANDOM NUMBER"></p>
  </form>
</div>


<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);

	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "<b><font color='red'>Wrong Details !</font></b>";
	}
}
?>


<div id="main">




       <form  method="post" >

        <h1 >Sign In</h1>

        <?php
			if(isset($error))
			{
				?>

                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !

                <?php
			}
		?>



        <input type="text"  name="txt_uname_email" placeholder="Username or email" required />



        <input type="password"  name="txt_password" placeholder="Your Password" />



            <input value="SIGN IN" type="submit" name="btn-login" class="button">



            <p>Don't have account! <a href="sign-up.php">Sign Up</a></p>
      </form>



</div>

<div>
<hr>
<br>

<center>
<a href="register.php"><button class="button">Add Member</button></a>
</center>

<center>
<h1>Database Member Information</h1>
      <table class="altrowstable" id="alternatecolor">
      <thead>
      <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Email</th>
      <th>City</th>
      <th>Date</th>
      <th>edit</th>
      <th>delete</th>
      </tr>
      </thead>
      <tbody>

      <?php
      require_once 'dbconfig.php';

      $stmt = $db_con->prepare("SELECT * FROM member ORDER BY id DESC");
      $stmt->execute();
  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {
    ?>
    <tr>
    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['city']; ?></td>
    <td><?php echo $row['cdate']; ?></td>

    <td align="center">
    <a   href="edit.php?eid=<?php echo $row['id']; ?>" title="Edit">
    <img src="img/edit.png" width="20px" />
          </a></td>
    <td align="center"><a   href="delete.php?id=<?php echo $row['id']; ?>" title="Delete">
    <img src="img/delete.png" width="20px" />
          </a></td>
    </tr>
    <?php
  }
  ?>

      </tbody>
      </table>
      <br>


</center>



  </div>
  </body>
</html>
