<?php
include 'conn.php';
session_start();
if(!isset($_SESSION["admin_name"]))
{
   header('location:login.php');
}

if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $auther = $_POST['Authorname'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'images/'.$image;
   

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      echo "product name already added";
   }else{
      $add_product_query = mysqli_query($conn, "INSERT INTO `products` (`name`, `price`, `image`, `auther_name`) VALUES ('$name', '$price', '$image', '$auther')") or die('query failed 2');

      if($add_product_query){
         if($image_size > 2000000){
            echo "image size is too large";
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            echo "product added successfully!";
         }
      }else{
         echo "product could not be added!";
      }
   }
}
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

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

<!-- product CRUD section starts  -->

<section class="add-products">

   <h1 class="title">shop products</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add product</h3>
      <input type="text" name="name" class="box" placeholder="enter product name" required>
      <input type="text" name="Authorname" class="box" placeholder="enter Author name" required>
      <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

</section>



<!-- show products  -->

<section class="show-products">

   <div class="box-container">
   <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <img src="images/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="auther"><?php echo $fetch_products['auther_name']; ?></div>
         <div class="price">₹<?php echo $fetch_products['price']; ?>/-</div>
         <a href="#" class="option-btn">update</a>
         <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo "no products added yet!";
      }
      ?>
   </div>
   </div>

</section>
<!-- custom admin js file link  -->
<script src="js/admin.js"></script>

</body>
</html>