<?php
include_once (__DIR__. '../includes/header.php');

$id = (int) $_GET['id'];

$sql = "SELECT * FROM parishes WHERE id=$id";
$parish = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$prayers = mysqli_query(
    $conn,
    "SELECT * FROM parish_prayers WHERE parish_id=$id ORDER BY prayer_day, prayer_time"
);

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



                <h1><?= $parish['name'] ?></h1>

                <p style="text-align: center; color: white;">
                    <?= $parish['description'] ?>
                </p>

            </div>

        </section>



        <div class="contract">

            <div class="stateof">
                <h1>Paroisses</h1>

                <div class="atlanta">
                    <a href="#">  <img src="uploads/<?= $parish['image'] ?>" width="200px"></a>
                    <div class="dearmom">

                         <h2><?= $parish['name'] ?></h2>

        <p><?= $parish['description'] ?></p>

        <p><?= $parish['location'] ?></p>

        <p><?= $parish['priest'] ?></p>

        <p><?= $parish['phone'] ?></p>

        <p><?= $parish['email'] ?></p>

        <p><?= $parish['mass_schedule'] ?></p>


        
                        <div class="messe">
    <h3>Horaires de Messe</h3>

    <?php while($row = mysqli_fetch_assoc($prayers)) { ?>

        <div class="messflex">

            <div class="messeflex">
                <p><?= $row['prayer_day'] ?></p>
            </div>

            <div class="messeflex">
                <p><?= $row['prayer_time'] ?></p>
            </div>

        </div>

         <?php } ?>

   
</div>

                        <!-- <a href="#">Voir les détails</a> -->

                       </div> 

                    </div>
                </div>


                <h1 style="color: red; font-size: 60px ; margin: 40px; text-align: center;">Content Here</h1>
                <p>visiting content & events</p>

            </div>

        </div>

                <?php
include_once (__DIR__. '../includes/footer.php');
?>     


    </div>
</body>

</html>