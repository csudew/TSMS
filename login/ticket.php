<?php
session_start();

if (!isset($_SESSION['customerId'])) {
    header('Location: ../login/login.php?123');
    exit;
}

include '../php/connection.php';

// Get the adminId from the session
$customerId = $_SESSION['customerId'];

// Query to check if the adminId exists in the database
$checkCustomerQuery = "SELECT * FROM customer WHERE customerId = ?";
$checkCustomerStmt = $pdo->prepare($checkCustomerQuery);
$checkCustomerStmt->execute([$customerId]);
$customer = $checkCustomerStmt->fetch(PDO::FETCH_ASSOC);
$customerName=$customer['name'];
$customerUName=$customer['userName'];


// Query to fetch tickets associated with the customer
$getTicketsQuery = "SELECT * FROM ticket WHERE customerId = ?";
$getTicketsStmt = $pdo->prepare($getTicketsQuery);
$getTicketsStmt->execute([$customerId]);
$tickets = $getTicketsStmt->fetchAll(PDO::FETCH_ASSOC);

// If adminId does not exist in the database, redirect to the login page
if (!$customer) {
    header('Location:../login/login.php?321');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to the main CSS file -->
    <style>
        /* Additional CSS styles specific to the account page */
        .account-container {
            display: flex;
            justify-content: space-between;
            margin-top: 50px; /* Adjusted margin for better spacing */
        }
        .account-details,
        .password-reset {
            width: 60%; /* Adjusted width for better spacing */
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .account-details h2,
        .password-reset h2 {
            margin-top: 0; /* Remove top margin for consistency */
        }
        .password-reset {
            margin-left: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: calc(100% - 20px); /* Adjusted width for better spacing */
            padding: 10px;
            border: 1px solid #cabff4;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group button {
            width: calc(100% - 20px); /* Adjusted width for better spacing */
            display: block;
            text-align: left;
            width: 100%;
            padding: 1em 0;
            color: #7288a2;
            font-size: 1.15rem;
            font-weight: 400;
            border: none;
            background: none;
            outline: none;
            margin-left:10px;
        }
        table{
            border: 1px solid #dadada;
        }
         thead {
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: #6CDDE6;
            padding: 10px 25px;
            table-layout: fixed;
            height: 20px;  
        }
        td{
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }   
    </style>
</head>
<body>
    <header class="header">
        <a class="logo" href="#">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>
        <a class="logo" href="#" style="margin-left:-450px">Quantum Mobile</a>
        <input type="checkbox" id="check">
        <label for="check" class="icon">
            <i class="bx bx-menu" id="menu-icon"></i>
            <i class="bx bx-x" id="close-icon"></i>
        </label>
        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="">Services</a>
            <a href="">Contact us</a>
            <a href="team"><u>Our team</u></a>
            <a style="--i:2" href="ticket.php">Ticket</a>
            <a class="login.php" href="<?php echo isset($_SESSION['customerId']) ? '#' : 'login.php'; ?>">
            <?php echo isset($_SESSION['customerId']) ? $customerUName : 'Login'; ?>
</a>
        </nav>
    </header>
    

    <div class="main">
        <div class="content">
           
        <div class="password-reset">
        <h2>Previous Submitted Tickets </h2>

            <div style="margin-left:20px;margin-top:30px;font-size:large">
            <table>
            <thead>
                <th style="padding: 10px 150px;">Subject</th>
                <th style="padding: 10px 50px;">Status</th>
                <th style="padding: 10px 50px;">Function</th>
            </thead>
            <tbody>
            <?php foreach ($tickets as $ticket) { ?>
                            <tr>
                                <td style="padding: 10px 150px;"><?php echo $ticket['subject']; ?></td>
                                <td style="padding: 10px 50px;"><?php echo $ticket['status']; ?></td>
                                <td style="padding: 10px 50px;">
                                    <button type="submit" onclick="viewTicket(<?php echo $ticket['ticketId']; ?>)">view</button>
                                </td>
                        </tr>
                        <?php } ?>
                                
            </tbody>
            </table>
            </div>

           
           </div>
        </div>
            <div class="password-reset" style="margin-top:30px">
            <h2>Add New Ticket</h2>

            <?php
                

                    if (isset($_GET['msg'])) {
                        echo "<p style='color: blue;'>"."Ticket Sent."."</p>"."
                        <script>
                            setTimeout(()=> {var msg = document.getElementById('message').style.display = 'none';
                            }, 5000);
                        </script>";
                        //unset($_SESSION['success_message']);
                    }
                    session_abort();
                ?>

            <div style="margin-top:30px">
            <form class="password-reset-form" action=".../php/addticket.php">
                <div style="margin-top: 30px;">
                    Select Category<font style="color: red;">*</font> : 
                    <select name="Category" id="">
                        <option value="Call">Call</option>
                        <option value="Internet">Internet</option>
                        <option value="HBB">HBB</option>
                        <option value="TV">TV</option>
                    </select>
                </div>
                <div class="form-group" style="margin-top:20px">
                Subject
                    <input type="text" id="subject" name="subject" placeholder="Enter the Subject" required style="margin-top:10px">
                 </div>
                 <div class="form-group">
                Content <br>
                    <textarea type="text" id="content" name="content" placeholder="Enter the Content" required style="margin-top:10px" rows="10" cols="115"></textarea>
                 </div>
                 <div class="form-group">
                    <button type="submit" >Submit</button>
                </div>
            </form>
            </div>
           </div>
    </div>

    <script>
        function validatePassword() {
            var npw = document.getElementById("npw").value;
            var rpw = document.getElementById("rpw").value;

            if (npw != rpw) {
                alert("New Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>

    <script>
        function viewTicket(ticketId) {
            window.location = 'view.php?ticketId=' + ticketId;
        }
    </script>

    <footer style="position:relative">
        <div class="footer-content">
            <!-- Social media icons -->
            <ul class="socials">
                <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-github"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                <li><a href="#"><ion-icon name="logo-youtube"></ion-icon></a></li>
            </ul>
            <!-- Footer menu -->
            <ul class="footmenu">
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
                <li><a href="#">item</a></li>
            </ul>
            <!-- Company copyright -->
            <p>&copy; 2024 PrimeSK</p>
        </div>
    </footer>

    <!-- Footer icons pack -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- JavaScript file -->
    <script src="style.js"></script>
</body>
</html>