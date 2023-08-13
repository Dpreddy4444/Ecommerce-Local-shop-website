<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="methodofpayment.css" rel="stylesheet" />
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <title>Super Market</title>
  </head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />


  <body class="dp">
<?php 



$present = $_GET['customer'];




$host = 'localhost';
$user = 'root';
$pass = 'dpreddy';
$db   = 'login';
$port = '3308';
$conn = mysqli_connect($host, $user, $pass, $db, $port);
// Get the product details from the old table in the database



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve blog entries from the database
  $query = "SELECT * FROM cart where user='$present'";
  $result = mysqli_query($conn, $query);
  echo "<section class='pt-3 mt-3 container'>
  <div class='abovehead'>
  <h2 class='font-weight-bold pt-5' style='border-bottom:2px solid white; padding-bottom:8px;'>Method of payment</h2></div>


</section>";

echo "<section id='cart-container' class='container my-5'>
<table width='100%'>
  <thead>
    <tr>
      <td>Image</td>
      <td>Product</td>
      <td>Price</td>
      <td>Quantity</td>
      <td>Total</td>
    </tr>
  </thead>
  <tbody>";

  $tocount=0;
$tprice=0;


  // Display each blog entry
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { 
        $id=$row['id'];
        $img=$row['image'];
        $prod_name=$row['name'];
        $prod_price=$row['price'];
        $prod_quanti=$row['quantity'];
        $tprice= $prod_price* $prod_quanti;
    
        echo "<tr data-id='$id'>
        <td><img src='$img'></td>
        <td><h5>$prod_name</h5></td>
        <td><h5>$prod_price</h5></td>
        <td><h5>$prod_quanti</h5></td>
        <td id='tprice_$id'><h5>$tprice</h5></td>
        </tr>";
    }
    
    }    echo"</tbody>
    </table>
  </section>";
  
  
  $query = "SELECT sum(tprice) as tot FROM cart where user='$present'" ;
  $result = mysqli_query($conn, $query);
  $num = mysqli_num_rows($result);
  if ($num > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $count = $row['tot'];
      }
  }
  $tocount=$count+50;
  setcookie('var', $tocount, time()+3600);
  ?>
  <section class='pt-3 mt-3 container'>
   <div class='total col-lg-6 col-md-6 col-12' >
            <div class='dptext'>
                <div class='d-flex justify-content'>
                    <h4>Total Cart Value    :</h4>
                    <h5 class="givegap">Rs. <?php echo"$tocount"?> /-</h5>
                </div>
            </div>
   </div>
  </section>
<!-- Example single danger button -->
<section class='pt-3 mt-3 container'>
<h4 class='font-weight-bold pt-5' style='border-bottom:2px solid white; padding-bottom:8px;'>Select A Method To Pay</h4></div>


<div class="btn-group ">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  CHOOSE A METHOD TO PAY
  </button>
  <ul class="dropdown-menu" style="color:#f498b8">
  <form method='post' action='preorderpayment.php'>
    <input type='hidden' name='pri' value='".$tocount."'>
    <li><a class="dropdown-item" href="http://localhost/wt/preorderpayment.php">Debit Card</a></li>
    <li><a class="dropdown-item" href="http://localhost/wt/preorderpayment.php">Credit Card</a></li>
    </form>
    <li><hr class="dropdown-divider"></li>



    <li><a class="dropdown-item" href="http://localhost/wt/cashondelivery.php">Cash On Delivery</a></li>
    <li><a class="dropdown-item" href="http://localhost/wt/pickupcheck.php">Pick Up</a></li>
  </ul>
</div></section>

<div class='mt-9'>
<?php $html = file_get_contents('footer.html');
    echo $html ?></div>
    </body></html>