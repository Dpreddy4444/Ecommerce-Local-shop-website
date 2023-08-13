<html>

<head>
  <title>Calculate Price</title>
  <link rel="stylesheet" href="detail-products.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KShyEzC7GKj3qX9+JscQoZ6FYBP+6bgjKquT/tU6T55yMb44+hg0J20RZiblMZjK" crossorigin="anonymous">

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MCgOw8w4I4saPplAdZPrp+eTNmJxMyX9Zm/Rck2j6dt+gC8y+w63HvFq3s+6Khlc" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body class="rak">
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
      <li><a href="http://localhost:8084/finalweb/log.jsp"><?php if ($_COOKIE['curr_user'] != null) {
                                                              echo ("Logout");
                                                            } else {
                                                              echo ("Sign Up");
                                                            } ?></a></li>


    </ul>
  </nav>
  <div class="dp">

    <?php

    $curr_user = $_COOKIE['curr_user'];
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $itemid = $_POST["itemId"];
      $_SESSION["itemid"] = $itemid;
    }
    $itemid = $_SESSION["itemid"];
    $host = 'localhost';
    $user = 'root';
    $pass = 'dpreddy';
    $db   = 'login';
    $port = '3308';
    $conn = mysqli_connect($host, $user, $pass, $db, $port);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve blog entries from the database
    $query = "SELECT * FROM products where name='$itemid'";
    $result = mysqli_query($conn, $query);



    // Display each blog entry
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {

        echo "
                <div class='container main'>
      
        <img  src={$row['image']} class='img' alt='...'>
            <div class='car'>
                <h2 class='title'>{$row['name']}</h2>
                <p class='texts'>{$row['description']}</p>
                <h4 class='price'>Rs {$row['price']}</h4>
                     

			
      <form method='POST' action='addtocart.php' class='form'>
      <label for='quantity'>Quantity:</label>&nbsp&nbsp&nbsp&nbsp&nbsp
			<input type='text' id='quantity' name='qu' value='1'/></br>
      <input type='hidden' name='product_name' value='$itemid'>
      <input type='hidden' name='user' value='$curr_user'>
      <input type='submit' name='add_to_cart' value='Add to Cart' id='liveToastBtn'>
      <div class='position-fixed bottom-0 end-0 p-3' style='z-index: 11'>
        <div id='liveToast' class='toast hide' role='alert' aria-live='assertive' aria-atomic='true'>
          <div class='toast-header'>
          <img src='imgs/ProvisionsPro.png' class='rounded-circle me-2' alt='your-alt-text' style='max-height: 50px; max-width: 50px;'>
            <strong class='me-auto'>ProvisionsPro</strong>
            <small>1 sec ago</small>
            <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
          </div>
          <div class='toast-body'>
          Yayy!! Your Item Added To Cart Successfully
        </div>        
        </div>
      </div>
    </form>
    
          </div></div></div>";
      }
    }
    ?>

    <?php


    $xml = new DOMDocument();
    $xml->load("comments.xml");

    // Get the selection value from the user


    // Find the element with the matching id value
    $elements = $xml->getElementsByTagName('comment');
    foreach ($elements as $element) {

      $product = trim($element->getElementsByTagName('product')->item(0)->textContent);

      if (trim($product == $itemid)) {

        // Display the other values in the row
        $user = $element->getElementsByTagName('user')->item(0)->textContent;
        $text = $element->getElementsByTagName('text')->item(0)->textContent;
        $rating = $element->getElementsByTagName('rating')->item(0)->textContent;
        $stars_html = '';
        for ($i = 1; $i <= 5; $i++) {
          if ($i <= $rating) {
            $stars_html .= '<span class="star-rating filled"><i class="fa fa-star" aria-hidden="true">&nbsp&nbsp</i></span>';
          } else {
            $stars_html .= '<span class="star-rating"><i class="fa fa-star-o" aria-hidden="true">&nbsp&nbsp</i></span>';
          }
        }

        // Output the comment with the star rating
        echo '<div class="comment">';
        echo '<h3 class="namede">' . $user . '</h3>';
        echo '<p class="rating">' . $stars_html . ' ' . $rating . '/5</p>';
        echo '<p class="namede">' . $text . '</p>';
        echo '</div>';
      }
    }


    // Generate the star rating HTML



    ?>




    <center><a href="add_comments.php" class="btn btn-outline-success dps" type="button" tabindex="-1" role="button" aria-disabled="true">Add Your Review</a></center>


    <div class="container my-1">
      <h1 class="text-center" style='color:#c2c2c2;'>Frequently Asked Questions</h1>
      <form class="dp" id="search-form">
        <div class="input-group">
          <input type="text" id="question" class="form-control" name="question" placeholder="Search.." style="padding-left: 38px;">
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary h-10"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
      <div id="answer" style='color:#c2c2c2;' class="mb-5"></div>
      <div class="accordion" id="accordionExample"></div>
    </div>



  </div>
  <?php $html = file_get_contents('footer.html');
  echo $html ?>;

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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="faq.js"></script>
</body>

</html>