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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        // Get form data
        $name = $_POST['name'];
        $phno = $_POST['phno'];
        $doorno = $_POST['doorno'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
    
$host = 'localhost';
$user = 'root';
$pass = 'dpreddy';
$db   = 'login';
$port = '3308';
$conn = mysqli_connect($host, $user, $pass, $db, $port);
        // Save form data to database or file
        // Here you can write code to insert the data into a database or save it to a file
        $sql="INSERT INTO cashondelivery(full_name, mobile_number, door_no, address,city,state,zip_code) values('$name','$phno','$doorno','$address','$city','$state','$zipcode')";

        $conn->query($sql);


        $sql="SELECT * FROM cart where user='$present'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $order=rand(1000000000,9999999999);
                $sql="INSERT INTO placedorders(orderid,username, productname, price, image, modeofpayment) values('$order','$name','{$row['name']}','{$row['price']}','{$row['image']}','Cash On Delivery')";
                $conn->query($sql);
            }
        }
        $sql = "DELETE FROM cart WHERE user = '$present'";
        $conn->query($sql);
 

        
    }
    header('Location: orderplaced.html');
    ?>
</body></html>