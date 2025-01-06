<?php
   include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registration</title>
   <style>
       body {
           font-family: Arial, sans-serif;
           background: linear-gradient(to right, #ff7e5f, #feb47b);
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
           background: #28a745;
           color: #fff;
           cursor: pointer;
           transition: all 0.3s ease;
       }
       .container input[type="submit"]:hover {
           background: #218838;
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
       <h1>Registration</h1>
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           <label for="username">Username:</label><br>
           <input type="text" id="username" name="username" required><br>
           <label for="password">Password:</label><br>
           <input type="password" id="password" name="password" required><br>
           <input type="submit" name="register" value="Register">
       </form>
       <div class="message">
           <?php
           if ($_SERVER["REQUEST_METHOD"] === "POST") {
               if (!empty($_POST["username"]) && !empty($_POST["password"])) {
                   $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
                   $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
                   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                   $sql = "INSERT INTO users(username, password) VALUES('$username', '$hashed_password')";

                   try {
                       mysqli_query($conn, $sql);
                       echo "Registered successfully!";
                   } catch (mysqli_sql_exception $e) {
                       echo "User already taken.";
                   }
               } else {
                   echo "Complete all fields.";
               }
           }
           mysqli_close($conn);
           ?>
       </div>
   </div>
</body>
</html>
