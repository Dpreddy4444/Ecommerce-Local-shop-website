<%@ page language="java" contentType="text/html"%>
<%@ page import="java.text.*,java.util.*" %>
<%@ page import="com.dp.market.CountdownTimer" %>


<!doctype html>
<html lang="en">

<head>
   
      <!-- Google Font -->
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">

      <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
      <title>Super Market</title>

</head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="index.css">

    <body>
        <nav>
            <div class="brand">
                <h2>Super Market</h2>
            </div><ul>
                <li><a href="#">Home</a></li>
                <li><a href="grocery.jsp">Grocery</a></li>
                <li><a href="#">Home and Beauty</a></li>
                <li><a href="#">Past Orders</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="#">Cart</a></li>
                 <li><a href="#"><% if(session.getAttribute("name")!=null){out.print("Welcome "+ session.getAttribute("name"));}%></a></li>
                <li><a href="logout"><% if(session.getAttribute("name")!=null){out.print("Logout");}else{out.print("Sign Up");}%></a></li>
                 
            </ul>
        </nav>

        <div class="cont-fluid">
            <h1 class="display-2"></h1>
        </div>
        <br>
         <br>
          <br>

        <!-- <section class="sec1"></section> -->
<div class="container">
        <section class="container-fluid px-0">
            <div class="row align-items-center content">
                <div class="col-md-6 order-2 order-md-1">
                    <img src="imgs/slider10.jpg" alt="" height="400px" width="600px" >
                </div>
                <div class="col-md-6 text-center order-1 order-md-2">
                    <div class="row justify-content-center">
                        <div class="col-10 col-lg-8 blurb mb-5 mb-md-0">
                            <h2>DAILY NEEDS</h2>
                            <img src="imgs/lolli_icon.png" alt="" class="d-none d-lg-inline">
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, iste molestiae
                                beatae, maiores deserunt
                                in voluptatibus
                                aspernatur architecto excepturi delectus soluta? Ipsa, deleniti dolorem hic consequatur
                                repellat eveniet quidem
                                voluptate necessitatibus dolorum delectus minus vitae, ut, veritatis sint ipsum magnam
                                autem nam ex deserunt debitis
                                eaque ratione! Nobis, quidem assumenda.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center content">
                <div class="col-md-6 text-center">
                    <div class="row justify-content-center">
                        <div class="col-10 col-lg-8 blurb mb-5 mb-md-0">
                            <h2>VEGETABLES</h2>
                            <img src="imgs/lolli_icon.png" alt="" class="d-none d-lg-inline">
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, iste molestiae
                                beatae, maiores deserunt
                                in voluptatibus
                                aspernatur architecto excepturi delectus soluta? Ipsa, deleniti dolorem hic consequatur
                                repellat eveniet quidem
                                voluptate necessitatibus dolorum delectus minus vitae, ut, veritatis sint ipsum magnam
                                autem nam ex deserunt debitis
                                eaque ratione! Nobis, quidem assumenda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="imgs/slider9.jpg" alt="" class="img-fluid" >
                </div>
            </div>
            <div class="row align-items-center content">
                <div class="col-md-6 order-2 order-md-1">
                    <img src="imgs/slider8.jpg" alt="" class="img-fluid" width="600px">
                </div>
                <div class="col-md-6 text-center order-1 order-md-2">
                    <div class="row justify-content-center">
                        <div class="col-10 col-lg-8 blurb mb-5 mb-md-0">
                            <h2>HOME DELIVERY</h2>
                            <img src="imgs/lolli_icon.png" alt="" class="d-none d-lg-inline">
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, iste molestiae
                                beatae, maiores
                                deserunt
                                in voluptatibus
                                aspernatur architecto excepturi delectus soluta? Ipsa, deleniti dolorem hic consequatur
                                repellat eveniet
                                quidem
                                voluptate necessitatibus dolorum delectus minus vitae, ut, veritatis sint ipsum magnam
                                autem nam ex deserunt
                                debitis
                                eaque ratione! Nobis, quidem assumenda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br>
    <br>
    
    <div class="con">
    <h1 class="rak" >Today's Deals Ends In:  </h1>
    
    <p id="rak" class="time"><% 
        long countdownTime = CountdownTimer.getFutureTime(2); // Set the countdown time to 1 hour from now
    %></p>
    </div>


  
    
    <%@include file="slider.html" %>
    <%@include file="footer.html" %>


    

 <script type="text/javascript">
        var endTime = <%= countdownTime %>;
        var x = setInterval(function() {
            var now = new Date().getTime();
            var remainingTime = endTime - now;
            var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
            document.getElementById("rak").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
            if (remainingTime < 0) {
                clearInterval(x);
                document.getElementById("rak").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>


    </body>
    </html>