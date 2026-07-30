<?php
include_once (__DIR__. '../includes/header.php');


$sql = "SELECT * FROM programs
        WHERE status='active'
        ORDER BY created_at DESC LIMIT 6";

$result = mysqli_query($conn,$sql);

?> 



        <section class="search-hero">

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



                <h1>Nos Programmes</h1>

                <p style="text-align: center; color: white;">
                    Servir, Éduquer et Accompagner Servir, Éduquer et Accompagner Servir,
                </p>

            </div>

        </section>

        <div class="prog">

    <div class="leftpro">
        <div class="skipper">

            <h1>Nos Programmes & Services</h1>

            <h3>
                Découvrez les différents programmes pastoraux,
                éducatifs et sociaux du Vicariat Apostolique
                de l'Archipel des Comores.
            </h3>

            <button>Découvrir nos missions</button>

        </div>
    </div>

    <div class="rightpro">

        <div class="program-grid">

            <?php while($row = mysqli_fetch_assoc($result)){ ?>

            <div class="program-card">

                <div class="icon-box">
                    <i class="fa-solid fa-check"></i>
                </div>

                <span class="category">
                    <?= $row['category']; ?>
                </span>

                <h2>
                    <?= $row['title']; ?>
                </h2>

                <p>
                    <?= substr($row['short_description'],0,120); ?>...
                </p>

                <a href="program-details.php?id=<?= $row['id']; ?>">
                    Lire Plus →
                </a>

            </div>

            <?php } ?>

        </div>

    </div>

</div>

        <?php
include_once (__DIR__. '../includes/footer.php');
?>     



    </div>
</body>
</html>




