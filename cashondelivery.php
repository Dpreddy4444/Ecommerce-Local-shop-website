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
<?php echo "<div class='container'>

<form method='POST' action='cashondeliverycheck.php'>

    <div class='row'>

        <div class='col'>

            <h3 class='title'>Address to deliver</h3>

            <div class='inputBox'>
                <span>full name :</span>
                <input type='text' placeholder='dp reddy' name='name'>
            </div>
            <div class='inputBox'>
                <span>mobile number :</span>
                <input type='text' placeholder='+91 7993371396' name='phno'>
            </div>
            <div class='inputBox'>
                <span>Door No :</span>
                <input type='text' placeholder='room' name='doorno'>
            </div>
            <div class='inputBox'>
                <span>address :</span>
                <input type='text' placeholder='street - locality' name='address'>
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


    </div>

    <input type='submit' value='proceed to place order' class='submit-btn' href='orderplaced.html'>

</form>

</div>
"?>
</body>
</html>