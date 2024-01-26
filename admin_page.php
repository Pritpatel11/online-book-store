<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This is a admin login page....!</h1><?php echo "admin name is:" . $_SESSION["admin_name"]. '<br>' ?>
    <?php echo "admin email id is:" . $_SESSION["admin_email"] . '<br>'  ?>
    <?php echo "admin id is:" . $_SESSION["admin_id"] . '<br>'  ?>
    <a href="logout.php">logout</a>
</body>
</html>