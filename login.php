<?php
include 'conn.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   // md5 hasing is technic where normal password convert into cypertext. 

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);
         // for admin
      if($row["usertype"] == "admin"){

         $_SESSION["admin_name"]=$row['name'];
         $_SESSION["admin_email"]=$row['email'];
         $_SESSION["admin_id"]=$row['id'];
         header('location:admin_page.php');

         // for user
      }elseif($row["usertype"] == "user"){

         $_SESSION["user_name"]= $row['name'];
         $_SESSION["user_email"]= $row['email'];
         $_SESSION["user_id"]= $row['id'];
         header('location:index.php');

      }

   }else{
      $message[] = 'incorrect email or password!';
   }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>login-page</title>
</head>
<body>
<?php 
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
    <div class="form-container">

        <form action="login.php" method="post">
           <h3>login now</h3>
           <input type="email" name="email" placeholder="enter your email" required autofocus class="box">
           <input type="password" name="password" placeholder="enter your password" required class="box">
           <input type="submit" name="submit" value="login now" class="btn">
           <p>don't have an account? <a href="register.php">register now</a></p>
        </form>
     </div>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="js/gsap.js"></script>
</body>
</html>