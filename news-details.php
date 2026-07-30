<?php
include_once (__DIR__. '../includes/header.php');



$rich = $_GET['id'];

$sql = "SELECT * FROM news WHERE id=$rich";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>






        <!-- NEWS HERO -->

        <section class="events-hero">

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
            <div class="hero-content">
                <h1><?= $row['title'] ?></h1>
                <p>
                    <?= substr($row['summary'], 0, 300) ?>...
                </p>
            </div>

        </section>

        <!-- NEWS DETAILS -->

        <section class="news-details">

            <div class="fleevents">
                <div class="eventimage">
                    <img src="uploads/<?= $row['image'] ?>">
                </div>

                <div class="eventothers">

                    <div class="news-header">

                        <h1><?= $row['title'] ?></h1>

                        <div class="news-meta">

                            <span><i class="fa-solid fa-signature"></i> <b>By:</b> <?= $row['author'] ?></span>

                            <span> <i class="fa-regular fa-calendar"></i> <b>Date:</b> <?= date('d M Y', strtotime($row['created_at'])) ?></span>

                        </div>

                    </div>

                    <div class="news-content">

                        <p>
                            <?= $row['content'] ?>
                        </p>

                        

                        <blockquote>
                            <?= substr($row['summary'], 0, 300) ?>...
                        </blockquote>

                        <!-- <p>
                            Nous invitons toutes les communautés chrétiennes à participer
                            activement aux programmes pastoraux.
                        </p> -->

                    </div>
                </div>
            </div>
        </section>

        <!-- RELATED NEWS -->
<?php
        
$news = mysqli_query($conn, "SELECT * FROM news ORDER BY created_at DESC LIMIT 8");

?>

  


        <section class="related-events">

            <h2>Actualités Similaires</h2>

            

            <div class="events-grid">


                <?php while($row = mysqli_fetch_assoc($news)) { ?>

                <div class="event-card">

                    <div class="event-image">
                        <img src="uploads/<?= $row['image'] ?>">
                    </div>

                    <div class="event-content">
                        <h4><?= $row['title'] ?></h4>
                        <p><i class="fa-solid fa-signature"></i> <b>By:</b><?= $row['author'] ?></p>
                        <a href="news-details.php?id=<?= $row['id'] ?>">Lire Plus</a>
                    </div>


                    

                </div>

                 <?php } ?>

            </div>

           



        </section>









       <?php
include_once (__DIR__. '../includes/footer.php');
?>     



    </div>
</body>

</html>