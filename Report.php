<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Issue</title>
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
            flex-wrap: wrap; /* Allows links to wrap on small screens */
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s;
            margin: 5px; /* Added margin for spacing */
        }

        nav a:hover {
            background-color: #575757;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            font-size: 2em;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
            font-size: 16px; /* Increased font size for better readability */
        }

        button {
            background-color: #1e90ff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
            margin-top: 10px;
            width: 100%; /* Full width button on smaller screens */
        }

        button:hover {
            background-color: #0d74da;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 1.5em;
            }

            nav a {
                padding: 10px; /* Adjust padding for smaller screens */
                font-size: 14px; /* Smaller font for navigation */
            }

            .container {
                padding: 15px; /* Reduced padding in the container */
            }

            textarea {
                height: 120px; /* Reduced height for smaller screens */
            }
        }
    </style>
</head>
<body>

<nav>
    <a href="user.php">Home</a>
    <a href="contact.php">Contact Us</a>
    <a href="report.php">Report</a>
   
    <a href="login.php">logout</a>
</nav>

<h1>Report an Issue</h1>

<div class="container">
    <form action="submit_report.php" method="POST">
        <textarea name="report" placeholder="Describe your issue or feedback..." required></textarea>
        <button type="submit">Submit Report</button>
    </form>
</div>

</body>
</html>
