<?php
/* Parish page (URL kept as cathederal.php?id=… so existing links keep working). */
require_once __DIR__ . '/includes/ui.php';

$id = get_id();
$parish = $id ? db_one('SELECT * FROM parishe WHERE id = ? LIMIT 1', array($id)) : null;
if (!$parish) {
    redirect('parishes.php');
}

$hero = parish_image($parish['hero_image'], 'images/church.jpeg');
$logo = parish_image($parish['logo'], 'images/lologo.jpeg');

$prayers = db_all('SELECT * FROM parish_prayers WHERE parish_id = ?', array($id));
usort($prayers, function ($a, $b) {
    $d = weekday_index($a['prayer_day']) - weekday_index($b['prayer_day']);
    return $d !== 0 ? $d : strcmp((string) $a['prayer_time'], (string) $b['prayer_time']);
});
$masses = 0;
foreach ($prayers as $p) {
    if (stripos($p['title'], 'messe') !== false) { $masses++; }
}

$news = db_all("SELECT * FROM news WHERE parish_id = ? AND status='published' ORDER BY created_at DESC LIMIT 6", array($id));
$events = db_all("SELECT * FROM events WHERE parish_id = ? AND status='published' ORDER BY event_date DESC LIMIT 6", array($id));

$has = function ($field) use ($parish) { return isset($parish[$field]) && trim((string) $parish[$field]) !== ''; };

// Map: use an embed URL if one was saved, otherwise build one from the address.
$map_embed = map_embed_url($parish['map']);
if ($map_embed === '' && ($has('address') || $has('name'))) {
    $map_embed = 'https://maps.google.com/maps?q=' . rawurlencode(trim($parish['name'] . ', ' . $parish['address'])) . '&output=embed';
}
$map_link = safe_url($parish['map']);

$sections = array('presentation' => 'Présentation');
if ($prayers) { $sections['horaires'] = 'Horaires'; }
if ($has('parish_life')) { $sections['vie'] = 'Vie paroissiale'; }
if ($has('council')) { $sections['conseil'] = 'Conseil'; }
if ($has('commissions')) { $sections['commissions'] = 'Commissions'; }
if ($has('groups_movements')) { $sections['groupes'] = 'Groupes & mouvements'; }
if ($has('organisation')) { $sections['organisation'] = 'Organisation'; }
if ($news) { $sections['actualites'] = 'Actualités'; }
if ($events) { $sections['evenements'] = 'Événements'; }
$sections['contact'] = 'Contact';

$socials = array();
foreach (array('website' => array('fa-solid fa-globe', 'Site web'), 'facebook' => array('fa-brands fa-facebook-f', 'Facebook'), 'youtube' => array('fa-brands fa-youtube', 'YouTube'), 'instagram' => array('fa-brands fa-instagram', 'Instagram')) as $field => $info) {
    $url = safe_url(isset($parish[$field]) ? $parish[$field] : '');
    if ($url !== '') { $socials[] = array($url, $info[0], $info[1]); }
}

$active = 'parishes';
$page_title = $parish['name'];
$page_description = excerpt($has('history') ? $parish['history'] : $parish['parish_life'], 155);
$page_image = $hero;

include __DIR__ . '/includes/header.php';

ob_start(); ?>
    <div class="btn-row mt-2">
        <?php if ($prayers): ?><a class="btn btn-gold" href="#horaires"><i class="fa-regular fa-clock" aria-hidden="true"></i> Horaires des messes</a><?php endif; ?>
        <a class="btn btn-ghost" href="#contact">Nous contacter</a>
    </div>
<?php $hero_extra = ob_get_clean(); ?>

<section class="page-hero parish-hero">
    <div class="page-hero-media"><img src="<?= e($hero) ?>" alt="" fetchpriority="high"></div>
    <div class="wrap">
        <nav aria-label="Fil d'Ariane">
            <ol class="breadcrumb">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="parishes.php">Paroisses</a></li>
                <li><span aria-current="page"><?= e(excerpt($parish['name'], 40)) ?></span></li>
            </ol>
        </nav>
        <div class="parish-hero-inner">
            <img class="parish-logo" src="<?= e($logo) ?>" alt="Logo de la paroisse">
            <div>
                <p class="eyebrow">Bienvenue à</p>
                <h1><?= e($parish['name']) ?></h1>
            </div>
        </div>
        <?= $hero_extra ?>
    </div>
</section>

<div class="wrap">
    <div class="info-strip">
        <div><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span><small>Adresse</small><strong><?= e($has('address') ? $parish['address'] : "Archipel des Comores") ?></strong></span></div>
        <?php if ($has('phone')): ?>
            <div><i class="fa-solid fa-phone" aria-hidden="true"></i><span><small>Téléphone</small><strong><a href="tel:<?= e(preg_replace('/[^0-9+]/', '', $parish['phone'])) ?>"><?= e($parish['phone']) ?></a></strong></span></div>
        <?php endif; ?>
        <?php if ($has('email')): ?>
            <div><i class="fa-regular fa-envelope" aria-hidden="true"></i><span><small>Email</small><strong><a href="mailto:<?= e($parish['email']) ?>"><?= e($parish['email']) ?></a></strong></span></div>
        <?php endif; ?>
        <?php if ($prayers): ?>
            <div><i class="fa-regular fa-calendar" aria-hidden="true"></i><span><small>Chaque semaine</small><strong><?= $masses ?> messe<?= $masses > 1 ? 's' : '' ?> · <?= count($prayers) ?> célébrations</strong></span></div>
        <?php endif; ?>
    </div>
</div>

<nav class="subnav mt-2" aria-label="Sections de la paroisse">
    <div class="wrap">
        <ul>
            <?php foreach ($sections as $anchor => $label): ?>
                <li><a href="#<?= e($anchor) ?>"><?= e($label) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

<section class="section" id="presentation">
    <div class="wrap split">
        <div class="reveal">
            <p class="eyebrow">Notre histoire</p>
            <h2>Présentation de la paroisse</h2>
            <div class="prose">
                <?= $has('history') ? paragraphs($parish['history']) : '<p>La paroisse fait partie du Vicariat Apostolique de l\'Archipel des Comores et accompagne les fidèles dans leur vie de foi.</p>' ?>
            </div>
        </div>
        <div class="collage reveal">
            <img src="<?= e($hero) ?>" alt="<?= e($parish['name']) ?>" loading="lazy">
            <?php if ($prayers): ?>
                <div class="collage-badge"><strong><?= count($prayers) ?></strong><span>célébrations et temps de prière chaque semaine</span></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if ($prayers): ?>
<section class="section section-white" id="horaires">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow">Horaires</p>
                <h2>Messes et temps de prière</h2>
                <p class="lead">Les horaires peuvent changer lors des fêtes et temps liturgiques : renseignez-vous auprès de la paroisse.</p>
            </div>
        </div>
        <table class="schedule">
            <thead><tr><th scope="col">Jour</th><th scope="col">Heure</th><th scope="col">Célébration</th></tr></thead>
            <tbody>
                <?php foreach ($prayers as $p): ?>
                    <tr>
                        <td><?= e(weekday_fr($p['prayer_day'])) ?></td>
                        <td class="time"><?= e($p['prayer_time']) ?></td>
                        <td><strong><?= e($p['title']) ?></strong><?php if (trim((string) $p['description']) !== ''): ?><small><?= e($p['description']) ?></small><?php endif; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php endif; ?>

<?php if ($has('parish_life')): ?>
<section class="section" id="vie">
    <div class="wrap">
        <div class="section-head">
            <div><p class="eyebrow">Vie paroissiale</p><h2>Une communauté vivante</h2></div>
        </div>
        <div class="split" style="align-items:start;">
            <div class="prose reveal"><?= paragraphs($parish['parish_life']) ?></div>
            <div class="grid reveal">
                <div class="feature"><div class="feature-icon"><i class="fa-solid fa-cross" aria-hidden="true"></i></div><h3>Vie spirituelle</h3><p>Célébrations liturgiques, sacrements et temps de prière.</p></div>
                <div class="feature"><div class="feature-icon"><i class="fa-solid fa-people-group" aria-hidden="true"></i></div><h3>Vie communautaire</h3><p>Rencontres fraternelles et accompagnement des familles.</p></div>
                <div class="feature"><div class="feature-icon"><i class="fa-solid fa-hand-holding-heart" aria-hidden="true"></i></div><h3>Action sociale</h3><p>Soutien aux personnes vulnérables.</p></div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($has('council')): ?>
<section class="section section-sand" id="conseil">
    <div class="wrap-narrow">
        <p class="eyebrow">Gouvernance</p>
        <h2>Conseil paroissial</h2>
        <?php list_or_text($parish['council'], 'fa-regular fa-user'); ?>
    </div>
</section>
<?php endif; ?>

<?php if ($has('commissions') || $has('groups_movements')): ?>
<section class="section">
    <div class="wrap grid grid-2" style="align-items:start;">
        <?php if ($has('commissions')): ?>
            <div id="commissions">
                <p class="eyebrow">Commissions</p>
                <h2>Nos commissions</h2>
                <?php list_or_text($parish['commissions'], 'fa-solid fa-circle-check'); ?>
            </div>
        <?php endif; ?>
        <?php if ($has('groups_movements')): ?>
            <div id="groupes">
                <p class="eyebrow">Groupes &amp; mouvements</p>
                <h2>Rejoindre un groupe</h2>
                <?php list_or_text($parish['groups_movements'], 'fa-solid fa-users'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php if ($has('organisation')): ?>
<section class="section section-white" id="organisation">
    <div class="wrap">
        <p class="eyebrow">Organisation</p>
        <h2>Comment la paroisse est organisée</h2>
        <div class="mt-2"><?php list_or_text($parish['organisation'], '', 'org-flow'); ?></div>
    </div>
</section>
<?php endif; ?>

<?php if ($news): ?>
<section class="section" id="actualites">
    <div class="wrap">
        <div class="section-head"><div><p class="eyebrow">Actualités</p><h2>Nouvelles de la paroisse</h2></div></div>
        <div class="grid grid-3">
            <?php foreach ($news as $n) { news_card($n); } ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($events): ?>
<section class="section section-white" id="evenements">
    <div class="wrap">
        <div class="section-head"><div><p class="eyebrow">Agenda</p><h2>Événements de la paroisse</h2></div></div>
        <div class="event-list">
            <?php foreach ($events as $ev) { event_item($ev); } ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section" id="contact">
    <div class="wrap contact-grid">
        <div class="contact-card">
            <p class="eyebrow">Contact</p>
            <h2>Venir à la paroisse</h2>
            <ul class="info-list mt-2">
                <li><span class="ico"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span><div><small>Adresse</small><strong><?= e($has('address') ? $parish['address'] : 'Archipel des Comores') ?></strong></div></li>
                <?php if ($has('phone')): ?><li><span class="ico"><i class="fa-solid fa-phone" aria-hidden="true"></i></span><div><small>Téléphone</small><strong><a href="tel:<?= e(preg_replace('/[^0-9+]/', '', $parish['phone'])) ?>"><?= e($parish['phone']) ?></a></strong></div></li><?php endif; ?>
                <?php if ($has('email')): ?><li><span class="ico"><i class="fa-regular fa-envelope" aria-hidden="true"></i></span><div><small>Email</small><strong><a href="mailto:<?= e($parish['email']) ?>"><?= e($parish['email']) ?></a></strong></div></li><?php endif; ?>
            </ul>
            <?php if ($socials): ?>
                <div class="social-row">
                    <?php foreach ($socials as $s): ?><a href="<?= e($s[0]) ?>" target="_blank" rel="noopener" aria-label="<?= e($s[2]) ?>"><i class="<?= e($s[1]) ?>" aria-hidden="true"></i></a><?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($map_link !== ''): ?>
                <a class="btn btn-gold mt-2" href="<?= e($map_link) ?>" target="_blank" rel="noopener"><i class="fa-solid fa-diamond-turn-right" aria-hidden="true"></i> Itinéraire</a>
            <?php endif; ?>
        </div>
        <div class="map-frame">
            <iframe src="<?= e($map_embed) ?>" title="Carte : <?= e($parish['name']) ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
        </div>
    </div>
    <div class="wrap mt-2">
        <form class="panel" action="contact.php" method="post">
            <h2>Écrire à la paroisse</h2>
            <input type="hidden" name="subject" value="<?= e('Paroisse : ' . $parish['name']) ?>">
            <div class="form-grid mt-2">
                <div class="field"><label for="pName">Nom complet</label><input class="input" id="pName" name="name" autocomplete="name" required></div>
                <div class="field"><label for="pEmail">Email</label><input class="input" id="pEmail" type="email" name="email" autocomplete="email" required></div>
                <div class="field full"><label for="pMessage">Message</label><textarea class="input" id="pMessage" name="message" required></textarea></div>
                <div class="full"><button class="btn btn-primary" type="submit" name="send">Envoyer <i class="fa-solid fa-paper-plane" aria-hidden="true"></i></button></div>
            </div>
        </form>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
