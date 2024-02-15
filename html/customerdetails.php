<html>

<head>
    <title>
        Quatem Mobile - Admin
    </title>
    <link rel="stylesheet" href="../css/adminstyle.css">
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv" style="height: 1000px;"> <!--side navigation-->
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
                <ul id="topnav">
                <a href="tickets.php"><li>Create Ticket</li></a>
                    <li>Massages</li>
                    <li>Account</li>
                </ul>
            </div>
    </div>

   <div>

        <div class="frame1" style="background-color: whi;">
           <font style="font-size: x-large;margin-top: 30px;font-weight: bold;">User Details</font>
        </div>

        <div class="frame2">
            User Name :  <font id="cname"></font><br>
        </div>

        <div class="frame2">
            User Email :  <font id="cemail"></font><br>
        </div>

        <div class="frame2">
            User Phone Number :  <font id="cpnum"></font><br>
        </div>

        <div class="frame2">
            Number of the Tickets :  <font id="tnum"></font><br>
        </div>

        <div class="frame4">
        <table>
            <tr>
                <th>Ticket Id</th>
                <th style="padding: 10px 300px;">subject</th>
                <th>Category</th>
            </tr>
            <tr>
                <!-- values of the table-->
            </tr>
        </table>
    </div>


   </div>



    <div>
        <footer>
            <p style="text-align: center;margin-left: 410px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
              <a href="">  Privacy Policy </a>| <a href="">Terms of Service</a> |<a href=""> Contact Us </a></p>
        </footer>
    </div>
    
</body>



</html>