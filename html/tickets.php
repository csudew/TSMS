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

                <div id="message">
                <?php
                    session_start();

                    if (isset($_GET['msg'])) {
                        echo "<p style='color: blue;'>"."Ticket add to database successfully"."</p>"."
                        <script>
                            setTimeout(()=> {var msg = document.getElementById('message').style.display = 'none';
                            }, 5000);
                        </script>";
                        //unset($_SESSION['success_message']);
                    }
                    session_abort();
                ?>
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
                    Customer Name<font style="color: red;">*</font> : <br><textarea name="CName"placeholder="Customer's Name" rows="2" cols="159"></textarea>
                </div>

                <div id="fmessage">
                <?php
                    session_start();

                    if (isset($_GET['fmsg'])) {
                        echo "<p style='color: red;'>"."Customer not found in the database. Please make sure the customer exists."."</p>"."
                        <script>
                            setTimeout(()=> {var msg = document.getElementById('fmessage').style.display = 'none';
                            }, 5000);
                        </script>";
                        //unset($_SESSION['success_message']);
                    }
                    session_abort();
                ?>
                </div>

                
    
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
                        <option value="waiting-reply" style="color: rgb(252, 142, 16);">Waiting for reply</option>
                        <option value="replied" style="color: blue;">Replied</option>
                        <option value="inprogress" style="color: blueviolet;">Inprogress</option>
                        <option value="onhold" style="color:saddlebrown;">Onhold</option>
                    </select>
                </div>
    
                <div style="margin-top: 30px;">
                    Subject<font style="color: red;">*</font> : <br>
                    <textarea name="subject"placeholder="Enter the Subject" rows="2" cols="159"></textarea>
                </div>
    
                <div style="margin-top: 30px;">
                    Message<font style="color: red;">*</font> : <br><textarea  name="message" rows="10" cols="159" placeholder="Enter the description"></textarea>
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