<div class="database">
    <pre>
        vicariat_comores_db


        USERS(Admin login)

        CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin', 'editor') DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


NEWS (Actualites)


CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    image VARCHAR(255),
    author VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);





EVENTS (Événements)

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    event_date DATE,
    location VARCHAR(255),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


PARISHES (Paroisses)


CREATE TABLE parishes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    island VARCHAR(100),
    phone VARCHAR(50),
    address TEXT,
    image VARCHAR(255),
    description TEXT
);



programs


CREATE TABLE programs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    event_date VARCHAR(100),
    icon VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


Membership

CREATE TABLE members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(50),
    parish VARCHAR(255),
    role VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




CONTACT MESSAGES


CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




GALLERY 


CREATE TABLE gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    media_type ENUM('image', 'video'),
    file_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 

== 

CREATE TABLE gallery(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    category VARCHAR(100),
    media_type ENUM('photo','video'),
    media_file VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    image_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    youtube_url TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    file_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE publications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    image_path VARCHAR(255),
    link VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);










Donation Table 

CREATE TABLE donations(
    id INT AUTO_INCREMENT PRIMARY KEY,
    donor_name VARCHAR(100),
    email VARCHAR(150),
    amount DECIMAL(10,2),
    payment_method VARCHAR(50),
    transaction_id VARCHAR(100),
    message TEXT,
    status ENUM('Pending','Confirmed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);





media
-----
id
title
file_name
media_type
category
description
upload_date





Admin
│
├── Dashboard
├── News
├── Events
├── Parishes
├── Donations
├── Media Center
├── Messages
├── Users
└── Settings



messages
--------
id
name
email
subject
message
date_sent
status





programs
--------
id
title
image
description
content
date_created
status






    </pre>



    <section>
        PUBLIC
        ------
        news-details.html
        events.html
        event-details.html
        contact.html
        search.html
        404.html

        ADMIN
        ------


        users.html
        messages.html
        settings.html
    </section>




    <div class="tables">
        users
        news
        events
        parishes
        gallery
        donations
        messages
        settings
    </div>

    <div class="settingstables">
        settings
---------
id
site_name
site_description
logo
email
phone
address
facebook
youtube
instagram
whatsapp
hero_title
hero_subtitle
hero_image
    </div>



</div>


<section>
    index.html
aprops.html
programs.html
news.html
news-details.html
events.html
event-details.html
gallery.html
parishes.html
parishpage.html
donation.html
contact.html
search.html
404.html
login.html





dashboard.html
news CRUD
events CRUD
parish CRUD
gallery.html
donation.html
mediacenter.html
messages.html
settings.html
users.html
</section>







<!-- programs examples -->

Pastoral Program
Youth Ministry
Catholic Education
Caritas & Charity
Family Ministry
Vocations
Health Ministry












<div class="section">

<h2>Prayer Schedule</h2>

<div class="prayer-grid">

<?php while($row = mysqli_fetch_assoc($prayers)) { ?>

<div class="prayer-card">

    <h3><?= $row['title'] ?></h3>

    <p>
        📅 <?= $row['prayer_day'] ?>
    </p>

    <p>
        🕒 <?= $row['prayer_time'] ?>
    </p>

    <p>
        <?= $row['description'] ?>
    </p>

</div>

<?php } ?>

</div>

</div>







 

<div class="parish-hero">

    

    <div class="hero-content">
        <h1></h1>

        <p><b>Priest:</b> <?= $parish['priest'] ?></p>
        <p><b>Location:</p>
        <p><b>Contact:</b> <?= $parish['phone'] ?> | <?= $parish['email'] ?></p>

    </div>

</div>





<div class="section">

<h2>About Parish</h2>

<p><?= $parish['description'] ?></p>

</div>



<div class="section">

<h2>Mass Schedule</h2>

<p><?= nl2br($parish['mass_schedule']) ?></p>

</div>





<section class="programs-page">

    <div class="programs-grid">

   

        <div class="program-card">

            <img src="uploads/<?= $row['image']; ?>" alt="">

            <div class="program-content">

                <span class="category">
                    <?= 'category' ?>
                </span>

                <h3>
                    <?= 'title' ?>
                </h3>

                <p>
                    <?= substr('short_description',0,120); ?>...
                </p>

                <a href="program-details.php?id=<?= 'id'; ?>">
                    En savoir plus
                </a>

            </div>

        </div>


    

    </div>

</section>















<section class="gallery-filter">

    <button class="active">Toutes</button>

    <button>Événements</button>

    <button>Paroisses</button>

    <button>Jeunesse</button>

    <button>Évêque</button>

</section>


<section class="gallery-grid">

    <div class="gallery-card">

        <img src="images/miss.jpeg">

        <div class="gallery-overlay">

            <h3>Retraite des Jeunes</h3>

            <span>Jeunesse</span>

        </div>

    </div>

    <div class="gallery-card">

        <img src="images/church.jpeg">

        <div class="gallery-overlay">

            <h3>Messe Dominicale</h3>

            <span>Paroisses</span>

        </div>

    </div>

    <div class="gallery-card">

        <img src="images/bishop.jpeg">

        <div class="gallery-overlay">

            <h3>Visite Pastorale</h3>

            <span>Évêque</span>

        </div>

    </div>

     </section>
















     
Vie de la paroisse



<section class="parish-life">

    <h1>Vie de la Paroisse</h1>

    <div class="life-grid">

        <div class="life-card">
            <i class="fa-solid fa-church"></i>
            <h3>Messes</h3>
            <p>Horaires des célébrations.</p>
        </div>

        <div class="life-card">
            <i class="fa-solid fa-child"></i>
            <h3>Catéchèse</h3>
            <p>Formation chrétienne.</p>
        </div>

        <div class="life-card">
            <i class="fa-solid fa-ring"></i>
            <h3>Mariages</h3>
            <p>Préparation et accompagnement.</p>
        </div>

    </div>

</section>



Conseil Paroissial(Team)

Curé
Vicaire
Secrétaire
Trésorier
Conseillers



Commissions

Liturgie
Caritas
Jeunesse
Communication
Catéchèse
Famille




Groupe et Mouvements

Chorale
Légion de Marie
Scouts
Jeunesse Catholique
Mouvement Eucharistique
Servants d'Autel

















































<section id="messes">

    <div class="hblo">
        <h1>Horaires des Messes</h1>
    </div>

    <div class="mass-table">

        <?php while($row=mysqli_fetch_assoc($prayers)){ ?>

        <div class="mass-row">

            <span>
                <?= $row['prayer_day'] ?>
            </span>

            <span>
                <?= $row['prayer_time'] ?>
            </span>

        </div>

        <?php } ?>

    </div>

</section>




<section id="actualites">

    <div class="hblo">
        <h1>Actualités de la Paroisse</h1>
    </div>

    <div class="news-grid">

        <!-- parish news -->

    </div>

</section>



<section id="events">

    <div class="hblo">
        <h1>Événements à Venir</h1>
    </div>

    <div class="news-grid">

        <!-- parish events -->

    </div>

</section>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/workreuse.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Vicariat de l'archipel des Comores</title>
</head>

<body>
    <div class="container">

        <!-- <div class="menu">
            <div class="menunav">

                <nav>
                    <img src="images/lologo.jpeg" alt="">
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="aprops.php">A propos</a></li>
                        <li><a href="programs.php">Programmes</a></li>
                        <li>
                            <div class="dropdown">

                                <a href="parishes.php">
                                    Paroisses <i class="fa fa-caret-down"></i>
                                </a>

                                <div class="dropdown-content">

                                    <a href="#">St Therese </a>
                                    <a href="#">St Therese </a>
                                    <a href="#">St Therese </a>

                                </div>

                            </div>
                        </li>
                        <li><a href="news.php">Actualites</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="garellyUI.php">Galerie</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="donation.php"><i class="fa-solid fa-heart"></i> Faire Un Don</a></li>
                        <li><a href="login.html"><i class="fa-solid fa-user"></i> Connexion</a></li>
                    </ul>
                </nav>
            </div>
        </div> -->



        <div class="topparish">

            <div class="iconscontact">
                <i class="fa-brands fa-square-facebook"></i> <i class="fa-brands fa-youtube"></i> <i
                    class="fa-brands fa-instagram"></i>
                <i class="fa-regular fa-envelope"></i> <button>Nous Contact <i class="fa-solid fa-phone"></i></button>
            </div>
            <!-- <div class="parisleft">
                <div><i class="fa-solid fa-cross"></i></div>


                <div class="pname">
                    <h2>Cathedrale Sainte Therese</h2>
                    <h5>Vicariat des Comores</h5>
                </div>
            </div> -->

            <div class="linksmenu">
                <ul>
                    <li><a href="#accueil">Accueil</a></li>
                    <li><a href="#vie">Vie de la Paroisse</a></li>
                    <li><a href="#conseil">Conseil</a></li>
                    <li><a href="#commissions">Commissions</a></li>
                    <li><a href="#groupes">Groupes</a></li>
                    <li><a href="#organisation">Organisation</a></li>
                    <li><a href="#actualites">Actualites</a></li>
                    <li><a href="#">Histoire</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <div class="bienvenue">
                <h2 style="font-family: Segoe Script; color:rgb(5, 127, 184); padding:0; font-size: 45px;">Bienvenue a
                </h2>

                <h1>Cathedrale Sainte-Therese</h1>

                <!-- <h4>Paroisse du Vicariat Apostolique de l'archipel des Comores</h4>

                <h5>Une Communate vivante, unie dans la foi, l'amour et le service du Christ.</h5> -->

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

        <div class="contract">

        <div class="stateof">
            <h1>Paroisses</h1>

            <div class="atlanta">
                <a href="#"> <img src="/images/cath.jpeg" width="200px"></a>
                <div class="dearmom">

                    <h2>Sainte Therese des Comores</h2>

                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo sit repellat incidunt nam!
                        Eius hic consequatur debitis enim perferendis illum do Lorem ipsum dolor sit amet consectetur,
                        adipisicing elit. Facili
                        s animi iure repudiandae minima rerum ullam exercitationem nobis
                        quia. Nisi officiis beatae illum magnam necessitatibus distinctio, possimus soluta nobis? Quia,
                        deserunt!
                        loremque veritatis rerum eos, sunt assumenda nemo commodi vero. Eveniet.</p>

                    <p>Comores Mayotte Sh 112 41A</p>

                    <p>Pope Jean Claude</p>

                    <p>+ 232433 9993 22</p>

                    <p>vicariatApostolique@gmail.com</p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit blanditiis illum, quibusdam odio
                        rati
                        one atque, enim corporis quis optio quo Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Asperiores
                        , libero architecto? Veniam, possimus natus. Eius placeat, possimus natus, nulla nobis ab
                        necessitatibus
                        ex quo doloremque dolorum et, culpa consectetur deserunt.
                        et amet molestias, illo voluptatibus animi saepe distinctio dolorum. Incidunt.</p>



                    <div class="messe">
                        <h3>Horaires de Messe</h3>



                        <div class="messflex">

                            <div class="messeflex">
                                <p>Monday</p>
                                <p>Tuesday</p>
                                <p>Wednesday</p>
                                <p>Thursday</p>
                                <p>Friday</p>
                                <p>Thursday</p>
                                <p>Friday</p>
                                
                            </div>

                            <div class="messeflex">
                                <p>12:00 AM (English)</p>
                                <p>02:00 PM (English)</p>
                                <p>19:00 AM (French)</p>
                                <p>11:00 PM (English)</p>
                                <p>10:00 AM(French)</p>
                                <p>11:00 PM (English)</p>
                                <p>10:00 AM(French)</p>
                               
                            </div>

                        </div>




                    </div>

                    <!-- <a href="#">Voir les détails</a> -->

                </div>

            </div>
        </div>
    </div>







        <section id="events">
            <div class="section-title">
                <h1>News Actualites</h1>
            </div>
            <div class="news-grid">
                <div class="news-card">
                    <img src="/images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem i hic sequi quod natus eveniet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div>

                <div class="news-card">
                    <img src="/images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolor, sit amet c i quod natus eveniet tenetur atque
                            molestias! Quibusdam Lorem...

                        </span>
                    </div>
                </div>

                <div class="news-card">
                    <img src="/images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolor, sit amet cons niet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div>

                <div class="news-card">
                    <img src="/images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolor, sit am tus eveniet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div>


            </div>


        </section>


        <section id="events">
            <div class="section-title">
                <h1>News Actualites</h1>
            </div>
            <div class="news-grid">
                <div class="news-card">
                    <img src="/images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolor equi quod natus eveniet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div>

                <div class="news-card">
                    <img src="/images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolorsequi quod natus eveniet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div>

                <div class="news-card">
                    <img src="/images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolor Ducimus hic sequi quod natus eveniet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div>

                <div class="news-card">
                    <img src="/images/apostols.jpeg" alt="">
                    <div class="news-content">
                        <h3>We are together as One</h3>
                        <span>
                            Lorem ipsum dolor Ducimus hic sequi quod natus eveniet tenetur atque
                            molestias! Quibusdam Lorem...
                        </span>
                    </div>
                </div>


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



</html>





<!-- what we add -->





 <!-- <div class="menu">
            <div class="menunav">

                <nav>
                    <img src="images/lologo.jpeg" alt="">
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="aprops.php">A propos</a></li>
                        <li><a href="programs.php">Programmes</a></li>
                        <li>
                            <div class="dropdown">

                                <a href="parishes.php">
                                    Paroisses <i class="fa fa-caret-down"></i>
                                </a>

                                <div class="dropdown-content">

                                    <a href="#">St Therese </a>
                                    <a href="#">St Therese </a>
                                    <a href="#">St Therese </a>

                                </div>

                            </div>
                        </li>
                        <li><a href="news.php">Actualites</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="garellyUI.php">Galerie</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="donation.php"><i class="fa-solid fa-heart"></i> Faire Un Don</a></li>
                        <li><a href="login.html"><i class="fa-solid fa-user"></i> Connexion</a></li>
                    </ul>
                </nav>
            </div>
        </div> -->


          <!-- <h4>Paroisse du Vicariat Apostolique de l'archipel des Comores</h4>

                <h5>Une Communate vivante, unie dans la foi, l'amour et le service du Christ.</h5> -->



                /* 

.parisleft {
    width: 30%;
    height: 120px;
    margin: 5px;
    padding: 5px;
    top: 0;
    display: flex;
    margin-top: -50px;
    gap: 10px;
}

.parisleft div i {
    width: 100%;
    height: 100px;
    margin: 5px;
    padding: 5px;
    font-size: 80px;
    color: #ffff;
}

.parisleft .pname {
    margin: 5px;
    padding: 5px;
}

.pname h2 {
    color: #ffff;
    font-size: 30px;
}

.pname h5 {
    color: #155dfa;
    font-size: 20px;
    font-weight: 400;
} */


/* 
.topparish::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.4);
}

.bienvenue {
    position: relative;
    z-index: 1;
} */



<style>

    
.topbar {
    width: 100%;
    height: 50px;
    background-color: rgb(71, 71, 153);
    border-radius: 15px 15px 0 0;


}

.topbar h2 {
    color: white;
    margin: 5px;
    padding: 12px;
    text-align: center;
    text-transform: uppercase;

}

.menu {
    width: 100%;
    height: 120px;
    background-color: white;
    margin: auto;
    position: sticky;
    top: 0;
    z-index: 1000;
    border-bottom: 2px solid #111827;
}

.menunav {
    width: 100%;
    height: 120px;
    padding: 10px;
    margin: auto;
}

nav {
    display: flex;
}

nav img {
    width: 100px;
    height: 100px;
    margin-left: 100px;
}

nav ul {
    display: flex;
    list-style: none;
    padding: 20px;
    padding-left: 100px;
}

nav ul li {
    padding: 10px;
    margin-top: 10px;
}

nav ul li a {
    text-decoration: none;
    color: black;
    font-size: 20px;
}


nav ul li a:hover {
    color: rgb(2, 2, 227);
}




.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown .dropbtn {
    font-size: 20px;
    border: none;
    outline: none;
    color: black;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.navbar a:hover,
.dropdown:hover .dropbtn {
    color: rgb(2, 2, 227);

}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 200px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown:hover .dropdown-content {
    display: block;
}

/* SUB DROPDOWN */
.subdropdown {
    position: relative;
}

.subdropdown-content {
    display: none;
    position: absolute;
    left: 100%;
    top: 0;
    background-color: white;
    min-width: 180px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
}

.subdropdown-content a {
    padding: 12px 16px;
    display: block;
    text-decoration: none;
}

.subdropdown:hover .subdropdown-content {
    display: block;
}

/* hover effect */
.dropdown-content a:hover,
.subdropdown-content a:hover {
    background-color: #f1f1f1;
}



















/* 
.linksmenu {
    width: 78%;
    height: 50px;
    margin: 5px;
    padding: 5px;
    justify-self: center;
    border-radius: 6px;
    background-color: #010d21a4;
    position: fixed;
    top: 10;
    z-index: 100;
}





.linksmenu ul {
    display: flex;
    gap: 20px;
    list-style: none;
    margin-top: 7px;
    padding-left: 40px;
    position: sticky;

}

.linksmenu ul li a {
    text-decoration: none;
    color: #ffffff;
    padding: 10px;
    font-size: 18px;

}

.linksmenu ul li a:hover {
    border-bottom: 2px solid #ffffff;
}
 */


/* 
.bienvenue h4 {
    color: rgb(0, 54, 85);
    font-size: 32px;
    font-weight: 400;
    background-color: #ffffff87;


}

.bienvenue h5 {
    background: #33333394;
    color: #c6f4cf;
    font-size: 25px;
    font-weight: 300;
    padding: 20px;
    margin: 5px;


} */















.linksmenu {
  background-color: var(--accent);
}

.linksmenu ul li a {
  color: var(--white);
}

.iconscontact i {
  color: var(--accent);
}

.hero-buttons a:first-child {
  background: var(--accent);
  color: var(--primary);
}

.hero-buttons a:last-child {
  background: var(--primary);
  color: var(--white);
}

</style>