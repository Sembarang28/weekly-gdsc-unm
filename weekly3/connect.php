<?php
$servername = "localhost";
$database = "library";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if(mysqli_connect_errno()){
    echo "Koneksi database gagal : ".mysqli_connect_error();
}
?>