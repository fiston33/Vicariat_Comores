<?php

session_start();
include_once __DIR__.'/include/auth.php';


session_start();

require_once __DIR__ . '/../includes/config.php';




$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM events WHERE id=$id");

header("Location: events-list.php");
?>
