<?php
session_start();
if(!isset($_SESSION["user_name"]))
{
   header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>search_page</title>
</head>
<body>
   <div class="main">
    <!-- nav bar -->
    <header class="header">
        <div class="header">
            <div class="header-1">
                <div class="flex">
                    <div class="social">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    </div>
                    <p> new <a href="login.php">login</a> | <a href="register.php">register</a> </p>
                </div>
            </div>
    
            <div class="header-2">
                <div class="flex">
                    <a href="#" class="logo">THE HYPE BOOK STORE</a>
                    <nav class="navbar">
                        <a href="index.php">home</a>
                        <a href="about.php">about</a>
                        <a href="#">shop</a>
                        <a href="contact.php">contact</a>
                        <a href="#">orders</a>
                    </nav>
                    <div class="icons">
                        <div id="menu-btn" class="fas fa-bars"></div>
                        <a href="search.php" class="fas fa-search"></a>
                        <div id="user-btn" class="fas fa-user"></div>
                        <a href="#"> <i class="fas fa-shopping-cart"></i></a>
                        <div class="user-box">
                        <p>User_id :<span> <?php echo $_SESSION["user_id"]?></span> </p>
                        <p>username : <span><?php echo $_SESSION["user_name"]?></span> </p>
                        <p>email :<span> <?php echo $_SESSION["user_email"] ?> </span> </p>
                        <a href="logout.php" class="delete-btn">logout</a>
                        </div>
                </div>
            </div>
        </div>
    </header>
    <!-- search-us heading -->
        <div class="heading">
            <h3>Search us</h3>
            <p> <a href="#">home</a> / search </p>
        </div>

        <section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="search products..." class="box">
      <input type="submit" name="submit" value="search" class="btn">
   </form>
</section>
<div class="book-list">
<p class="empty">search something!</p>
</div>

<!-- footer -->
<section class="footer">

<div class="box-container">

   <div class="box">
      <h3>quick links</h3>
      <a href="index.php">home</a>
      <a href="about.html">about</a>
      <a href="shop.php">shop</a>
      <a href="contact.php">contact</a>
   </div>

   <div class="box">
      <h3>extra links</h3>
      <a href="login.php">login</a>
      <a href="register.php">register</a>
      <a href="#">cart</a>
      <a href="#">orders</a>
   </div>

   <div class="box">
      <h3>contact info</h3>
      <p> <i class="fas fa-phone"></i> 7203830516 </p>
      <p> <i class="fas fa-envelope"></i> hype@gmail.com </p>
      <p> <i class="fas fa-map-marker-alt"></i> gujrat,Mehsana- 384002 </p>
   </div>

   <div class="box">
      <h3>follow us</h3>
      <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
      <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
      <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
      <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
   </div>

</div>

<p class="credit"> &copy; copyright @2024 by <span>mr. prit patel</span> </p>

</section>
</div>
<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>
