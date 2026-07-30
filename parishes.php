<?php
include_once (__DIR__. '../includes/header.php');


$sql = "SELECT * FROM parishes ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);



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



                <h1>Liste Au Parishes</h1>

                <p style="text-align: center; color: white;">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus ea error, laudantium totam possimus
                </p>

            </div>

        </section>

              


        <div class="cont">

         

            <div class="statss">

            <h1>Paroisses</h1>
                

                 <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="stats">
                    <a href="#"><img src="uploads/<?= $row['image'] ?>" width="200px"></a>
                    <div class="did">
                        <h2> <?= $row['name'] ?></h2>
                        <p> <?= $row['location'] ?></p>
                        <p><?= $row['phone'] ?> | <?= $row['email'] ?></p>
                        <p>Horaires de Messe </p>

                        <a href="parishpage.php?id=<?= $row['id'] ?>">  Voir les détails</a>

                    </div>
                </div>

                 <?php
               }
               ?>

        
           <?php
include_once (__DIR__. '../includes/footer.php');
?>     


    </div>
</body>
</html>