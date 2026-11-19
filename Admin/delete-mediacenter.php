<?php

session_start();
include_once __DIR__.'/include/auth.php';


session_start();

require_once __DIR__ . '/../includes/config.php';



$id = $_GET['id'];

$conn->query("DELETE FROM media WHERE id=$id");

header("Location:mediacenter.php");
?>