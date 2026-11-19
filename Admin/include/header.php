<?php

session_start();
require_once __DIR__ . '/../../includes/config.php';

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration · Vicariat des Comores</title>
    <link rel="icon" href="../images/lologo.jpeg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500..700&family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="Admin_Css/admin-layout.css">
    <link rel="stylesheet" href="Admin_Css/admin-modern.css?v=20261119">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>
<?php
$admin_page = basename($_SERVER['PHP_SELF']);
$admin_nav = array(
    array('Dashboard.php', 'fa-solid fa-gauge', 'Dashboard', array('Dashboard.php')),
    array('newparish-list.php', 'fa-solid fa-church', 'Parishes', array('newparish-list.php', 'add-newparishes.php', 'edit-newparishes.php', 'view-newparisheslist.php', 'prayers-list.php', 'add-prayer.php', 'edit-prayer.php')),
    array('news-list.php', 'fa-regular fa-newspaper', 'News', array('news-list.php', 'add-news.php', 'edit-news.php', 'view-newslist.php')),
    array('events-list.php', 'fa-regular fa-calendar', 'Events', array('events-list.php', 'add-events.php', 'edit-events.php', 'view-eventslist.php')),
    array('program-list.php', 'fa-solid fa-dove', 'Programs', array('program-list.php', 'add-programs.php', 'edit-programs.php', 'view-programslist.php')),
    array('garelly.php', 'fa-regular fa-images', 'Gallery', array('garelly.php', 'add-gallery.php', 'edit-garelly.php')),
    array('mediacenter.php', 'fa-solid fa-photo-film', 'Media Center', array('mediacenter.php', 'add-mediacenter.php', 'edit-mediacenter.php', 'view-media.php')),
    array('messages.php', 'fa-regular fa-envelope', 'Messages', array('messages.php', 'view-messageslist.php')),
    array('donation.php', 'fa-solid fa-hand-holding-heart', 'Donations', array('donation.php', 'edit-donation.php', 'view-donationslist.php')),
    array('parish_list.php', 'fa-solid fa-box-archive', 'Old parish list', array('parish_list.php', 'add-parish.php', 'edit-parish.php', 'view-parisheslist.php')),
    array('users.php', 'fa-solid fa-users', 'Users', array('users.php', 'edit-users.php')),
    array('settings.php', 'fa-solid fa-gear', 'Settings', array('settings.php')),
);
?>

    <div class="admin-container">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <a class="sidebar-brand" href="Dashboard.php">
                <img src="../images/lologo.jpeg" alt="">
                <span><strong>Vicariat</strong><small>Administration</small></span>
            </a>

            <nav class="sidebar-nav">
                <?php foreach ($admin_nav as $item): ?>
                    <a href="<?= $item[0] ?>"<?= in_array($admin_page, $item[3], true) ? ' class="is-active" aria-current="page"' : '' ?>><i class="<?= $item[1] ?>"></i> <?= $item[2] ?></a>
                <?php endforeach; ?>
            </nav>

            <div class="sidebar-foot">
                <a href="../index.php" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i> View website</a>
                <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
        </aside>
