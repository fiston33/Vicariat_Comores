<?php

include_once(__DIR__.'/includes/header.php');

$id = (int)$_GET['id'];

$sql = "SELECT * FROM programs WHERE id=$id";

$result = mysqli_query($conn,$sql);

$program = mysqli_fetch_assoc($result);

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



        <section class="program-details">

    <div class="content">
        <h2><?= $program['title'] ?></h2>


        <p>
            <?= nl2br($program['description']); ?>
        </p>

    </div>

    <aside class="program-sidebar">

          <img src="uploads/<?= $program['image'] ?>" width="450px">

        <h3>Coordonnateur</h3>

        <p><?= $program['coordinator']; ?></p>

        <h3>Téléphone</h3>

        <p><?= $program['phone']; ?></p>

        <h3>Email</h3>

        <p><?= $program['email']; ?></p>

    </aside>

</section>


  <?php
include_once (__DIR__. '../includes/footer.php');
?>     



    </div>
</body>
</html>
