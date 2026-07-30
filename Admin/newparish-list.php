<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';



$sql = "SELECT * FROM parishe ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>



    <!-- MAIN -->
    <div class="main">

        <div class="topbar">
            <h1>Parish List</h1>
             <a href="../Admin/add-newparishes.php">Add Parish</a>
        </div>

        <div class="table-container">

            <table>

                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <tr>
                   
                    <td><?= $row['id'] ?></td>
                    <td><img src="../uploads/<?= $row['logo'] ?>" width="80"></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['phone']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['address']; ?></td>
                    <td>

                    <a href="view-newparisheslist.php?id=<?= $row['id']; ?>">
<button class="view">View</button>
</a>

<a href="edit-newparishes.php?id=<?= $row['id']; ?>">
<button class="edit">Edit</button>
</a>

<a href="delete-newparishes.php?id=<?= $row['id']; ?>"  onclick="return confirm('Are you sure want to Delete?')">
<button class="delete">Delete</button>
</a>

<a href="prayers-list.php?parish_id=<?= $row['id']; ?>">
<button class="view">Prayers</button>
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