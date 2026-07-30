<?php

session_start();

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "vicariat_comores";

$conn = mysqli_connect(
    $servername,
    $username,
    $password,
    $database
);

if(!$conn){
    die("Database Connection Failed: " . mysqli_connect_error());
}


$id = (int)$_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM gallery
     WHERE id=$id"
);

header("Location: garelly.php");
exit();


?>



