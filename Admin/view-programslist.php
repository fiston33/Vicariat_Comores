<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';


$id = (int)$_GET['id'];

$sql = "SELECT programs.*, parishe.name AS parish_name
        FROM programs
        LEFT JOIN parishe
        ON programs.parish_id = parishe.id
        WHERE programs.id = $id";



$result = mysqli_query($conn, $sql);

if(!$result){
    die("SQL Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if(!$row){
    die("Programs not found.");
}

?>

<div class="main">


            <div class="topbar">
                <h1>View Programs </h1>
            </div>


            <div class="messages-summary">

                <div class="summary-card">

<h2><?= $row['title']; ?></h2>

<img src="../uploads/<?= $row['image']; ?>" width="300"> <br>

<h2>Parish:<?=$row['parish_name']; ?></h2>

<p><strong>Category:</strong> <?= $row['category']; ?></p>

<p><strong>Coordinator:</strong> <?= $row['coordinator']; ?></p>

<p><strong>Phone:</strong> <?= $row['phone']; ?></p>

<p><strong>Email:</strong> <?= $row['email']; ?></p>

<h3>Short Description:</h3>

<p><?= nl2br($row['short_description']); ?></p>

<h3>Description</h3>

<p><?= nl2br($row['description']); ?></p>


</div>

</div>


 </div>

</div>
</div>

     <?php
   include __DIR__. '../include/footer.php';
   ?>

</body>

</html>