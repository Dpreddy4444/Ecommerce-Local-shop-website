<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
</head>
<body>
<?php
$host = 'localhost';
$user = 'root';
$pass = 'dpreddy';
$db   = 'login';
$port = '3308';
$conn = mysqli_connect($host, $user, $pass, $db, $port);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
}
session_start();
$_SESSION["idra"] = $id;
if (isset($_POST['edit'])) {
  $work = $_POST['edit'];
} elseif (isset($_POST['delete'])) {
  $work = $_POST['delete'];
 }
  

 
  if($work=="delete"){
    $sql = "DELETE FROM products WHERE id = '$id'";
    $conn->query($sql);
    header('Location: tablespage.php'); 
  }
  if($work=="edit"){
    header('Location: editpage.php');
  }
  
 
   ?>










</body></html>