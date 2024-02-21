<?php
    include_once ('../php/connection.php');
    $query = "SELECT ticket.*, customer.name 
              FROM ticket 
              INNER JOIN customer ON ticket.customerId = customer.customerId
              WHERE ticket.status = 'Replied'
              ORDER BY ticket.ticketId DESC;"; 
    $stmt = $pdo->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>





<html>

<head>
    <title>
        Quatem Mobile - Admin
    </title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <script src="../js/validate.js"></script>
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv"> <!--side navigation-->
            <ul id="ulid">
                <a style="text-decoration: none;color: black;" href="../admin.php"><li>Tickets</li></a>
                <a style="text-decoration: none;color: black;" href="searchcustomer.php"><li>Search<br>Customer</li></a>
                <a style="text-decoration: none;color: black;" href="searchticket.php"><li>Search<br>Ticket</li></a>
                <a href="knowledge.php"><li>Knowladge</li></a>
                <a href="team.php"><li>Team</li></a>
            </ul>
        </div>
    
            <div id="quantemid">
                <font style="font-size: 30px;font-weight: bold;"><a href="dashboard.php">Quantem Mobile</a></font>
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

    <div class="frame1">
        <div>
            <font style="font-size: 20px;">Admin Name - POST</font><br>
            <font style="font-size: 10px;">Last Loging Date - Time</font>
        </div>
    </div>
    <div class="frame1" style="margin-left:280px;">
        <ul id="actionnav">
            <a href="../admin.php"><li>All Ticket</li></a>
            <li style="background-color:#188ec1;color:black;">Sign to Me</li>
            <a href="newfilterticket.php"><li>New Messages</li></a>
            <a href="waitfilterticket.php"><li>Replied</li></a>
        </ul>
    </div>

    <div class="frame1" id="ttable" style="overflow-y: auto;">
        <table>
            <thead>
            <tr>
                <th>Tracking Id</th>
                <th style="padding: 10px 80px;">Date</th>
                <th style="padding: 10px 70px;">User Name</th>
                <th style="padding: 10px 110px;">Subject </th>
                <th style="padding: 10px 30px;">category </th>
                <th style="padding: 10px 20px;">Priority </th>
                <th style="padding: 10px 30px;">Status</th>
                <th style="padding: 10px 30px;">Function</th>
            </tr>
            </thead>

            <?php
                foreach ($result as $row){
            ?>
            <tr style="text-align:center;">
                <td><?php echo $row['ticketId']?></td>
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['subject']?></td>
                <td><?php echo $row['category']?></td>
                <td><?php echo $row['priority']?></td>
                <td><?php echo $row['status']?></td>
                <td>
                    <button onclick="viewTicket(<?php echo $row['ticketId']; ?>)">View</button>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>

    
    <div>
        <footer style="position: fixed;">
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

<script>
        function viewTicket(ticketId) {
            window.location = 'view.php?ticketId=' + ticketId;
        }
    </script>


</body>



</html>