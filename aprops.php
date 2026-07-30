<?php
include_once (__DIR__. '../includes/header.php');
?>
       


        <section class="contact-hero">

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


                <h1>Nos Aprops</h1>

                <p style="text-align: center; color: white;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum excepturi possimus ipsa esse quasi magnam repellendus, rem omnis ve
                </p>

            </div>

        </section>

        <style>
             .thebigannouncea {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            padding: 40px;
            background: #111827;
            color: white;
        }

        .leftanna {
            flex: 1;
        }

        .leftanna h1 {
            border-bottom: 2px solid #fff;
            margin-bottom: 20px;
        }

        .bloa {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .bloa i {
            margin-right: 10px;
            color: #d4af37;
        }

        .bloa p{
            color:white;
        }

        .leftanna button {
            padding: 12px 30px;
            background: #ffffff9e;
            color: #fff700;
            border: none;
            font-size: 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        .leftanna button:hover {
            background: #ffcc02;
            color: #fff;
        }

        .rightanna img {
            max-width: 100%;
            border-radius: 12px;
        }

        </style>



     <div class="thebigannouncea">
            <div class="leftanna">
                <h1>Notre Histoire</h1>
                <div class="bloa">
                    <p>Le Vicariat Apostolique de l'Archipel des Comores est une présence catholique au cœur de l'océan
                        Indien.</p>
                </div>
                <div class="bloa">
                    <p>Depuis plusieurs décennies, l'Église accompagne les familles, les jeunes et les communautés dans
                        leur développement spirituel et humain.</p>
                </div>
                <div class="bloa">
                    <p>Fidèle à sa mission, elle continue d'annoncer l'Évangile avec joie et espérance.</p>
                </div>
                <button>Voir toute notre histoire</button>
            </div>
            <div class="rightanna">
                <img src="images/church.jpeg" alt="Notre histoire">
            </div>

      </div>


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
        <img src="images/Apropos.jpeg" alt="">
      </div>



      <div class="leftab">

        <div class="ico">
          <i class="fa-solid fa-arrow-down"></i>
        </div>

        <h1>À propos Le Vicariat apostolique de l'archipel des Comores </h1>

        <h3>Qui sommes nous? </h3>
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


            </div>

        </div>

         </div>

        </div>




        
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



   
         <?php
include_once (__DIR__. '../includes/footer.php');
?>  




  </div>
</body>

</html>