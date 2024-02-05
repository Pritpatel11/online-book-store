<?php
session_start();
if(!isset($_SESSION["user_name"]))
{
   // header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="main">
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
                    <a href="shop.php">shop</a>
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
<!-- home-page -->
<section class="home">

    <div class="content">
       <h3>Hand Picked Book to your door.</h3>
       <p>Books: Because Netflix Can’t Be Your Only Friend.</p>
       <a href="#" class="white-btn">discover more</a>
    </div>
 
 </section>
 
 <section class="products">
 
    <h1 class="title">Popular Book's</h1>
   <!-- box-1 -->
    <div class="box-container">
        <form action="" method="post" class="box">
            <img class="image" src="images/red_queen.jpg" alt="">
            <div class="name">red_queen</div>
            <div class="auther">by john deo(Author)</div>
            <div class="price">₹200</div>
            <input type="number" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_name" value="">
            <input type="hidden" name="product_price" value="">
            <input type="hidden" name="product_image" value="">
            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
        </form>
   <!-- box-2 -->
   <form action="" method="post" class="box">
    <img class="image" src="images/the_world.jpg" alt="">
    <div class="name">the_world</div>
    <div class="auther">by john petter(Author)</div>
    <div class="price">₹190</div>
    <input type="number" min="1" name="product_quantity" value="1" class="qty">
    <input type="hidden" name="product_name" value="">
    <input type="hidden" name="product_price" value="">
    <input type="hidden" name="product_image" value="">
    <input type="submit" value="add to cart" name="add_to_cart" class="btn">
</form>
<!-- box-3 -->
<form action="" method="post" class="box">
    <img class="image" src="images/darknet.jpg " alt="">
    <div class="name">darknet</div>
    <div class="auther">by joni deo(Author)</div>
    <div class="price">₹890</div>
    <input type="number" min="1" name="product_quantity" value="1" class="qty">
    <input type="hidden" name="product_name" value="">
    <input type="hidden" name="product_price" value="">
    <input type="hidden" name="product_image" value="">
    <input type="submit" value="add to cart" name="add_to_cart" class="btn">
</form>
    </div>

    
    <div class="load-more" style="margin-top: 2rem; text-align:center">
        <a href="#" class="option-btn">load more</a>
     </div>
  
  </section>
  
  <section class="about">
  
     <div class="flex">
  
        <div class="image">
           <img src="images/about-img.jpg" alt="">
        </div>
  
        <div class="content">
           <h3>about us</h3>
           <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
           <a href="about.php" class="btn">read more</a>
        </div>
  
     </div>
  
  </section>
  
  <section class="home-contact">
  
     <div class="content">
        <h3>have any questions?</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet ullam voluptatibus?</p>
        <a href="contact.php" class="white-btn">contact us</a>
     </div>
  
  </section>

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