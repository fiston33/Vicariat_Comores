<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';

?>
    <!-- MAIN -->
    <div class="main">

        <div class="topbar">
            <h1>Events List</h1>
             <a href="../Admin/add-events.php">Add Event</a>
        </div>

        <div class="table-container">

           <table>

    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Title</th>
        <th>Parishes</th>
        <th>Date</th>
        <th>Location</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

     <?php $sql = "SELECT events.*, parishe.name AS parish_name
        FROM events
        LEFT JOIN parishe
        ON events.parish_id = parishe.id
        ORDER BY events.id DESC";

$result = mysqli_query($conn, $sql);

if(!$result){
    die(mysqli_error($conn));
}

while($row = mysqli_fetch_assoc($result)) { ?>


<tr>
    <td><?= $row['id'] ?></td>
    <td>
        <img src="../uploads/<?= $row['image'] ?>" width="80">
    </td>

    <td><?= $row['title'] ?></td>

    <td><?=$row['parish_name'] ?></td>

    <td><?= $row['event_date'] ?></td>

    <td><?= $row['location'] ?></td>

    <td><?= $row['status'] ?></td>

    <td>
        <a href="view-eventslist.php?id=<?= $row['id'] ?>">
            <button class="view">View</button>
        </a>

        <a href="edit-events.php?id=<?= $row['id'] ?>">
            <button class="edit">Edit</button>
        </a>

        <a href="delete-events.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to Delete?')">
            <button class="delete">Delete</button>
        </a>
    </td>
</tr>

<?php } ?>

</table>

        </div>

    </div>

</div>


<?php

include_once __DIR__.'/include/footer.php';
?>

</body>
</html>