<?php
include_once(__DIR__ . '/includes/header.php');

$headline_sql = "SELECT * FROM news WHERE parish_id IS NULL AND status='published' ORDER BY created_at DESC LIMIT 10";

$headline_result = mysqli_query($conn, $headline_sql);

?>

        <div class="newsh1">
            <h1>TITRES</h1>

        </div>

       <div class="marquee">

    <div class="marquee__wrapper">

        <?php while($headline = mysqli_fetch_assoc($headline_result)) { ?>

            <a href="news-details.php?id=<?= $headline['id'] ?>" class="news-link">

                <div class="marquee__text">

                    <img src="uploads/<?= $headline['image'] ?>" alt="<?= htmlspecialchars($headline['title']) ?>">

                    <div class="heme">

                        <h1>
                            <?= date('d M Y', strtotime($headline['created_at'])) ?>
                        </h1>

                        <h1>
                            <?= mb_strimwidth($headline['title'], 0, 80, '...') ?>
                        </h1>

                         <p>
                            <?= substr($headline['summary'], 0, 100 ) ?>...
                        </p>

                        

                    </div>

                </div>

            </a>

        <?php } ?>

    </div>

</div>


        <div class="themain">
            <h3>Bienvenue au Vicariat Apostolique de l'archipel des Comores</h3>

            <h1>Aimer Dieu, servir les <br> autres et annoncer l'évangile.</h1>

            <div class="cla"></div>

            <p>Le Vicariat Apostolique de l'Archipel des Comores est une communauté catholique <br> engagée dans l'annonce de
                l'Évangile, le service de la charité et la promotion des valeurs chrétiennes. <br> À travers nos
                paroisses, nos programmes pastoraux et nos actions sociales,
                nous accompagnons <br> les fidèles dans leur cheminement spirituel et contribuons au développement
                harmonieux de la société.
            </p>


            <button>En savoir plus</button>
            <button style="background-color: rgb(22, 150, 22);">Faire Un Don <i class="fa-solid fa-heart"></i></button>
        </div>

        <?php
        
$sql = "SELECT * FROM news WHERE parish_id IS NULL AND status='published' ORDER BY created_at DESC LIMIT 8";

$result = mysqli_query($conn, $sql);

?>



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



            <?php
            

$event_sql = "SELECT * FROM events WHERE parish_id IS NULL AND status='published'  ORDER BY created_at DESC LIMIT 4";

$event_result = mysqli_query($conn, $event_sql);

            ?>



            <section class="events-page">

             <div class="newsh1">
                <h1 style="width: 30%;">ÉVÉNEMENTS A VENIR</h1>

            </div>
            <div class="events-grid">
            <?php while($rows = mysqli_fetch_assoc($event_result)) { ?>
                <!-- EVENT 1 -->

                <div class="event-card">
                    

    


                    <div class="event-image">

                        <img src="uploads/<?= $rows['image'] ?>" alt="">

                        <span class="event-date">
                             
                          <?= $rows['event_date'] ?>
                        </span>

                    </div>

                    <div class="event-content">

                        <h4> <?= substr($rows['title'], 0, 80) ?></h4>

                        <p>
                           <?= substr($rows['description'], 0, 180) ?>
                        </p>

                        <p><b>Location:</b><?= $rows['location'] ?></p>

                        <a href="events-details.php?id=<?= $rows['id'] ?>" class="event-btn" style="color:white; ">
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

        <!-- Bishop's profile
Organization structure -->




        <!-- <div class="thebigmain">
            <h1>
                Mission <span>|</span> Vision <span>|</span> Valeurs <span>|</span> Motto
            </h1>

            <div class="flexmvm">
                <div class="mvm">
                    <i class="fa-regular fa-flag"></i>
                    <h2>Notre Mission</h2>
                    <p>Annoncer l’Évangile, célébrer les sacrements,
                        servir les pauvres, accompagner les communautés, promouvoir la paix, la justice, la fraternité
                        et l’espérance.</p>
                </div>

                <div class="mvm">
                    <i class="fa-regular fa-lightbulb"></i>
                    <h2>Notre Vision</h2>
                    <p>Construire une communauté chrétienne vivante, fraternelle et missionnaire au service de tous.</p>
                </div>

                <div class="mvm">
                    <i class="fa-solid fa-arrows-rotate"></i>
                    <h2>Nos Valeurs</h2>
                    <p> Foi, Espérance, Charité, Solidarité, Respect de la dignité humaine</p>
                </div>

                <div class="mvm">
                    <i class="fa-solid fa-hand-fist"></i>
                    <h2>Motto</h2>
                    <p>Aimer Dieu, servir les autres et annoncer l'évangile.</p>
                </div>


            </div>


        </div>
 -->





        <div class="padilprof">

            <div class="leftpadii">
                <img src="images/pastro.jpeg" alt="">
            </div>

            <div class="rightpadii">
                <h2>MESSAGE DE L'ÉVEQUE</h2>

                <div class="bishop-message">

                    <p>
                        <strong>Message de l'Évêque du Vicariat Apostolique de l’Archipel des Comores</strong><br><br>

                        Chers frères et sœurs en Christ,<br><br>

                        Que la paix et la grâce de notre Seigneur Jésus-Christ soient avec vous tous.<br><br>

                        En cette période particulière de notre vie ecclésiale et nationale, je souhaite adresser à
                        chacun de
                        vous un message d’espérance, d’unité et de confiance en Dieu. Malgré les défis auxquels nous
                        faisons face
                        dans nos familles, nos communautés et notre société, nous sommes appelés à demeurer fermes dans
                        la foi et à
                        témoigner de l’amour du Christ autour de nous.

                        <span id="moreText">
                            <br><br>

                            L’Évangile nous rappelle que nous sommes tous frères et sœurs, appelés à vivre dans le
                            respect
                            mutuel, la solidarité et la réconciliation. Dans un monde marqué par les divisions, les
                            difficultés
                            économiques et les incertitudes, notre mission est d’être des artisans de paix, des témoins
                            de la
                            vérité et des serviteurs des plus vulnérables.

                            <br><br>

                            J’encourage toutes les familles à persévérer dans la prière, à transmettre les valeurs
                            chrétiennes
                            aux jeunes générations et à cultiver l’esprit de partage. J’invite également les jeunes à
                            garder
                            confiance en leur avenir, à développer leurs talents et à contribuer activement au
                            développement de
                            notre pays dans un esprit de responsabilité et de fraternité.

                            <br><br>

                            Je remercie les prêtres, les religieux, les religieuses, les catéchistes et tous les fidèles
                            engagés
                            dans la mission de l’Église pour leur dévouement et leur témoignage de foi.

                            <br><br>

                            Confions notre Vicariat Apostolique, notre nation et toutes nos familles à l’intercession de
                            la
                            Bienheureuse Vierge Marie.

                            <br><br>

                            Que Dieu bénisse abondamment l’Archipel des Comores et chacun de ses habitants.
                        </span>
                    </p>

                    <button id="readBtn" onclick="toggleText()">En savoir plus</button>

                </div>


                <h6>+ Son Excellence Monseigneur Charles Mahuza Yava, S.D.S.</h6>

                <pre>Vicaire Apostolique de l’Archipel des Comores</pre>
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

                <h1>À propos Le Vicariat apostolique de l'archipel des Comores </h1>

                <h3>Qui sommes nous? </h3>
                <!-- <p>Le Vicariat de l'Archipel des Comores est la structure ecclésiale chargée <br> de la mission
                    pastorale de l'Église catholique dans l'ensemble de l'archipel. -->
                   <p> Le vicariat apostolique, en latin Apostolicus Vicariatus Insularum Comorensium, est une Église particulière de l'Église catholique. 
                    Il a été initialement créé comme préfecture apostolique en 1848 pour Mayotte, 
                    Sainte-Marie et Nossi-Bé, puis étendu aux îles de Grande Comore, Anjouan et Mohéli en 1851. En 1951, le pape Pie XII a élevé la préfecture apostolique au rang de vicariat apostolique 
                    Le vicariat est exempt, c’est-à-dire directement soumis au Saint-Siège et non intégré à une province ecclésiastique.
                </p>


                <button>Plus à propos de nous</button>

                <div class="clos"></div>
            </div>

        </div>


        <div class="blackmail">

            <div class="wasri">


                <div class="stats1">
                    <div class="stat">
                        <h1 class="redwings">+</h1>
                        <h2 class="counter" data-target="4">0</h2>
                        <p style="text-align:center;">Îles</p>
                    </div>

                    <div class="stat">
                        <h1 class="redwings">+</h1>
                        <h2 class="counter" data-target="8">0</h2>
                        <p style="text-align:center;">Paroisses</p>
                    </div>

                    <div class="stat">
                        <h1 class="redwings">+</h1>
                        <h2 class="counter" data-target="100">0</h2>
                        <p style="text-align:center;">Plusieurs communautés</p>
                    </div>

                    <div class="stat">
                        <h1 class="redwings">+</h1>
                        <h2 class="counter" data-target="1000">0</h2>
                        <p style="text-align:center;">Des milliers de fidèles</p>
                    </div>


                </div>





                
<?php

$sqly = "SELECT * FROM parishes ORDER BY created_at DESC";
$resulty = mysqli_query($conn, $sqly);

?>
 

        <div class="cont">

          

            <div class="hblo">
                    <h1>Paroisses</h1>
                </div>

            <div class="statss">

            
                

                 <?php while($rowy = mysqli_fetch_assoc($resulty)) { ?>
                <div class="stats">
                    <a href="#"><img src="uploads/<?= $rowy['image'] ?>" width="200px"></a>
                    <div class="did">
                        <h2> <?= $rowy['name'] ?></h2>
                        <p> <?= $rowy['location'] ?></p>
                        <p><?= $rowy['phone'] ?> | <?= $rowy['email'] ?></p>
                        <p>Horaires de Messe </p>

                        <a href="cathederal.php?id=<?= $rowy['id'] ?>">  Voir les détails</a>

                    </div>
                </div>

                 <?php
               }
               ?>

               </div>

             </div>


      






         <!-- <div class="thebigmember">
            <div class="gamestar">
                <h2>Adhésion</h2>
                <div class="bby"></div>
                <h1>Pourquoi rejoindre Vicariat de l'archipel des Comores?</h1>
                <p>En devenant membre, vous rejoignez un réseau solide de personnes aidantes et engagées pour un
                    changement
                    positif en France.</p>
                <p>Offres d'adhésion:</p>

                <h3><i class="fa-solid fa-check"></i> Depuis plusieurs décennies.</h3>
                <h3><i class="fa-solid fa-check"></i> Le Vicariat Apostolique de l'Archipel des Comores</h3>
                <h3><i class="fa-solid fa-check"></i> Découvrez les communautés catholiques de l'archipel.</h3>
                <h3><i class="fa-solid fa-check"></i> les jeunes et les communautés
                    dans leur développement spirituel</h3>

                <h4><span>Membership Categories:</span> Catéchèse, Jeunesse, Liturgie, Famille, au Éducation.</h4>

                <button>Postuler pour l'adhésion</button>
            </div>
         </div> -->



         <!-- <div class="clever">

            <div class="cleverpart">
                <i class="fa-regular fa-users-rectangle"></i>
                <div class="clebro">
                    <h4>COMMUNAUTE</h4>
                    <p>Ensemble dans la foi et la fraternité.</p>

                </div>
            </div>

            <div class="cleverpart">
                <i class="fa-solid fa-church"></i>
                <div class="clebro">
                    <h4>PRIERE</h4>
                    <p>Ensemble dans la foi et la fraternité.</p>

                </div>
            </div>

            <div class="cleverpart">
                <i class="fa-solid fa-check"></i>
                <div class="clebro">
                    <h4>SOLIDARITE</h4>
                    <p>Ensemble dans la foi et la fraternité.</p>

                </div>
            </div>

            <div class="cleverpart">
                <i class="fa-solid fa-eye"></i>
                <div class="clebro">
                    <h4>FORMATION</h4>
                    <p>Ensemble dans la foi et la fraternité.</p>

                </div>
            </div>

            <div class="cleverpart">
                <i class="fa-solid fa-book-bible"></i>

                <div class="clebro">
                    <h4>MISSION</h4>
                    <p>Ensemble dans la foi et la fraternité.</p>

                </div>
            </div>

         </div> -->

                <!-- <div class="hblo">
                    <h1>Team</h1>
                </div> -->
<!-- 

                <div class="tteam">
                    <div class="teamme">
                        <img src="images/padili.jpeg" alt="">
                        <h2>Charles Mahuza Yava</h2>
                        <h3>Vicaire Apostilique</h3>
                        <p>Nous Sommes appelès a ètre une Église vivante fraternelleet missionnaire, au service </p>
                    </div>

                    <div class="teamme">
                        <img src="images/padili.jpeg" alt="">
                        <h2>Jean Claude Mij Riy</h2>
                        <h3>Secretary-Chancellor</h3>
                        <p>Nous Sommes appelès a ètre une Église vivante fraternelleet missionnaire, au service </p>
                    </div>


                    <div class="teamme">
                        <img src="images/padili.jpeg" alt="">
                        <h2>Sainte-Thérèse</h2>
                        <h3>Vicaire Apostilique</h3>
                        <p>Nous Sommes appelès a ètre une Église vivante fraternelleet missionnaire, au service </p>
                    </div>

                    <div class="teamme">
                        <img src="images/padili.jpeg" alt="">
                        <h2>Sainte-Thérèse</h2>
                        <h3>Vicaire Apostilique</h3>
                        <p>Nous Sommes appelès a ètre une Église vivante fraternelleet missionnaire, au service </p>
                    </div>
                </div> -->


                <!-- --------------This is Official original team -->
<!-- 

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


         </section> -->



                <!-- <div class="hblo">
                    <h1>LES GRANDES ETAPES</h1>
                </div> -->


                <!-- <div class="blackme">
                            
                        </div> -->
                <!-- for blackme I want to put line middle centwer of iiiiiii -->

                <div class="etapes">
                    <div class="fleetape">
                        <div class="eapesme">
                            <i class="fa-solid fa-users"></i>

                            <h2>1975</h2>
                            <p>Création</p>

                        </div>

                        <i class="fa-solid fa-arrow-right-long"
                             style="color:  rgb(246, 255, 0); font-size: 44px; margin-top: 30px;"></i>

                        <div class="eapesme">
                            <i class="fa-solid fa-church"></i>
                            <h2>1990</h2>
                            <p>Développement pastoral</p>
                        </div>

                        <i class="fa-solid fa-arrow-right-long"
                             style="color:  rgb(246, 255, 0); font-size: 44px; margin-top: 30px;"></i>
                        <div class="eapesme">
                            <i class="fa-solid fa-cross"></i>
                            <h2>2010</h2>
                            <p>Expansion des activités sociales</p>
                        </div>

                        <i class="fa-solid fa-arrow-right-long"
                             style="color:  rgb(246, 255, 0); font-size: 44px; margin-top: 30px;"></i>

                        <div class="eapesme">

                            <i class="fa-solid fa-book-bible"></i>
                            <h2>2025</h2>
                            <p>Modernisation numérique</p>
                        </div>
                    </div>
                </div>

                <div class="hblo">
                    <h1 id="nosio">NOS PRINCIPAUX DOMAINES D'ENGANGEMENT</h1>
                </div>

                <div class="principaux">

                    <div class="fleprincipaux">
                        <div class="principame">
                            <i class="fa-solid fa-people-group"></i>

                            <h2>Catéchèse</h2>
                            <p>Formation chrétienne pour enfants et adultes.</p>

                        </div>

                        <div class="principame">
                            <i class="fa-solid fa-people-roof"></i>

                            <h2>Famille</h2>
                            <p>Accompagnement des couples et familles.</p>

                        </div>

                        <div class="principame">
                            <i class="fa-solid fa-hands-holding-child"></i>

                            <h2>Jeunesse</h2>
                            <p>Activités pour les jeunes catholiques.</p>

                        </div>

                        <div class="principame">
                            <i class="fa-solid fa-hand-holding-heart"></i>

                            <h2>Caritas</h2>
                            <p>Aide aux personnes vulnérables.</p>

                        </div>

                        <div class="principame">
                            <i class="fa-brands fa-fort-awesome"></i>

                            <h2>Liturgie</h2>
                            <p>Organisation des célébrations.</p>

                        </div>

                        <div class="principame">
                            <i class="fa-solid fa-book-open-reader"></i>

                            <h2> Éducation</h2>
                            <p>Soutien scolaire et formation.</p>

                        </div>
                    </div>


                </div>


            

        

        <?php

        
$prog_sql = "SELECT * FROM programs
        WHERE status='active'
        ORDER BY created_at DESC LIMIT 4";

$prog_result = mysqli_query($conn,$prog_sql);

        ?>


        <div class="prog">
            <div class="leftpro">
                <div class="skipper">
                    <h1>Nos Programmes & Services</h1>

                    <h3 style="text-align:left;"> Découvrez les différents programmes pastoraux,
                éducatifs et sociaux du Vicariat Apostolique
                de l'Archipel des Comores.
                   </h3>

                    <button>Découvrir nos missions</button>


                </div>

            </div>

             <div class="rightpro">

        <div class="program-grid">

            <?php while($rowpro = mysqli_fetch_assoc($prog_result)){ ?>

            <div class="program-card">

                <div class="icon-box">
                    <i class="fa-solid fa-check"></i>
                </div>

                <span class="category">
                    <?= $rowpro['category']; ?>
                </span>

                <h2>
                    <?= $rowpro['title']; ?>
                </h2>

                <p>
                    <?= substr($rowpro['short_description'],0,120); ?>...
                </p>

                <a href="program-details.php?id=<?= $rowpro['id']; ?>">
                    Lire Plus →
                </a>

            </div>

            <?php } ?>

        </div>

</div>
</div>


        <div class="alliancegarelly">
            <!-- <h1>Gallery</h1> -->

            <div class="alliaimage">
                <img src="images/catr.jpeg" alt="">
            </div>

            <!-- <div class="alliavideo">
                <video src="videos/mayotte.mp4" autoplay></video>
            </div> -->

            <div class="alliavideo">
             <video src="videos/mayotte.mp4" autoplay controls>
               Your browser does not support the video tag.
             </video>
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

            <!-- <div class="aliifoo">
                <h1>PAROISSES</h1>

                <h4>Notre-Dame de Fatima </h4>
                <h4>Sainte-Thérèse de l'Enfant-Jésus (Moroni)</h4>
                <h4>Mission Catholique de Mamoudzou (Mayotte)</h4>
                <h4>Saint-Michel</h4>
                <h4>Notre-Dame de Fatima</h4>

            </div> -->

        </div>







        <footer>
            <p>© 2026 Vicariat des Comores</p>
        </footer>





    </div>
</body>



<script>

    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
        counter.innerText = '0';

        const updateCounter = () => {
            const target = +counter.getAttribute('data-target');
            const current = +counter.innerText;

            const increment = target / 100;

            if (current < target) {
                counter.innerText = Math.ceil(current + increment);
                setTimeout(updateCounter, 20);
            } else {
                counter.innerText = target;
            }
        };

        updateCounter();
    });

</script>

<script>

    const counter = document.querySelectorAll('.counter');

    const startCounter = (counter) => {
        counter.innerText = "0";

        const update = () => {
            const target = +counter.getAttribute("data-target");
            const current = +counter.innerText;

            const step = target / 80;

            if (current < target) {
                counter.innerText = Math.ceil(current + step);
                setTimeout(update, 25);
            } else {
                counter.innerText = target;
            }
        };

        update();
    };

</script>
<script>
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                startCounter(entry.target);
            }
        });
    }, { threshold: 0.6 });

    counters.forEach(counter => observer.observe(counter));





</script>

<script>
    function toggleText() {
        let moreText = document.getElementById("moreText");
        let btn = document.getElementById("readBtn");

        if (moreText.style.display === "inline") {
            moreText.style.display = "none";
            btn.innerHTML = "Lire Plus";
        } else {
            moreText.style.display = "inline";
            btn.innerHTML = "Lire Moins";
        }
    }
</script>

</html>