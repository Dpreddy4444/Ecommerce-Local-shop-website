<html>

<head>
  <title>Calculate Price</title>
  <link rel="stylesheet" href="detail-products.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<?php



$retr=$_POST['product_name'];
$quan=$_POST['qu'];
$use=$_POST['user'];
$present = $_COOKIE['prr'];

echo $retr;

$host = 'localhost';
$user = 'root';
$pass = 'dpreddy';
$db   = 'login';
$port = '3308';
$conn = mysqli_connect($host, $user, $pass, $db, $port);
$sql = "SELECT * FROM products WHERE name = '$retr' ";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $desc = $row['description'];
        $price = $row['price'];
        $image = $row['image'];
    }
}
// Get the product details from the old table in the database

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT * FROM cart WHERE name = '$retr' AND user = '$use'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  
  if($count > 0) {
      // if the product exists in the cart, update the quantity
      $sql = "UPDATE cart SET quantity = '$quan'  WHERE user = '$use' AND name='$name'";
      $result= mysqli_query($conn, $sql);
  } else {
      
    

      $query = "INSERT INTO cart (user,name,quantity,price,image) VALUES ('$present', '$name', '$quan', '$price', '$image')";
      $result = mysqli_query($conn, $query);
      
  }      
header('Location: detail-products.php');
?>





</body></html>






