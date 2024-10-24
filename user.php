<?php
session_start(); 
require('./read.php');


$userName = isset($_SESSION['username']) ? $_SESSION['username'] : 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>
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

        #searchInput {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px; /* Increased font size for better readability */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 15px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ffe6e6;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        #printButton {
            background-color: #1e90ff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
            margin-top: 20px;
            width: 100%; /* Full width button on smaller screens */
        }

        #printButton:hover {
            background-color: #0d74da;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 1.5em; /* Reduced size for smaller screens */
            }

            nav a {
                padding: 10px; /* Adjust padding for smaller screens */
                font-size: 14px; /* Smaller font for navigation */
            }

            .container {
                padding: 15px; /* Reduced padding in the container */
            }

            #searchInput {
                font-size: 14px; /* Smaller font size for search input */
            }

            table {
                font-size: 14px; /* Smaller font size for table */
            }

            th, td {
                padding: 10px; /* Reduced padding for table cells */
            }
        }

        @media (max-width: 400px) {
            nav a {
                padding: 8px 10px; /* Smaller padding for very small screens */
                font-size: 12px; /* Even smaller font for navigation */
            }

            #searchInput {
                font-size: 12px; /* Smaller font size for search input */
            }

            table {
                font-size: 12px; /* Smaller font size for table */
            }

            th, td {
                padding: 8px; /* Reduced padding for table cells */
            }

            h1 {
                font-size: 1.2em; /* Reduced size for smaller screens */
            }
        }

        @media print {
            #printButton {
                display: none; /* Hide print button during printing */
            }
        }
    </style>
</head>
<body>

<nav>
    <a href="user.php">Home</a>
    <a href="Contact.php">Contact Us</a>
    <a href="Report.php">Report</a>
    <a href="login.php">Logout</a>
</nav>

<h1>Welcome, <?php echo htmlspecialchars($userName); ?></h1>

<h1>In My Simple Library for the Heroes in Our Country</h1>

<div class="container">
    <!-- Search bar -->
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for heroes...">

    <table id="heroTable">
        <tr>
            <th>Id</th>
            <th>Hero</th>
            <th>Date</th>
            <th>History</th>
        </tr>
        <?php while ($result = mysqli_fetch_array($sqlAccounts)) { ?>
            <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['hero']; ?></td>
                <td><?php echo $result['years']; ?></td>
                <td><?php echo $result['history']; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

<button id="printButton" onclick="window.print()">Print</button>

<script>
    function searchTable() {
        
        let input = document.getElementById('searchInput').value.toUpperCase();
        
        let table = document.getElementById('heroTable');
        let tr = table.getElementsByTagName('tr');

       
        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td')[1]; 
            if (td) {
                let txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(input) > -1) {
                    tr[i].style.display = '';
                } else {
                    tr[i].style.display = 'none';
                }
            }
        }
    }
</script>

</body>
</html>
