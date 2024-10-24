<?php

require('./database.php');

if(isset($_POST['create'])){
    $hero = $_POST['hero'];
    $years = $_POST['years'];
    $history = $_POST['history'];
    $querryCreate = "INSERT INTO wah VALUES (null, '$hero', '$years' , '$history')";
    $sqlCreate = mysqli_query($connection, $querryCreate); 
    
    echo '<script>alert("successfully Created!")</script>';
    echo '<script>window.location.href = "/bayani/admin.php "</script>';
}
    
?>