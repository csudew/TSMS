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

    <!--Search user-->

    <div class="frame7" style="height: 220px;">
        <div id="div1">
            <div>
                <font id="font1" style="font-size: x-large;font-weight: bold;">Search a User</font><br>

                <form name="customerSearch" method="post">

                <div style="margin-top:30px">
                Enter User's Name : 
                <br>
                   <input type="text" name="data" placeholder="Enter Here">
                    <input type="submit" value="Search" name="Csearch" style="padding: 10px 5%;">
                </div>

                </form>

            </div>
        </div>
    </div>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['Csearch'])) {
            include_once('../php/connection.php');

            $name = $_POST['data'];

            try {
                $sql = "SELECT * FROM customer WHERE UserName = :name";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $userName = $row['name'];
                    $userEmail = $row['email'];
                    $userPhoneNumber = $row['phonenumber'];

                    $tickets_query = "SELECT * FROM ticket WHERE customerId = :customer_id";
                    $tickets_stmt = $pdo->prepare($tickets_query);
                    $tickets_stmt->bindParam(':customer_id', $row['customerId']);
                    $tickets_stmt->execute();
                    $numTickets = $tickets_stmt->rowCount(); 

                    $ticket_rows = $tickets_stmt->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    echo "<script>alert('User not found.');</script>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    ?>

<!--Display User data-->
<div class="frame1" style="background-color: whi;">
    <font style="font-size: x-large;margin-top: 30px;font-weight: bold;">User Details</font>
</div>

<div class="frame2">
    <?php if (isset($userName)) : ?>
        User Name : <?php echo $userName; ?><br>
    <?php endif; ?>
</div>

<div class="frame2">
    <?php if (isset($userEmail)) : ?>
        User Email : <?php echo $userEmail; ?><br>
    <?php endif; ?>
</div>

<div class="frame2">
    <?php if (isset($userPhoneNumber)) : ?>
        User Phone Number : <?php echo $userPhoneNumber; ?><br>
    <?php endif; ?>
</div>

<div class="frame2">
    <?php if (isset($numTickets)) : ?>
        Number of Tickets : <?php echo $numTickets; ?><br>
    <?php endif; ?>
</div>


    <div class="frame4" id="ttable" style="overflow-y: auto;max-height=200px;">
    <table>
        <thead>
        <tr>
            <th style="padding: 10px 30px;">Ticket Id</th>
            <th style="padding: 10px 300px;">subject</th>
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
        <footer style="position: relative;">
            <p style="text-align: center;margin-left: 410px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
                <a href="">Privacy Policy</a> | <a href="">Terms of Service</a> | <a href="">Contact Us</a></p>
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
    </script>


</body>

</html>
