<?php
    require 'connect.php';
    $isbn = $_GET['isbn'];
    $delete = mysqli_query($conn, "DELETE FROM buku ");
    
    header("Location:index.php");
    ob_end_flush();
?>