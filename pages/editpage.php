<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MCgOw8w4I4saPplAdZPrp+eTNmJxMyX9Zm/Rck2j6dt+gC8y+w63HvFq3s+6Khlc" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <style>body {
	background: #1690A7;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
}

*{
	font-family: sans-serif;
	box-sizing: border-box;
}

form {
	width: 500px;
	border: 2px solid #ccc;
	padding: 30px;
	background: #fff;
	border-radius: 15px;
}

h2 {
	text-align: center;
	margin-bottom: 40px;
}

input {
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
}
label {
	color: #888;
	font-size: 18px;
	padding: 10px;
}

button {
	float: right;
	background: #555;
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
}
button:hover{
	opacity: .7;
}
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

.success {
   background: #D4EDDA;
   color: #40754C;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

h1 {
	text-align: center;
	color: #fff;
}

.ca {
	font-size: 14px;
	display: inline-block;
	padding: 10px;
	text-decoration: none;
	color: #444;
}
.ca:hover {
	text-decoration: underline;
} </style>
</head>

<body>
<?php
session_start();
$id = $_SESSION["idra"];
$host = 'localhost';
$user = 'root';
$pass = 'dpreddy';
$db   = 'login';
$port = '3308';
$conn = mysqli_connect($host, $user, $pass, $db, $port);
$sql="SELECT * FROM products where id='$id'";
$result = mysqli_query($conn, $sql);



if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
       echo "<form class='p-4 border rounded' method='post' action='{$_SERVER['PHP_SELF']}'>
       <h2 class='mb-4'>Update Product</h2>
   
       <div class='form-floating mb-3'>
           <label for='name'></label>
           <input type='text' class='form-control' id='name' name='name' placeholder='Product Name' value='{$row['name']}'>
       </div>
   
       <div class='form-floating mb-3'>
           <label for='description'></label>
           <input class='form-control' id='description' name='description' value='{$row['description']}'>
       </div>
   
       <div class='form-floating mb-3'>
           <label for='price'></label>
           <input type='number' class='form-control' id='price' name='price' placeholder='Product Price' value='{$row['price']}'>
       </div>
   
       <div class='form-floating mb-3'>
           <label for='image'></label>
           <input type='text' class='form-control' id='image' name='image' placeholder='Product Image' value='{$row['image']}'>
       </div>
   
       <div class='form-floating mb-3'>
           <label for='difference'></label>
           <input type='text' class='form-control' id='difference' name='difference' placeholder='Difference' value='{$row['difference']}'>
       </div>
   
       <div class='d-flex justify-content-end'>
           <button type='submit' class='btn btn-primary' name='insert' id='liveToastBtn'>Update</button>
       </div>

       <div class='position-fixed bottom-0 end-0 p-3' style='z-index: 11'>
       <div id='liveToast' class='toast hide' role='alert' aria-live='assertive' aria-atomic='true'>
         <div class='toast-header'>
         <img src='../imgs/ProvisionsPro.png' class='rounded-circle me-2' alt='your-alt-text' style='max-height: 50px; max-width: 50px;'>
           <strong class='me-auto'>ProvisionsPro</strong>
           <small>1 sec ago</small>
           <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
         </div>
         <div class='toast-body'>
         Yayy!! The New Data Updated Into Database
       </div>        
       </div>
     </div>
   </form>
   <form class='p-4 border rounded' method='post' action='tablespage.php'>
   <button type='submit' class='btn btn-primary' name='up'>Go Back</button>
   </form>"; 

   
    }
    
    
}
if (isset($_POST['insert'])) {
    $nam=$_POST['name'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $image=$_POST['image'];
    $difference=$_POST['difference'];

    $sql = "UPDATE products SET name = '$nam',description ='$description',price ='$price',image ='$image',difference ='$difference' WHERE id = '$id'";
        $conn->query($sql);
        
}

 

        ?>

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
</body>

</html>