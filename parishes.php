<?php
require_once __DIR__ . '/includes/ui.php';

$active = 'parishes';
$page_title = 'Paroisses';
$page_description = "Les paroisses et communautés catholiques de l'archipel des Comores.";

$parishes = db_all('SELECT * FROM parishe ORDER BY name ASC');
$count = count($parishes);

include __DIR__ . '/includes/header.php';

$search = '<label class="search-bar" for="parishSearch">'
    . '<i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>'
    . '<span class="sr-only">Rechercher une paroisse</span>'
    . '<input id="parishSearch" type="search" autocomplete="off" placeholder="Rechercher une paroisse, une île ou une ville…"'
    . ' data-live-search=".parish-card" data-live-count="#parishCount" data-live-empty="#parishEmpty">'
    . '</label>';

page_hero(array(
    'title'   => 'Nos paroisses',
    'eyebrow' => 'Communautés chrétiennes',
    'lead'    => "Découvrez les communautés présentes dans tout l'archipel et trouvez celle qui vous accompagne.",
    'image'   => 'images/mayotte.jpeg',
    'crumbs'  => array('Paroisses' => null),
    'extra'   => $search,
));
?>

<section class="section">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow">Annuaire</p>
                <h2>Toutes nos paroisses</h2>
            </div>
            <span class="tag" id="parishCount" aria-live="polite"><?= $count ?> paroisse<?= $count > 1 ? 's' : '' ?></span>
        </div>

        <?php if ($parishes): ?>
            <div class="grid grid-3">
                <?php foreach ($parishes as $p) { parish_card($p); } ?>
                <div class="empty" id="parishEmpty" hidden>
                    <i class="fa-solid fa-church" aria-hidden="true"></i>
                    <h3>Aucune paroisse trouvée</h3>
                    <p>Essayez une autre ville, île ou nom de paroisse.</p>
                </div>
            </div>
        <?php else: ?>
            <?php empty_state('Aucune paroisse publiée', 'Les paroisses seront bientôt présentées ici.', 'fa-solid fa-church'); ?>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
