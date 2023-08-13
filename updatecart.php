<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="trailcart.css" rel="stylesheet" />
    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700"
      rel="stylesheet"
    />
    <!-- Load Font Awesome from a CDN -->

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <title>Super Market</title>
  </head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />


  <body>

  <?php
$product_id = $_GET["product_id"];
$quantity = $_GET["quantity"];

// Connect to SQL database
$host = 'localhost';
$user = 'root';
$pass = 'dpreddy';
$db   = 'login';
$port = '3308';
$conn = mysqli_connect($host, $user, $pass, $db, $port);

// Update quantity in SQL database
$query = "UPDATE cart SET quantity=$quantity, tprice=price*quantity WHERE id=$product_id";
$result = mysqli_query($conn, $query);



if (!$result) {
  echo "Error updating row: " . mysqli_error($conn);
} else {
  echo "Row updated successfully";
}


$conn->close();


?>

  </body></html>