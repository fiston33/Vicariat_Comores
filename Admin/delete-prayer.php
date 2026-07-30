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





$id = (int) $_GET['id'];
$parish_id = (int) $_GET['parish_id'];

mysqli_query($conn, "DELETE FROM parish_prayers WHERE id=$id");

header("Location: prayers-list.php?parish_id=$parish_id");
exit();

?>