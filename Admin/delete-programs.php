<?php

session_start();

include_once __DIR__.'/include/auth.php';


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
    "DELETE FROM programs WHERE id=$id"
);

header("Location: program-list.php");
exit();

?>



