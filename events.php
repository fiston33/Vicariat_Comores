<?php
include_once(__DIR__ . '/includes/header.php');


$sql = "SELECT * FROM events
        WHERE status='published' 
        ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);

?>
       




        <!-- EVENTS HERO -->
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

                <h1>Événements</h1>
                <p>
                    Découvrez les événements, célébrations et activités du Vicariat.
                </p>
            </div>

        </section>


        

        <!-- EVENTS SECTION -->

        <section class="events-page">

             <div class="newsh1">
                <h1 style="width: 30%;">ÉVÉNEMENTS A VENIR</h1>

            </div>

          

            <div class="events-grid">

            

       
            <?php while($row = mysqli_fetch_assoc($result)) { ?>

   

            

                <!-- EVENT 1 -->

                <div class="event-card">
                    

    


                    <div class="event-image">

                        <img src="uploads/<?= $row['image'] ?>" alt="">

                        <span class="event-date">
                             
                          <?= $row['event_date'] ?>
                        </span>

                    </div>

                    <div class="event-content">

                        <h4> <?= substr($row['title'], 0, 80) ?></h4>

                        <p>
                           <?= substr($row['description'], 0, 180) ?>
                        </p>

                        <p><b>Location:</b><?= $row['location'] ?></p>

                        <a href="events-details.php?id=<?= $row['id'] ?>" class="event-btn" style="color:white; ">
                            Lire Plus
                        </a>



                    </div>


                </div>

                                                            <?php
}
?>


                

            </div>

             </div>


        </section>




        
              <?php
include_once (__DIR__. '../includes/footer.php');
?>     





    </div>
</body>

</html>