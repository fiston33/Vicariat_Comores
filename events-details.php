<?php
require_once __DIR__ . '/includes/ui.php';

$id = get_id();
$event = $id ? db_one("SELECT * FROM events WHERE id = ? AND status='published'", array($id)) : null;
if (!$event) {
    not_found();
}

$parish = null;
if (!empty($event['parish_id'])) {
    $parish = db_one('SELECT id, name FROM parishe WHERE id = ?', array((int) $event['parish_id']));
}
$others = db_all("SELECT * FROM events WHERE status='published' AND id <> ? ORDER BY event_date DESC LIMIT 3", array($id));

// "Add to Google Calendar" link (all-day event)
$calendar = '';
$ts = strtotime((string) $event['event_date']);
if ($ts) {
    $calendar = 'https://calendar.google.com/calendar/render?action=TEMPLATE'
        . '&text=' . rawurlencode($event['title'])
        . '&dates=' . date('Ymd', $ts) . '/' . date('Ymd', strtotime('+1 day', $ts))
        . '&details=' . rawurlencode(excerpt($event['description'], 300))
        . '&location=' . rawurlencode((string) $event['location']);
}

$active = 'events';
$page_title = $event['title'];
$page_description = excerpt($event['description'], 155);
$page_image = upload_url($event['image']);

include __DIR__ . '/includes/header.php';

$crumbs = array('Événements' => 'events.php');
$crumbs[excerpt($event['title'], 40)] = null;
page_hero(array(
    'title'   => $event['title'],
    'eyebrow' => fr_date($event['event_date']) . (!empty($event['location']) ? ' · ' . $event['location'] : ''),
    'image'   => upload_url($event['image']),
    'crumbs'  => $crumbs,
));
?>

<section class="section">
    <div class="wrap article-layout">
        <article>
            <figure class="article-cover mt-0" style="margin-inline:0;">
                <img src="<?= e(upload_url($event['image'])) ?>" alt="<?= e($event['title']) ?>">
            </figure>
            <div class="prose dropcap">
                <?= paragraphs($event['description']) ?>
            </div>
        </article>

        <aside class="aside-stack">
            <div class="aside-card">
                <h3>Informations pratiques</h3>
                <ul class="info-list">
                    <li><span class="ico"><i class="fa-regular fa-calendar" aria-hidden="true"></i></span><div><small>Date</small><strong><?= e(fr_date($event['event_date'])) ?></strong></div></li>
                    <?php if (!empty($event['location'])): ?>
                        <li><span class="ico"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span><div><small>Lieu</small><strong><?= e($event['location']) ?></strong></div></li>
                    <?php endif; ?>
                    <?php if ($parish): ?>
                        <li><span class="ico"><i class="fa-solid fa-church" aria-hidden="true"></i></span><div><small>Paroisse</small><strong><a href="cathederal.php?id=<?= (int) $parish['id'] ?>"><?= e($parish['name']) ?></a></strong></div></li>
                    <?php endif; ?>
                </ul>
                <?php if ($calendar): ?>
                    <a class="btn btn-primary btn-block mt-2" href="<?= e($calendar) ?>" target="_blank" rel="noopener"><i class="fa-regular fa-calendar-plus" aria-hidden="true"></i> Ajouter à mon agenda</a>
                <?php endif; ?>
            </div>
            <div class="aside-card">
                <h3>Partager</h3>
                <?php share_links($event['title']); ?>
            </div>
        </aside>
    </div>
</section>

<?php if ($others): ?>
<section class="section section-white">
    <div class="wrap">
        <div class="section-head">
            <div><p class="eyebrow">Agenda</p><h2>Autres événements</h2></div>
            <a class="link-arrow" href="events.php">Tout l'agenda <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        <div class="grid grid-3">
            <?php foreach ($others as $ev) { event_card($ev); } ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
