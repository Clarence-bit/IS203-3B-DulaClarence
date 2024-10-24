<?php
require('./database.php');



if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    if ($stmt = $connection->prepare("SELECT id, username, password FROM registration WHERE email = ?")) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $hashedPassword);
            $stmt->fetch();

            
            if (password_verify($password, $hashedPassword)) {
                
                session_start();
                $_SESSION['userid'] = $id;
                $_SESSION['username'] = $username;
                echo '<script>alert("Login Successful!")</script>';
                echo '<script>window.location.href = "user.php"</script>'; // Redirect to user dashboard
            } else {
                echo '<script>alert("Incorrect password.")</script>';
            }
        } else {
            echo '<script>alert("No user found with that email.")</script>';
        }
        $stmt->close();
    } else {
        echo '<script>alert("Database query failed.")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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
            border-color: #1e90ff; /* Highlight border color on focus */
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
        }

        .text h3 a:hover {
            color: #0d74da;
        }

        .admin-link {
            text-align: right;
            margin-top: 10px;
            font-size: 14px;
        }

        .admin-link a {
            color: #ff6347;
            text-decoration: underline;
        }

        .admin-link a:hover {
            color: #ff4500;
        }

        @media (max-width: 600px) {
            .wrapper {
                padding: 30px; /* Adjust padding for smaller screens */
                max-width: 90%; /* Make the width responsive */
            }

            .wrapper h2 {
                font-size: 20px; /* Reduce font size for headings */
            }

            .input-box input {
                font-size: 16px; /* Increase input font size for better usability */
            }

            .text h3 {
                font-size: 12px; /* Reduce font size for smaller screens */
            }
        }
    </style>
</head>
<body>

<div class="wrapper">
    <h2><a href="admin_login.php">User Login</a></h2>
    <form action="" method="post">
        <div class="input-box">
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="input-box">
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="input-box button">
            <input type="submit" name="login" value="Login">
        </div>
        <div class="text">
            <h3>Don't have an account? <a href="registration.php">Register here</a></h3>
        </div>
    </form>
    </div>
</div>

</body>
</html>
