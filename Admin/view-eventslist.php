<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';





$id = (int)$_GET['id'];


$sql = "SELECT events.*, parishe.name AS parish_name
        FROM events
        LEFT JOIN parishe
        ON events.parish_id = parishe.id
        WHERE events.id = $id";



$result = mysqli_query($conn, $sql);

if(!$result){
    die("SQL Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if(!$row){
    die("Events not found.");
}

?>

 <div class="main">

            <div class="topbar">
                <h1>View Events </h1>
            </div>

            


            <div class="messages-summary">

                <div class="summary-card">
                    <h2><?= $row['title'] ?></h2> <br>
                    <img src="../uploads/<?= $row['image'] ?>" width="300"> <br>
                   
                    <p>Event Date:<?= $row['event_date'] ?></p>

                     <p>Location:<?= $row['location'] ?></p>

                     <h2>Parish:<?=$row['parish_name'] ?></h2>
                        
                        

                         <p><?= $row['description'] ?></p> <br>

                         <p>Status: <?= $row['status'] ?></p>
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