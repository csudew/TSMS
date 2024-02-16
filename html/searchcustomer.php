<html>

<head>
    <title>Quatem Mobile - Admin</title>
    <link rel="stylesheet" href="../css/adminstyle.css">
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div id="navdiv" style="height: 720px;">
            <!--side navigation-->
            <ul id="ulid">
                <a href="../admin.php"><li>Tickets</li></a>
                <a style="text-decoration: none;color: black;" href="searchcustomer.php"><li>Search<br>Customer</li></a>
                <a href="category.php"><li>Category</li></a>
                <a href="knowledge.php"><li>Knowladge</li></a>
                <a href="team.php"><li>Team</li></a>
            </ul>
        </div>

        <div id="quantemid">
            <font style="font-size: 30px;font-weight: bold;">Quantem Mobile</font>
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
                $sql = "SELECT * FROM customer WHERE name = :name";
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
        </tr>
        </thead>
        <tbody>
            <?php
            if (isset($ticket_rows)) {
                foreach ($ticket_rows as $row) {
            ?>
                    <tr>
                        <td><?php echo $row['ticketId']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['category']; ?></td>
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


</body>

</html>
