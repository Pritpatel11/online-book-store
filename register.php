<?php
include 'conn.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendmail($email,$v_code,$name){
   require ("PHPMailer/PHPMailer.php");
   require ("PHPMailer/SMTP.php");
   require ("PHPMailer/Exception.php");
   
   $mail = new PHPMailer(true);


   // send
   try {
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'hypeonlinebookstore1177@gmail.com';                     //SMTP username
      $mail->Password   = 'lqxh zxwj adag ryrp';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('hypeonlinebookstore1177@gmail.com', 'Prit Patel');
      $mail->addAddress($email,$name);     //Add a recipient
      
  
      

  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Email Verification from Hype book store';
      $mail->Body    = "Thanks for registration mr/mrs.<b>$name</b> 🥰❤<br> 
      Click The link below to to verify your email address
      <a href='http://localhost/online-book-store/verify.php?email=$email&v_code=$v_code'>Verify</a>";
  
      $mail->send();
      return true;
  }   
  catch (Exception $e) {
      return false;
  }
}
if(isset($_POST['submit'])){
 
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $pn = mysqli_real_escape_string($conn, $_POST['ph_no']);
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('1query failed');
    $v_code=bin2hex(random_bytes(16));
 
    if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
    }else{
       if($pass != $cpass){
         $message[] = 'confirm password not matched!';
       }
       elseif((sendmail($_POST['email'],$v_code,$_POST['name']))){
         mysqli_query($conn, "INSERT INTO `users`(name, email, password,ph_no, verification_code, is_verified) VALUES('$name', '$email', '$pass', '$pn','$v_code','0')") or die('2query failed');
         $message[] = 'email send';
       }
       else{
         echo "
         <script>
         alert('server down!!!');
         window.location.href='index.php';
         </script>";
    }
 
 }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Register-page</title>
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

        <form action="register.php" method="post">
           <h3>register now</h3>
           <input type="text" name="name" placeholder="enter your name" required class="box">
           <input type="email" name="email" placeholder="enter your email" required class="box">
           <input type="text" name="ph_no" placeholder="enter your phone number" required="" class="box">
           <input type="password" name="password" id="password" placeholder="enter your password" required class="box">
           <img src="images/icons8-eye-50.png" alt="" onclick='shp()' id="show_eye" class="img1">
           <img src="images/1013502-200.png" alt="" onclick='shp()' id="hide_eye"  class="img1">
           <input type="password" name="cpassword" id="cpassword" placeholder="confirm your password" required class="box">
           <img src="images/icons8-eye-50.png" alt="" onclick='cshp()' id="rshow_eye" class="img2">
           <img src="images/1013502-200.png" alt="" onclick='cshp()' id="rhide_eye"  class="img2">
           <input type="submit" name="submit" value="register now" class="btn">
           <p>already have an account? <a href="login.php">login now</a></p>
        </form>
     
     </div>
     <script src="js/script.js"></script>
</body>
</html>