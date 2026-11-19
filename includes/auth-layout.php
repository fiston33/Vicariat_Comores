<?php
/**
 * Shared layout for login / register.
 * auth_open($title) ... auth_close()
 */

function auth_open($title)
{
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title><?= e($title) ?> · Vicariat des Comores</title>
    <link rel="icon" href="images/lologo.jpeg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400..700;1,9..144,400&family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="css/site.css?v=20261119.6">
</head>
<body>
<div class="auth">
    <div class="auth-visual">
        <img class="bg" src="images/cart.jpeg" alt="">
        <a class="brand" href="index.php">
            <img src="images/lologo.jpeg" alt="" width="50" height="50">
            <span class="brand-text"><strong>Vicariat Apostolique</strong><small>de l'Archipel des Comores</small></span>
        </a>
        <blockquote>
            « Aimer Dieu, servir les autres et annoncer l'Évangile. »
            <cite>Devise du Vicariat</cite>
        </blockquote>
    </div>
    <main class="auth-main">
        <div class="auth-box">
            <a class="auth-back" href="index.php"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Retour au site</a>
    <?php
}

function auth_close()
{
    ?>
        </div>
    </main>
</div>
<script src="js/site.js?v=20261119" defer></script>
</body>
</html>
    <?php
}

function password_input($name, $id, $label, $autocomplete)
{
    ?>
    <div class="field">
        <label for="<?= e($id) ?>"><?= e($label) ?></label>
        <div class="password-field">
            <input class="input" id="<?= e($id) ?>" type="password" name="<?= e($name) ?>" autocomplete="<?= e($autocomplete) ?>" required>
            <button class="password-toggle" type="button" aria-label="Afficher le mot de passe"><i class="fa-regular fa-eye" aria-hidden="true"></i></button>
        </div>
    </div>
    <?php
}
