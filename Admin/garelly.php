<?php

include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';
?>

        <div class="main">

            

            <div class="topbar">
                <h1>List Média</h1>
                 <a href="../Admin/add-gallery.php">Add Garelly</a>
            </div>


            <div class="table-container">

                <table>

                    <tr>
                        <th>ID</th>
                        <th>Preview</th>
                        <th>Title</th>
                        <th>Parishes</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>

                                      
     <?php $sql = "SELECT gallery.*, parishe.name AS parish_name
        FROM gallery
        LEFT JOIN parishe
        ON gallery.parish_id = parishe.id
        ORDER BY gallery.id DESC";

$result = mysqli_query($conn, $sql);

if(!$result){
    die(mysqli_error($conn));
}

                    
while($row = mysqli_fetch_assoc($result)){

?>
                    
<tr>

<td><?= $row['id'] ?></td>
<td>
    <img
    src="../uploads/<?= $row['image']; ?>"
    width="100"
    height="80">
</td>

<td><?= $row['title']; ?></td>

<td><?=$row['parish_name'] ?></td>

<td><?= $row['category']; ?></td>


<td>

<a href="edit-garelly.php?id=<?= $row['id']; ?>">
<button class="edit">
Edit
</button>
</a>

<a href="delete-garelly.php?id=<?= $row['id']; ?>"
onclick="return confirm('Delete image?')">

<button class="delete">
Delete
</button>

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

























