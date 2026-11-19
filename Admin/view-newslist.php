<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';



$id = (int)$_GET['id'];

$sql = "SELECT news.*, parishe.name AS parish_name
        FROM news
        LEFT JOIN parishe
        ON news.parish_id = parishe.id
        WHERE news.id = $id";

$result = mysqli_query($conn, $sql);

if(!$result){
    die("SQL Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if(!$row){
    die("News not found.");
}

?>

 <div class="main">

            <div class="topbar">
                <h1>View News </h1>
            </div>

            


             <div class="messages-summary">

                <div class="summary-card">

                    <h2><?= $row['title'] ?></h2> <br>
                    <img src="../uploads/<?= $row['image'] ?>" width="300"> <br>
                    
                    <p><?= $row['summary'] ?></p> <br>
                    <p><?= $row['content'] ?></p> <br>

                    <h2>Parish:<?=$row['parish_name'] ?></h2>

                     <p>Author:<?= $row['author'] ?></p>
                        <p>Status: <?= $row['status'] ?></p>
                        <p>Published:<?= $row['created_at'] ?></p>
                </div>

            </div>





</div>

</div>



 
    </div>

     <?php
   include __DIR__ . '/include/footer.php';
   ?>

</body>

</html>