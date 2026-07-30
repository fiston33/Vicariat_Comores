<?php

include_once(__DIR__ . '/includes/header.php');
?>

        <!-- <div class="main">
            
            <section class="media-hero">

            <div class="hero-content">
                <h1>Centre des Médias</h1>
                <p style="color:white; text-align:center">
                    Découvrez nos photos, vidéos, documents et publications.
                </p>

            </div>

        </section> -->

        <section class="media-hero">
         <div class="hero-content">
          <span class="hero-badge">
            <i class="fa-solid fa-photo-film"></i>
            Centre Multimédia
          </span>

          <h1>Centre des Médias</h1>

         <p>
            Explorez les photos, vidéos, documents et publications
            du Vicariat Apostolique de l'Archipel des Comores.
         </p>

         <div class="media-search">

    <input
        type="text"
        id="searchMedia"
        placeholder="Rechercher...">

</div>
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
        <!-- click and get full screen -->
       <a href="<?= $row['file_path']; ?>" target="_blank">
         <img src="<?= $row['file_path']; ?>" alt="">
       </a>
    </div>

<?php } ?>

</div>

        </section>

         <?php

        if(mysqli_num_rows($result)==0){
    echo "
    <div class='empty-state'>
        Aucun média disponible.
    </div>
    ";
}
?>

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
    $id = explode("v=", $video)[1] ?? '';
?>

    <div class="video-card">
        <iframe 
            src="https://www.youtube.com/embed/<?php echo $id; ?>"
            allowfullscreen>
        </iframe>

         <div class="video-content">
           <h3><?= $row['title']; ?></h3>
         </div>
    </div>

<?php } ?>

</div>


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

    <div class="document-icon">
        <i class="fa-solid fa-file-pdf"></i>
    </div>

    <div class="document-content">

        <h3><?= $row['title']; ?></h3>

        <a href="<?= $row['file_path']; ?>" download>
            Télécharger
        </a>

    </div>

</div>

<?php } ?>

</div>
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

    <img src="<?= $row['file_path']; ?>">

    <div class="publication-content">

        <span class="pub-tag">
            Publication
        </span>

        <h3><?= $row['title']; ?></h3>

        <p><?= substr($row['description'],0,120); ?>...</p>

        <a class="tagg" href="<?= $row['external_link']; ?>">
            Lire Plus →
        </a>

    </div>

</div>

<?php } ?>

</div>

        </section>
       

        </div>


    </div>

 
              <?php
include_once (__DIR__. '../includes/footer.php');
?>     





    </div>
</body>



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

</html>