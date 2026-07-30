<?php
include_once(__DIR__ . '/includes/header.php');


$sql = "SELECT *

FROM news

WHERE parish_id IS NULL

AND status='published'

ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);

?>
       

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
                <h1>ACTUALITÉS</h1>
                <p>
                    Découvrez les événements, célébrations et activités du Vicariat.
                </p>
            </div>

        </section>













        <div class="news">

            <div class="newsh1">
                <h1>ACTUALITÉS</h1>

            </div>

            <div class="newscath">


          

<?php while($row = mysqli_fetch_assoc($result)) { ?>

    <div class="newspaper">

        <img src="uploads/<?= $row['image'] ?>" alt="">

        <h3>
            <?= substr($row['title'], 0, 80) ?>
        </h3>

        <div class="flenewp">
            <p>
                <i class="fa-regular fa-circle-user"></i>
                <?= $row['author'] ?>
            </p>

            <p>
                <i class="fa-regular fa-calendar"></i>
                <?= date('d M Y', strtotime($row['created_at'])) ?>
            </p>
        </div>

        <p>
            <?= substr($row['summary'], 0, 180) ?>...
        </p>

        <a href="news-details.php?id=<?= $row['id'] ?>" class="event-btn" style="color:white; ">Read more</a>

    </div>

<?php } 
?>


            </div>
        </div>









          <?php
include_once (__DIR__. '../includes/footer.php');
?>     



    </div>
</body>

</html>