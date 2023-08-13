<%@ page language="java" contentType="text/html"%>
<%@ page import="java.text.*,java.util.*" %>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


    <body>
    <input type="hidden" id="status" value="<%= request.getAttribute("status") %>">
        <div class="container">
        <form method="post" action="reg" class="register-form" id="register-form">
            <div class="form signup">
                <h2>Sign Up</h2>
                <div class="inputBox">
                    <input type="text" required="required" name="name" >
                    <i class="fa-solid fa-user"></i>
                    <span>Username</span>
                </div>
                <div class="inputBox">
                    <input type="text" required="required" name="email" >
                    <i class="fa-solid fa-envelope"></i>
                    <span>Email Address</span>
                </div>
                <div class="inputBox">
                    <input type="password" required="required" name="pass" >
                    <i class="fa-solid fa-lock"></i>
                    <span>Create Password</span>
                </div>
                <div class="inputBox">
                    <input type="password" required="required" name="re_pass" >
                    <i class="fa-solid fa-lock"></i>
                    <span>Confirm Password</span>
                </div>
                <div class="inputBox">
                    <input type="text" required="required" name="contact" >
                    <i class="fa-solid fa-lock"></i>
                    <span>Phno</span>
                </div>
                <div class="inputBox">
                    <input type="submit" value="Create Account" name="signup" >
                </div>
                 </form>
                <p>Already a Member? <a href ="log.jsp" class="login">Log in</a></p>
                
            </div>
        </div>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
	<script type="text/javascript">
	var status=document.getElementById("status").value;
	if(status=="success"){
		swal("","Account have been Created Successfully","success");
	}
	
	</script>

    </body>
    </html>