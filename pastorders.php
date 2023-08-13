<!DOCTYPE html>
<html>
<head>
	<title>Past Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
.dp{
    background-color: #000c66;
}
.dp1{
    color: #cccccc;
    margin-top: 50px;
}
.dp2{
    color: #333333;
}

nav {
  position: fixed;
  top:0;
  left:0;
  width:100%;
  height:70px;
  background: rgba(0,0,0,0.6);
  box-sizing:border-box;
  z-index: 9999;
}
nav .logoo{
margin:0;
  padding-left:0;
  padding:0;

}
nav .brand{
  float: left;
  height: 100%;
  line-height: 70px;
  display:flex;
  flex-direction:row;
}

nav .brand img{
  margin-top:10px;
  padding-left:10px;
  margin-left:0;
  color:#fff;
  line-height:70px;
}
nav .brand h2{
  margin:0;
  padding-left:10px;
  margin-left:0;
  color:#fff;
  line-height:70px;
}

nav ul{
  float:right;
  display: flex;
  margin:0;
  padding:0;
}

nav ul li{
  list-style: none;
}

nav ul li a{
  position:relative;
  display:block;
  height:70px;
  line-height:70px;
  padding-left:0px;
  padding:0 20px;
  box-sizing:border-box;
  color:#fff;
  text-decoration:none;
  text-transform:uppercase;
  transition: .5s;
}

nav ul li a:hover{
  color:#262626;
}
nav ul li a:before{
  content:'';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #fff;
  transform-origin: right;
  z-index: -1;
  transform:scaleX(0);
  transition: transform 0.5s;
}
nav ul li a:hover:before{
  transform-origin:left;
  transform:scaleX(1);
}
	</style>
</head>
<body class="dp">

<nav>

<div class="brand">
<img src='imgs/ProvisionsPro.png' class='rounded-circle me-2' alt='your-alt-text' style='max-height: 50px; max-width: 70px;'>
    <h2>ProvisionsPro</h2>
</div><ul>
    <li><a href="http://localhost:8084/finalweb/index.jsp">Home</a></li>
    <li><a href="http://localhost:8084/finalweb/grocery.jsp">Grocery</a></li>
    <li><a href="http://localhost:8084/finalweb/homebeuty.jsp">Home and Beauty</a></li>
    <li><a href="http://localhost/wt/pastorders.php">Past Orders</a></li>
    <li><a href="http://localhost/wt/cartpage.php">Cart</a></li>
    <li><a href="http://localhost/wt/feddback.php">Contact Us</a></li>  
    <li><a href="http://localhost:8084/finalweb/log.jsp"><?php if($_COOKIE['userra']!=null){echo("Logout");}else{echo("Sign Up");}?></a></li>
     
</ul>
</nav>

	<main class="dp1">
  <div class="container">
  <div class="row">
    <div class="col">
    <h3 class="mb-1 mt-5 ml-2">Your Orders :</h3>
    </div>
  </div>
</div>

    <?php 
    $use = $_COOKIE['userra'];
    $host = 'localhost';
    $user = 'root';
    $pass = 'dpreddy';
    $db   = 'login';
    $port = '3308';
    $conn = mysqli_connect($host, $user, $pass, $db, $port);
    $sql = "SELECT * FROM `placedorders` where username= '$use'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 0) {echo "<center><lottie-player src='https://assets7.lottiefiles.com/packages/lf20_oe7glwtx.json'  background='transparent'  speed='1'  style='width: 300px; height: 300px;'  loop  autoplay></lottie-player><h3>No Past Orders</h3><a href='http://localhost:8084/finalweb/grocery.jsp'><button style='margin-bottom:70px;' type='button' class='btn btn-success'>Make a Purchase</button></a></center>";}
 
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pro_name = $row['productname'];
            $order_id = $row['orderid'];
            $price = $row['price'];
            $mode = $row['modeofpayment'];
            $time = $row['timestamp'];
            $image = $row['image'];

            echo"	<div class='container my-5'>
        <div class='row'>
          <div class='col-lg-8'>
          
            <div class='card dp2'>
              <div class='card-body'>
                <div class='row'>
                  <div class='col-md-4'>
                    <img src='$image' alt='Product Image' class='img-fluid'>
                  </div>
                  <div class='col-md-8'>
                    <h5 class='card-title'>$pro_name</h5>
                    <div class='col-ml-0-md-3'>
                    <h5 class='card-text'><medium class='text-muted'>Order Id: $order_id</medium></h5>
                  </div>
                  <br>
                    <div class='row'>
                      <div class='col-md-5-ml-5'>
                        <p class='card-text'><medium class='text-muted'>Mode Of Payment: </medium>$mode</p>
                      </div>

                    <div class='col-md-5'>
                    <p class='card-text'><medium class='text-muted'>Price:</medium> $price</p>
                  </div>
                    <div class='col-md-6-mt-5'>
                    <p class='card-text'><medium class='text-muted'>Date and Time Of Order: </medium> $time</p>
                  </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
";
        }
    }
    
    ?>
		              <footer>
                  <?php $html = file_get_contents('footer.html');
    echo $html ?>
	</footer>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>
