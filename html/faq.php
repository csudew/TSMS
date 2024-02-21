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
                <a style="text-decoration: none;color: black;" href="searchticket.php"><li>Search<br>Ticket</li></a>
                <a href="knowledge.php"><li>Knowladge</li></a>
                <a href="team.php"><li>Team</li></a>
            </ul>
        </div>
    
            <div id="quantemid">
                <font style="font-size: 30px;font-weight: bold;"><a href="dashboard.php">Quantem Mobile</a></font>
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

    <form name="faqvali" action="../php/newfaqhandler.php"  method="post" onsubmit="return faqvalidation()">
    <div class="frame7" style="height: 700;">
        <div id="div1">
                <div>
                    <font id="font1" style="font-weight: bold;font-size: x-large;">Insert a new FAQ</font><br>
                    <font style="font-size: 12px;">Required fields are marked with <font style="color: red;">*</font></font>
                </div>
    
                <div style="margin-top: 30px;">
                    Select Category<font style="color: red;">*</font> : 
                    <select name="category" id="">
                        <option value="general">General</option>
                        <option value="support">support</option>
                        <option value="ads">Advertising</option>
                        <option value="bill">Billing</option>
                    </select>
                </div>
    
                <div style="margin-top: 30px;">
                    Subject<font style="color: red;">*</font> : <br><input type="text" name="ksubject"placeholder="Subject of the FAQ">
                </div>
    
                <div style="margin-top: 30px;">
                    Content<font style="color: red;">*</font> : <br><textarea  name="kcontent" rows="15.5" cols="159"></textarea>
                </div>
    
                <div style="margin-top: 30px;">
                    Files :<input type="file" name="kfile" style="padding: 10px 5px;">
                </div>
    
                <div style="margin-top: 30px;">
                    <input type="submit" value="submit" name="submit" style="padding: 10px 5%;">
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