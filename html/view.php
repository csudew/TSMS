<?php
session_start();
?>

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


    <!--show ticket details-->
    <?php
    if(isset($_GET['ticketId'])) {
        $ticketId = $_GET['ticketId'];
        
        include_once ('../php/connection.php');

        $query = "SELECT ticket.*, customer.name AS customer_name, customer.email, customer.phonenumber
                  FROM ticket 
                  INNER JOIN customer ON ticket.customerId = customer.customerId
                  WHERE ticket.ticketId = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$ticketId]);
        $ticket = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($ticket) {
            echo "<div class='frame1' style='margin-top:10px'>";
            echo "<font style='font-weight:bold;font-size:20px;'>
                    Ticket ID : 
                 ".$ticket['ticketId'].
                " </font></div>";
            echo "<div class='frame1' style='margin-top:10px'>"; 
            echo "<font style='font-weight:bold;font-size:20px;'>
                        Status : 
                     ".$ticket['status'].
                    " </font></div>";
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
            
            ?>

            <?php
            if($ticket){
                if($ticket['status']!=='Replied'){
                    ?>
                    
            <div class='frame1' style='margin-top: 30px; margin-right:20px'>
            <form action='../php/updatePriority.php' method='post'>
                <label for='priority'>Priority:</label>
                <select name='priority' id='priority'>
                    <option value='low'>Low</option>
                    <option value='medium'>Medium</option>
                    <option value='high'>High</option>
                    <option value='Criticle'>Criticle</option>
                </select>
            <div style='margin-top: 20px;'>
                <input type='submit' value='Update Priority' name='upbutton' style='padding: 10px 5%;'>
            </div>
            <input type="hidden" name="ticketId" value="<?php echo $ticketId; ?>">
            </form>
            </div>

            <?php
                }
            }
            ?>

           
        <!--
            <div class="frame1">
                <form action="">
                Already sent reply <input type='submit' value='View Reply' name='Vreply' style='padding: 10px 5%;margin-left:20px'>
                </form>
            </div>
        -->
            
            <?php
            echo "<div class='frame1' style='margin-top:10px'>"; 
            echo "<font style='font-weight:bold;font-size:20px;'>
                    Issue : 
                 ".$ticket['subject'].
                " </font></div>";
            echo "<div class='frame1'>
                <p>
                    <font style='font-weight:bold;font-size:20px;'>
                        Description: 
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
            echo "<div class='frame1'>";
            echo "<p>Ticket details not found.</p>";
            echo "</div>";
        }
    } else {
        echo "<div class='frame1'>";
        echo "<p>No ticketId provided.</p>";
        echo "</div>";
    }
    ?>


        <?php
            if($ticket){
                if($ticket['status']!=='Replied'){
                    ?>
                    
                    <!-- Add Reply form -->
        <div class="frame1" style="margin-top:40px;">
        <form action="../php/addreply.php" method="post">
            <font style='font-weight:bold;font-size:30px;margin-bottom:30px'>Reply</font>

            <div id="fmessage">
                <?php

                    if (isset($_GET['msg'])) {
                        echo "<p style='color: blue;'>"."Reply Sent"."</p>"."
                        <script>
                            setTimeout(()=> {var msg = document.getElementById('fmessage').style.display = 'none';
                            }, 5000);
                        </script>";
                        //unset($_SESSION['success_message']);
                    }

                ?>
                </div>

            <div style="margin-top:20px">
            <input type="hidden" name="ticketId" value="<?php echo $ticketId; ?>">
            </div>
            <font style="font-weight:bold;font-size:20px;">Subject</font><br>
            <textarea name="subject" placeholder="Enter subject here..." rows="2" cols="161" required></textarea><br>
            <div style="margin-top: 30px;">
            <font style='font-weight:bold;font-size:20px;'>Content</font><br>
            <textarea name="reply" placeholder="Enter your reply here..." rows="20" cols="161" required></textarea><br>
            <div style="margin-top: 30px;">
                    <input type="submit" value="Send Reply" name="replybutton" style="padding: 10px 5%;">
                </div>
                </form>
            </div>

            <?php
                }else{
                    $queryReplies = "SELECT * FROM reply WHERE ticketId = ?";
                    $stmtReplies = $pdo->prepare($queryReplies);
                    $stmtReplies->execute([$ticketId]);
                    $replies = $stmtReplies->fetchAll(PDO::FETCH_ASSOC);
        
                    foreach ($replies as $reply) {
                        echo "<div class='frame1' style='margin-top: 30px; margin-right:20px'>";
                        echo "<font style='font-weight:bold;font-size:20px;'>Subject: ".$reply['subject']."</font></div>";
                        echo "<div class='frame1' style='margin-top: 30px; margin-right:20px'>";
                        echo "<font style='font-weight:bold;font-size:20px;'>Message:</font></div>";
                        echo "<div class='frame7' style='margin-top: 10px;'>";
                        echo "<div style='margin-left:20px; margin-right:20px;'>";
                        echo "<p style='font-size:18px;text-align:justify'>".$reply['message']."</p>";
                        echo "</div></div>";
                        echo "</div>";
                    }
                }
            }
            ?>

    <div>
        <footer style="position:relative"> 
            <p style="text-align: center;margin-left: 400px;">© 2024 Quantem Mobile Corporation. All rights reserved.<br>
              <a href="">  Privacy Policy </a>| <a href="">Terms of Service</a> |<a href=""> Contact Us </a></p>
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


