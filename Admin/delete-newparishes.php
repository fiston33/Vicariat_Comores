<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);



session_start();

require_once __DIR__ . '/../includes/config.php';


if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid parish ID.");
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM parishe WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("SQL Prepare Error: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {

    header("Location: newparish-list.php?msg=deleted");
    exit();

} else {

    echo "Delete Failed: " . mysqli_stmt_error($stmt);

}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>