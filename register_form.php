<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $city = mysqli_real_escape_string($conn, $_POST['city']);
   $street = mysqli_real_escape_string($conn, $_POST['street']);
   $pNumber = mysqli_real_escape_string($conn, $_POST['number']);

   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   
   // $select = " SELECT * FROM member WHERE email = '$email' && password = '$pass'";
   $select2 = " SELECT * FROM customer WHERE email = '$email'";
   $count = "SELECT * FROM customer";
   
   // $result = mysqli_query($conn, $select);
   $result2 = mysqli_query($conn, $select2);
   $re = mysqli_query($conn, $count);
   $i = mysqli_num_rows($re);

   if(mysqli_num_rows($result2) > 0 ){
      $error[] = 'user already exist';
   }else{
      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         // $insert = "INSERT INTO member VALUES('$email','$pass')";
         $i++;
         $insert2= "INSERT INTO customer VALUES ('$i','$fname','$lname','$email','$pass','$pNumber','$city','$street')";
         mysqli_query($conn, $insert2);
         header('location:login_form.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<div class="form-container">

   <form action="" method="post">
      <h3 class="title">register now</h3>
      <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
      <input type="fname" name="fname" placeholder="First Name" class="box" required>
      <input type="lname" name="lname" placeholder="Last Name" class="box" required>
      <input type="city" name="city" placeholder="city" class="box" required>
      <input type="street" name="street" placeholder="street" class="box" required>
      <input type="pNumber" name="number" placeholder="Phone Number" class="box" required>
      <input type="email" name="usermail" placeholder="enter your email" class="box" required>
      <input type="password" name="password" placeholder="enter your password" class="box" required>
      <input type="password" name="cpassword" placeholder="confirm your password" class="box" required>
      <input type="submit" value="register now" class="form-btn" name="submit">
      <p>already have an account? <a href="login_form.php">login now!</a></p>
   </form>

</div>

</body>
</html>