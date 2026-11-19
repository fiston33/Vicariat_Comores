<?php
/* Legacy parish page (old "parishes" table). New parish pages live in cathederal.php. */
require_once __DIR__ . '/includes/ui.php';

$id = get_id();
$parish = $id ? db_one('SELECT * FROM parishes WHERE id = ?', array($id)) : null;
if (!$parish) {
    redirect('parishes.php');
}
$prayers = db_all('SELECT * FROM parish_prayers WHERE parish_id = ?', array($id));
usort($prayers, function ($a, $b) {
    $d = weekday_index($a['prayer_day']) - weekday_index($b['prayer_day']);
    return $d !== 0 ? $d : strcmp((string) $a['prayer_time'], (string) $b['prayer_time']);
});

$active = 'parishes';
$page_title = $parish['name'];
include __DIR__ . '/includes/header.php';

page_hero(array(
    'title'  => $parish['name'],
    'eyebrow' => 'Paroisse',
    'lead'   => excerpt($parish['description'], 200),
    'image'  => upload_url($parish['image']),
    'crumbs' => array('Paroisses' => 'parishes.php', excerpt($parish['name'], 40) => null),
));
?>

<section class="section">
    <div class="wrap article-layout">
        <div>
            <div class="prose"><?= paragraphs($parish['description']) ?></div>
            <?php if ($prayers): ?>
                <h2 class="mt-2">Horaires des messes</h2>
                <table class="schedule">
                    <thead><tr><th scope="col">Jour</th><th scope="col">Heure</th><th scope="col">Célébration</th></tr></thead>
                    <tbody>
                        <?php foreach ($prayers as $p): ?>
                            <tr><td><?= e(weekday_fr($p['prayer_day'])) ?></td><td class="time"><?= e($p['prayer_time']) ?></td><td><?= e($p['title']) ?></td></tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif (trim((string) $parish['mass_schedule']) !== ''): ?>
                <h2 class="mt-2">Horaires des messes</h2>
                <div class="prose"><?= paragraphs($parish['mass_schedule']) ?></div>
            <?php endif; ?>
        </div>
        <aside class="aside-stack">
            <div class="aside-card">
                <h3>Informations</h3>
                <ul class="info-list">
                    <?php if (trim((string) $parish['location']) !== ''): ?><li><span class="ico"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span><div><small>Lieu</small><strong><?= e($parish['location']) ?></strong></div></li><?php endif; ?>
                    <?php if (trim((string) $parish['priest']) !== ''): ?><li><span class="ico"><i class="fa-regular fa-user" aria-hidden="true"></i></span><div><small>Curé</small><strong><?= e($parish['priest']) ?></strong></div></li><?php endif; ?>
                    <?php if (trim((string) $parish['phone']) !== ''): ?><li><span class="ico"><i class="fa-solid fa-phone" aria-hidden="true"></i></span><div><small>Téléphone</small><strong><?= e($parish['phone']) ?></strong></div></li><?php endif; ?>
                    <?php if (trim((string) $parish['email']) !== ''): ?><li><span class="ico"><i class="fa-regular fa-envelope" aria-hidden="true"></i></span><div><small>Email</small><strong><a href="mailto:<?= e($parish['email']) ?>"><?= e($parish['email']) ?></a></strong></div></li><?php endif; ?>
                </ul>
            </div>
        </aside>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
