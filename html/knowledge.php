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
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv"> <!--side navigation-->
            <ul id="ulid">
                <a href="../admin.php"><li>Tickets</li></a>
                <a style="text-decoration: none;color: black;" href="searchcustomer.php"><li>Search<br>Customer</li></a>
                <a href="knowledge.php"><li>Knowladge</li></a>
                <a href="team.php"><li>Team</li></a>
            </ul>
        </div>
    
            <div id="quantemid">
                <font style="font-size: 30px;font-weight: bold;"><a href="dashboard.php">Quantem Mobile</a></font>
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

    <div class="frame1" >
        <font style="font-size: x-large;margin-top: 30px;font-weight: bold;">Manage Knowledge</font>
    </div>

    <div class="frame6">
        <ul id="actionnav2">
            <li><a href="faq.php">Add New FAQ</a></li>
        </ul>
    </div>

    <div id="message" class="frame1">
                <?php
                    session_start();

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
                <td>Function</td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    
    <div>
        <footer style="position:fixed;">
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
    
</body>



</html>