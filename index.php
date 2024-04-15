<?php
include 'conn.php';
session_start();
error_reporting(0);
ini_set('display_errors',0);
$user_id = $_SESSION['user_id'];
if(!isset($_SESSION["user_name"]))
{
   // header('location:login.php');
}
if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $auther_name = $_POST['auther_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart` (`user_id`,`name`, `auther_name`, `price`, `quantity`, `image`) VALUES ('$user_id','$product_name', '$auther_name', ' $product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

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
    <link rel="icon" type="image/png" href="images/logo.png">
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
                <a href="index.php" class="logo">THE HYPE BOOK STORE</a>
                <nav class="navbar">
                    <a href="index.php">home</a>
                    <a href="about.php">about</a>
                    <a href="shop.php">shop</a>
                    <a href="contact.php">contact</a>
                    <a href="order.php">orders</a>
                 </nav>
                    <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
                    <a href="search.php" class="fas fa-search"></a>
                    <div id="user-btn" class="fas fa-user"></div>
                    <?php
                        $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                         $cart_rows_number = mysqli_num_rows($select_cart_number); 
                     ?>
                    <a href="cart.php"> <i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_rows_number; ?>)</span> </a>
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
    <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 3") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="images/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">₹<?php echo $fetch_products['price']; ?>/-</div>
      <div class="auther"><?php echo $fetch_products['auther_name']; ?></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="hidden" name="auther_name" value="<?php echo $fetch_products['auther_name']; ?>">
      <?php
      if(isset($_SESSION['user_id'])){
         echo '<input type="submit" value="add to cart" name="add_to_cart" class="btn">';
      }else{
         echo '<input type="submit" value="add to cart" name="add_to_cart" class="btn" disabled>';
      }
      ?>
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   
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
          <a href="order.php">orders</a>
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
<!-- gsap file link -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="js/index.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>