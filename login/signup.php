<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('pic3.jpg'); /* Replace 'background-image.jpg' with your image path */
            background-size: cover;
            background-position: center;
            color: #333;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.5); /* Adjust opacity as needed */
            z-index: -1;
        }
        .header {
            background-color: #45B1E1;
            padding: 20px 0;
            text-align: center;
            color: #fff;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        .header p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .signup-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .signup-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .signup-form input[type="text"],
        .signup-form input[type="password"],
        .signup-form input[type="email"],
        .signup-form select,
        .signup-form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .signup-form button {
            background-color: #45B1E1;
            color: #fff;
            cursor: pointer;
        }
        .signup-form button:hover {
            background-color: #2D72EO;
        }
        .signup-form p {
            text-align: center;
        }
        .signup-form p a {
            color: #45B1E1;
            text-decoration: none;
            font-weight: bold;
        }
        .signup-form p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="header">
        <h1>Technical Support Management System</h1>
        <p>Create your account</p>
    </div>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form class="signup-form" action="../php/signupphp.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="phone" id="phone" placeholder="Phone Number" required>
            <input type="email" name="email" placeholder="Email" required>
            
            <div id="fmessage">
            <?php
                    session_start();

                    if (isset($_GET['error'])) {
                        echo "<p style='color: red;'>"."Email already in use."."</p>"."
                        <script>
                            setTimeout(()=> {var msg = document.getElementById('fmessage').style.display = 'none';
                            }, 5000);
                        </script>";
                        //unset($_SESSION['success_message']);
                    }
                    session_abort();
                ?>
            </div>
            
            <select name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="repassword" id="repassword" placeholder="Re-enter Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>

    <script>
        function validateForm() {
            var phoneInput = document.getElementById("phone");
            var phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phoneInput.value)) {
                alert("Phone number must contain exactly 10 digits.");
                return false;
            }

            var passwordInput = document.getElementById("password");
            if (passwordInput.value.length > 10) {
                alert("Password must be at most 10 characters long.");
                return false;
            }
            var password = document.getElementById("password").value;
            var repassword = document.getElementById("repassword").value;
            if (password !== repassword) {
                alert("Passwords do not match.");
                return false;
            }

            return true; 
        }
    </script>
</body>
</html>
