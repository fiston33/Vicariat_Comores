<?php
require_once __DIR__ . '/includes/ui.php';

$active = 'about';
$page_title = 'À propos';
$page_description = "Histoire, mission et valeurs du Vicariat Apostolique de l'Archipel des Comores.";

include __DIR__ . '/includes/header.php';

page_hero(array(
    'title'   => "À propos du Vicariat",
    'eyebrow' => 'Apostolicus Vicariatus Insularum Comorensium',
    'lead'    => "Une Église particulière de l'Église catholique, présente depuis plus d'un siècle et demi dans l'archipel des Comores.",
    'image'   => 'images/church.jpeg',
    'crumbs'  => array('À propos' => null),
));
?>

<section class="section">
    <div class="wrap split">
        <div class="reveal">
            <p class="eyebrow">Notre histoire</p>
            <h2>Une présence catholique au cœur de l'océan Indien</h2>
            <p class="lead">Depuis plusieurs décennies, l'Église accompagne les familles, les jeunes et les communautés dans leur développement spirituel et humain.</p>
            <p>Le vicariat a été initialement créé comme préfecture apostolique en 1848 pour Mayotte, Sainte-Marie et Nossi-Bé, puis étendu aux îles de Grande Comore, Anjouan et Mohéli en 1851. En 1951, le pape Pie XII a élevé la préfecture apostolique au rang de vicariat apostolique.</p>
            <p>Le vicariat est <strong>exempt</strong>, c'est-à-dire directement soumis au Saint-Siège et non intégré à une province ecclésiastique. Fidèle à sa mission, il continue d'annoncer l'Évangile avec joie et espérance.</p>
        </div>
        <div class="collage reveal">
            <img src="images/Apropos.jpeg" alt="Fidèles réunis après une célébration" loading="lazy">
            <div class="collage-badge"><strong>1951</strong><span>Érection en vicariat apostolique par Pie XII</span></div>
        </div>
    </div>
</section>

<section class="section section-white">
    <div class="wrap">
        <div class="section-head center">
            <p class="eyebrow">Ce qui nous anime</p>
            <h2>Mission, vision et valeurs</h2>
        </div>
        <div class="grid grid-4">
            <div class="feature reveal">
                <div class="feature-icon"><i class="fa-regular fa-flag" aria-hidden="true"></i></div>
                <h3>Notre mission</h3>
                <p>Annoncer l'Évangile, célébrer les sacrements, servir les pauvres, accompagner les communautés, promouvoir la paix, la justice, la fraternité et l'espérance.</p>
            </div>
            <div class="feature reveal">
                <div class="feature-icon"><i class="fa-regular fa-lightbulb" aria-hidden="true"></i></div>
                <h3>Notre vision</h3>
                <p>Construire une communauté chrétienne vivante, fraternelle et missionnaire au service de tous.</p>
            </div>
            <div class="feature reveal">
                <div class="feature-icon"><i class="fa-solid fa-heart" aria-hidden="true"></i></div>
                <h3>Nos valeurs</h3>
                <p>Foi, espérance, charité, solidarité et respect de la dignité humaine.</p>
            </div>
            <div class="feature reveal">
                <div class="feature-icon"><i class="fa-solid fa-dove" aria-hidden="true"></i></div>
                <h3>Notre devise</h3>
                <p>Aimer Dieu, servir les autres et annoncer l'Évangile.</p>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/bishop-message.php'; ?>

<section class="section section-dark">
    <div class="wrap">
        <div class="section-head">
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

<?php include __DIR__ . '/includes/footer.php'; ?>
