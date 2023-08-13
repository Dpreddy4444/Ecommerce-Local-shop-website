<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">
    
<style>

  
h2{
  margin-top: 100px;}
      .dp input[type=text] {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('search2.png');
  background-size: 20px 20px;
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  transition: width 0.4s ease-in-out;
}

.dp input[type=text]:focus {
  width: 100%;
}

.footer {
  background-color: #F8F8F8;
  padding: 50px 0;
}

.footer h4 {
  margin-bottom: 20px;
}

.footer p {
  font-size: 14px;
  line-height: 24px;
  margin-bottom: 30px;
}

.footer ul li {
  margin-bottom: 10px;
}

.footer ul li a {
  color: #777777;
  text-decoration: none;
}

.footer ul li a:hover {
  color: #3366CC;
}

.footer hr {
  margin-top: 30px;
  margin-bottom: 30px;
}

.footer p.small {
  font-size: 12px;
  color: #777777;
}

.footer a {
  color: #3366CC;
}

.footer a:hover {
  color: #777777;
}

#search-form {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
      }
      #search-form input[type="text"] {
        width: 100%;
        max-width: 500px;
        padding: 1rem;
        border: none;
        border-radius: 0;
        border-bottom: 2px solid #6c757d;
        font-size: 1.5rem;
        transition: border-color 0.2s ease-in-out;
        margin-left: 30px;
      }
      #search-form input[type="text"]:focus {
        outline: none;
        border-color: #007bff;
      }
      #search-form button[type="submit"] {
        border-radius: 0;
        font-size: 1.5rem;
        padding: 1rem;
      }
      /* Customize the style of the accordion */
      .accordion-button:not(.collapsed) {
        background-color: #007bff;
        color: #fff;
      }
      .accordion-button:not(.collapsed)::after {
        content: "-";
      }
      .accordion-button.collapsed::after {
        content: "+";
      }
      .accordion-body {
        border-bottom: 2px solid #6c757d;
        padding: 1rem;
      }
      /* Customize the style of the answers */
      .answer {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 2rem;
        margin-bottom: 2rem;
      }
      .answer h3 {
        color: #007bff;
        font-weight: bold;
        font-size: 1.5rem;
        margin-top: 0;
        margin-bottom: 1rem;
      }
      .answer p {
        font-size: 1.25rem;
        margin-bottom: 0;
      }

        </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Contact Us</title>
  </head>
  <body>
  
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $desc = $_POST['desc'];
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "contacts";


      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `contactus` (`name`, `email`, `concern`, `dt`) VALUES ('$name', '$email', '$desc', current_timestamp())";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }

      }

    }

    
?>

<div class="container mt-3">
<h1>Contact us for your concerns</h1>
    <form action="/dp/trail.php" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"> 
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="desc">Description</label>
        <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"></textarea> 
    </div>
    
    <button href="/dp/trail.php" type="submit" class="btn btn-primary">Submit</button>
    </form><br><br><br>












    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <?php $html = file_get_contents('footer.html');
    echo $html ?>;
  </body>
</html>

