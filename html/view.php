<html>

<head>
    <title>
        Quatem Mobile - Admin
    </title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <script src="../js/validate.js"></script>
    <style>
        .frame7 {
            overflow-y: auto; /* Add a vertical scrollbar if content overflows */
            max-height: 300px; /* Set maximum height for the frame */
        }
    </style>
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv" style="height: 900;"> <!--side navigation-->
            <ul id="ulid">
                <a href="../admin.php"><li>Tickets</li></a>
                <a style="text-decoration: none;color: black;" href="searchcustomer.php"><li>Search<br>Customer</li></a>
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
    
    
            <div id="quantemid">
                <font style="font-size: 30px;font-weight: bold;">Quantem Mobile</font>
                <font style="margin-left: 3px;font-size: 15px;">Technical Support Team</font>
            </div>
    
            <div style="margin-left: 380;">
                <ul id="topnav">  <!-- top nav-->
                <a href="html/tickets.php"><li>Create Ticket</li></a>
                    <li>Massages</li>
                    <li>Account</li>
                </ul>
            </div>
    </div>

    <?php
    // Check if the ticketId is provided in the URL
    if(isset($_GET['ticketId'])) {
        // Retrieve the ticketId from the URL
        $ticketId = $_GET['ticketId'];
        
        // Now, you can use $ticketId to fetch ticket details from your database
        // For demonstration purposes, let's assume you have a function to fetch ticket details
        
        // Include your database connection file
        include_once ('../php/connection.php');

        // Prepare a query to fetch ticket details based on ticketId
        $query = "SELECT ticket.*, customer.name AS customer_name, customer.email, customer.phonenumber
                  FROM ticket 
                  INNER JOIN customer ON ticket.customerId = customer.customerId
                  WHERE ticket.ticketId = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$ticketId]);
        $ticket = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if ticket details are found 
        if ($ticket) {
            // Display ticket details
            echo "<div class='frame1' style='margin-top:10px'>";
            echo "<font style='font-weight:bold;font-size:20px;'>
                    User Name : 
                 ".$ticket['customer_name'].
                " </font></div>";
            echo "<div class='frame1' style='margin-top:10px'>";    
            echo "<font style='font-weight:bold;font-size:20px;'>
                User Email : 
             ".$ticket['email'].
            " </font></div>"; 
            echo "<div class='frame1' style='margin-top:10px'>";  
            echo "<font style='font-weight:bold;font-size:20px;'>
                User Phone Number : 
             ".$ticket['phonenumber'].
            " </font></div>";   
            echo "<div class='frame1' style='margin-top:10px'>"; 
            echo "<font style='font-weight:bold;font-size:20px;'>
                    Issue : 
                 ".$ticket['subject'].
                " </font></div>";
            echo "<div class='frame1'>
                <p>
                    <font style='font-weight:bold;font-size:20px;'>
                        Content: 
                    </font>
                    <br>
                    </div>
                    
                    <div class='frame7' id='contentFrame' style='margin-right:20px;'>
                        <div style='margin-right:20px;margin-left:20px'>
                            <p style='font-size:18px;text-align:justify'>".$ticket['message'].
                            "
                        </div>
                            </p>
                        </p>";
            echo "</div>";
        } else {
            // Handle the case where ticket details are not found
            echo "<div class='frame1'>";
            echo "<p>Ticket details not found.</p>";
            echo "</div>";
        }
    } else {
        // Handle the case where ticketId is not provided in the URL
        echo "<div class='frame1'>";
        echo "<p>No ticketId provided.</p>";
        echo "</div>";
    }
    ?>

    <div>
        <footer>
            <p style="text-align: center;margin-left: 400px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
              <a href="">  Privacy Policy </a>| <a href="">Terms of Service</a> |<a href=""> Contact Us </a></p>
        </footer>
    </div>

    <script>
        // Dynamically adjust frame7 height based on content
        window.onload = function() {
            var contentFrame = document.getElementById('contentFrame');
            var frame7 = document.querySelector('.frame7');
            var contentHeight = contentFrame.offsetHeight;
            frame7.style.height = contentHeight + 'px';
        };
    </script>
</body>
</html>
