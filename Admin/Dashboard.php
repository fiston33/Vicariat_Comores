

<?php 
include __DIR__. '/include/header.php';

include __DIR__. '/include/auth.php';



if(isset($_SESSION['user_id'])): ?>


<?php 
$news_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM news"));
$events_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM events"));
$parishes_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM parishes"));
$messages_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM messages"));
?>

<?php endif; ?>



        <!-- MAIN CONTENT -->
        <div class="main">

            <div class="topbar">
                <h1>Dashboard</h1>
                <p>Welcome, <?= $_SESSION['fullname']; ?></p>
            </div>

            <!-- STATS -->
            <div class="cards">

                <div class="card">
                    <h3>News</h3>
                    <p><?= $news_count ?></p>
                </div>


                <div class="card">
                    <h3>Events</h3>
                    <p><?= $events_count ?></p>
                </div>

                <div class="card">
                    <h3>Parishes</h3>
                    <p><?= $parishes_count ?></p>

                </div>

                <div class="card">
                    <h3>Messages</h3>
                    <p><?= $messages_count ?></p>
                </div>

            </div>



            <div class="newsh1">
                <h1>LATEST NEWS</h1>

            </div>

            <!-- <div class="topbar">
            <h1>Latest News</h1>
        </div> -->

            <div class="table-container">

            <?php

            $news = mysqli_query($conn, "SELECT * FROM news ORDER BY created_at DESC LIMIT 5");
            ?>
                <table>

                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>

                   <?php while($row = mysqli_fetch_assoc($news)) { ?>
<tr>
    <td><img src="../uploads/<?= $row['image'] ?>" width="80"></td>
    <td><?= $row['title'] ?></td>
    <td><?= $row['author'] ?></td>
    <td><?= $row['created_at'] ?></td>
    <td>
        <a href="view-newslist.php?id=<?= $row['id'] ?>">
            <button class="view">View</button>
        </a>
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