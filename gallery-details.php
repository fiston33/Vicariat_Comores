<?php
include_once (__DIR__. '../includes/header.php');


$id = (int)$_GET['id'];

$sql = "SELECT * FROM gallery
        WHERE id=$id";

$result = mysqli_query($conn,$sql);

$gallery = mysqli_fetch_assoc($result);

if(!$gallery){
    die("Image not found");
}
?>

    <section class="gallery-hero">

    <img
    src="uploads/<?= $gallery['image']; ?>"
    alt="<?= htmlspecialchars($gallery['title']); ?>">

    <div class="overlay">

        <span>
            <?= htmlspecialchars($gallery['category']); ?>
        </span>

        <h1>
            <?= htmlspecialchars($gallery['title']); ?>
        </h1>

        <p style="color:white;">
            <?= date('d F Y', strtotime($gallery['created_at'])); ?>
        </p>

    </div>

</section>

<div class="back-gallery">

    <a href="gallery.php">
        ← Retour à la galerie
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

    <section class="gallery-details">

    <div class="gallery-content">

        <h2>Description</h2>

        <p>

        <?=
        !empty($gallery['description'])
        ? nl2br(htmlspecialchars($gallery['description']))
        : 'Aucune description disponible.'
        ?>

        </p>

    </div>

    <div class="gallery-info">

        <h2>Informations</h2>

        <div class="info-box">
            <strong>Catégorie</strong>
            <p><?= $gallery['category']; ?></p>
        </div>

        <div class="info-box">
            <strong>Date</strong>
            <p>
                <?= date('d/m/Y', strtotime($gallery['created_at'])); ?>
            </p>
        </div>

    </div>

</section>



<?php

$category = mysqli_real_escape_string(
    $conn,
    $gallery['category']
);

$related = mysqli_query(

    $conn,

    "SELECT *
     FROM gallery
     WHERE category='$category'
     AND id != $id
     ORDER BY created_at DESC
     LIMIT 6"

);

?>




   <section class="related-gallery">

    <h2>Photos Associées</h2>

    <div class="related-grid">

        <?php while($row = mysqli_fetch_assoc($related)){ ?>

        <a
        href="gallery-details.php?id=<?= $row['id']; ?>">

            <img
            src="uploads/<?= $row['image']; ?>"
            alt="<?= htmlspecialchars($row['title']); ?>">

        </a>

        <?php } ?>

    </div>

</section>
   <?php
include_once (__DIR__. '../includes/footer.php');
?>     


    </div>
</body>

</body>

</html>