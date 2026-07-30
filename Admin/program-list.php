<?php

include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';


?>

        <!-- MAIN -->
        <div class="main">
            <div class="topbar">

                <h1> Programs List</h1>
                <a href="../Admin/add-programs.php">Add Program</a>


            </div>

            <div class="donation-tools">

                <input type="text" placeholder="Search programs">



            </div>

            <div class="table-container">



                <!-- TABLE -->
                <table>

                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Parishes</th>
                        <th>Status</th>
                        <th>Coordinator</th>
                        <th>Actions</th>
                    </tr>
                    
     <?php $sql = "SELECT programs.*, parishe.name AS parish_name
        FROM programs
        LEFT JOIN parishe
        ON programs.parish_id = parishe.id
        ORDER BY programs.id DESC";

$result = mysqli_query($conn, $sql);

if(!$result){
    die(mysqli_error($conn));
}





                 while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td>
<img src="../uploads/<?= $row['image']; ?>" width="80">
</td>

<td><?= $row['title']; ?></td>

<td><?= $row['category']; ?></td>

 <td><?=$row['parish_name'] ?></td>

<td><?= $row['status']; ?></td>

<td><?= $row['coordinator']; ?></td>

<td>

<a href="view-programslist.php?id=<?= $row['id']; ?>">
<button class="view">View</button>
</a>

<a href="edit-programs.php?id=<?= $row['id']; ?>">
<button class="edit">Edit</button>
</a>

<a href="delete-programs.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure want to Delete?')">
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