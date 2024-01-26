<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
//conn
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("sorry not connected".mysqli_connect_error());
}
else{
    // echo "connected ok....:)";
}
?>