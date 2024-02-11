<html>

<head>
    <title>
        Quatem Mobile - Admin
    </title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <script src="../js/validate.js"></script>
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv" style="height: 900;"> <!--side navigation-->
            <ul id="ulid">
                <a href="../admin.php"><li>Tickets</li></a>
                <a style="text-decoration: none;color: black;" href="searchcustomer.php"><li>Search<br>Customer</li></a>
                <a href="category.php"><li>Category</li></a>
                <a href="knowledge.php"><li>Knowladge</li></a>
                <a href="team.php"><li>Team</li></a>
            </ul>
        </div>
    
            <div id="quantemid">
                <font style="font-size: 30px;font-weight: bold;">Quantem Mobile</font>
                <font style="margin-left: 3px;font-size: 15px;">Technical Support Team</font>
            </div>
    
            <div style="margin-left: 380;">
                <ul id="topnav">  <!-- top nav-->
                <a href="html/tickets.php"><li>Create Ticket</li></a>
                    <li>Massages</li>
                    <li>Account</li>
                </ul>
            </div>
    </div>


    <form name="customerSearch" action="" method="post" onsubmit="return customersearchvalidation(event)" >
    <div class="frame7" style="height: 800px;">
        <div id="div1">
                <div>
                    <font id="font1" style="font-size: x-large;font-weight: bold;">Search a Customer</font><br>

                <div style="margin-top: 30px;">
                    Customer Name :<input type="text" name="CName"placeholder="Customer Name">
                </div>
                <div style="margin-top: 30px;">
                    <input type="submit" value="Search" name="CNsearch" style="padding: 10px 5%;">
                </div>

                <div style="margin-top: 30px;">
                    Customer User Name :<input type="text" name="CUName"placeholder="Customer User Name">
                </div>
                <div style="margin-top: 30px;">
                    <input type="submit" value="Search" name="CUNsearch" style="padding: 10px 5%;">
                </div>

                <div style="margin-top: 30px;">
                    Customer Email : <br><input type="text" name="Cemail" placeholder="Customer Email">
                </div>
                <div style="margin-top: 30px;">
                    <input type="submit" value="Search" name="CEsearch" style="padding: 10px 5%;">
                </div>


                <div style="margin-top: 30px;">
                    Customer Phone Number : <br><input type="text" name="CPnum" placeholder="Customer Phone Number">
                </div>
                <div style="color: red; margin-top: 5px;"></div>
                <div style="margin-top: 30px;">
                    <input type="submit" value="Search" name="CPNsearch" style="padding: 10px 5%;">
                </div>

                
    
        </div>
    </div>
    </form>
    
    <div>
        <footer>
            <p style="text-align: center;margin-left: 400px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
              <a href="">  Privacy Policy </a>| <a href="">Terms of Service</a> |<a href=""> Contact Us </a></p>
        </footer>
    </div>
    
</body>



</html>