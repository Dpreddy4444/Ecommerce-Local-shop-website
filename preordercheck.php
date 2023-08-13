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
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $nameoncard = $_POST['nameoncard'];
        $cardno = $_POST['cardno'];
        $expmonth = $_POST['expmonth'];
        $expyear = $_POST['expyear'];
        $cvv = $_POST['cvv'];

        // Save form data to database or file
        // Here you can write code to insert the data into a database or save it to a file

    }

    $host = 'localhost';
    $user = 'root';
    $pass = 'dpreddy';
    $db   = 'login';
    $port = '3308';
    $conn = mysqli_connect($host, $user, $pass, $db, $port);

    // Define the SQL query to select the value from the database table
    $query = "SELECT * FROM preorder WHERE name = '$name'";

    // Execute the query
    $result = mysqli_query($conn, $query);


    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // select values from preorder table with the given email
    $sql = "SELECT name, email, address, city, state, zipcode, nameoncard, cardno, expmonth, expyear, cvv, balance FROM preorder WHERE email = '$email'";
    $result = $conn->query($sql);

    // check if there is a match with the user input
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['name'] == $name && $row['address'] == $address && $row['city'] == $city && $row['state'] == $state && $row['zipcode'] == $zipcode && $row['nameoncard'] == $nameoncard && $row['cardno'] == $cardno && $row['expmonth'] == $expmonth && $row['expyear'] == $expyear && $row['cvv'] == $cvv) {
            $user_balance = $row['balance'];
            if ($user_balance < $toprice) {
                $error_msg = 'You do not have enough balance to make this payment.';
            } else {

                $new_balance = $user_balance - $toprice;
                $sql = "UPDATE preorder SET balance = $new_balance WHERE name = '$name'";
                $conn->query($sql);

                // Add payment amount to admin's account
                $admin_id = 'Srinivasa';
                // Replace with your admin's user ID
                $sql = "SELECT * FROM preorder WHERE name = '$admin_id'";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $admin_balance = $row['balance'];
                    }
                }
                $new_balance = $admin_balance + $toprice;
                $sql = "UPDATE preorder SET balance = $new_balance WHERE name = '$admin_id'";
                $conn->query($sql);



                // Add payment record to the database
                $sql="SELECT * FROM cart where user='$present'";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $order=rand(1000000000,9999999999);
                        $sql="INSERT INTO placedorders(orderid,username, productname, price, image, modeofpayment) values('$order','$name','{$row['name']}','{$row['price']}','{$row['image']}','Credit/Debit card')";
                        $conn->query($sql);
                    }
                }
            }
            $sql = "DELETE FROM cart WHERE user = '$present'";
            $conn->query($sql);
        } else {
            echo "User input did not match with database values.";
        }
    } else {
        echo "No match found in database.";
    }

    // close database connection
    $conn->close();
    header('Location: orderplaced.html');
    ?>

</body>

</html>