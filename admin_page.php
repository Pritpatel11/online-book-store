<?php
include 'conn.php';
session_start();
if(!isset($_SESSION["admin_name"]))
{
   header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin.css">

</head>
<body>
    <!-- nav -->
    <header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php">home</a>
         <a href="admin_products.php">products</a>
         <a href="admin_order.php">orders</a>
         <a href="admin_user.php">users</a>
         <a href="admin_mes.php">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
                  <p>User_id :<span> <?php echo $_SESSION["admin_id"]?></span> </p>
                  <p>username : <span><?php echo $_SESSION["admin_name"]?></span> </p>
                  <p>email :<span> <?php echo $_SESSION["admin_email"] ?> </span> </p>
                  <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div>

   </div>

</header>
<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="title">dashboard</h1>

   <div class="box-container">
<!-- box 1 -->
      <div class="box">
         <h3>₹410/-</h3>
         <p>total pendings</p>
      </div>
   <!-- box 2 -->
   <div class="box">
         <h3>₹0/-</h3>
         <p>completed payments</p>
      </div>
<!-- box 3 -->
      <div class="box">
         <h3>4</h3>
         <p>order placed</p>
      </div>
<!-- box 4 -->
      <div class="box">
         <h3>20</h3>
         <p>products added</p>
      </div>


   
         <!-- box 5 -->
      <div class="box">
         <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE usertype = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p>normal users</p>
      </div>
      <!-- box 6 -->
      <div class="box">
         <?php 
            $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE usertype = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
         <h3><?php echo $number_of_admins; ?></h3>
         <p>admin users</p>
      </div>
      <!-- box 7 -->
      <div class="box">
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>total accounts</p>
      </div>
      <!-- box 8 -->
      <div class="box">
         <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `contact-us`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>new messages</p>
      </div>
   </div>

 </section>
<!-- custom admin js file link  -->
<script src="js/admin.js"></script>

</body>
</html>







