<?php


session_start();
include_once __DIR__.'/include/auth.php';


session_start();

require_once __DIR__ . '/../includes/config.php';



$id = $_GET['id'];

$sql = "DELETE FROM news WHERE id=$id";
mysqli_query($conn, $sql);

header("Location: news-list.php");
?>