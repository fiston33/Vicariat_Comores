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

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/staycooler.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Vicariat de l'archipel des Comores</title>
</head>

<body>
    <div class="container">

    <div class="topbar">

    <h2>vicariat_comores</h2>
    </div>

        <div class="menu">
            <div class="menunav">

                <nav>
                    <img src="images/lologo.jpeg" alt="">
                     <div class="menu-toggle">
                     <i class="fa-solid fa-bars-staggered menu-toggle"></i>
                    </div>
                
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

            <?php
            $parishes = mysqli_query($conn, "SELECT * FROM parishe ORDER BY name ASC");

            while($p = mysqli_fetch_assoc($parishes)) {
            ?>

                <a href="cathederal.php?id=<?= $p['id'] ?>">
                    <?= $p['name'] ?>
                </a>

            <?php } ?>

        </div>

    </div>
</li>
                        <li><a href="news.php">Actualites</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="garellyUI.php">Galerie</a></li>
                        <li><a href="media.php">Media</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="donation.php"><i class="fa-solid fa-heart"></i> Faire Un Don</a></li>
                        <li><a href="login.php"><i class="fa-solid fa-user"></i> Connexion</a></li>
                    </ul>
                </nav>
            </div>
        </div>



<script>
  const toggle = document.querySelector('.menu-toggle');
  const menu = document.querySelector('nav ul');

  toggle.addEventListener('click', () => {
    menu.classList.toggle('show');
  });
</script>


