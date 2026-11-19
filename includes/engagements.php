<section class="section">
    <div class="wrap">
        <div class="section-head center">
            <p class="eyebrow">Nos engagements</p>
            <h2>Nos principaux domaines d'engagement</h2>
            <p class="lead">Six missions qui structurent la vie pastorale et sociale du Vicariat.</p>
        </div>
        <div class="grid grid-3">
            <?php
            $domains = array(
                array('fa-people-group', 'Catéchèse', 'Formation chrétienne pour enfants et adultes.'),
                array('fa-people-roof', 'Famille', 'Accompagnement des couples et des familles.'),
                array('fa-hands-holding-child', 'Jeunesse', 'Activités et rencontres pour les jeunes catholiques.'),
                array('fa-hand-holding-heart', 'Caritas', 'Aide aux personnes vulnérables.'),
                array('fa-church', 'Liturgie', 'Organisation et animation des célébrations.'),
                array('fa-book-open-reader', 'Éducation', 'Soutien scolaire et formation.'),
            );
            foreach ($domains as $d): ?>
                <div class="feature reveal">
                    <div class="feature-icon"><i class="fa-solid <?= e($d[0]) ?>" aria-hidden="true"></i></div>
                    <h3><?= e($d[1]) ?></h3>
                    <p><?= e($d[2]) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

