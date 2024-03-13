<?php
include 'conn.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($_SESSION["user_name"]))
{
   header('location:login.php');
}
if(isset($_POST['order_btn'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = $_POST['number'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
    $placed_on = date('d-M-Y');
 
    $cart_total = 0;
    $cart_products[] = '';
 
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
       while($cart_item = mysqli_fetch_assoc($cart_query)){
          $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
          $sub_total = ($cart_item['price'] * $cart_item['quantity']);
          $cart_total += $sub_total;
       }
    }
 
   
    
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="images/logo.png">
</head>
<body>
    <!-- navbar -->
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
<!-- heading -->
<div class="heading">
   <h3>checkout</h3>
   <p> <a href="home.php">home</a> / checkout </p>
</div>
<!-- display-order -->
<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>
   <div class="grand-total"> grand total : <span>$<?php echo $grand_total; ?>/-</span> </div>

</section>
<!-- checkout -->
<section class="checkout">

   <form action="" method="post">
      <h3>place your order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>your name :</span>
            <input type="text" name="name" required placeholder="enter your name">
         </div>
         <div class="inputBox">
            <span>your number :</span>
            <input type="number" name="number" required placeholder="enter your number">
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" name="email" required placeholder="enter your email">
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select name="method">
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit card">credit card</option>
               <option value="paypal">upi</option>
               <option value="paytm">paytm</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 01 :</span>
            <input type="number" min="0" name="flat" required placeholder="e.g. flat no.">
         </div>
         <div class="inputBox">
            <span>address line 01 :</span>
            <input type="text" name="street" required placeholder="e.g. street name">
         </div>
         <div class="inputBox">
            <span>city :</span>
            <input type="text" name="city" required placeholder="e.g. Mehsana">
         </div>
         <div class="inputBox">
            <span>state :</span>
            <input type="text" name="state" required placeholder="e.g. Gujarat">
         </div>
         <div class="inputBox">
            <span>country :</span>
            <input type="text" name="country" required placeholder="e.g. india">
         </div>
         <div class="inputBox">
            <span>pin code :</span>
            <input type="number" min="0" name="pin_code" required placeholder="e.g. 384002">
         </div>
      </div>
      <input type="submit" value="order now" class="btn" name="order_btn">
   </form>

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