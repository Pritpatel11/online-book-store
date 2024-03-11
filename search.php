<?php
include 'conn.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($_SESSION["user_name"]))
{
   header('location:login.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="images/logo.png">
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
   <h3>search page</h3>
   <p> <a href="home.php">home</a> / search </p>
</div>

<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="search products..." class="box">
      <input type="submit" name="submit" value="search" class="btn">
   </form>
</section>

<section class="products" style="padding-top: 0;">

   <div class="box-container">
   <?php
      if(isset($_POST['submit'])){
         $search_item = $_POST['search'];
         $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name or auther_name LIKE '%{$search_item}%'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
   ?>
   <form action="" method="post" class="box">
      <img src="images/<?php echo $fetch_product['image']; ?>" alt="" class="image">
      <div class="name"><?php echo $fetch_product['name']; ?></div>
      <div class="auther"><?php echo $fetch_product['auther_name']; ?></div>
      <div class="price">₹<?php echo $fetch_product['price']; ?>/-</div>
      <input type="number"  class="qty" name="product_quantity" min="1" value="1">
      <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
      <input type="hidden" name="auther_name" value="<?php echo $fetch_product['auther_name']; ?>">
      <input type="submit" class="btn" value="add to cart" name="add_to_cart">
   </form>
   <?php
            }
         }else{
            echo '<p class="empty">no result found!</p>';
         }
      }else{
         echo '<p class="empty">search something!</p>';
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
