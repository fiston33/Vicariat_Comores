<?php
/**
 * Site header. Before including, a page may set:
 *   $page_title        – shown in the browser tab (site name is appended)
 *   $page_description  – meta description
 *   $active            – nav key: home, about, programs, parishes, news, events, gallery, media, contact
 *   $page_image        – social share image
 */

require_once __DIR__ . '/ui.php';

$site_name = setting('site_name');
$page_title = isset($page_title) && $page_title !== '' ? $page_title . ' · ' . $site_name : $site_name;
$page_description = isset($page_description) && $page_description !== '' ? $page_description : setting('site_description');
$active = isset($active) ? $active : '';
$page_image = isset($page_image) ? $page_image : 'images/cart.jpeg';

$nav_parishes = db_all('SELECT id, name FROM parishe ORDER BY name ASC');

$nav = array(
    'home'     => array('Accueil', 'index.php'),
    'about'    => array('À propos', 'aprops.php'),
    'programs' => array('Programmes', 'programs.php'),
    'parishes' => array('Paroisses', 'parishes.php'),
    'news'     => array('Actualités', 'news.php'),
    'events'   => array('Événements', 'events.php'),
    'gallery'  => array('Galerie', 'garellyUI.php'),
    'contact'  => array('Contact', 'contact.php'),
);
?>
<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($page_title) ?></title>
    <meta name="description" content="<?= e($page_description) ?>">
    <meta name="theme-color" content="#0d1a31">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= e($page_title) ?>">
    <meta property="og:description" content="<?= e($page_description) ?>">
    <meta property="og:image" content="<?= e($page_image) ?>">
    <link rel="icon" href="images/lologo.jpeg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400..700;1,9..144,400&family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="css/site.css?v=20261119.6">
    <script>document.documentElement.classList.remove('no-js');</script>
</head>
<body>
<a class="skip-link" href="#main">Aller au contenu</a>

<div class="utility-bar">
    <div class="wrap">
        <p>Église catholique dans l'archipel des Comores</p>
        <div class="utility-links">
            <a href="tel:<?= e(preg_replace('/[^0-9+]/', '', setting('phone'))) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i><?= e(setting('phone')) ?></a>
            <a class="hide-xs" href="mailto:<?= e(setting('email')) ?>"><i class="fa-regular fa-envelope" aria-hidden="true"></i><?= e(setting('email')) ?></a>
            <?php foreach (social_links() as $s): ?>
                <a href="<?= e($s[0]) ?>" target="_blank" rel="noopener" aria-label="<?= e($s[2]) ?>"><i class="<?= e($s[1]) ?>" aria-hidden="true"></i></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<header class="site-header" data-header>
    <div class="wrap header-inner">
        <a class="brand" href="index.php" aria-label="Accueil — Vicariat Apostolique des Comores">
            <img src="images/lologo.jpeg" alt="" width="50" height="50">
            <span class="brand-text">
                <strong>Vicariat Apostolique</strong>
                <small>de l'Archipel des Comores</small>
            </span>
        </a>

        <nav class="main-nav" id="mainNav" aria-label="Navigation principale">
            <ul>
                <?php foreach ($nav as $key => $item): ?>
                    <?php if ($key === 'parishes'): ?>
                        <li class="nav-item<?= $active === 'parishes' ? ' is-active' : '' ?>">
                            <div class="nav-dropdown-row">
                                <a href="parishes.php"<?= $active === 'parishes' ? ' aria-current="page"' : '' ?>>Paroisses</a>
                                <button class="nav-dropdown-toggle" type="button" aria-expanded="false" aria-controls="parishMenu" aria-label="Afficher les paroisses">
                                    <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
                                </button>
                            </div>
                            <ul class="nav-dropdown" id="parishMenu">
                                <?php foreach ($nav_parishes as $p): ?>
                                    <li><a href="cathederal.php?id=<?= (int) $p['id'] ?>"><i class="fa-solid fa-church" aria-hidden="true"></i><?= e($p['name']) ?></a></li>
                                <?php endforeach; ?>
                                <li class="nav-dropdown-all"><a href="parishes.php">Toutes les paroisses <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </li>
                    <?php elseif ($key === 'gallery'): ?>
                        <li class="nav-item media-nav-item">
                            <a href="<?= e($item[1]) ?>"<?= $active === 'gallery' ? ' aria-current="page"' : '' ?>><?= e($item[0]) ?></a>
                            <ul class="nav-dropdown" id="mediaMenu">
                                <li><a href="media.php"<?= $active === 'media' ? ' aria-current="page"' : '' ?>><i class="fa-solid fa-photo-film" aria-hidden="true"></i>Médiathèque</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li><a href="<?= e($item[1]) ?>"<?= $active === $key ? ' aria-current="page"' : '' ?>><?= e($item[0]) ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <div class="nav-mobile-extra">
                <a class="btn btn-gold" href="donation.php"><i class="fa-solid fa-heart" aria-hidden="true"></i> Faire un don</a>
                <a class="btn btn-outline" href="login.php"><i class="fa-regular fa-user" aria-hidden="true"></i> Connexion</a>
            </div>
        </nav>

        <div class="header-actions">
            <a class="icon-btn" href="search.php" aria-label="Rechercher"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></a>
            <a class="icon-btn hide-mobile" href="login.php" aria-label="Connexion"><i class="fa-regular fa-user" aria-hidden="true"></i></a>
            <a class="btn btn-gold btn-sm hide-mobile" href="donation.php">Faire un don</a>
            <button class="nav-toggle" type="button" aria-controls="mainNav" aria-expanded="false" aria-label="Ouvrir le menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<main id="main">
