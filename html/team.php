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
    header('Location:../login/login.php');
    exit;
}
?>

<?php
    include_once ('../php/connection.php');
    $query = "SELECT *
              FROM admin ;"; 
    $stmt = $pdo->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <div id="navdiv"> <!--side navigation-->
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

    <div class="frame1" style="background-color: whi;">
        <font style="font-size: x-large;margin-top: 30px;font-weight: bold;">Manage Team</font>
    </div>

    <div class="frame6">
        <ul id="actionnav2">
        <?php if($admin['category'] == 'Web Admin'): ?>
            <a href="newmember.php"><li>Add Admin</li></a>
        <?php endif; ?>
        </ul>
    </div>

    <div class="frame2" id="ttable" style="overflow-y: auto;max-height=200px">
        <table id="ttable">
            <thead>
            <tr>
                <th style="padding: 10px 20px;">Admin Id</th>
                <th style="padding: 10px 110px;">Name</th>
                <th style="padding: 10px 45px;">User Name</th>
                <th style="padding: 10px 150px;">Email</th>
                <th style="padding: 10px 80px;">Roll</th>
            </tr>

            </thead>

            <?php
                foreach ($result as $row){
            ?>

            <tr style="text-align:center;">
                <td><?php echo $row['adminId']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['userName']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['category']?></td>
            
            </tr>

            <?php
                }
            ?>

        </table>
    </div>

    <div>
        <footer >
            <p style="text-align: center;margin-left: 400px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
            <a href="privacy_policy.php">  Privacy Policy </a>| <a href="term_and_conditions.php">Terms of Service</a> |<a href=""> Contact Us </a></p>
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