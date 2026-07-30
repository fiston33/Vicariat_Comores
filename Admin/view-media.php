<?php

include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';

$id = (int)$_GET['id'];

$sql = "SELECT media.*, parishe.name AS parish_name
        FROM media
        LEFT JOIN parishe
        ON media.parish_id = parishe.id
        WHERE media.id = $id";



$result = mysqli_query($conn, $sql);

if(!$result){
    die("SQL Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if(!$row){
    die("Media not found.");
}

?>


<div class="main">

    <div class="topbar">
        <h1>Membership Details</h1>
    </div>

    <div class="messages-summary">

        <div class="summary-card">


<h1><?php echo $row['title']; ?></h1>

<h2>Parish:<?=$row['parish_name']; ?></h2>

<p style="margin-bottom:20px;"><?php echo $row['description']; ?></p>

<?php if($row['type']=='gallery' || $row['type']=='publication'){ ?>

<img src="../<?php echo $row['file_path']; ?>" width="600">

<?php } ?>

<?php if($row['type']=='document'){ ?>

<a href="../<?php echo $row['file_path']; ?>" download id="bignot">
    Download Document
</a>

<?php } ?>

<?php if($row['type']=='video'){ ?>

<?php
parse_str(parse_url($row['external_link'],PHP_URL_QUERY),$params);
$video_id = $params['v'] ?? '';
?>

<iframe
width="700"
height="400"
src="https://www.youtube.com/embed/<?php echo $video_id; ?>"
allowfullscreen>
</iframe>

<?php } ?>

</div>





        <div class="back-gallery">

    <a href="mediacenter.php">
        ← Retour à la Media Center
    </a>

</div>

<style>
    .back-gallery{
    width:90%;
    margin:20px auto;
}

.back-gallery a{
    text-decoration:none;
    font-weight:600;
}
</style>


    </div>

</div>

 </div>

     <?php
   include __DIR__. '../include/footer.php';
   ?>

</body>

</html>