<?php
require_once __DIR__ . '/includes/ui.php';

$active = 'programs';
$page_title = 'Programmes';
$page_description = "Programmes pastoraux, éducatifs et sociaux du Vicariat Apostolique de l'Archipel des Comores.";

$programs = db_all("SELECT * FROM programs WHERE status='active' ORDER BY created_at DESC");

$categories = array();
foreach ($programs as $p) {
    $c = trim((string) $p['category']);
    if ($c !== '') {
        $categories[$c] = isset($categories[$c]) ? $categories[$c] + 1 : 1;
    }
}

include __DIR__ . '/includes/header.php';

page_hero(array(
    'title'   => 'Nos programmes',
    'eyebrow' => 'Servir, éduquer et accompagner',
    'lead'    => "Découvrez les programmes pastoraux, éducatifs et sociaux du Vicariat Apostolique de l'Archipel des Comores.",
    'image'   => 'images/u15.jpeg',
    'crumbs'  => array('Programmes' => null),
));
?>

<section class="section">
    <div class="wrap">
        <?php if ($programs): ?>
            <?php if (count($categories) > 1): ?>
                <div class="chips" data-filter="programs" role="group" aria-label="Filtrer par catégorie">
                    <button class="chip" type="button" data-value="*" aria-pressed="true">Tous <span class="count"><?= count($programs) ?></span></button>
                    <?php foreach ($categories as $name => $count): ?>
                        <button class="chip" type="button" data-value="<?= e($name) ?>" aria-pressed="false"><?= e($name) ?> <span class="count"><?= (int) $count ?></span></button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="grid grid-3">
                <?php foreach ($programs as $p): ?>
                    <div data-filter-item="programs" data-category="<?= e(trim((string) $p['category'])) ?>" style="display:grid;">
                        <?php program_card($p, true); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <?php empty_state('Aucun programme pour le moment', 'Les programmes du Vicariat seront bientôt présentés ici.', 'fa-solid fa-dove'); ?>
        <?php endif; ?>
    </div>
</section>

<section class="section-tight section-sand">
    <div class="wrap split">
        <div>
            <p class="eyebrow">S'engager</p>
            <h2>Vous souhaitez participer ?</h2>
            <p class="lead mb-0">Rejoignez un programme comme bénévole, inscrivez votre enfant au catéchisme ou proposez votre aide : écrivez-nous.</p>
        </div>
        <div class="btn-row" style="justify-content:flex-end;">
            <a class="btn btn-primary" href="contact.php">Nous contacter</a>
            <a class="btn btn-outline" href="donation.php">Soutenir nos actions</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
