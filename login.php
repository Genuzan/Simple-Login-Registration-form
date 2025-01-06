<?php
   include("database.php");
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
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
            width: 350px;
        }
        .container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #ffd700;
        }
        .container input[type="text"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background: #007bff;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .container input[type="submit"]:hover {
            background: #0056b3;
        }
        .message {
            margin-top: 15px;
            font-size: 14px;
            color: #ffcccb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
        <div class="message">
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (!empty($_POST["username"]) && !empty($_POST["password"])) {
                    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
                    $password = trim($_POST["password"]);

                    $sql = "SELECT password FROM users WHERE username = ?";
                    $stmt = mysqli_prepare($conn, $sql);

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $hashed_password);

                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                $_SESSION['username'] = $username;
                                header("Location: dashboard.php");
                                exit; 
                            } else {
                                echo "Invalid username or password.";
                            }
                        } else {
                            echo "Invalid username or password.";
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "Database query failed!";
                    }
                } else {
                    echo "Please complete all fields.";
                }
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
 