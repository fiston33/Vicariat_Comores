<?php
require_once __DIR__ . '/includes/ui.php';

$active = 'gallery';
$page_title = 'Galerie';
$page_description = "Photos des célébrations, activités pastorales et communautés chrétiennes de l'archipel des Comores.";

$photos = db_all('SELECT * FROM gallery ORDER BY created_at DESC');

// Categories in a sensible order, then any others the admin created.
$categories = array();
foreach (array('Événements', 'Paroisses', 'Jeunesse', 'Évêque') as $c) { $categories[$c] = 0; }
foreach ($photos as $p) {
    $c = trim((string) $p['category']);
    if ($c === '') { continue; }
    $categories[$c] = isset($categories[$c]) ? $categories[$c] + 1 : 1;
}
$categories = array_filter($categories);

include __DIR__ . '/includes/header.php';

page_hero(array(
    'title'   => 'Galerie',
    'eyebrow' => 'En images',
    'lead'    => "Revivez les célébrations, les activités pastorales, les événements du Vicariat et la vie des communautés de l'archipel.",
    'image'   => 'images/MayGodBlessYouMa1.jpeg',
    'crumbs'  => array('Galerie' => null),
));
?>

<section class="section">
    <div class="wrap">
        <?php if ($photos): ?>
            <?php if (count($categories) > 1): ?>
                <div class="chips" data-filter="gallery" role="group" aria-label="Filtrer par catégorie">
                    <button class="chip" type="button" data-value="*" aria-pressed="true">Toutes <span class="count"><?= count($photos) ?></span></button>
                    <?php foreach ($categories as $name => $count): ?>
                        <button class="chip" type="button" data-value="<?= e($name) ?>" aria-pressed="false"><?= e($name) ?> <span class="count"><?= (int) $count ?></span></button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="gallery-grid">
                <?php foreach ($photos as $p): ?>
                    <a class="gallery-tile" href="gallery-details.php?id=<?= (int) $p['id'] ?>" data-filter-item="gallery" data-category="<?= e(trim((string) $p['category'])) ?>">
                        <img src="<?= e(upload_url($p['image'])) ?>" alt="<?= e($p['title']) ?>" loading="lazy">
                        <span class="gallery-caption">
                            <?php if (trim((string) $p['category']) !== ''): ?><span><?= e($p['category']) ?></span><?php endif; ?>
                            <strong><?= e($p['title']) ?></strong>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="empty" data-filter-empty="gallery" hidden>
                <i class="fa-regular fa-images" aria-hidden="true"></i>
                <h3>Aucune photo dans cette catégorie</h3>
            </div>
        <?php else: ?>
            <?php empty_state('La galerie est vide pour le moment', 'Les photos des prochaines célébrations seront publiées ici.', 'fa-regular fa-images'); ?>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
