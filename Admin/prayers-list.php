<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';


$parish_id = (int) $_GET['parish_id'];


$sql = "
SELECT pp.*, p.name AS parish_name
FROM parish_prayers pp
JOIN parishe p ON p.id = pp.parish_id
WHERE pp.parish_id = $parish_id
ORDER BY pp.prayer_day, pp.prayer_time
";

$result = mysqli_query($conn, $sql);

?>

<div class="main">

<div class="topbar">
    <h1>Parish Prayers</h1>

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

<a href="edit-prayer.php?id=<?= $row['id'] ?>">
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