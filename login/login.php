<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('pic3.jpg'); /* Replace 'background-image.jpg' with your image path */
            background-size: cover;
            background-position: center;
            background-color: #f9f9f9;
            color: #333;
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
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-form input[type="text"],
        .login-form input[type="password"],
        .login-form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .login-form button {
            background-color: #45B1E1;
            color: #fff;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #2D72EO;
        }
        .login-form p {
            text-align: center;
        }
        .login-form p a {
            color: #45B1E1;
            text-decoration: none;
            font-weight: bold;
        }
        .login-form p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Technical Support Management System</h1>
        <p>Login to your account</p>
    </div>
    <div class="login-container">
        <h2>Login</h2>
        <div id="fmessage">
                <?php
                    session_start();

                    if (isset($_GET['error'])) {
                        echo "<p style='color: red;'>"."Invalid user name of password"."</p>"."
                        <script>
                            setTimeout(()=> {var msg = document.getElementById('fmessage').style.display = 'none';
                            }, 5000);
                        </script>";
                        //unset($_SESSION['success_message']);
                    }
                    session_abort();
                ?>
        </div>
        <form class="login-form" action="../php/loginphp.php" method="POST">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
</body>
</html>
