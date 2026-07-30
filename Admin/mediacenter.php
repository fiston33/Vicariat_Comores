<?php

include_once __DIR__.'/include/header.php';

?>

        <div class="main">
            
            <section class="media-hero">

            <div class="hero-content">
                <h1>Centre des Médias</h1>
                <p style="color:white;">
                    Découvrez nos photos, vidéos, documents et publications.
                </p>

                <a href="../Admin/add-mediacenter.php"><button class="tab-btn">Add Media</button></a>
               
            </div>

        </section>

        <section class="media-tabs">

            <button class="tab-btn active" data-tab="gallery">
                <i class="fa-solid fa-images"></i>
                Galerie
            </button>

            <button class="tab-btn" data-tab="videos">
                <i class="fa-solid fa-video"></i>
                Vidéos
            </button>

            <button class="tab-btn" data-tab="documents">
                <i class="fa-solid fa-file-pdf"></i>
                Documents
            </button>

            <button class="tab-btn" data-tab="publications">
                <i class="fa-solid fa-book-open"></i>
                Publications
            </button>

        </section>

        <!-- GALLERY -->

        <section id="gallery" class="tab-content active">

            <div class="section-header">
                <h2>Galerie Photos</h2>
            </div>

            <div class="gallery-grid">

<?php
$result = $conn->query("SELECT * FROM media WHERE type='gallery' ORDER BY id DESC");

while($row = $result->fetch_assoc()) {
?>

    <div class="gallery-item">

    <img src="../<?php echo $row['file_path']; ?>" alt="">
    

    <div class="media-actions">

        <a href="view-media.php?id=<?php echo $row['id']; ?>" class="view">
            <i class="fa-solid fa-eye"></i>
        </a>

        <a href="edit-mediacenter.php?id=<?php echo $row['id']; ?>" class="edit">
            <i class="fa-solid fa-pen"></i>
        </a>

        <a href="delete-mediacenter.php?id=<?php echo $row['id']; ?>" class="delete"
           onclick="return confirm('Are you sure you want to delete this media?')">
            <i class="fa-solid fa-trash"></i>
        </a>

    </div>

</div>
   
<?php } ?>


</div>

<style>
 .gallery-item,
.video-card,
.document-card,
.publication-card{
    position:relative;
}

.media-actions{
    position:absolute;
    top:10px;
    right:10px;
    display:flex;
    gap:8px;
    z-index:10;
}

.media-actions a{
    width:35px;
    height:35px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    color:white;
    text-decoration:none;
    transition:.3s;
}

.media-actions a:hover{
    transform:scale(1.1);
}

.view{
    background:#3498db;
}

.edit{
    background:#27ae60;
}

.delete{
    background:#e74c3c;
}
</style>

        </section>

        <!-- VIDEOS -->


        <section id="videos" class="tab-content">

            <div class="section-header">
                <h2>Vidéos</h2>
            </div>

            <div class="video-grid">

<?php
$result = $conn->query("SELECT * FROM media WHERE type='video'");

while($row = $result->fetch_assoc()) {

    $video = $row['external_link'];
    $video_id = '';

    if(strpos($video,'v=') !== false){
        parse_str(parse_url($video, PHP_URL_QUERY), $params);
        $video_id = $params['v'] ?? '';
    }
?>
<div class="video-card">

    <iframe
        src="https://www.youtube.com/embed/<?php echo $video_id; ?>"
        allowfullscreen>
    </iframe>

    <div class="media-actions">
        <a href="view-media.php?id=<?php echo $row['id']; ?>" class="view">
            <i class="fa-solid fa-eye"></i>
        </a>

        <a href="edit-mediacenter.php?id=<?php echo $row['id']; ?>" class="edit">
            <i class="fa-solid fa-pen"></i>
        </a>

        <a href="delete-mediacenter.php?id=<?php echo $row['id']; ?>" class="delete"
        onclick="return confirm('Delete this media?')">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>

</div>
<?php } ?>

        </section>

        <!-- DOCUMENTS -->

        <section id="documents" class="tab-content">

            <div class="section-header">
                <h2>Documents</h2>
            </div>

            <div class="document-list">

<?php
$result = $conn->query("SELECT * FROM media WHERE type='document'");

while($row = $result->fetch_assoc()) {
?>

<div class="document-card">

    <div class="document-info">
        <i class="fa-solid fa-file-pdf"></i>

        <div>
            <h3><?php echo $row['title']; ?></h3>
            <a href="../<?php echo $row['file_path']; ?>" id="bignot" download>
                Télécharger
            </a>
        </div>
    </div>

    <div class="media-actions">
        <a href="view-media.php?id=<?php echo $row['id']; ?>" class="view">
            <i class="fa-solid fa-eye"></i>
        </a>

        <a href="edit-mediacenter.php?id=<?php echo $row['id']; ?>" class="edit">
            <i class="fa-solid fa-pen"></i>
        </a>

        <a href="delete-mediacenter.php?id=<?php echo $row['id']; ?>" class="delete">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>

</div>

<?php } ?>        
</section>

        <!-- PUBLICATIONS -->

        <section id="publications" class="tab-content">

            <div class="section-header">
                <h2>Publications</h2>
            </div>

           <div class="publication-grid">

<?php
$result = $conn->query("SELECT * FROM media WHERE type='publication'");

while($row = $result->fetch_assoc()) {
?>

<div class="publication-card">

    <img src="../<?php echo $row['file_path']; ?>" alt="">

    <h3><?php echo $row['title']; ?></h3>

    <p><?php echo $row['description']; ?></p>

    <a href="<?php echo $row['external_link']; ?>" id="bignot">
        Lire Plus
    </a>

    <div class="media-actions">
        <a href="view-media.php?id=<?php echo $row['id']; ?>" class="view">
            <i class="fa-solid fa-eye"></i>
        </a>

        <a href="edit-mediacenter.php?id=<?php echo $row['id']; ?>" class="edit">
            <i class="fa-solid fa-pen"></i>
        </a>

        <a href="delete-mediacenter.php?id=<?php echo $row['id']; ?>" class="delete">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>

</div>

<?php } ?>
        </section>

        </div>


    </div>

    <?php

include_once __DIR__.'/include/footer.php';
?>




    <script>

        const buttons = document.querySelectorAll('.tab-btn');
        const contents = document.querySelectorAll('.tab-content');

        buttons.forEach(button => {

            button.addEventListener('click', () => {

                buttons.forEach(btn =>
                    btn.classList.remove('active')
                );

                contents.forEach(content =>
                    content.classList.remove('active')
                );

                button.classList.add('active');

                document
                    .getElementById(button.dataset.tab)
                    .classList.add('active');

            });

        });

    </script>
</body>

</html>