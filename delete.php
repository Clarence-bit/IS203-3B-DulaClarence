<?php

require('./database.php');

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $squeryDelete = "DELETE FROM wah WHERE ID= $id";
    $sqlDelete = mysqli_query($connection, $squeryDelete); 
    
    echo '<script>alert("successfully Delete!")</script>';
    echo '<script>window.location.href = "/Bayani/admin.php "</script>';
}
    
?>