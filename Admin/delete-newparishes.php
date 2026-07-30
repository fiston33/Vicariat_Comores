<?php
$conn = mysqli_connect("localhost", "root", "", "vicariat_comores");
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

$id = $_GET['id'] ?? 0;

if ($id) {
    $sql = "DELETE FROM parishe WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: newparish-list.php?msg=deleted");
        exit;
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
?>
