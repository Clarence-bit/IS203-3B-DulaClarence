<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

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

        nav {
            width: 100%;
            background-color: #333;
            display: flex;
            justify-content: center;
            padding: 10px 0;
            margin-bottom: 20px;
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #575757;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            font-size: 2.5em; /* Increased for visibility */
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
            text-align: center; /* Centered text for better layout */
        }

        p {
            margin: 10px 0;
            font-size: 1.2em;
            color: #333;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 1.8em; /* Adjusted for smaller screens */
            }

            p {
                font-size: 1em; /* Adjusted for readability on smaller screens */
            }

            nav {
                flex-direction: column; /* Stack nav items vertically on small screens */
            }

            nav a {
                padding: 10px 15px; /* Reduced padding for nav items */
                width: 100%; /* Full width for nav items */
                text-align: center; /* Center text */
            }

            .container {
                padding: 15px; /* Reduced padding for the container */
            }
        }

        @media (max-width: 400px) {
            h1 {
                font-size: 1.5em; /* Further adjust for very small screens */
            }

            p {
                font-size: 0.9em; /* Further adjust for very small screens */
            }
        }
    </style>
</head>
<body>

<nav>
    <a href="user.php">Home</a>
    <a href="contact.php">Contact Us</a>
    <a href="report.php">Report</a>
    <a href="login.php">Logout</a>
</nav>

<h1>Contact Us</h1>

<div class="container">
    <p>If you have any questions or concerns, feel free to reach out to us!</p>
    <p><strong>Email:</strong> <a href="mailto:Tanggol@gmail.com">Tanggol@gmail.com</a></p>
    <p><strong>Contact Number:</strong> 09123423445</p>
</div>

</body>
</html>
