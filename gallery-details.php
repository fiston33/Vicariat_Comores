<?php
require_once __DIR__ . '/includes/ui.php';

$id = get_id();
$photo = $id ? db_one('SELECT * FROM gallery WHERE id = ?', array($id)) : null;
if (!$photo) {
    not_found();
}

$related = db_all('SELECT * FROM gallery WHERE category = ? AND id <> ? ORDER BY created_at DESC LIMIT 6', array((string) $photo['category'], $id));
if (!$related) {
    $related = db_all('SELECT * FROM gallery WHERE id <> ? ORDER BY created_at DESC LIMIT 6', array($id));
}

$active = 'gallery';
$page_title = $photo['title'];
$page_description = excerpt($photo['description'], 155);
$page_image = upload_url($photo['image']);

include __DIR__ . '/includes/header.php';

$crumbs = array('Galerie' => 'garellyUI.php');
$crumbs[excerpt($photo['title'], 40)] = null;
page_hero(array(
    'title'   => $photo['title'],
    'eyebrow' => trim((string) $photo['category']) . ' · ' . fr_date($photo['created_at']),
    'image'   => upload_url($photo['image']),
    'crumbs'  => $crumbs,
));
?>

<section class="section">
    <div class="wrap article-layout">
        <figure class="article-cover mt-0" style="margin:0;">
            <a href="<?= e(upload_url($photo['image'])) ?>" target="_blank" rel="noopener" title="Ouvrir en grand">
                <img src="<?= e(upload_url($photo['image'])) ?>" alt="<?= e($photo['title']) ?>" style="max-height:none;">
            </a>
        </figure>
        <aside class="aside-stack">
            <div class="aside-card">
                <h3>Description</h3>
                <div class="prose" style="font-size:1rem;">
                    <?= trim((string) $photo['description']) !== '' ? paragraphs($photo['description']) : '<p>Aucune description disponible.</p>' ?>
                </div>
                <ul class="info-list mt-2">
                    <?php if (trim((string) $photo['category']) !== ''): ?><li><span class="ico"><i class="fa-solid fa-tag" aria-hidden="true"></i></span><div><small>Catégorie</small><strong><?= e($photo['category']) ?></strong></div></li><?php endif; ?>
                    <li><span class="ico"><i class="fa-regular fa-calendar" aria-hidden="true"></i></span><div><small>Date</small><strong><?= e(fr_date($photo['created_at'])) ?></strong></div></li>
                </ul>
            </div>
            <a class="btn btn-outline" href="garellyUI.php"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Retour à la galerie</a>
        </aside>
    </div>
</section>

<?php if ($related): ?>
<section class="section section-white">
    <div class="wrap">
        <div class="section-head"><div><p class="eyebrow">À voir aussi</p><h2>Photos associées</h2></div></div>
        <div class="gallery-grid">
            <?php foreach ($related as $p): ?>
                <a class="gallery-tile" href="gallery-details.php?id=<?= (int) $p['id'] ?>">
                    <img src="<?= e(upload_url($p['image'])) ?>" alt="<?= e($p['title']) ?>" loading="lazy">
                    <span class="gallery-caption"><span><?= e($p['category']) ?></span><strong><?= e($p['title']) ?></strong></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
