<?php
include_once __DIR__.'/include/header.php';

include __DIR__. '/include/auth.php';
?>

        <div class="main">

            <div class="topbar">
                <h1>News List</h1>
                  <a href="../Admin/add-news.php">Add News</a>
            </div>

            <div class="table-container">

                <table>

                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Parish</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    <?php $sql = "SELECT news.*, parishe.name AS parish_name
        FROM news
        LEFT JOIN parishe
        ON news.parish_id = parishe.id
        ORDER BY news.id DESC";

$result = mysqli_query($conn, $sql);

if(!$result){
    die(mysqli_error($conn));
}

                     while($row = mysqli_fetch_assoc($result)) { ?>

                   <tr>
                        <td><?= $row['id'] ?></td>
                        <td><img src="../uploads/<?= $row['image'] ?>" width="80"></td>
                        <td><?= $row['title'] ?></td>
                        <td><?=$row['parish_name'] ?></td>
                        <td><?= $row['author'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td>
                           <a href="view-newslist.php?id=<?= $row['id'] ?>"><button class="view">View</button></a>
                           <a href="edit-news.php?id=<?= $row['id'] ?>"><button class="edit">Edit</button></a>
                           <a href="delete-news.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want Delete?')"><button class="delete">Delete</button></a>
                        </td>
                  </tr>

                   <?php } ?>
                   

                </table>

            </div>

        </div>

    </div>

     <?php
   include __DIR__. '../include/footer.php';
   ?>

</body>

</html>