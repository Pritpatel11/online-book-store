<?php
include 'conn.php';
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
         <a href="#">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span>rtrt</span></p>
         <p>email : <span>rttr</span></p>
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

      
      <div class="box">
         <img src="images/bhagat.jpg " alt="">
         <div class="name">Bhagat</div>
         <div class="price">₹190/-</div>
         <div class="auther">by Jupinderjit Singh (Author)</div>
         <a href="#" class="option-btn">update</a>
         <a href="#" class="delete-btn">delete</a>
      </div>

      <!-- box 2 -->
      <div class="box">
         <img src="images/sidhu.jpg" alt="">
         <div class="name">WHO KILLED MOOSEWALA</div>
         <div class="price">₹140/-</div>
         <div class="auther">by Jupinderjit Singh (Author)</div>
         <a href="#" class="option-btn">update</a>
         <a href="#" class="delete-btn">delete</a>
      </div>

      <!-- box 3 -->
      <div class="box">
         <img src="images/doglapan.jpg" alt="">
         <div class="name">doglapan</div>
         <div class="auther">by Ashneer Grover (Author)</div>
         <div class="price">₹500/-</div>
         <a href="#" class="option-btn">update</a>
         <a href="#" class="delete-btn">delete</a>
      </div>
      
    
   </div>

</section>
</body>
</html>