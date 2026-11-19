<?php
require_once __DIR__ . '/includes/ui.php';

$q = isset($_GET['q']) ? trim((string) $_GET['q']) : '';
$q = mb_substr($q, 0, 100, 'UTF-8');
$results = array();
$total = 0;

if (mb_strlen($q, 'UTF-8') >= 2) {
    $like = '%' . addcslashes($q, '%_\\') . '%';

    $results['Actualités'] = array_map(function ($r) {
        return array('url' => 'news-details.php?id=' . (int) $r['id'], 'title' => $r['title'], 'text' => excerpt(trim((string) $r['summary']) !== '' ? $r['summary'] : $r['content'], 150), 'image' => upload_url($r['image']), 'meta' => fr_date($r['created_at']));
    }, db_all("SELECT * FROM news WHERE status='published' AND (title LIKE ? OR summary LIKE ? OR content LIKE ?) ORDER BY created_at DESC LIMIT 12", array($like, $like, $like)));

    $results['Événements'] = array_map(function ($r) {
        return array('url' => 'events-details.php?id=' . (int) $r['id'], 'title' => $r['title'], 'text' => excerpt($r['description'], 150), 'image' => upload_url($r['image']), 'meta' => fr_date($r['event_date']) . ($r['location'] ? ' · ' . $r['location'] : ''));
    }, db_all("SELECT * FROM events WHERE status='published' AND (title LIKE ? OR description LIKE ? OR location LIKE ?) ORDER BY event_date DESC LIMIT 12", array($like, $like, $like)));

    $results['Paroisses'] = array_map(function ($r) {
        return array('url' => 'cathederal.php?id=' . (int) $r['id'], 'title' => $r['name'], 'text' => excerpt($r['history'], 150), 'image' => parish_image($r['hero_image'], 'images/church.jpeg'), 'meta' => (string) $r['address']);
    }, db_all('SELECT * FROM parishe WHERE name LIKE ? OR address LIKE ? OR history LIKE ? OR parish_life LIKE ? ORDER BY name LIMIT 12', array($like, $like, $like, $like)));

    $results['Programmes'] = array_map(function ($r) {
        return array('url' => 'program-details.php?id=' . (int) $r['id'], 'title' => $r['title'], 'text' => excerpt(trim((string) $r['short_description']) !== '' ? $r['short_description'] : $r['description'], 150), 'image' => upload_url($r['image'], 'images/u15.jpeg'), 'meta' => (string) $r['category']);
    }, db_all("SELECT * FROM programs WHERE status='active' AND (title LIKE ? OR short_description LIKE ? OR description LIKE ? OR category LIKE ?) ORDER BY created_at DESC LIMIT 12", array($like, $like, $like, $like)));

    $results['Galerie'] = array_map(function ($r) {
        return array('url' => 'gallery-details.php?id=' . (int) $r['id'], 'title' => $r['title'], 'text' => excerpt($r['description'], 150), 'image' => upload_url($r['image']), 'meta' => (string) $r['category']);
    }, db_all('SELECT * FROM gallery WHERE title LIKE ? OR description LIKE ? OR category LIKE ? ORDER BY created_at DESC LIMIT 12', array($like, $like, $like)));

    $results = array_filter($results);
    foreach ($results as $group) { $total += count($group); }
}

$active = '';
$page_title = $q !== '' ? 'Recherche : ' . $q : 'Recherche';
include __DIR__ . '/includes/header.php';

page_hero(array(
    'title'   => 'Recherche',
    'eyebrow' => 'Trouver une information',
    'lead'    => 'Actualités, événements, paroisses, programmes et photos.',
    'image'   => 'images/hist.jpeg',
    'crumbs'  => array('Recherche' => null),
    'search'  => true,
    'query'   => $q,
));
?>

<section class="section">
    <div class="wrap">
        <?php if ($q === ''): ?>
            <?php empty_state('Que recherchez-vous ?', 'Saisissez un mot-clé : une paroisse, un événement, un thème…', 'fa-solid fa-magnifying-glass'); ?>
        <?php elseif (mb_strlen($q, 'UTF-8') < 2): ?>
            <?php empty_state('Recherche trop courte', 'Saisissez au moins deux caractères.', 'fa-solid fa-magnifying-glass'); ?>
        <?php elseif (!$total): ?>
            <?php empty_state('Aucun résultat pour « ' . $q . ' »', 'Essayez un autre mot-clé ou une orthographe différente.', 'fa-solid fa-magnifying-glass'); ?>
        <?php else: ?>
            <div class="section-head">
                <div>
                    <p class="eyebrow"><?= $total ?> résultat<?= $total > 1 ? 's' : '' ?></p>
                    <h2>Résultats pour « <?= e($q) ?> »</h2>
                </div>
            </div>
            <?php foreach ($results as $label => $items): ?>
                <div style="margin-bottom: 3rem;">
                    <h3 class="muted" style="font-family:var(--font-body); font-size:.85rem; letter-spacing:.12em; text-transform:uppercase;"><?= e($label) ?> · <?= count($items) ?></h3>
                    <div class="grid grid-3">
                        <?php foreach ($items as $item): ?>
                            <article class="card card-row">
                                <div class="card-media"><img src="<?= e($item['image']) ?>" alt="" loading="lazy"></div>
                                <div class="card-body">
                                    <?php if ($item['meta'] !== ''): ?><div class="meta"><span><?= e($item['meta']) ?></span></div><?php endif; ?>
                                    <h3><a href="<?= e($item['url']) ?>"><?= e($item['title']) ?></a></h3>
                                    <p><?= e($item['text']) ?></p>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
