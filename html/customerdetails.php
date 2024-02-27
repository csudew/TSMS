<?php
session_start();

if (!isset($_SESSION['adminId'])) {
    header('Location: ../login/login.php?154654');
    exit;
}

include '../php/connection.php';

$adminId = $_SESSION['adminId'];

$checkAdminQuery = "SELECT * FROM admin WHERE adminId = ?";
$checkAdminStmt = $pdo->prepare($checkAdminQuery);
$checkAdminStmt->execute([$adminId]);
$admin = $checkAdminStmt->fetch(PDO::FETCH_ASSOC);
$adminName=$admin['name'];

if (!$admin) {
    header('Location: ../login/login.php');
    exit;
}
?>

<?php

$CName = $_GET['CName'] ?? '';
$CUName = $_GET['CUName'] ?? '';
$Cemail = $_GET['Cemail'] ?? '';
$CPnum = $_GET['CPnum'] ?? '';

$query = "SELECT * FROM customer WHERE name = :CName OR userName = :CUName OR email = :Cemail OR phonenumber = :CPnum";
$stmt = $pdo->prepare($query);

$stmt->bindParam(':CName', $CName);
$stmt->bindParam(':CUName', $CUName);
$stmt->bindParam(':Cemail', $Cemail);
$stmt->bindParam(':CPnum', $CPnum);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<html>

<head>
    <title>
        Quatem Mobile - Admin
    </title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv" style="height: 1000px;"> <!--side navigation-->
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
        <table id="ttable">
            <thead>
            <tr>
                <th style="padding: 10px 30px;">Ticket Id</th>
                <th style="padding: 10px 300px;">subject</th>
                <th style="padding: 10px 30px;">Category</th>
            </tr>
            </thead>
            <tr>
                <!-- values of the table-->
            </tr>
        </table>
    </div>


   </div>



    <div>
        <footer>
            <p style="text-align: center;margin-left: 410px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
            <a href="privacy_policy.php">  Privacy Policy </a>| <a href="term_and_conditions.php">Terms of Service</a> |<a href=""> Contact Us </a></p>
        </footer>
    </div>
    
</body>



</html>