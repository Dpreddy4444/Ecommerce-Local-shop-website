<!DOCTYPE html>
<html lang="en">

<head>
  <link href="trailcart.css" rel="stylesheet" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet" />
  <!-- Load Font Awesome from a CDN -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KShyEzC7GKj3qX9+JscQoZ6FYBP+6bgjKquT/tU6T55yMb44+hg0J20RZiblMZjK" crossorigin="anonymous">

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MCgOw8w4I4saPplAdZPrp+eTNmJxMyX9Zm/Rck2j6dt+gC8y+w63HvFq3s+6Khlc" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <title>Super Market</title>
</head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


<body class="dp">
  <nav>

    <div class="brand">
      <img src='imgs/ProvisionsPro.png' class='rounded-circle me-2' alt='your-alt-text' style='max-height: 50px; max-width: 70px;'>
      <h2>ProvisionsPro</h2>
    </div>
    <ul>
      <li><a href="http://localhost:8084/finalweb/index.jsp">Home</a></li>
      <li><a href="http://localhost:8084/finalweb/grocery.jsp">Grocery</a></li>
      <li><a href="http://localhost:8084/finalweb/homebeuty.jsp">Home and Beauty</a></li>
      <li><a href="http://localhost/wt/pastorders.php">Past Orders</a></li>
      <li><a href="http://localhost/wt/cartpage.php">Cart</a></li>
      <li><a href="http://localhost/wt/feddback.php">Contact Us</a></li>
      <li><a href="http://localhost:8084/finalweb/log.jsp"><?php if ($_COOKIE['user'] != null) {
                                                              echo ("Logout");
                                                            } else {
                                                              echo ("Sign Up");
                                                            } ?></a></li>



    </ul>
  </nav>
  <?php
  session_start();

  // Check if user is logged in
  if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit();
  }
  $present = $_COOKIE['user'];
  $_SESSION['pr'] = $present;

  $url = "methodofpayment.php?customer=" . urlencode($present);



  $host = 'localhost';
  $user = 'root';
  $pass = 'dpreddy';
  $db   = 'login';
  $port = '3308';
  $conn = mysqli_connect($host, $user, $pass, $db, $port);
  // Get the product details from the old table in the database


  if (isset($_COOKIE["coupon_match"])) {
    // Split the cookie into key and value
    $cookieValue = explode("=", $_COOKIE["coupon_match"]);

    // Use the key and value
    $key = $cookieValue[0];
    $value = $cookieValue[1];

    // Do something with the key and value
    $checkedcoupon = $key .  $value;
    $validcoupon = preg_replace('/[^0-9]/', '', $checkedcoupon);
  }



  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve blog entries from the database
  $query = "SELECT * FROM cart where user='$present'";
  $result = mysqli_query($conn, $query);
  echo "<section class='pt-3 mt-3 container'>
  <div class='abovehead'>
  <h2 class='font-weight-bold pt-5' style='border-bottom:2px solid white; padding-bottom:8px;'>Shopping Cart</h2></div>


</section>";
  if (mysqli_num_rows($result) > 0) {
    echo "<section id='cart-container' class='container my-5'>
<table width='100%'>
  <thead>
    <tr>
      <td>Remove</td>
      <td>Image</td>
      <td>Product</td>
      <td>Price</td>
      <td>Quantity</td>
      <td>Total</td>
    </tr>
  </thead>
  <tbody>";
  }

  $tocount = 0;
  $tprice = 0;

  if (mysqli_num_rows($result) == 0) {
    echo "<center><lottie-player src='https://assets7.lottiefiles.com/packages/lf20_sxCwLo.json'  background='transparent'  speed='1'  style='width: 300px; height: 300px;'  loop  autoplay></lottie-player>
  <h3 style='color:#808080';>Your Cart is Empty</h3></center>
  ";
  }

  // Display each blog entry
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $img = $row['image'];
      $prod_name = $row['name'];
      $prod_price = $row['price'];
      $prod_quanti = $row['quantity'];
      $tprice = $prod_price * $prod_quanti;

      echo "<tr data-id='$id'>
        <td>
        <form method='post' action='removeitem.php'>
        <input type='hidden' name='row_id' value='$id'>
        <button type='hidden' name='delete_button'><i class='fa-solid fa-trash'></i></button>
        </form>
        </td>
        <td><img src='$img'></td>
        <td><h5>$prod_name</h5></td>
        <td><h5>$prod_price</h5></td>
        <td><input class='w-25 pl-1' value='$prod_quanti' type='number' onchange='updateCart(this)'></td>
        <td id='tprice_$id'><h5>$tprice</h5></td>
        </tr>";
    }
  }
  if (mysqli_num_rows($result) > 0) {
    $query = "SELECT sum(tprice) as tot FROM cart where user='$present'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $count = $row['tot'];
      }
    }

    $tocount = $count + 50 - $validcoupon;
    echo "</tbody>
    </table>
  </section>";

    echo " <section id='cart-bottom' class='container'>
    <div class='row'>
        <div class='coupon col-lg-6 col-md-6 col-12 mb-4'>
            <div class='dptext'>
                <h5>COUPON</h5>
                <p>ENTER COUPON CODE IF YOU HAVE ANY!</p>
                <div class='d'>
                <form method='post' action='couponcheck.php' >
                <div class='d2'>
                  <input type='text' placeholder='coupon code' class='my-text-box' name='coupon_code'>
                </div>
                <div class='d1' style='text-align: center;'>
                  <button type='submit' class='btn btn-outline-warning style='width:60px' id='liveToastBtn'>APPLY COUPON</button>
                </div>
        <div class='position-fixed bottom-0 end-0 p-3' style='z-index: 11'>
        <div id='liveToast' class='toast hide' role='alert' aria-live='assertive' aria-atomic='true'>
          <div class='toast-header'>
          <img src='imgs/ProvisionsPro.png' class='rounded-circle me-2' alt='your-alt-text' style='max-height: 50px; max-width: 50px;'>
            <strong class='me-auto'>ProvisionsPro</strong>
            <small>1 sec ago</small>
            <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
          </div>
          <div class='toast-body'>
          Yayy!! You Claimed a Coupon Successfully!
        </div>        
        </div>
      </div>
              </form>
              </div>
            </div>
        </div>

        <div class='total col-lg-6 col-md-6 col-12' >
            <div class='dptext'>
                <h5>CART TOTAL</h5>
                <div class='d-flex justify-content-between'>
                    <h6 class='dptext1'>Subtotal</h6>
                    <p>$count</p>
                </div>
                <div class='d-flex justify-content-between'>
                    <h6 class='dptext1'>Shipping</h6>
                    <p>50rs</p>
                </div>
                <hr class='second-hr'>
                <div class='d-flex justify-content-between'>
                    <h6 class='dptext1'>Total</h6>
                    <p>$tocount</p>
                </div>
                <div class='rig'>
                <a href='$url' style='text-decoration:none;'><button type='button' class='btn btn-outline-warning' style='text-align: center;'>PROCEED TO CHECKOUT</button></a>
            </div>
            </div>
        </div>
    </div>
</section>";
  }

  ?>

  <script>
    function updateCart(input) {

      var quantity = parseInt(input.value);
      var price = parseFloat(input.parentNode.nextElementSibling.innerHTML.substring(1));
      var productId = input.parentNode.parentNode.dataset.id;


      var prod_price = parseFloat(input.parentNode.previousElementSibling.querySelector("h5").textContent);
      var quantity = parseInt(input.value);
      var tprice = prod_price * quantity;


      var td = input.parentNode.parentNode.querySelector("#tprice_" + productId);
      td.innerHTML = "<h5>" + tprice + "</h5>";



      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
        }
      };
      xhr.open("GET", "updateCart.php?product_id=" + productId + "&quantity=" + quantity, true);
      xhr.send();
    }
  </script>
   <script>
    var liveToastBtn = document.getElementById('liveToastBtn');
    var liveToast = document.getElementById('liveToast');
    var toast = new bootstrap.Toast(liveToast);

    liveToastBtn.addEventListener('click', function() {
      toast.show();
      sessionStorage.setItem('itemAddedToCart', 'true'); // set flag when item is added to cart
    });

    window.onload = function() {
      if (sessionStorage.getItem('itemAddedToCart') === 'true') {
        toast.show(); // show toast if flag is set on page load
        sessionStorage.removeItem('itemAddedToCart'); // remove flag to prevent toast from showing again
      }
    };
  </script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <footer> <?php $html = file_get_contents('footer.html');
            echo $html ?>;</footer>
</body>

</html>