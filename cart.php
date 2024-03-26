<?php
include 'conn.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($_SESSION["user_name"]))
{
   header('location:login.php');
}
if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'cart quantity updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
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
                    <a href="cart.php"> <i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_rows_number; ?>)</span></a>
                    <div class="user-box">
                        <p>User_id :<span><?php echo $_SESSION["user_id"]?></span> </p>
                        <p>username :<span><?php echo $_SESSION["user_name"]?></span> </p>
                        <p>email :<span>  <?php echo $_SESSION["user_email"] ?></span> </p>
                        <a href="logout.php" class="delete-btn">logout</a>
                     </div>
            </div>
        </div>
    </div>
</header>
<!-- cart page -->
<div class="heading">
   <h3>shopping cart</h3>
   <p> <a href="home.php">home</a> / cart </p>
</div>

<section class="shopping-cart">

   <h1 class="title">products added</h1>

   <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="box">
         <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
         <img src="images/<?php echo $fetch_cart['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_cart['name']; ?></div>
         <div class="auther"><?php echo $fetch_cart['auther_name']; ?></div>
         <div class="price">₹<?php echo $fetch_cart['price']; ?>/-</div>
         <form action="" method="post">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
            <input type="submit" name="update_cart" value="update" class="option-btn">
         </form>
         <div class="sub-total"> sub total : <span>$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-</span> </div>
      </div>
      <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">your cart is empty</p>';
      }
      ?>
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all</a>
   </div>

   <div class="cart-total">
      <p>grand total : <span>₹<?php echo $grand_total; ?>/-</span></p>
      <div class="flex">
         <a href="shop.php" class="option-btn">continue shopping</a>
         <a href="checkout.php" class="btn">proceed to checkout</a>
      </div>
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