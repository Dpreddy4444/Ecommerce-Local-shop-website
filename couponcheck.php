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
  <link rel="stylesheet" href="index.css" />

  <body>

  <?php 
  $discount_coupons =  array(
    'werfamily' => 10,
    'festiveseason' => 25,
    'yougotit' => 5
  );
  $user_coupon = $_POST['coupon_code'];


  foreach ($discount_coupons as $key => $value) {
    if ($user_coupon== $key) {
      // If match is found, set cookie with key and value
      setcookie("coupon_match", $key . "=" . $value, time() + (86400 * 30), "/"); // Cookie will last for 30 days
    }
  }  
  header('Location: cartpage.php');
  
  
  ?>
  </body></html>