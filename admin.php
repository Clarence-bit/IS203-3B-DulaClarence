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
    <title>User Accounts - Library</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Georgia', serif;
            background: url('admin.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            min-height: 100vh;
        }

        h1 {
            margin-bottom: 20px;
            color: #5a3e36;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4);
            font-size: 2.5em;
        }

        nav {
            width: 100%;
            margin-bottom: 20px;
        }

        nav ul {
            list-style-type: none;
            display: flex;
            justify-content: center;
            padding: 10px;
            background-color: rgba(139, 94, 60, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        nav li {
            margin: 0 15px;
        }

        nav a {
            color: #fff8e7;
            text-decoration: none;
            font-weight: 700;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #5c4033; 
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 100%;
            max-width: 900px;
            margin-bottom: 20px;
            font-size: 18px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            font-weight: bold;
            width: 100%;
            margin-top: 10px;
        }

        input[name="create"] {
            background: linear-gradient(90deg, #56ab2f 0%, #a8e063 100%);
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #c69963;
            color: white;
            padding: 15px;
            font-size: 1.2em;
            font-weight: bold;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        tr:nth-child(even) {
            background-color: #f2e0d5;
        }

        tr:hover {
            background-color: #fdebd3;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        input[name="edit"] {
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }

        input[name="delete"] {
            background: linear-gradient(90deg, #ff416c 0%, #ff4b2b 100%);
            color: white;
        }

        input[type="submit"]:hover {
            transform: scale(1.05);
        }

        input[type="submit"]:active {
            transform: scale(1);
        }

        #printButton:hover {
            background-color: #0d74da;
        }

        #printButton {
        padding: 10px 20px;
        background-color: #0d6efd; 
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    #printButton:hover {
        background-color: #0056b3;
        transform: scale(1.05); 
    }

    #printButton:active {
        transform: scale(1);
        background-color: #004080; 
    }
    </style>
</head>
<body>

<nav>
    <ul>
        <li><a href="admin.php">Home</a></li>
        
        <li><a href="Email.php">Email Notification</a></li>
        
        <li><a href="login.php">Logout</a></li>
    </ul>
</nav>

<h1>Welcome, <?php echo htmlspecialchars($userName); ?></h1>

<h1>My Library</h1>

<div class="container">
    <form action="create.php" method="post">
        <h3>Add Hero</h3>
        <input type="text" name="hero" placeholder="Hero" required />
        <input type="text" name="years" placeholder="Date" required />
        <input type="text" name="history" placeholder="History" required />
        <input type="submit" name="create" value="Add">
    </form> 
    <div class="container">
    <!-- Search bar -->
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for heroes...">
</div>
    <table>
        <tr>
            <th>Id</th>
            <th>Hero</th>
            <th>Date</th>
            <th>History</th>
            <th>Action</th>
        </tr>
        <?php while ($result = mysqli_fetch_array($sqlAccounts)) { ?>
            <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['hero']; ?></td>
                <td><?php echo $result['years']; ?></td>
                <td><?php echo $result['history']; ?></td>
                <td>
                    <form action="edit.php" method="post" style="display:inline;">
                        <input type="submit" name="edit" value="EDIT">
                        <input type="hidden" name="editid" value="<?php echo $result['id']; ?>">
                        <input type="hidden" name="editH" value="<?php echo $result['hero']; ?>">
                        <input type="hidden" name="editY" value="<?php echo $result['years']; ?>">
                        <input type="hidden" name="editT" value="<?php echo $result['history']; ?>">
                    </form>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                        <input type="submit" name="delete" value="DELETE">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div> 

<style>
@media print {
    #printButton {
        display: none;
    }
}
</style>
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
