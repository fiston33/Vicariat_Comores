<?php

session_start();

include_once __DIR__.'/include/auth.php';


require_once __DIR__ . '/../includes/config.php';






$id = (int)$_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM programs WHERE id=$id"
);

header("Location: program-list.php");
exit();

?>


