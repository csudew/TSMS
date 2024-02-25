<?php
session_start();

if (!isset($_SESSION['adminId'])) {
    header('Location: ../login/login.php?154654');
    exit;
}

// Include the database connection file
include '../php/connection.php';

// Get the adminId from the session
$adminId = $_SESSION['adminId'];

// Query to check if the adminId exists in the database
$checkAdminQuery = "SELECT * FROM admin WHERE adminId = ?";
$checkAdminStmt = $pdo->prepare($checkAdminQuery);
$checkAdminStmt->execute([$adminId]);
$admin = $checkAdminStmt->fetch(PDO::FETCH_ASSOC);
$adminName=$admin['name'];

// If adminId does not exist in the database, redirect to the login page
if (!$admin) {
    header('Location:../login/login.php');
    exit;
}
?>

<html>

<head>
    <title>
        Quatem Mobile - Admin
    </title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <script src="../js/validate.js"></script>
    <link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv" style="height: 1050px;"> <!--side navigation-->
            <ul id="ulid">
                <a href="../admin.php"><li>Tickets</li></a>
                <a style="text-decoration: none;color: black;" href="searchcustomer.php"><li>Search<br>Customer</li></a>
                <a style="text-decoration: none;color: black;" href="searchticket.php"><li>Search<br>Ticket</li></a>
                <a href="knowledge.php"><li>Knowladge</li></a>
                <a href="team.php"><li>Team</li></a>
            </ul>
        </div>

            <div>
                <img src="../icons/logo.png" alt="logo" style="width:70px;height:70px;margin-top:10px;margin-left:20px">
            </div>
            <div style="width:400px;margin-top:20px;margin-left:-60px">
                    <font style="font-size: 30px;font-weight: bold;"><a href="dashboard.php">Quantem Mobile</a></font><br>
                    <font style="font-size: 15px;">Technical Support Team</font>
            </div>

    
            <div style="margin-left: 350px;">
                <ul id="topnav">
                    <a href="tickets.php"><li>Create Ticket</li></a>
                    <a href="adminaccount.php"><li>Account</li></a>
                </ul>
            </div>
    </div>

    <form name="adminForm" action="../php/newadminhandler.php" method="post" onsubmit="return validateForm()">
    <div class="frame7" style="height: 890px;">
        <div id="div1">
                <div>
                    <font id="font1" style="font-size: x-large;font-weight: bold;">Add New Admin</font><br>
                    <font style="font-size: 12px;">Required fields are marked with <font style="color: red;">*</font></font>
                </div>

                <div id="message">
                <?php
                    

                    if (isset($_GET['msg'])) {
                        echo "<p style='color: blue;'>"."New admin added to database."."</p>"."
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
                    Admin Type <font style="color: red;">*</font> : 
                    <select name="Atype" id="">
                        <option value="Ticket Admin">Ticket Admin</option>
                        <option value="DB Admin">DB Admin</option>
                    </select>
                </div>

                <div style="margin-top: 30px;">
                    Phone Number<font style="color: red;">*</font> : <br><input type="text" name="APnum" placeholder="Admin Phone Number">
                </div>
    
                <div style="margin-top: 30px;">
                    Expert Category<font style="color: red;">*</font> : 
                    <select name="Acategory" id="">
                        <option value="Call">Call</option>
                        <option value="Internet">Internet</option>
                        <option value="HBB">HBB</option>
                        <option value="TV">TV</option>
                    </select>
                </div>
    
                <div style="margin-top: 30px;">
                    Password<font style="color: red;">*</font> : <br><input type="password" name="Apw" placeholder="Enter Admin Password">
                </div>

                <div style="margin-top: 30px;">
                    Re-Enter Password<font style="color: red;">*</font> : <br><input type="password" name="ARpw" placeholder="Re-Enter Admin Password">
                </div>
    
                <div style="margin-top: 30px;">
                    <input type="submit" value="save" name="save" style="padding: 10px 5%;">
                </div>
    
        </div>
    </div>
    </form>
    
    <div>
        <footer style="position:relative">
            <p style="text-align: center;margin-left: 400px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
              <a href="">  Privacy Policy </a>| <a href="">Terms of Service</a> |<a href=""> Contact Us </a></p>
        </footer>
    </div>

    <script>
    window.onload = function() {
        var pageHeight = document.body.offsetHeight;

        document.getElementById('navdiv').style.height = pageHeight + 'px';
        };
    </script>
    
</body>



</html>