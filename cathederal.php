<?php


$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "vicariat_comores";

$conn = mysqli_connect(
    $servername,
    $username,
    $password,
    $database
);

if(!$conn){
    die("Database Connection Failed: " . mysqli_connect_error());
}


$id = (int) $_GET['id'];

$sql = "SELECT * FROM parishe WHERE id=$id";
$parish = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$prayers = mysqli_query(
    $conn,
    "SELECT * FROM parish_prayers WHERE parish_id=$id ORDER BY prayer_day, prayer_time"
);

?> 




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/workreuser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Vicariat de l'archipel des Comores</title>
</head>

<body>
    <div class="container">





        <div class="topparish">

            <div class="iconscontact">
                <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-regular fa-envelope"></i></a>
                <button>Nous Contact <i class="fa-solid fa-phone"></i></button>
            </div>





            <div class="linksmenu">
                <div class="menu-toggle">
    <i class="fa-solid fa-bars-staggered menu-toggle"></i>
    </div>
    <ul>
        <li><a href="#accueil">Accueil</a></li>
        <li><a href="#vie">Vie de la Paroisse</a></li>
        <li><a href="#conseil">Conseil</a></li>
        <li><a href="#commissions">Commissions</a></li>
        <li><a href="#groupes">Groupes</a></li>
        <li><a href="#organisation">Organisation</a></li>
        <li><a href="#actualites">Actualites</a></li>
        <li><a href="#histoire">Histoire</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</div>






            <div class="bienvenue">
                <h2 style="font-family: Segoe Script; color:rgb(5, 127, 184); padding:0; font-size: 45px;">Bienvenue a
                </h2>

                <h1><?= $parish['name'] ?></h1>

                <!-- <div class="hero-info">

    <div class="info-box">
        <i class="fa-solid fa-user"></i>
        <h4>Curé</h4>
        <p>Père Jean Claude</p>
    </div>

    <div class="info-box">
        <i class="fa-solid fa-location-dot"></i>
        <h4>Localisation</h4>
        <p>Moroni, Grande Comore</p>
    </div>

    <div class="info-box">
        <i class="fa-solid fa-phone"></i>
        <h4>Téléphone</h4>
        <p>+269 XXX XXX</p>
    </div>

</div> -->

                <div class="hero-buttons">
                    <a href="#">Horaires des messes</a>
                    <a href="#">Nous contacter</a>
                </div>
            </div>

        </div>

        <div class="ILoveyouma">
            <div class="maaaa">
                <i class="fa-solid fa-location-dot"></i>
                <span>Moroni, Grande Comore</span>
            </div>

            <div class="maaaa">
                <i class="fa-solid fa-cross"></i>
                <h2>850+</h2>
                <span>Fidèles</span>
            </div>

            <div class="maaaa">
                <i class="fa-solid fa-church"></i>
                <h2>4</h2>
                <span>Chapelles</span>
            </div>

            <div class="maaaa">
                <i class="fa-solid fa-calendar-days"></i>
                <h2>12</h2>
                <span>Messes / Semaine</span>
            </div>

            <div class="maaaa">
                <i class="fa-solid fa-user"></i>
                <h2>2</h2>
                <span>Prêtres</span>
            </div>

            <div class="maaaa">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <h2>1958</h2>
                <span>Création</span>
            </div>
        </div>


        <section id="vie" class="section-parish">

            <div class="section-title">
                <h1>Vie de la Paroisse</h1>
            </div>

            <div class="life-grid">

                <div class="life-card">
                    <i class="fa-solid fa-cross"></i>
                    <h3>Vie Spirituelle</h3>
                    <p>
                        Célébrations liturgiques,
                        sacrements et temps de prière.
                    </p>
                </div>

                <div class="life-card">
                    <i class="fa-solid fa-people-group"></i>
                    <h3>Vie Communautaire</h3>
                    <p>
                        Rencontres fraternelles
                        et accompagnement des familles.
                    </p>
                </div>

                <div class="life-card">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    <h3>Action Sociale</h3>
                    <p>
                        Soutien aux personnes vulnérables.
                    </p>
                </div>

            </div>

        </section>



        <section id="conseil">


            <div class="section-title">
                <h1>Conseil Paroissial</h1>
            </div>


            <div class="tteam">
                <div class="teamme">
                    <img src="images/pas.webp" alt="">
                    <h2>Charles Mahuza Yava</h2>
                    <h3>Curé</h3>
                    <p>Nous Sommes appelès a ètre une Église vivante fraternelleet missionnaire, au service </p>
                </div>

                <div class="teamme">
                    <img src="images/blacpass.webp" alt="">
                    <h2>Jean Claude Mij Riy</h2>
                    <h3>Vice Présidente</h3>
                    <p>Nous Sommes appelès a ètre une Église vivante fraternelleet missionnaire, au service </p>
                </div>


                <div class="teamme">
                    <img src="images/passp.webp" alt="">
                    <h2>Père Jean</h2>
                    <h3>Secrétaire</h3>
                    <p>Nous Sommes appelès a ètre une Église vivante fraternelleet missionnaire, au service </p>
                </div>

                <div class="teamme">
                    <img src="images/passpor.avif" alt="">
                    <h2>Marie Louise</h2>
                    <h3>Vicaire Apostilique</h3>
                    <p>Nous Sommes appelès a ètre une Église vivante fraternelleet missionnaire, au service </p>
                </div>
            </div>


        </section>




        <section id="commissions">

            <div class="section-title">
                <h1>Commissions</h1>
            </div>

            <div class="principaux">

                <div class="principame">
                    <i class="fa-solid fa-book-bible"></i>
                    <h2>Liturgie</h2>
                </div>

                <div class="principame">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <h2>Catéchèse</h2>
                </div>

                <div class="principame">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    <h2>Caritas</h2>
                </div>

                <div class="principame">
                    <i class="fa-solid fa-users"></i>
                    <h2>Famille</h2>
                </div>

            </div>

        </section>


        <div class="donation-container">


            <!-- DONATION BOX -->
            <div class="donation-box">

                <div class="donation-options">

                    <h2>Choisissez un montant</h2>

                    <div class="amounts">
                        <button class="amount-btn" data-amount="5000">
                            € 50
                        </button>

                        <button class="amount-btn" data-amount="10000">
                            € 100
                        </button>

                        <button class="amount-btn" data-amount="20000">
                            € 2,000
                        </button>

                        <button class="amount-btn" data-amount="50000">
                            € 5,000
                        </button>
                    </div>

                    <h3>Ou entrer un montant personnalisé</h3>



                </div>

                <div class="donation-form">

                    <h2>Vos informations</h2>

                    <form method="POST">
                        <input type="number" name="amount" placeholder="Montant en €">




                        <input type="text" name="fullname" placeholder="Nom complet" required>

                        <input type="email" name="email" placeholder="Email">

                        <input type="text" name="phone" placeholder="Téléphone">

                        <select name="payment_method">

                            <option value="">
                                Choisir méthode de paiement
                            </option>

                            <option>
                                MTN Mobile Money
                            </option>

                            <option>
                                Airtel Money
                            </option>

                            <option>
                                Bank Transfer
                            </option>

                        </select>

                        <button type="submit" name="donate">
                            Donner maintenant
                        </button>

                    </form>

                </div>

            </div>

        </div>


        <!-- <section class="external-links">

    <div class="section-title">
        <h1>Autres Sites</h1>
    </div>

    <a href="#">Conférence Épiscopale de l'Océan Indien</a>

    <a href="#">Saint-Siège</a>

</section>
 -->

 
        <div class="contract">

            <div class="stateof">
                <h1>Paroisses</h1>

                <div class="atlanta">
                    <a href="#"> <img src="images/cath.jpeg" width="200px"></a>
                    <div class="dearmom">

                        <h2><?= $parish['name'] ?></h2>

                        <p><?= $parish['parish_life'] ?></p>

                        <p><?= $parish['address'] ?></p>

                        <p><?= $parish['slug'] ?></p>

                        <p><?= $parish['phone'] ?></p>

                        <p><?= $parish['email'] ?></p>

                        <p><?= $parish['council'] ?></p>



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
        </div>



        <?php

$sql = "SELECT * FROM news WHERE parish_id=$id AND status='published' ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);

?>




   

        <section id="events">
            
            <div class="section-title">
                <h1>News Actualites</h1>
            </div>
            
            <div class="news-grid">

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="news-card">
                    <img src="uploads/<?= $row['image'] ?>" alt="">
                    <div class="news-content">
                        <h3><?= substr($row['title'], 0, 80) ?></h3>
                        <span>
                           <?= substr($row['summary'], 0, 180) ?>...
                        </span>
                    </div>
                    
                </div>

              
<!-- 
                <div class="news-card">
                    <img src="images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolor, sit amet c i quod natus eveniet tenetur atque
                            molestias! Quibusdam Lorem...

                        </span>
                    </div>
                </div>

                <div class="news-card">
                    <img src="images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolor, sit amet cons niet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div>

                <div class="news-card">
                    <img src="images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolor, sit am tus eveniet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div> -->
 

                <?php } ?>
            </div>

              

            


        </section>

        <?php

$sql = "SELECT * FROM events WHERE parish_id=$id AND status='published' ORDER BY created_at DESC LIMIT 10";

$result = mysqli_query($conn, $sql);

?>


        <section id="events">
            <div class="section-title">
                <h1>Evenement Du Paroisse</h1>
            </div>
            <div class="news-grid">
                 <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="news-card">
                     <img src="uploads/<?= $row['image'] ?>" alt="">
                    <div class="news-content">
                        <h3> <?= substr($row['title'], 0, 80) ?></h3>
                        <span>
                          <?= substr($row['description'], 0, 180) ?>
                        </span>
                    </div>
                </div>


                <?php
                 }
                ?>

                <!-- <div class="news-card">
                    <img src="images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolorsequi quod natus eveniet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div>

                <div class="news-card">
                    <img src="images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolor Ducimus hic sequi quod natus eveniet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div>

                <div class="news-card">
                    <img src="images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolor Ducimus hic sequi quod natus eveniet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div> -->


            </div>


        </section>


        <section id="groupes">



            <div class="section-title">
                <h1>Groupes & Mouvements</h1>
            </div>

            <div class="principaux">

                <div class="principame">
                    <h2>Jeunesse Catholique</h2>
                </div>

                <div class="principame">
                    <h2>Chorale</h2>
                </div>

                <div class="principame">
                    <h2>Légion de Marie</h2>
                </div>

                <div class="principame">
                    <h2>Servants d'Autel</h2>
                </div>

            </div>

        </section>

        <section id="organisation">

            <div class="section-title">
                <h1>Organisation</h1>
            </div>

            <div class="org-chart">

                <div class="org-box">
                    Curé
                </div>

                <div class="org-box">
                    Conseil Paroissial
                </div>

                <div class="org-box">
                    Commissions
                </div>

                <div class="org-box">
                    Groupes & Mouvements
                </div>

            </div>

        </section>








        <div class="thebigannounce">
            <div class="leftann">
                <h1>Notre Histoire</h1>

                <div class="blo"> <i class="fa-solid fa-right-long"></i>
                    <h2> Le Vicariat Apostolique de l'Archipel des Comores
                        est une présence catholique au cœur de l'océan Indien.
                    </h2>
                </div>
                <div class="blo"> <i class="fa-solid fa-right-long"></i>
                    <h2>Depuis plusieurs décennies,
                        l'Église accompagne les familles,
                        les jeunes et les communautés
                        dans leur développement spirituel
                        et humain. </h2>
                </div>

                <div class="blo"> <i class="fa-solid fa-right-long"></i>
                    <h2> fidèle a sa mission, elle continue d'annoncer l'Evangile avec Joie et esperance.</h2>
                </div>

                <button>Voir toutes Notre Histoire</button>

            </div>

            <div class="rightann">
                <img src="images/histmiss.jpeg" alt="">
            </div>
        </div>


        <div class="thebigaboutus">

            <div class="rightab">
                <img src="images/charities.jpeg" alt="">
            </div>



            <div class="leftab">

                <div class="ico">
                    <i class="fa-solid fa-arrow-down"></i>
                </div>

                <h1>À propos Vicariat de l'archipel des Comores</h1>

                <h3>Qui sommes nous? </h3>
                <p>Le Vicariat de l'Archipel des Comores est la structure ecclésiale chargée <br> de la mission
                    pastorale de l'Église catholique dans l'ensemble de l'archipel.
                </p>


                <button>Plus à propos de nous</button>

                <div class="clos"></div>
            </div>

        </div>











        <div class="formmap">

            <div class="formme">
                <form action="">
                    <label for="">FullName</label> <br>
                    <input type="text" name="" id="" placeholder="Enter Fullname" required><br> <br>

                    <label for="">Subject</label> <br>
                    <input type="text" name="" id="" placeholder="Enter Subject" required><br> <br>

                    <label for="">Email</label> <br>
                    <input type="email" name="" id="" placeholder="Enter Email" required><br> <br>

                    <label for="">Message</label><br>
                    <input type="text" name="" id="" placeholder="Enter Message" required style="height: 70px;"><br>

                    <button>Send Message</button>
                </form>

            </div>

            <div class="mapme">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d999446.5546290635!2d42.6318604416149!3d-11.898953328132857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1898e3036408a48d%3A0xf70a7fbee4dfd4db!2sComoros!5e0!3m2!1sen!2sus!4v1780931087695!5m2!1sen!2sus"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>

        </div>


        <div class="alinefooter">

            <div class="aliifoo">

                <img src="images/lologo.jpeg" alt="Logo">

                <p>
                    Vicariat Apostolique de l'Archipel des Comores
                </p>

                <div class="alinei">

                    <a href="#"><i class="fa-brands fa-facebook"></i></a>

                    <a href="#"><i class="fa-brands fa-instagram"></i></a>

                    <a href="#"><i class="fa-brands fa-youtube"></i></a>

                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>

                </div>

            </div>


            <div class="aliifoo">

                <h3>Liens Rapides</h3>

                <ul>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="aprops.html">À Propos</a></li>
                    <li><a href="parishes.html">Paroisses</a></li>
                    <li><a href="news.html">Actualités</a></li>
                    <li><a href="events.html">Événements</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>

            </div>


            <div class="aliifoo">

                <h3>Contact</h3>

                <p>
                    <i class="fa-solid fa-location-dot"></i>
                    Moroni, Union des Comores
                </p>

                <p>
                    <i class="fa-solid fa-phone"></i>
                    (+262) 269 61 11 53
                </p>

                <p>
                    <i class="fa-solid fa-envelope"></i>
                    mission-catholique@orange.fr
                </p>

            </div>

            <div class="aliifoo">

                <h3>Notre Mission</h3>

                <p>
                    Annoncer l'Évangile, servir les communautés
                    chrétiennes et promouvoir la foi, l'espérance
                    et la charité dans tout l'Archipel des Comores.
                </p>

                <a href="donation.html" class="footer-donate">
                    <i class="fa-solid fa-heart"></i>
                    Faire un Don
                </a>

            </div>

        </div>

        <footer>
            <p>© 2026 Vicariat des Comores</p>
        </footer>

    </div>







    <script>
        const buttons = document.querySelectorAll('.amount-btn');
        const hiddenAmount = document.getElementById('selectedAmount');
        const customAmount = document.getElementById('customAmount');

        buttons.forEach(btn => {

            btn.addEventListener('click', () => {

                hiddenAmount.value = btn.dataset.amount;

                // clear custom input
                customAmount.value = '';
            });

        });

        // If user types custom amount
        customAmount.addEventListener('input', () => {

            hiddenAmount.value = customAmount.value;

        });
    </script>

    <script>
  const toggle = document.querySelector('.menu-toggle');
  const menu = document.querySelector('.linksmenu ul');

  toggle.addEventListener('click', () => {
    menu.classList.toggle('show');
  });
</script>


</body>



</html>





<!-- what we add -->