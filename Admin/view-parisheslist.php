<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';


$id = (int)$_GET['id'];

$sql = "SELECT * FROM parishes WHERE id=$id";

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

<img src="../uploads/<?= $row['image']; ?>" width="300"> <br>

<p><strong>Priest:</strong> <?= $row['priest']; ?></p>

<p><strong>Location:</strong> <?= $row['location']; ?></p>

<p><strong>Phone:</strong> <?= $row['phone']; ?></p>

<p><strong>Email:</strong> <?= $row['email']; ?></p>

<h3>Mass Schedule</h3>

<p><?= nl2br($row['mass_schedule']); ?></p>

<h3>Description</h3>

<p><?= nl2br($row['description']); ?></p>


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