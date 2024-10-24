<?php
require('./database.php');


$editid = '';
$editH = '';
$editY = '';
$editT = '';


if (isset($_POST['edit'])) {
    $editid = $_POST['editid'];
    $editH = $_POST['editH'];
    $editY = $_POST['editY'];
    $editT = $_POST['editT'];
}


if (isset($_POST['update'])) {
    $updateid = $_POST['updateid'];
    $updateH = mysqli_real_escape_string($connection, $_POST['updateH']);
    $updateY = mysqli_real_escape_string($connection, $_POST['updateY']);
    $updateT = mysqli_real_escape_string($connection, $_POST['updateT']);

    
    $queryupdate = "UPDATE wah SET hero = '$updateH', years = '$updateY', history = '$updateT' WHERE id = $updateid";
    $sqlupdate = mysqli_query($connection, $queryupdate);

    if ($sqlupdate) {
        echo '<script>alert("Successfully Updated!")</script>';
        echo '<script>window.location.href = "/bayani/admin.php"</script>';
    } else {
        echo '<script>alert("Failed to Update: ' . $connection->error . '")</script>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Info</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s ease-in-out;
        }

        .container:hover {
            transform: rotateY(10deg);
        }

        h1 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }

        form h3 {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            outline: none;
        }

        input[type="submit"] {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(45deg, #56ab2f, #a8e063);
            color: white;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        input[type="submit"]:active {
            transform: scale(1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 600px) {
            .container {
                width: 90%;
                padding: 30px; /* Adjusted padding for smaller screens */
            }

            h1 {
                font-size: 1.5em;
            }

            form h3 {
                font-size: 1em;
            }

            input[type="text"] {
                font-size: 14px; /* Reduced font size for text inputs */
            }
        }

        @media (max-width: 400px) {
            h1 {
                font-size: 1.3em; /* Further adjust for very small screens */
            }

            form h3 {
                font-size: 0.9em; /* Further adjust for very small screens */
            }
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>EDIT MODE</h1>
        <br> 
        </br>
        <form action="" method="post">
            <h3>Edit User Info</h3> 
            <input type="text" name="updateH" placeholder="Hero" value="<?php echo $editH ?>" required />
            <br> </br>
            <input type="text" name="updateY" placeholder="Year" value="<?php echo $editY ?>" required />
            <br> </br>
            <input type="text" name="updateT" placeholder="History" value="<?php echo $editT ?>" required />
            <br> </br>
            <input type="submit" name="update" value="EDIT">
            <input type="hidden" name="updateid" value="<?php echo $editid ?>"/>
            <br> </br>
        
        </form>
    </div>
</body>
</html>
