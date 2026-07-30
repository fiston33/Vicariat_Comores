<?php
include_once (__DIR__. '../includes/header.php');


$all_gallery = mysqli_query(
    $conn,
    "SELECT * FROM gallery ORDER BY created_at DESC"
);

$events_gallery = mysqli_query(
    $conn,
    "SELECT * FROM gallery
     WHERE category='Événements'
     ORDER BY created_at DESC"
);

$parishes_gallery = mysqli_query(
    $conn,
    "SELECT * FROM gallery
     WHERE category='Paroisses'
     ORDER BY created_at DESC"
);

$youth_gallery = mysqli_query(
    $conn,
    "SELECT * FROM gallery
     WHERE category='Jeunesse'
     ORDER BY created_at DESC"
);

$bishop_gallery = mysqli_query(
    $conn,
    "SELECT * FROM gallery
     WHERE category='Évêque'
     ORDER BY created_at DESC"
);


?>
       



        <div class="donation-container">

            <!-- HERO SECTION -->
            <div class="donation-hero">

              <section class="search-page">

                    <div class="search-box">

                        <form>

                            <input type="text" placeholder="Rechercher actualités, événements, paroisses...">

                            <button type="submit">
                                Rechercher
                            </button>

                        </form>

                    </div>

             </section>


                <h1>Gallerie List</h1>
                <p style="text-align: center; color: white;">Revivez les célébrations, les activités pastorales,
        les événements diocésains et la vie des communautés
        chrétiennes de l'Archipel des Comores.</p>

            </div>



        <section class="media-tabs">

            <button class="tab-btn active" data-tab="gallery">
                <i class="fa-solid fa-images"></i>
                Toutes
            </button>

            <button class="tab-btn" data-tab="videos">
                <i class="fa-solid fa-video"></i>
                Événements
            </button>

            <button class="tab-btn" data-tab="documents">
                <i class="fa-solid fa-file-pdf"></i>
                Paroisses
            </button>

            <button class="tab-btn" data-tab="publications">
                <i class="fa-solid fa-book-open"></i>
                Jeunesse
            </button>

            <button class="tab-btn" data-tab="dash">
                <i class="fa-solid fa-book-open"></i>
                Évêque
            </button>

        </section>



         <section id="gallery" class="tab-content active">

            <div class="section-header">
                <h2>Toutes</h2>
            </div>

            <div class="gallery-grid">

<?php while($row = mysqli_fetch_assoc($all_gallery)){ ?>

<div class="gallery-item">

    
    <img src="uploads/<?= $row['image']; ?>" alt="<?= $row['title']; ?>">
      

    <div class="gallery-overlay">

        <h3><?= $row['title']; ?></h3>

        <p>
            Cliquez pour découvrir cette galerie.
        </p>

        <span>
            <a href="gallery-details.php?id=<?= $row['id']; ?>">
            Voir les photos
            <i class="fa fa-arrow-right"></i>
            </a>
        </span>
      

    </div>

</div>


<?php } ?>

</div>

        </section>





         <section id="videos" class="tab-content">

            <div class="section-header">
                <h2>Événements</h2>
            </div>

            <div class="gallery-grid">

<?php while($row = mysqli_fetch_assoc($events_gallery)){ ?>

<div class="gallery-item">

    <img src="uploads/<?= $row['image']; ?>" alt="<?= $row['title']; ?>">

    <div class="gallery-overlay">

        <h3><?= $row['title']; ?></h3>

        <p>
            Cliquez pour découvrir cette galerie.
        </p>

        <span>
            Voir les photos
            <i class="fa fa-arrow-right"></i>
        </span>

    </div>

</div>


<?php } ?>

</div>

        </section>

        <section id="documents" class="tab-content">

            <div class="section-header">
                <h2>Paroisses</h2>
            </div>

           <div class="gallery-grid">

<?php while($row = mysqli_fetch_assoc($parishes_gallery)){ ?>

<div class="gallery-item">

    <img src="uploads/<?= $row['image']; ?>" alt="<?= $row['title']; ?>">

    <div class="gallery-overlay">

        <h3><?= $row['title']; ?></h3>

        <p>
            Cliquez pour découvrir cette galerie.
        </p>

        <span>
            Voir les photos
            <i class="fa fa-arrow-right"></i>
        </span>

    </div>

</div>


<?php } ?>

</div>

        </section>

        <section id="publications" class="tab-content">

            <div class="section-header">
                <h2>Jeunesse</h2>
            </div>

            <div class="gallery-grid">

<?php while($row = mysqli_fetch_assoc($youth_gallery)){ ?>

<div class="gallery-item">

    <img src="uploads/<?= $row['image']; ?>" alt="<?= $row['title']; ?>">

    <div class="gallery-overlay">

        <h3><?= $row['title']; ?></h3>

        <p>
            Cliquez pour découvrir cette galerie.
        </p>

        <span>
            Voir les photos
            <i class="fa fa-arrow-right"></i>
        </span>

    </div>

</div>


<?php } ?>

</div>

        </section>

        <section id="dash" class="tab-content">

            <div class="section-header">
                <h2>Évêque</h2>
            </div>

            <div class="gallery-grid">

<?php while($row = mysqli_fetch_assoc($bishop_gallery)){ ?>

<div class="gallery-item">

    <img src="uploads/<?= $row['image']; ?>" alt="<?= $row['title']; ?>">

    <div class="gallery-overlay">

        <h3><?= $row['title']; ?></h3>

        <p>
            Cliquez pour découvrir cette galerie.
        </p>

        <span>
            Voir les photos
            <i class="fa fa-arrow-right"></i>
        </span>

    </div>

</div>


<?php } ?>

</div>

        </section>

            
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








