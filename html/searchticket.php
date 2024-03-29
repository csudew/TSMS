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

<html>

<head>
    <title>Quatem Mobile - Admin</title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv" style="height: 720px;">
            <!--side navigation-->
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

    <!--Search ticket-->

    <div class="frame7" style="height: 220px;margin-right:20px">
        <div id="div1">
            <div>
                <font id="font1" style="font-size: x-large;font-weight: bold;">Search a Ticket</font><br>

                <form name="Ticket Search" method="post" onsubmit="return validateForm();">
                <div style="margin-top:30px">
                    Enter Key Word : <br>
                    <input type="text" name="data" id="data" placeholder="Enter Here">
                    <input type="submit" value="Search" name="Tsearch" style="padding: 10px 5%;">
                </div>
                </form>


                <div>
                <?php

                    if (isset($_GET['fmsg'])) {
                        echo "<p id='fmessage' style='color: red;'>Ticket not found.</p>";
                    }
                ?>
                </div>

                </form>

            </div>
        </div>
    </div>

    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Tsearch'])) {
        include_once('../php/connection.php');

        $keyword = $_POST['data'];

        try {
            $sql = "SELECT * FROM ticket WHERE subject LIKE :keyword OR message LIKE :keyword";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $ticket_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                header("Location:searchticket.php?fmsg=failed");
                exit(); 
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

    <div class="frame4" id="ttable" style="overflow-y: auto;max-height=200px;margin-right:20px">
    <table>
        <thead>
        <tr>
            <th style="padding: 10px 30px;">Ticket Id</th>
            <th style="padding: 10px 270px;">subject</th>
            <th style="padding: 10px 30px;">Category</th>
            <th style="padding: 10px 20px;">Priority </th>
            <th style="padding: 10px 30px;">Status</th>
            <th style="padding: 10px 30px;">Function</th>
        </tr>
        </thead>
        <tbody>
            <?php
            if (isset($ticket_rows)) {
                foreach ($ticket_rows as $row) {
            ?>
                    <tr style="text-align:center;">
                        <td><?php echo $row['ticketId']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['priority']?></td>
                        <td><?php echo $row['status']?></td>
                        <td>
                            <button onclick="viewTicket(<?php echo $row['ticketId']; ?>)">View</button>
                        </td>
                    </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="3">No tickets found.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>


    <div>
        <footer>
            <p style="text-align: center;margin-left: 410px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
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
        function viewTicket(ticketId) {
            window.location = 'view.php?ticketId=' + ticketId;
        }

        function validateForm() {
            var keyword = document.getElementById("data").value;
            if (keyword.trim() == "") {
                alert("Please enter a keyword");
                return false;
            }
            return true;
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
