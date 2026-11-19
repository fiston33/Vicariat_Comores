<?php

session_start();
include_once __DIR__.'/include/auth.php';


session_start();

require_once __DIR__ . '/../includes/config.php';




$id = (int)$_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM parishes WHERE id=$id"
);

header("Location: parish_list.php");
exit();

?>