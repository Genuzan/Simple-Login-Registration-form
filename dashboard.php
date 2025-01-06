<?php
   session_start();
  
   if (!isset($_SESSION['username'])) {
       header("Location: login.php");
       exit;
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .dashboard-container {
            background: rgba(0, 0, 0, 0.85);
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .dashboard-container h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #ffd700;
        }
        .dashboard-container p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .dashboard-container a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background: #ff5722;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .dashboard-container a:hover {
            background: #e64a19;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Halo <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>The Dashboard or something.</p>
            
    </div>
</body>
</html>
<?php
  
?>
