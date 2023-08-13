<%@ page language="java" contentType="text/html"%>
<%@ page import="java.text.*,java.util.*" %>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/log.css">

</head>
    <body>
    <input type="hidden" id="status" value="<%= request.getAttribute("status") %>">
    <div class="container">
     <form method="post" action="login" class="register-form" id="login-form">
            <div class="form signin">
                <h2>Sign In</h2>
                <div class="inputBox">
                    <input type="text" required="required" name="username" >
                    <i class="fa-solid fa-user"></i>
                    <span>Username</span>
                </div>

                <div class="inputBox">
                    <input type="password" required="required" name="password" >
                    <i class="fa-solid fa-lock"></i>
                    <span>Password</span>
                </div>

                <div class="inputBox">
                    <input type="submit" value="Login" name="signin">
                </div>
                <p>Not registered? <a href ="register.jsp" class="create">Create An Account</a></p>
                </form>
            </div>
    </div>
    
    <script src="vendor/jquery/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://unpkg.comsweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link> 
	<script type="text/javascript"> 
	var status=document.getElementById("status").value;
	if(status=="failed"){
		swal("Wrong Creditnals","Please Check Your Email or Password");
	}
	</script>
     </body>
    </html>