<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="payment.css">

</head>
<body>
<?php if (isset($error_msg)) { ?>
      <center><p class="error" style="margin-top: 50px;"><?php echo $error_msg; ?></p></center>
    <?php } ?>
<?php 




echo"
<div class='container'>
<form method='POST' action='preordercheck.php'>

<div class='row'>

    <div class='col'>

        <h3 class='title'>billing address</h3>

        <div class='inputBox'>
            <span>full name :</span>
            <input type='text' placeholder='dp reddy' name='name'>
        </div>
        <div class='inputBox'>
            <span>email :</span>
            <input type='email' placeholder='dp@example.com' name='email'>
        </div>
        <div class='inputBox'>
            <span>address :</span>
            <input type='text' placeholder='room - street - locality' name='address'>
        </div>
        <div class='inputBox'>
            <span>city :</span>
            <input type='text' placeholder='Anaparthy' name='city'>
        </div>

        <div class='flex'>
            <div class='inputBox'>
                <span>state :</span>
                <input type='text' placeholder='india' name='state'>
            </div>
            <div class='inputBox'>
                <span>zip code :</span>
                <input type='text' placeholder='5333 42' name='zipcode'>
            </div>
        </div>

    </div>

    <div class='col'>

        <h3 class='title'>payment</h3>

        <div class='inputBox'>
            <span>cards accepted :</span>
            <img src='imgs/card_img.png' alt=''>
        </div>
        <div class='inputBox'>
            <span>name on card :</span>
            <input type='text' placeholder='mr. dp reddy' name='nameoncard'>
        </div>
        <div class='inputBox'>
            <span>credit card number :</span>
            <input type='number' placeholder='1111-2222-3333-4444' name='cardno'>
        </div>
        <div class='inputBox'>
            <span>exp month :</span>
            <input type='text' placeholder='january' name='expmonth'>
        </div>

        <div class='flex'>
            <div class='inputBox'>
                <span>exp year :</span>
                <input type='number' placeholder='2022' name='expyear'>
            </div>
            <div class='inputBox'>
                <span>CVV :</span>
                <input type='text' placeholder='1234' name='cvv'>
            </div>
        </div>

    </div>

</div>

<input type='submit' value='proceed to checkout' class='submit-btn'>

    </form>

</div>   ";


?>
    
</body>
</html>