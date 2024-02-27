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
              FROM faq;"; 
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

    <div class="frame1" >
        <font style="font-size: x-large;margin-top: 30px;font-weight: bold;">Manage Knowledge</font>
    </div>

    <div class="frame1" id="message">
    <?php
                

                    if (isset($_GET['message'])) {
                        echo "<p style='color: blue;'>"."Deleted successfully"."</p>"."
                        <script>
                            setTimeout(()=> {var msg = document.getElementById('message').style.display = 'none';
                            }, 2000);
                        </script>";
                        //unset($_SESSION['success_message']);
                    }
                    session_abort();
     ?>
     </div>

    <div class="frame6">
        <ul id="actionnav2">
            <li><a href="faq.php">Add New FAQ</a></li>
        </ul>
    </div>

    <div id="message" class="frame1">
                <?php
            

                    if (isset($_GET['msg'])) {
                        echo "<p style='color: blue;'>"."New FAQ added to database"."</p>"."
                        <script>
                            setTimeout(()=> {var msg = document.getElementById('message').style.display = 'none';
                            }, 5000);
                        </script>";
                        //unset($_SESSION['success_message']);
                    }
                    session_abort();
                ?>
    </div>

    <div class="frame2" id="ttable" style="overflow-y: auto;max-height:300px;">
        <table id="ttable">
            <thead>
            <tr>
                <th>FAQ Id</th>
                <th style="padding: 10px 380px;">Subject</th>
                <th style="padding: 10px 65px;">Type</th>
                <th style="padding: 10px 30px;">Function</th>
            </tr>
            </thead>
            <?php
                foreach ($result as $row){
            ?>
            <tr style="text-align:center;">
                <td><?php echo $row['faqId']?></td>
                <td><?php echo $row['title']?></td>
                <td><?php echo $row['type']?></td>
                <td> <button onclick="viewFaq(<?php echo $row['faqId']; ?>)">View</button></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    
    <div>
        <footer style="position:fixed;">
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

<script>
    function viewFaq(faqId) {
        window.location = 'viewfaq.php?faqId=' + faqId;
    }
</script>

<script>
    if (document.getElementById('message')) {
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 2000);
    }
</script>

<script>
        setTimeout(function() {
            var msg = document.getElementById('fmessage');
            if (msg) {
                msg.style.display = 'none';
            }
        }, 2000);
    </script>


</body>



</html>