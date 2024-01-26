<?php
include 'conn.php';
if(isset($_POST['submit'])){
 
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $pn = mysqli_real_escape_string($conn, $_POST['ph_no']);
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
 
    if(mysqli_num_rows($select_users) > 0){
       echo "user already exist!";
    }else{
       if($pass != $cpass){
          echo "confirm password not matched!";
       }else{
          mysqli_query($conn, "INSERT INTO `users`(name, email, password,ph_no) VALUES('$name', '$email', '$pass', '$pn')") or die('query failed');
          echo "registered successfully!";
          header('location:index.php');
       }
    }
 
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Register-page</title>
</head>
<body>
    <div class="form-container">

        <form action="register.php" method="post">
           <h3>register now</h3>
           <input type="text" name="name" placeholder="enter your name" required class="box">
           <input type="email" name="email" placeholder="enter your email" required class="box">
           <input type="text" name="ph_no" placeholder="enter your phone number" required="" class="box">
           <input type="password" name="password" placeholder="enter your password" required class="box">
           <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
           <input type="submit" name="submit" value="register now" class="btn">
           <p>already have an account? <a href="#">login now</a></p>
        </form>
     
     </div>
</body>
</html>