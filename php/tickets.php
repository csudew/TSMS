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

    <form action="../php/adminticket.php" method="post">
    <div class="frame1" style="background-color: aliceblue;">
        <div id="div1">
        
                <div>
                    <font id="font1" style="font-size: x-large;font-weight: bold;">Insert a new ticket</font><br>
                    <font style="font-size: 12px;">Required fields are marked with <font style="color: red;">*</font></font>
                </div>

                <?php
                    session_start();

                    if (isset($_GET['success_message'])) {
                        echo "<p style='color: blue;'>".$_GET['success_message']."</p>";
                        unset($_GET['success_message']);
                    }
                    session_abort();
                ?>
    
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
                    Customer Name<font style="color: red;">*</font> : <br><input type="text" name="CName"placeholder="Customer's Name">
                </div>
                <?php
                    session_start();

                    if (isset($_SESSION['error_message'])) {
                        echo "<p style='color: red;'>".$_SESSION['error_message']."</p>";
                        unset($_SESSION['error_message']);
                    }
                ?>

                
    
                <div style="margin-top: 30px;">
                    Select Priority<font style="color: red;">*</font> : 
                    <select name="priority">
                        <option value="low" style="background-color: aqua;">Low</option>
                        <option value="med" style="background-color: rgb(53, 245, 62);">Medium</option>
                        <option value="high" style="background-color: rgb(255, 217, 0)">High</option>
                        <option value="Criticle" style="background-color: rgb(255, 0, 0)">Criticle</option>
                    </select>
                </div>
    
                <div style="margin-top: 30px;">
                    Select Status<font style="color: red;">*</font> :
                    <select name="status">
                        <option value="new" style="color: rgb(255, 0, 0);">New</option>
                        <option value="waitingreply" style="color: rgb(252, 142, 16);">Waiting for reply</option>
                        <option value="replied" style="color: blue;">Replied</option>
                        <option value="inprogress" style="color: blueviolet;">Inprogress</option>
                        <option value="onhold" style="color:saddlebrown;">Onhold</option>
                    </select>
                </div>
    
                <div style="margin-top: 30px;">
                    Subject<font style="color: red;">*</font> : <br><input type="text" name="subject" placeholder="Enter the Subject">
                </div>
    
                <div style="margin-top: 30px;">
                    Message<font style="color: red;">*</font> : <br><textarea  name="message" rows="10" cols="159"></textarea>
                </div>
    
                
    
                <div style="margin-top: 30px;">
                    Attachment :<input type="file" name="file" style="padding: 10px 5px;">
                </div>
    
                <div style="margin-top: 30px;">
                    <input type="submit" value="Send" name="send" style="padding: 10px 5%;">
                </div>
    
            
        </div>
    </div>
    </form>

    <div>
        <footer>
            <p style="text-align: center;margin-left: 410px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
              <a href="">  Privacy Policy </a>| <a href="">Terms of Service</a> |<a href=""> Contact Us </a></p>
        </footer>
    </div>
    
</body>



</html>