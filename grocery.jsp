<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ page import="java.sql.*" %>
<%@ page import="java.util.*" %>
<%@ page import="com.dp.market.Product" %>
 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Product Cards</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/grocery.css">
</head>
<body>



<div class="container">
    <form action="" class="search_bar" method="get">
        <input type="text" name="search" id="search" placeholder="Search Anything" name="q" for="search">
        <button type="submit"><img src="imgs/search.png"></button>
    </form>
        <div class="row">
        
        <%
    String searchTerm = request.getParameter("search");
    
    List<Product> productList = new ArrayList<>();
    if (searchTerm !="") {
    String sql = "SELECT * FROM products WHERE name LIKE ?";
    try {
    	Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/login", "root", "dpreddy");
         PreparedStatement stmt = conn.prepareStatement(sql);
        stmt.setString(1, "%" + searchTerm + "%");
        ResultSet rs = stmt.executeQuery();
        	while (rs.next()) {
                int id = rs.getInt("id");
                String name = rs.getString("name");
                String description = rs.getString("description");
                double price = rs.getDouble("price");
                String image=rs.getString("image");
                if (name == "") {
                    out.print("The object is null");
                } 
                Product product = new Product(id, name, description, price, image);
          
   %>
    <div class="col-sm-4">
        <div class="card mb-4">
        <img src="<%= product.getImage() %>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><%= product.getName() %></h5>
                <p class="card-text"><%= product.getDescription() %></p>
                <p class="card-text">Rs <%= product.getPrice() %></p>
               <button type="button" class="btn btn-outline-success">Add to cart</button>
            </div>
        </div>
    </div>
    
    <%
            }

            // Close the result set, statement, and connection
            rs.close();
            stmt.close();
            conn.close();
        } catch (Exception ex) {
            out.println("Error: " + ex.getMessage());
        }}
%>
 
        </div>
    </div>
<div class="container">
    <div class="row">
        <%
        if(searchTerm==null){
        	 %>
        	 <%	    	 
            try {
                // Connect to the database
                Class.forName("com.mysql.jdbc.Driver");
                Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/login", "root", "dpreddy");

                // Create a statement
                Statement stmt = conn.createStatement();

                // Execute the query
                ResultSet rs = stmt.executeQuery("SELECT * FROM products");

                // Loop through the result set and create a Bootstrap card for each product
                while (rs.next()) {
                    int id = rs.getInt("id");
                    String name = rs.getString("name");
                    String description = rs.getString("description");
                    double price = rs.getDouble("price");
                    String image=rs.getString("image");

                    Product product = new Product(id, name, description, price, image);
        %>
       
        <div class="col-sm-4">
            <div class="card mb-4">
            <img src="<%= product.getImage() %>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><%= product.getName() %></h5>
                    <p class="card-text"><%= product.getDescription() %></p>
                    <p class="card-text">Rs <%= product.getPrice() %></p>
                    <button type="button" class="btn btn-outline-success">Add to Cart</button>
                </div>
            </div>
        </div>
        
        <%
                }

                // Close the result set, statement, and connection
                rs.close();
                stmt.close();
                conn.close();
            } catch (Exception ex) {
                out.println("Error: " + ex.getMessage());
            }}
      %>
    </div>
</div>
<%@include file="footer.html" %>

</body>
</html>
