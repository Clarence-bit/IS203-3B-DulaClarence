<?php
require('./database.php');

if (isset($_POST['registration'])) {  
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    
    if ($sqlregistration = $connection->prepare("INSERT INTO registration (email, username, password) VALUES (?, ?, ?)")) {
        $sqlregistration->bind_param("sss", $email, $username, $hashedPassword);
        if ($sqlregistration->execute()) {
            echo '<script>alert("Registration Successful!")</script>';
            echo '<script>window.location.href = "login.php"</script>'; 
        } else {
            echo '<script>alert("Failed to register: ' . $connection->error . '")</script>';
        }
        $sqlregistration->close();
    } else {
        echo '<script>alert("Database query preparation failed.")</script>';
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>User Registration</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background: url('bgweb.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            min-height: 100vh;
        }

        .wrapper {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        .wrapper h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            font-weight: 700;
            text-align: center;
        }

        .input-box {
            margin-bottom: 20px;
            position: relative;
        }

        .input-box input {
            width: 100%;
            padding: 12px 16px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .input-box input:focus {
            border-color: #1e90ff;
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.2);
        }

        .input-box.button input {
            background-color: #1e90ff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .input-box.button input:hover {
            background-color: #0d74da;
        }

        .text h3 {
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .text h3 a {
            color: #1e90ff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .text h3 a:hover {
            color: #0d74da;
        }

        @media (max-width: 480px) {
            .wrapper {
                width: 90%;
                padding: 20px;
            }

            .wrapper h2 {
                font-size: 20px;
            }

            .input-box input {
                padding: 10px 14px;
                font-size: 13px;
            }
        }
    </style>
    <script>
        function capitalizeInput(event) {
            const input = event.target;
            const words = input.value.split(' ');
            for (let i = 0; i < words.length; i++) {
                words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
            }
            input.value = words.join(' ');
        }
    </script>
</head>
<body>

<div class="wrapper">
    <h2>User Registration</h2>
    <form action="" method="post">
        <div class="input-box">
            <input type="email" name="email" id="email" placeholder="Email" required oninput="capitalizeInput(event)">
        </div>
        <div class="input-box">
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="input-box">
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
        
        <div class="input-box button">
            <input type="submit" name="registration" value="registration">
        </div>
        <div class="text">
            <h3>Already have an account? <a href="login.php">Login here</a></h3>
        </div>
    </form>
</div>

</body>
</html>
