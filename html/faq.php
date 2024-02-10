<html>

<head>
    <title>
        Quatem Mobile - Admin
    </title>
    <link rel="stylesheet" href="../css/adminstyle.css">
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv" style="height: 900;"> <!--side navigation-->
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

    <div class="frame7" style="height: 700;">
        <div id="div1">
            <form action="">
                <div>
                    <font id="font1" style="font-weight: bold;font-size: x-large;">Insert a new FAQ</font><br>
                    <font style="font-size: 12px;">Required fields are marked with <font style="color: red;">*</font></font>
                </div>
    
                <div style="margin-top: 30px;">
                    Select Category<font style="color: red;">*</font> : 
                    <select name="Category" id="">
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
                    Files :<input type="file" name="file" style="padding: 10px 5px;">
                </div>
    
                <div style="margin-top: 30px;">
                    <input type="submit" value="submit" name="submit" style="padding: 10px 5%;">
                </div>
    
            </form>
        </div>
    </div>

    <div>
        <footer>
            <p style="text-align: center;margin-left: 400px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
              <a href="">  Privacy Policy </a>| <a href="">Terms of Service</a> |<a href=""> Contact Us </a></p>
        </footer>
    </div>
    
    
</body>



</html>