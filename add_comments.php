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
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #f5f5f5;
}

.container {
  margin: 0 auto;
  padding: 40px 60px;
  max-width: 600px;
  background-color: #fff;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
}

h1 {
  font-size: 32px;
  font-weight: 700;
  color: #333;
  text-align: center;
  margin-bottom: 40px;
}

.form-group {
  margin-bottom: 25px;
}

label {
  font-size: 18px;
  font-weight: 500;
  color: #333;
  margin-bottom: 5px;
  display: block;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 15px;
  border-radius: 10px;
  border: none;
  background-color: #f7f7f7;
  font-size: 16px;
  color: #333;
  line-height: 1.5;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  box-shadow: 0 0 0 1px rgba(0,0,0,0.15);
}

input[type="text"]:focus,
textarea:focus {
  outline: none;
  background-color: #e5e5e5;
  box-shadow: 0 0 0 1px #007bff;
}

textarea {
  height: 150px;
  resize: none;
}

.btn {
  display: inline-block;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 10px;
  font-size: 18px;
  font-weight: 600;
  padding: 15px 30px;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.btn:hover {
  background-color: #0069d9;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

@media screen and (max-width: 768px) {
  .container {
    padding: 40px;
  }

  h1 {
    font-size: 28px;
    margin-bottom: 30px;
  }

  input[type="text"],
  textarea {
    font-size: 14px;
    padding: 10px;
  }

  .btn {
    font-size: 16px;
    padding: 10px 20px;
  }
}



</style></head>

<body>
    
    <?php
    session_start();
     $itemid = $_SESSION["itemid"];
     
     ?>
    <div class="out">
    <h1>Add Comments</h1>
  <form method="post" action="comments.php" class="comment-form ">

    <input type="hidden" name="item" id="item" value="<?php echo $itemid ?>">
    
    <div class="form-group">
            <label for="user">Name:</label>
    <input type="text" name="user" id="user">
            </div>
            <div class="form-group">
                    <label for="text">Comment:</label>
    <textarea name="text" id="text"></textarea>
            </div>
            <div class="form-group">
            <label for="rating">Rating:</label>
    <select name="rating" id="rating">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
            </div>
            <div class="form-group">
            <input type="submit" value="Submit">
            </div>
    
    
   
  </form>
</div>
</body>
</html>

