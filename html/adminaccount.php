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

// Function to logout
function logout() {
    // Unset all of the session variables
    $_SESSION = [];

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header('Location: ../login/login.php');
    exit;
}

// Check if logout button is clicked
if (isset($_GET['logout'])) {
    logout();
}

// Check if adminId is not set, then redirect to login page
if (!isset($_SESSION['adminId'])) {
    header('Location:../login/login.php?154654');
    exit;
}

// Include the database connection file
include '../php/connection.php';

// Get the adminId from the session
$adminId = $_SESSION['adminId'];

// Query to retrieve admin details based on adminId from session
$fetchAdminQuery = "SELECT * FROM admin WHERE adminId = ?";
$fetchAdminStmt = $pdo->prepare($fetchAdminQuery);
$fetchAdminStmt->execute([$adminId]);
$adminDetails = $fetchAdminStmt->fetch();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Quantem Mobile - Admin</title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <script src="../js/validate.js"></script>
    <link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
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
    
        <div>
            <img src="../icons/logo.png" alt="logo" style="width:70px;height:70px;margin-top:10px;margin-left:20px">
        </div>
        <div style="width:400px;margin-top:20px;margin-left:-60px">
            <font style="font-size: 30px;font-weight: bold;"><a href="dashboard.php">Quantem Mobile</a></font><br>
            <font style="font-size: 15px;">Technical Support Team</font>
        </div>

        <div style="margin-left: 150px;">
            <ul id="topnav">
                <a href="tickets.php"><li>Create Ticket</li></a>
                <a href="adminaccount.php"><li>Account</li></a>
                <li><a href="?logout">Logout</a></li>
            </ul>
        </div>
    </div>


    <div class="frame1">
        <font style="font-size: x-large;margin-top: 30px;font-weight: bold;">Account Details</font>
    </div>
    

    <?php
    // Include your database connection file
    require_once "../php/connection.php";

    // Fetch admin details based on adminId from session
    $adminId = $_SESSION['adminId'];
    $fetchAdminQuery = "SELECT * FROM admin WHERE adminId = ?";
    $fetchAdminStmt = $pdo->prepare($fetchAdminQuery);
    $fetchAdminStmt->execute([$adminId]);
    $adminDetails = $fetchAdminStmt->fetch();
    ?>

    <div class="frame1" style="margin-top:30px">
        Name: <?php echo $adminDetails['name']; ?>
    </div>

    <div class="frame1" style="margin-top:30px">
        User Name: <?php echo $adminDetails['userName']; ?>
    </div>

    <div class="frame1" style="margin-top:30px">
        Email: <?php echo $adminDetails['email']; ?>
    </div>

    <div class="frame1" style="margin-top:30px">
        Phone number: <?php echo $adminDetails['phonenumber']; ?>
    </div>

    <div class="frame1" style="margin-top:50px">
        <font style="font-size: x-large;margin-top: 30px;font-weight: bold;">Change Password</font>
    </div>

    <div class="frame1">
                <?php
                   

                    if (isset($_GET['success'])) {
                        echo "<p style='color: blue;'>"."Password Changed."."</p>"."
                        <script>
                            setTimeout(()=> {var msg = document.getElementById('message').style.display = 'none';
                            }, 5000);
                        </script>";
                        //unset($_SESSION['success_message']);
                    }
                    
                ?>

                <?php
                    

                    if (isset($_GET['fail'])) {
                        echo "<p style='color: red;'>"."current password is wrong."."</p>"."
                        <script>
                            setTimeout(()=> {var msg = document.getElementById('message').style.display = 'none';
                            }, 5000);
                        </script>";
                        //unset($_SESSION['success_message']);
                    }
                    
                ?>
    </div>

    <!-- Password change form -->
    <form action="../php/pwchange.php" method="POST">
        <div class="frame1" style="margin-top:30px">
            <input type="password"  name="cpw" placeholder="Enter Current Password" required/><br>
        </div>
        <div class="frame1" style="margin-top:30px">
            <input type="password"  name="npw" placeholder="Enter New Password" required/><br>
        </div>

        <div class="frame1" style="margin-top:30px">    
            <input type="password"  name="rpw" placeholder="Re-Enter New Password" required/><br>
        </div>
        <div class="frame1" style="margin-top:30px;">    
            <input type="submit" style="padding: 10px 10px"  value="Change Password"/>
        </div>
    </form>

    <div>
        <footer style="position:relative">
            <p style="text-align: center;margin-left: 400px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
              <a href="">  Privacy Policy </a>| <a href="">Terms of Service</a> |<a href=""> Contact Us </a></p>
        </footer>
    </div>

    <script>
        function validatePassword() {
            var npw = document.getElementById("npw").value;
            var rpw = document.getElementById("rpw").value;

            if (npw != rpw) {
                alert("New Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>

    <script>
    window.onload = function() {
        var pageHeight = document.body.offsetHeight;

        document.getElementById('navdiv').style.height = pageHeight + 'px';
        };
    </script>

</body>

</html>
