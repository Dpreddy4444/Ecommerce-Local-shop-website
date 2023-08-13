<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>
<body>

<?php
session_start();
$present= $_SESSION['pr'];
    $toprice = $_COOKIE['var'];
    
$host = 'localhost';
$user = 'root';
$pass = 'dpreddy';
$db   = 'login';
$port = '3308';
$conn = mysqli_connect($host, $user, $pass, $db, $port);
$sql = "DELETE FROM cart WHERE user = '$price'";
$conn->query($sql);

header('Location: orderplaced.html');
?>

</body></html>