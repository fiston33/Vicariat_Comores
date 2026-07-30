<?php
include_once (__DIR__. '../includes/header.php');



$id = $_GET['id'];

$sql = "SELECT * FROM events WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
       









        <!-- EVENT HERO -->

        <section class="events-hero">

            <div class="hero-content">


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

                <h1>Events Details</h1>
                <p>
                    Découvrez les événements, célébrations et activités du Vicariat.
                </p>
            </div>

        </section>

        <!-- EVENT DETAILS -->

        <section class="event-details">

            <div class="fleevents">
                <div class="eventimage">
                    <img src="uploads/<?= $row['image'] ?>">
                </div>

                <div class="eventothers">

                    <div class="event-header">

                        <h1><?= substr($row['title'], 0, 80) ?></h1>

                        <div class="event-meta">
                            <span style="color: #152a6e;">
                                <i class="fa-regular fa-calendar"></i> <?= $row['event_date'] ?>
                            </span>
                            <span style="color: #152a6e;">
                                <i class="fa-solid fa-map-pin"></i> <?= $row['location'] ?>
                            </span>
                        </div>
                    </div>

                    <div class="event-description">
                        <p>
                           <?= $row['description'] ?>
                             
                        </p>
                        <p>
                            Au programme :
                        </p>
                        <ul>
                            <li>Prière</li>
                            <li>Formation chrétienne</li>
                            <li>Partage communautaire</li>
                            <li>Activités culturelles</li>
                        </ul>

                    </div>
                </div>

            </div>
        </section>







        <!-- EVENT GALLERY -->

        <section class="event-gallery">

            <h2 style="color: #152a6e; font-size: 2rem;">Galerie</h2>

            <div class="gallery-grid">

                <img src="images/charities.jpeg" alt="">
                <img src="images/church.jpeg" alt="">
                <img src="images/hist.jpeg" alt="">
                <img src="images/hist.jpeg" alt="">
                <img src="images/hist.jpeg" alt="">

            </div>

        </section>

        <!-- RELATED EVENTS -->
         <?php
        
$news = mysqli_query($conn, "SELECT * FROM events ORDER BY created_at DESC LIMIT 8");

?>

 


        <section class="related-events">

            <h2>Autres Événements</h2>

            <div class="events-grid">

             <?php while($row = mysqli_fetch_assoc($news)) { ?>

                <div class="event-card">

                    <div class="event-image">
                        <img src="uploads/<?= $row['image'] ?>">
                    </div>

                    <div class="event-content">
                         <h4><?= $row['title'] ?></h4>
                        <p><i class="fa-solid fa-pen-to-square"></i> <b>Date:</b><?= $row['event_date'] ?></p>
                        <p><b>Location:</b><?= $row['location'] ?></p>
                        <a href="#">Lire Plus</a>
                    </div>

                </div>

                          
<?php } 
?>

               
            </div>

  




        </section>
















            <?php
include_once (__DIR__. '../includes/footer.php');
?>     




    </div>
</body>

</html>