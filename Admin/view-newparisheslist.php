<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';


$id = (int)$_GET['id'];

$sql = "SELECT * FROM parishe WHERE id=$id";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

?>

<div class="main">


            <div class="topbar">
                <h1>View Parishes </h1>
            </div>


            <div class="messages-summary">

                <div class="summary-card">

<h2><?= $row['name']; ?></h2>

<img src="../uploads/<?= $row['logo']; ?>" width="200"> <br>

<img src="../uploads/<?= $row['hero_image']; ?>" width="300"> <br>

<p><strong>Address:</strong> <?= $row['address']; ?></p>

<p><strong>Phone:</strong> <?= $row['phone']; ?></p>

<p><strong>Map:</strong> <?= $row['map']; ?></p>

<p><strong>Email:</strong> <?= $row['email']; ?></p>

<p><strong>Slug:</strong> <?= $row['slug']; ?></p>

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