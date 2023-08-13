<%@ page import="com.dp.market.CountdownTimer" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Time Countdown</title>
</head>
<body>
 

    <div id="countdown"></div>
    
    <% 
        long countdownTime = CountdownTimer.getFutureTime(2); // Set the countdown time to 1 hour from now
    %>
    
    <script type="text/javascript">
        var endTime = <%= countdownTime %>;
        var x = setInterval(function() {
            var now = new Date().getTime();
            var remainingTime = endTime - now;
            var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
            document.getElementById("countdown").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
            if (remainingTime < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
</body>
</html>

