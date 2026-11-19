<?php

session_start();
include_once __DIR__.'/include/auth.php';


session_start();

require_once __DIR__ . '/../includes/config.php';





$id = (int) $_GET['id'];
$parish_id = (int) $_GET['parish_id'];

mysqli_query($conn, "DELETE FROM parish_prayers WHERE id=$id");

header("Location: prayers-list.php?parish_id=$parish_id");
exit();

?>