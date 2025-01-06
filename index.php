<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 300px;
        }
        .container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #ffd700;
        }
        .container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .container .login {
            background: #28a745;
            color: #fff;
        }
        .container .login:hover {
            background: #218838;
        }
        .container .register {
            background: #007bff;
            color: #fff;
        }
        .container .register:hover {
            background: #0056b3;
        }
        .message {
            margin-top: 15px;
            font-size: 14px;
            color: #ffcccb;
        }
    </style>
    <script>
        function showMessage(buttonType) {
            const message = document.getElementById('message');
            if (buttonType === 'login') {
                message.textContent = 'Redirecting to Login Page...';
            } else {
                message.textContent = 'Redirecting to Registration Page...';
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Login Registration Sample</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <button type="submit" name="login" class="login" onclick="showMessage('login')">LOG-IN</button>
            <button type="submit" name="register" class="register" onclick="showMessage('register')">REGISTER</button>
        </form>
        <div id="message" class="message"></div>
    </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        header('Location: login.php');
        exit;
    } else {
        header('Location: register.php');
        exit;
    }
}
?>
