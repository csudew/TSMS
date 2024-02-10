<html>

<head>
    <title>
        Quatem Mobile - Admin
    </title>
    <link rel="stylesheet" href="../css/adminstyle.css">
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv" style="height: 1050px;"> <!--side navigation-->
            <ul id="ulid">
                <a href="../admin.php"><li>Tickets</li></a>
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
                    <li><a href="tickets.php">Create Ticket</a></li>
                    <li>Massages</li>
                    <li>Account</li>
                </ul>
            </div>
    </div>

    <form action="../php/newadminhandler.php" method="post">
    <div class="frame7" style="height: 850px;">
        <div id="div1">
            <form action="">
                <div>
                    <font id="font1" style="font-size: x-large;font-weight: bold;">Add New Admin</font><br>
                    <font style="font-size: 12px;">Required fields are marked with <font style="color: red;">*</font></font>
                </div>

                <div style="margin-top: 30px;">
                    Admin Name<font style="color: red;">*</font> : <br><input type="text" name="AName"placeholder="Admin Name">
                </div>

                <div style="margin-top: 30px;">
                    Admin User Name<font style="color: red;">*</font> : <br><input type="text" name="AUName"placeholder="Admin User Name">
                </div>

                <div style="margin-top: 30px;">
                    Gender<font style="color: red;">*</font> : 
                    Male <input type="radio" name="gender" value="male"> Female <input type="radio" name="gender" value="female">
                </div>

                <div style="margin-top: 30px;">
                    Email<font style="color: red;">*</font> : <br><input type="text" name="Aemail" placeholder="Admin Email">
                </div>

                <div style="margin-top: 30px;">
                    Phone Number<font style="color: red;">*</font> : <br><input type="text" name="APnum" placeholder="Admin Phone Number">
                </div>
    
                <div style="margin-top: 30px;">
                    Expert Category<font style="color: red;">*</font> : 
                    <select name="Acategory" id="">
                        <option value="general">General</option>
                        <option value="support">support</option>
                        <option value="ads">Advertising</option>
                        <option value="bill">Billing</option>
                    </select>
                </div>
    
                <div style="margin-top: 30px;">
                    Password<font style="color: red;">*</font> : <br><input type="text" name="Apw" placeholder="Enter Admin Password">
                </div>

                <div style="margin-top: 30px;">
                    Re-Enter Password<font style="color: red;">*</font> : <br><input type="text" name="ARpw" placeholder="Re-Enter Admin Password">
                </div>
    
                <div style="margin-top: 30px;">
                    <input type="submit" value="save" name="save" style="padding: 10px 5%;">
                </div>
    
            </form>
        </div>
    </div>
    </form>
    
    <div>
        <footer >
            <p style="text-align: center;margin-left: 400px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
              <a href="">  Privacy Policy </a>| <a href="">Terms of Service</a> |<a href=""> Contact Us </a></p>
        </footer>
    </div>
    
</body>



</html>