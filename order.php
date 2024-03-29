<?php
session_start();
include 'conn.php';
$user_id = $_SESSION['user_id'];
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
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>orders</title>
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
                        <a href="cart.php"> <i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_rows_number; ?>)</span></a>
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
    <!-- shop heading -->
    <div class="heading">
        <h3>your order</h3>
        <p> <a href="#">home</a> / orders </p>
    </div>
    <!-- orders section -->
    <section class="placed-orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">

      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="box">
         <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> total price : <span>₹<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
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
<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>