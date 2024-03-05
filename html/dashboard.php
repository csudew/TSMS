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
    header('Location: ../login/login.php');
    exit;
}
?>

<html>

<head>
    <title>
        Quatem Mobile - Admin
    </title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">

    
    

     <!--ticket bar chart-->
     <?php
      include '../php/connection.php';

      $query = "SELECT priority, COUNT(*) as count FROM ticket GROUP BY priority";
      $stmt = $pdo->query($query);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $counts = array();
      foreach ($result as $row) {
          $counts[$row["priority"]] = $row["count"];
      }

      $totalQuery = "SELECT COUNT(*) as totalCount FROM ticket";
      $totalStmt = $pdo->query($totalQuery);
      $totalResult = $totalStmt->fetch(PDO::FETCH_ASSOC);
      $totalCount = $totalResult['totalCount'];

      $newQuery = "SELECT COUNT(*) as newCount FROM ticket WHERE status = 'New'";
      $newStmt = $pdo->query($newQuery);
      $newResult = $newStmt->fetch(PDO::FETCH_ASSOC);
      $newCount = $newResult['newCount'];
    ?>


<!--donut bar chart php-->
<?php
include '../php/connection.php';

$categoryQuery = "SELECT category, COUNT(*) as ticket_count FROM ticket GROUP BY category";
$stmt = $pdo->query($categoryQuery);
$categoryResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

$categoryData = [['Category', 'Ticket Count']];
foreach ($categoryResult as $row) {
    $categoryData[] = [$row['category'], (int)$row['ticket_count']];
}

$categoryJsonData = json_encode($categoryData);
?>



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

      <!--action nav-->
    <div class="frame1" style="margin-left:190px;"> 
        <ul id="actionnav3">
            <a href="../admin.php"><li>All tickets : <?php echo $totalCount; ?></li></a>
            <a href="newfilterticket.php"><li>New tickets : <?php echo $newCount; ?></li></a>
            <div style="float:left">
                <a href="criticalfilter.php"><li style="background-color:#BA3140;color:white">Criticle Priority : <?php echo isset($counts['Critical']) ? $counts['Critical'] : 0; ?></li></a>
                <a href="highfilterticket.php"><li style="background-color:#D1C824;color:white">High Priority : <?php echo isset($counts['High']) ? $counts['High'] : 0; ?></li></a>
                <a href="mediumfilter.php"><li style="background-color:#202984;color:white">Medium Priority : <?php echo isset($counts['Medium']) ? $counts['Medium'] : 0; ?></li></a>
                <a href="lowfilter.php"><li style="background-color:#1A8419;color:white">Low Priority : <?php echo isset($counts['Low']) ? $counts['Low'] : 0; ?></li></a>
            </ul>
            </div>
    </div>

    <?php
    include '../php/connection.php';

    $countCustomersQuery = "SELECT COUNT(*) AS customerCount FROM customer";
    $countCustomersStmt = $pdo->query($countCustomersQuery);
    $customerCountResult = $countCustomersStmt->fetch(PDO::FETCH_ASSOC);
    $customerCount = $customerCountResult['customerCount'];
    ?>

    <div class="frame1" style="margin-top:20px;margin-bottom:20px;"><b>
    Number of registed customers in the system : <font style="color:#74a9ff"><?php echo $customerCount; ?></b></font>
    </div>

    <?php
        include '../php/connection.php';

        $countCustomersWeekQuery = "SELECT DATE(regdate) AS regday, COUNT(*) AS customerCount 
                                    FROM customer
                                    WHERE regdate BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()
                                    GROUP BY DATE(regdate)
                                    ORDER BY DATE(regdate) DESC";
        $countCustomersWeekStmt = $pdo->query($countCustomersWeekQuery);
        $customerWeekResult = $countCustomersWeekStmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

        <!-- new customers in past week-->
           <div class="frame1" style="float:left;margin-top:20px;margin-left:220px;">
           
            <div id="ttable">
                <table style="width:500px;min-height:100px;">
                    <thead>
                        <tr>
                            <th colspan="2">Number of registed New Customers in past week</th>
                        </tr>
                        <th>Date</th>
                        <th>#New Customers</th>
                    </thead>
                    <tbody>
                        <?php foreach ($customerWeekResult as $row): ?>
                            <tr>
                                <td><?php echo $row['regday']; ?></td>
                                <td><?php echo $row['customerCount']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
            
        <?php
            include '../php/connection.php';

            $countTicketsActivitiesQuery = "SELECT DATE(ticket.date) AS activity_date,
                                            COUNT(DISTINCT ticket.ticketId) AS new_tickets,
                                            COUNT(DISTINCT reply.ticketId) AS replied_tickets
                                            FROM ticket
                                            LEFT JOIN reply ON ticket.ticketId = reply.ticketId
                                            WHERE ticket.date BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()
                                            GROUP BY DATE(ticket.date)
                                            ORDER BY activity_date DESC";

            $countTicketsActivitiesStmt = $pdo->query($countTicketsActivitiesQuery);
            $ticketsActivitiesResult = $countTicketsActivitiesStmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

                <!-- ticket activities in past week-->
           <div class="frame1" style="float:left;margin-top:20px;margin-left:220px;">
           
            <div id="ttable">
                <table style="width:500px;min-height:100px;">
                    <thead>
                        <tr>
                            <th colspan="3">Number of ticket activities in past week</th>
                        </tr>
                        <th>Date</th>
                        <th>#New Tickets</th>
                        <th>#Replys</th>
                        <tbody>
                            <?php foreach ($ticketsActivitiesResult as $row): ?>
                                <tr>
                                    <td><?php echo $row['activity_date']; ?></td>
                                    <td><?php echo $row['new_tickets']; ?></td>
                                    <td><?php echo $row['replied_tickets']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                </table>
            </div>
        </div>

        <?php
        include '../php/connection.php';

        $countTicketsCategoryQuery = "SELECT category, COUNT(*) AS ticket_count 
                                    FROM ticket 
                                    GROUP BY category";

        $countTicketsCategoryStmt = $pdo->query($countTicketsCategoryQuery);
        $ticketsCategoryResult = $countTicketsCategoryStmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

          <!-- number of ticket in each category-->
         <div class="frame1" style="float:left;margin-top:20px;margin-left:220px;">
           
           <div id="ttable">
               <table style="width:500px;min-height:100px;">
                   <thead>
                       <tr>
                           <th colspan="2">Number of tickets in each category</th>
                       </tr>
                       <th>Category</th>
                       <th>#New Tickets</th>
                       <tbody>
                            <?php
                            $categories = ['Call', 'Internet', 'HBB', 'TV'];
                            foreach ($categories as $category) {
                                $ticketCount = 0;
                                foreach ($ticketsCategoryResult as $row) {
                                    if ($row['category'] === $category) {
                                        $ticketCount = $row['ticket_count'];
                                        break;
                                    }
                                }
                                echo "<tr>";
                                echo "<td>$category</td>";
                                echo "<td>$ticketCount</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
               </table>
           </div>
       </div>

    
        <div style="margin-top:40px">
           <!-- Admin table -->
           
            <div id="ttable">
                <table style="width:500px;min-height:100px;">
                    <thead>
                        <tr>
                            <th colspan="4">Number of Admin Replied</th>
                        </tr>
                        <th>Admin Id</th>
                        <th>Admin Name</th>
                        <th>Category</th>
                        <th>#Replied Tickets</th>
                    </thead>
                    <?php
                    $adminDataQuery = "SELECT admin.adminId, admin.name, admin.category, COUNT(reply.adminId) AS replied_tickets
                                       FROM admin
                                       LEFT JOIN reply ON admin.adminId = reply.adminId
                                       WHERE admin.category != 'web admin' 
                                       GROUP BY admin.adminId";
                    $adminDataStmt = $pdo->query($adminDataQuery);
                    $adminDataResult = $adminDataStmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($adminDataResult as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['adminId'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['category'] . "</td>";
                        echo "<td>" . $row['replied_tickets'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
        </div>

    <div>
        <footer style="position:relative">
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