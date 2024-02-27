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
$adminCategory = $admin['category'];

if (!$admin) {
    header('Location:../login/login.php');
    exit;
}
?>

<?php

?>

<html>

<head>
    <title>
        Quatem Mobile - Admin
    </title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
    <script src="../js/validate.js"></script>
    <style>
        .frame7 {
            overflow-y: auto; 
            max-height: 300px; 
        }
    </style>
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

        <script>
            window.onload = function() {
            var pageHeight = document.body.offsetHeight;

            document.getElementById('navdiv').style.height = pageHeight + 'px';
            };
        </script>
    
    
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

    <div class="frame6" style="margin:10px">
    <ul id="actionnav2">
        <?php 
        // Check if $faqId is set
        if(isset($_GET['faqId'])) {
            $faqId = $_GET['faqId'];
            // Check if the logged-in admin is a Web Admin
            if($admin['category'] === 'Web Admin'): 
        ?>
                <!-- Create link to delete FAQ -->
                <a href="../php/deletefaq.php?faqId=<?php echo $faqId; ?>"><li style="margin-top:00px">Delete FAQ</li></a>
        <?php 
            endif; 
        } 
        ?>
    </ul>
</div>



    <!--show ticket details-->
    <?php

if(isset($_GET['faqId'])) {
    $faqId = $_GET['faqId'];

    $queryFAQ = "SELECT * FROM faq WHERE faqId = ?"; 
    $stmtFAQ = $pdo->prepare($queryFAQ);
    $stmtFAQ->execute([$faqId]);
    $faq = $stmtFAQ->fetch(PDO::FETCH_ASSOC);

    if ($faq) {
        echo "<div class='frame1' style='margin-top:20px'>";
        echo "<font style='font-weight:bold;font-size:20px;'><font style='color:#74a9ff'>FAQ ID:</font> " . $faq['faqId'] . "</font></div>";
        echo "<div class='frame1' style='margin-top:20px'>";
        echo "<font style='font-weight:bold;font-size:20px;'><font style='color:#74a9ff'>Title:</font> " . $faq['title'] . "</font></div>";
        echo "<div class='frame1' style='margin-top:20px'>";
        echo "<font style='font-weight:bold;font-size:20px;'><font style='color:#74a9ff'>Content:</font> " . $faq['content'] . "</font></div>";
    } else {
        echo "<div class='frame1'>";
        echo "<p>No FAQ found with the specified ID.</p>";
        echo "</div>";
    }
}
            
            ?>

            


    <div>
        <footer style="position:fixed"> 
            <p style="text-align: center;margin-left: 400px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
            <a href="privacy_policy.php">  Privacy Policy </a>| <a href="term_and_conditions.php">Terms of Service</a> |<a href=""> Contact Us </a></p>
        </footer>
    </div>

    <script>
        window.onload = function() {
            var contentFrame = document.getElementById('contentFrame');
            var frame7 = document.querySelector('.frame7');
            var contentHeight = contentFrame.offsetHeight;
            frame7.style.height = contentHeight + 'px';
        };
    </script>

    <script>
    window.onload = function() {
        var pageHeight = document.body.offsetHeight;

        document.getElementById('navdiv').style.height = pageHeight + 'px';
        };
    </script>

</body>
</html>


