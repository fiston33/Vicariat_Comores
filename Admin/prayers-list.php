<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';


if(!isset($_GET['parish_id'])){
    die("Parish ID missing");
}

$parish_id = (int) $_GET['parish_id'];



$sql = " SELECT pp.*, p.name AS parish_name FROM parish_prayers pp INNER JOIN parishe p ON p.id = pp.parish_id

WHERE pp.parish_id = ?

ORDER BY pp.id DESC
";


$stmt = mysqli_prepare($conn,$sql);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $parish_id
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
?>

<div class="main">

<div class="topbar">
   <?php

$parish_query = mysqli_query(
$conn,
"SELECT name FROM parishe WHERE id=$parish_id"
);

$parish_data=mysqli_fetch_assoc($parish_query);

?>

<h1>
<?= htmlspecialchars($parish_data['name']); ?>
Prayer Schedule
</h1>

    <a href="add-prayer.php?parish_id=<?= $parish_id ?>">
        Add Prayer
    </a>
</div>

 <div class="table-container">

<table>

<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Day</th>
    <th>Time</th>
    <th>Description</th>
    <th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= $row['title'] ?></td>

<td><?= $row['prayer_day'] ?></td>

<td><?= $row['prayer_time'] ?></td>

<td><?= substr($row['description'],0,50) ?>...</td>

<td>

<a href="edit-prayer.php?id=<?= $row['id']; ?>&parish_id=<?= $parish_id; ?>">
<button class="edit">Edit</button>
</a>

<a href="delete-prayer.php?id=<?= $row['id'] ?>&parish_id=<?= $parish_id ?>" onclick="return confirm('Are you sure want to Delete?')">
<button class="delete">Delete</button>
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>