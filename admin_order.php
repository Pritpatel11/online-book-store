<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

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
<section class="orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">
      
      <div class="box">
         <p> user id : <span>1</span> </p>
         <p> placed on : <span>19-feb-2024</span> </p>
         <p> name : <span>prit</span> </p>
         <p> number : <span>+91 7203830516</span> </p>
         <p> email : <span>p@gmail.com</span> </p>
         <p> address : <span>flat no. 1, 12, ww, ww - 222</span> </p>
         <p> total products : <span>2</span> </p>
         <p> total price : <span>₹500/-</span> </p>
         <p> payment method : <span>cash on delivery</span> </p>
         <form action="" method="post">
            <select name="update_payment">
               <option value="" selected disabled>order</option>
               <option value="pending">pending</option>
               <option value="completed">completed</option>
            </select>
            <input type="submit" value="update" name="update_order" class="option-btn">
            <a href="#"class="delete-btn">delete</a>
         </form>
      </div>

      <!-- box 2 -->
      <div class="box">
         <p> user id : <span>1</span> </p>
         <p> placed on : <span>19-feb-2024</span> </p>
         <p> name : <span>prit</span> </p>
         <p> number : <span>+91 7203830516</span> </p>
         <p> email : <span>p@gmail.com</span> </p>
         <p> address : <span>flat no. 1, 12, ww, ww - 222</span> </p>
         <p> total products : <span>2</span> </p>
         <p> total price : <span>₹500/-</span> </p>
         <p> payment method : <span>cash on delivery</span> </p>
         <form action="" method="post">
            <select name="update_payment">
               <option value="" selected disabled>order</option>
               <option value="pending">pending</option>
               <option value="completed">completed</option>
            </select>
            <input type="submit" value="update" name="update_order" class="option-btn">
            <a href="#"class="delete-btn">delete</a>
         </form>
      </div>

      <!-- box 3 -->
      <div class="box">
         <p> user id : <span>1</span> </p>
         <p> placed on : <span>19-feb-2024</span> </p>
         <p> name : <span>prit</span> </p>
         <p> number : <span>+91 7203830516</span> </p>
         <p> email : <span>p@gmail.com</span> </p>
         <p> address : <span>flat no. 1, 12, ww, ww - 222</span> </p>
         <p> total products : <span>2</span> </p>
         <p> total price : <span>₹500/-</span> </p>
         <p> payment method : <span>cash on delivery</span> </p>
         <form action="" method="post">
            <select name="update_payment">
               <option value="" selected disabled>order</option>
               <option value="pending">pending</option>
               <option value="completed">completed</option>
            </select>
            <input type="submit" value="update" name="update_order" class="option-btn">
            <a href="#"class="delete-btn">delete</a>
         </form>
      </div>

      <!-- box 4 -->
      <div class="box">
         <p> user id : <span>1</span> </p>
         <p> placed on : <span>19-feb-2024</span> </p>
         <p> name : <span>prit</span> </p>
         <p> number : <span>+91 7203830516</span> </p>
         <p> email : <span>p@gmail.com</span> </p>
         <p> address : <span>flat no. 1, 12, ww, ww - 222</span> </p>
         <p> total products : <span>2</span> </p>
         <p> total price : <span>₹500/-</span> </p>
         <p> payment method : <span>cash on delivery</span> </p>
         <form action="" method="post">
            <select name="update_payment">
               <option value="" selected disabled>order</option>
               <option value="pending">pending</option>
               <option value="completed">completed</option>
            </select>
            <input type="submit" value="update" name="update_order" class="option-btn">
            <a href="#"class="delete-btn">delete</a>
         </form>
      </div>
      
   </div>

</section>

</header>
</body>
</html>