<?php
require_once __DIR__ . '/includes/ui.php';

$active = 'home';

$news = db_all("SELECT * FROM news WHERE parish_id IS NULL AND status='published' ORDER BY created_at DESC LIMIT 10");
$featured = array_slice($news, 0, 4);

// Upcoming events first; fall back to the most recent ones.
$events = db_all("SELECT * FROM events WHERE parish_id IS NULL AND status='published' AND event_date >= ? ORDER BY event_date ASC LIMIT 4", array(date('Y-m-d')));
if (count($events) < 4) {
    $seen = array();
    foreach ($events as $ev) { $seen[] = (int) $ev['id']; }
    foreach (db_all("SELECT * FROM events WHERE parish_id IS NULL AND status='published' ORDER BY event_date DESC LIMIT 8") as $ev) {
        if (count($events) >= 4) { break; }
        if (!in_array((int) $ev['id'], $seen, true)) { $events[] = $ev; }
    }
}

$programs = db_all("SELECT * FROM programs WHERE status='active' ORDER BY created_at DESC LIMIT 4");
$parishes = db_all("SELECT * FROM parishe ORDER BY created_at DESC");

include __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="hero-media"><img src="images/cart.jpeg" alt="" fetchpriority="high"></div>
    <div class="wrap">
        <div class="hero-content">
            <p class="eyebrow">Bienvenue au Vicariat Apostolique de l'archipel des Comores</p>
            <h1>Aimer Dieu, servir les autres et <em>annoncer l'Évangile.</em></h1>
            <p class="lead">Une communauté catholique engagée dans l'annonce de l'Évangile, le service de la charité et la promotion des valeurs chrétiennes — à travers nos paroisses, nos programmes pastoraux et nos actions sociales.</p>
            <div class="btn-row">
                <a class="btn btn-gold" href="aprops.php">Découvrir le Vicariat <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                <a class="btn btn-ghost" href="parishes.php">Trouver une paroisse</a>
            </div>
        </div>
    </div>
</section>

<?php if ($news): ?>
<aside class="ticker" aria-label="Actualités récentes">
    <div class="ticker-viewport">
        <div class="ticker-track">
            <?php foreach (array(0, 1) as $copy): ?>
                <?php foreach ($news as $item): ?>
                    <a class="ticker-item" href="news-details.php?id=<?= (int) $item['id'] ?>"<?= $copy ? ' aria-hidden="true" tabindex="-1"' : '' ?>>
                        <img src="<?= e(upload_url($item['image'])) ?>" alt="" loading="lazy">
                        <time datetime="<?= e(date('Y-m-d', strtotime($item['created_at']))) ?>"><?= e(fr_date($item['created_at'])) ?></time>
                        <span><?= e(excerpt($item['title'], 80)) ?></span>
                    </a>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</aside>
<?php endif; ?>

<!-- Actualités -->
<section class="section">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow">Actualités</p>
                <h2>La vie de l'Église dans l'archipel</h2>
            </div>
            <a class="link-arrow" href="news.php">Toutes les actualités <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>

        <?php if ($featured): ?>
            <div class="news-layout">
                <?php foreach ($featured as $i => $item) { news_card($item, $i === 0 ? 'featured' : 'row'); } ?>
            </div>
        <?php else: empty_state('Aucune actualité pour le moment', 'Revenez bientôt pour suivre la vie du Vicariat.'); endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/bishop-message.php'; ?>

<!-- Événements -->
<section class="section">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow">Agenda</p>
                <h2>Événements à venir</h2>
            </div>
            <a class="link-arrow" href="events.php">Tout l'agenda <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        <?php if ($events): ?>
            <div class="event-list">
                <?php foreach ($events as $ev) { event_item($ev); } ?>
            </div>
        <?php else: empty_state('Aucun événement programmé', "L'agenda sera bientôt mis à jour.", 'fa-regular fa-calendar'); endif; ?>
    </div>
</section>

<!-- À propos -->
<section class="section section-sand">
    <div class="wrap split">
        <div class="collage reveal">
            <img src="images/Apropos.jpeg" alt="Communauté de fidèles après une célébration" loading="lazy">
            <div class="collage-badge"><strong>1848</strong><span>Création de la préfecture apostolique</span></div>
        </div>
        <div class="reveal">
            <p class="eyebrow">Qui sommes-nous ?</p>
            <h2>Une Église particulière, au cœur de l'océan Indien</h2>
            <p class="lead">Le vicariat apostolique — en latin <em>Apostolicus Vicariatus Insularum Comorensium</em> — est une Église particulière de l'Église catholique.</p>
            <p>Créé comme préfecture apostolique en 1848 pour Mayotte, Sainte-Marie et Nossi-Bé, il est étendu en 1851 à la Grande Comore, Anjouan et Mohéli. En 1951, le pape Pie XII l'élève au rang de vicariat apostolique. Le vicariat est exempt : il est directement soumis au Saint-Siège.</p>
            <a class="btn btn-primary mt-2" href="aprops.php">Notre histoire <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
    </div>
</section>

<!-- Chiffres & étapes -->
<section class="section section-dark">
    <div class="wrap">
        <div class="stats">
            <div class="stat"><div class="stat-value"><span data-count="4">4</span></div><div class="stat-label">Îles</div></div>
            <div class="stat"><div class="stat-value"><span data-count="8">8</span><span>+</span></div><div class="stat-label">Paroisses</div></div>
            <div class="stat"><div class="stat-value"><span data-count="100">100</span><span>+</span></div><div class="stat-label">Communautés</div></div>
            <div class="stat"><div class="stat-value"><span data-count="1000">1 000</span><span>+</span></div><div class="stat-label">Fidèles</div></div>
        </div>

        <div class="section-head mt-2" style="margin-top: clamp(3.5rem, 7vw, 5rem);">
            <div>
                <p class="eyebrow">Les grandes étapes</p>
                <h2>Une mission qui grandit</h2>
            </div>
        </div>
        <ol class="timeline">
            <li class="reveal"><span class="timeline-dot"><i class="fa-solid fa-users" aria-hidden="true"></i></span><div class="timeline-year">1975</div><p>Création</p></li>
            <li class="reveal"><span class="timeline-dot"><i class="fa-solid fa-church" aria-hidden="true"></i></span><div class="timeline-year">1990</div><p>Développement pastoral</p></li>
            <li class="reveal"><span class="timeline-dot"><i class="fa-solid fa-cross" aria-hidden="true"></i></span><div class="timeline-year">2010</div><p>Expansion des activités sociales</p></li>
            <li class="reveal"><span class="timeline-dot"><i class="fa-solid fa-laptop" aria-hidden="true"></i></span><div class="timeline-year">2025</div><p>Modernisation numérique</p></li>
        </ol>
    </div>
</section>

<?php include __DIR__ . '/includes/engagements.php'; ?>

<!-- Programmes -->
<?php if ($programs): ?>
<section class="section section-white">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow">Programmes &amp; services</p>
                <h2>Servir, éduquer et accompagner</h2>
                <p class="lead">Les programmes pastoraux, éducatifs et sociaux du Vicariat.</p>
            </div>
            <a class="link-arrow" href="programs.php">Tous les programmes <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        <div class="grid grid-4">
            <?php foreach ($programs as $p) { program_card($p); } ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Paroisses -->
<?php if ($parishes): ?>
<section class="section">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow">Paroisses</p>
                <h2>Nos communautés dans l'archipel</h2>
            </div>
            <a class="link-arrow" href="parishes.php">Toutes les paroisses <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        <div class="grid grid-4">
            <?php foreach ($parishes as $p) { parish_card($p); } ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Image & vidéo -->
<section class="section-tight">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow">Médiathèque</p>
                <h2>La vie du Vicariat en images</h2>
            </div>
            <a class="link-arrow" href="media.php">Explorer la médiathèque <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        <div class="media-duo">
            <div class="reveal"><img src="images/MayGodBlessYouMa4.jpeg" alt="Enfants devant l'église" loading="lazy"></div>
            <div class="reveal">
                <video src="videos/mayotte.mp4" controls muted playsinline preload="metadata" poster="images/mayotte.jpeg">
                    Votre navigateur ne lit pas les vidéos.
                </video>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section class="section">
    <div class="wrap contact-grid">
        <div class="contact-card reveal">
            <p class="eyebrow">Contact</p>
            <h2>Écrivez-nous</h2>
            <p>Une question, une demande de sacrement, une intention de prière ? Notre équipe vous répond.</p>
            <ul class="info-list mt-2">
                <li><span class="ico"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span><div><small>Adresse</small><strong><?= e(setting('address')) ?></strong></div></li>
                <li><span class="ico"><i class="fa-solid fa-phone" aria-hidden="true"></i></span><div><small>Téléphone</small><strong><a href="tel:<?= e(preg_replace('/[^0-9+]/', '', setting('phone'))) ?>"><?= e(setting('phone')) ?></a></strong></div></li>
                <li><span class="ico"><i class="fa-regular fa-envelope" aria-hidden="true"></i></span><div><small>Email</small><strong><a href="mailto:<?= e(setting('email')) ?>"><?= e(setting('email')) ?></a></strong></div></li>
            </ul>
        </div>
        <form class="panel reveal" action="contact.php" method="post">
            <h2>Envoyer un message</h2>
            <div class="form-grid mt-2">
                <div class="field"><label for="hName">Nom complet</label><input class="input" id="hName" name="name" autocomplete="name" required></div>
                <div class="field"><label for="hEmail">Email</label><input class="input" id="hEmail" type="email" name="email" autocomplete="email" required></div>
                <div class="field full"><label for="hSubject">Sujet</label><input class="input" id="hSubject" name="subject" required></div>
                <div class="field full"><label for="hMessage">Message</label><textarea class="input" id="hMessage" name="message" required></textarea></div>
                <div class="full"><button class="btn btn-primary" type="submit" name="send">Envoyer le message <i class="fa-solid fa-paper-plane" aria-hidden="true"></i></button></div>
            </div>
        </form>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
