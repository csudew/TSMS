<?php
session_start();

// Include the database connection file
include '../php/connection.php';

// Initialize the customer username variable
$customerUName = 'Guest';

// Check if the 'customerId' index is set in the session
if (isset($_SESSION['customerId'])) {
    $customerId = $_SESSION['customerId'];

    // Fetch the customer's information from the database
    $checkCustomerQuery = "SELECT * FROM customer WHERE customerId = ?";
    $checkCustomerStmt = $pdo->prepare($checkCustomerQuery);
    $checkCustomerStmt->execute([$customerId]);
    $customer = $checkCustomerStmt->fetch(PDO::FETCH_ASSOC);

    // If the customer exists, update the customer username variable
    if ($customer) {
        $customerUName = $customer['userName'];
    }
}


// Query to fetch FAQ titles from the database
$faqQuery = "SELECT * FROM faq";
$stmt = $pdo->query($faqQuery);
$faqItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="..\icons\logo.png" type="image/png" sizes="16x16 32x32 48x48">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>  <!-- menu icons -->
    <title>Home</title>
    
</head>

<?php
// Include the database connection file
include '../php/connection.php';

// Query to fetch FAQ titles from the database
$faqQuery = "SELECT * FROM faq";
$stmt = $pdo->query($faqQuery);
$faqItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div class="container">
        <!-- navigation bar -->
        <header class="header">

          
          <a class="logo" href="#">
            <img src="QuantumMobileLogo.png" alt="Company Logo" style="width: auto; height: 60px;">
        </a>

            <a class="logo" href="#" style="margin-left:-300px">Quantum Mobile</a>

            <!-- click menu -->
            <input type="checkbox" id="check">
            <label for="check" class="icon">
                <i class='bx bx-menu' id="menu-icon"></i>
                <i class='bx bx-x' id="close-icon"></i>
            </label>

            <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="faq.php">FAQ</a>
            <a href="team.php">Our team</a>
            <a style="--i:2" href="ticket.php">Ticket</a>
            <a href="contactus.php">Contact us</a>
            <a class="login.php" href="<?php echo isset($_SESSION['customerId']) ? 'account.php' : 'login.php'; ?>">
            <?php echo isset($_SESSION['customerId']) ? $customerUName : 'Login'; ?></a>
            </nav>
        </header>
        <!-- main content -->
        <div class="faq">
            <div style="margin-left:20px;margin-top:20px">
                <h2>Frequently Asked Questions</h2>
            </div>
            <!-- FAQ items -->
            <div class="quest">
                <?php foreach ($faqItems as $faqItem): ?>
                    <div class="quest-item" style="margin-left:30px">
                        <button id="quest-button-<?php echo $faqItem['faqId']; ?>" aria-expanded="false">
                            <span class="quest-title"><?php echo $faqItem['title']; ?></span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="quest-content">
                            <p><?php echo $faqItem['content']; ?></p>
                        </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
      
        <!-- footer -->
        <footer >
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
                <p>&copy; 2024 Quantum Mobile</p>
            </div>
        </footer>
    </div>
    <!-- Footer icons pack -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- JavaScript file -->
    <script src="style.js"></script>
</body>
</html>




