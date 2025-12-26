<?php
session_start();
if (!isset($_SESSION['level']) || $_SESSION['level'] != 0) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d0000 50%, #4d0000 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(237, 28, 36, 0.3) 0%, transparent 70%);
            top: -300px;
            right: -300px;
            border-radius: 50%;
        }
        
        body::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(237, 28, 36, 0.2) 0%, transparent 70%);
            bottom: -200px;
            left: -200px;
            border-radius: 50%;
        }
        
        .dashboard {
            background: rgba(255, 255, 255, 0.95);
            padding: 50px 40px;
            width: 500px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px);
            text-align: center;
        }
        
        .logo {
            margin-bottom: 30px;
        }
        
        .logo h1 {
            color: #ED1C24;
            font-size: 48px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .badge {
            display: inline-block;
            background: linear-gradient(135deg, #ED1C24 0%, #C01018 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(237, 28, 36, 0.3);
        }
        
        h2 {
            color: #333;
            font-size: 32px;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .welcome-text {
            color: #666;
            font-size: 16px;
            margin-bottom: 10px;
        }
        
        .username {
            color: #ED1C24;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            display: block;
        }
        
        .btn-logout {
            display: inline-block;
            text-decoration: none;
            color: white;
            background: linear-gradient(135deg, #ED1C24 0%, #C01018 100%);
            padding: 16px 40px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(237, 28, 36, 0.3);
            margin-top: 10px;
        }
        
        .btn-logout:hover {
            background: linear-gradient(135deg, #C01018 0%, #ED1C24 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(237, 28, 36, 0.4);
        }
        
        .btn-logout:active {
            transform: translateY(0);
        }
        
        .footer {
            margin-top: 30px;
            color: #999;
            font-size: 12px;
        }
        
        @media (max-width: 580px) {
            .dashboard {
                width: 90%;
                padding: 40px 30px;
            }
            
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="badge">Administrator</div>
        
        <h2>Admin Panel</h2>
        
        <p class="welcome-text">Selamat datang,</p>
        <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
        
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>
</body>
</html>