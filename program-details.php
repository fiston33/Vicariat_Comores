<?php
require_once __DIR__ . '/includes/ui.php';

$id = get_id();
$program = $id ? db_one("SELECT * FROM programs WHERE id = ? AND status='active'", array($id)) : null;
if (!$program) {
    not_found();
}
$others = db_all("SELECT * FROM programs WHERE status='active' AND id <> ? ORDER BY created_at DESC LIMIT 3", array($id));

$active = 'programs';
$page_title = $program['title'];
$page_description = excerpt(trim((string) $program['short_description']) !== '' ? $program['short_description'] : $program['description'], 155);
$page_image = upload_url($program['image']);

include __DIR__ . '/includes/header.php';

$crumbs = array('Programmes' => 'programs.php');
$crumbs[excerpt($program['title'], 40)] = null;
page_hero(array(
    'title'   => $program['title'],
    'eyebrow' => trim((string) $program['category']) !== '' ? $program['category'] : 'Programme',
    'lead'    => trim((string) $program['short_description']),
    'image'   => upload_url($program['image'], 'images/u15.jpeg'),
    'crumbs'  => $crumbs,
));
?>

<section class="section">
    <div class="wrap article-layout">
        <article>
            <?php if (!empty($program['image'])): ?>
                <figure class="article-cover mt-0" style="margin-inline:0;">
                    <img src="<?= e(upload_url($program['image'])) ?>" alt="<?= e($program['title']) ?>">
                </figure>
            <?php endif; ?>
            <div class="prose dropcap">
                <?= paragraphs($program['description']) ?>
            </div>
        </article>

        <aside class="aside-stack">
            <div class="aside-card">
                <h3>Contact du programme</h3>
                <ul class="info-list">
                    <?php if (trim((string) $program['coordinator']) !== ''): ?>
                        <li><span class="ico"><i class="fa-regular fa-user" aria-hidden="true"></i></span><div><small>Coordinateur</small><strong><?= e($program['coordinator']) ?></strong></div></li>
                    <?php endif; ?>
                    <?php if (trim((string) $program['phone']) !== ''): ?>
                        <li><span class="ico"><i class="fa-solid fa-phone" aria-hidden="true"></i></span><div><small>Téléphone</small><strong><a href="tel:<?= e(preg_replace('/[^0-9+]/', '', $program['phone'])) ?>"><?= e($program['phone']) ?></a></strong></div></li>
                    <?php endif; ?>
                    <?php if (trim((string) $program['email']) !== ''): ?>
                        <li><span class="ico"><i class="fa-regular fa-envelope" aria-hidden="true"></i></span><div><small>Email</small><strong><a href="mailto:<?= e($program['email']) ?>"><?= e($program['email']) ?></a></strong></div></li>
                    <?php endif; ?>
                </ul>
                <a class="btn btn-primary btn-block mt-2" href="contact.php?subject=<?= rawurlencode('Programme : ' . $program['title']) ?>">Je souhaite participer</a>
            </div>
        </aside>
    </div>
</section>

<?php if ($others): ?>
<section class="section section-white">
    <div class="wrap">
        <div class="section-head">
            <div><p class="eyebrow">À découvrir aussi</p><h2>Autres programmes</h2></div>
            <a class="link-arrow" href="programs.php">Tous les programmes <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        <div class="grid grid-3">
            <?php foreach ($others as $p) { program_card($p); } ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
