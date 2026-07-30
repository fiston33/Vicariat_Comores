<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';


$id = (int)$_GET['id'];


mysqli_query(
    $conn,
    "UPDATE messages SET status='read' WHERE id=$id"
);

$sql = "SELECT * FROM messages WHERE id=$id";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);
?>

 <div class="main">

            <div class="topbar">
                <h1>View Messages </h1>
            </div>

            


             <div class="messages-summary">

                <div class="summary-card">
                   <h2><?= $row['subject'] ?></h2>

<p>
<strong>Name:</strong>
<?= $row['name'] ?>
</p>

<p>
<strong>Email:</strong>
<?= $row['email'] ?>
</p>

<p>
<strong>Date:</strong>
<?= $row['created_at'] ?>
</p>

<hr>

<p>
<?= nl2br(htmlspecialchars($row['message'])) ?>
</p>
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





