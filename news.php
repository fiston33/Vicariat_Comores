<?php
require_once __DIR__ . '/includes/ui.php';

$active = 'news';
$page_title = 'Actualités';
$page_description = "Les dernières nouvelles du Vicariat Apostolique de l'Archipel des Comores.";

$per_page = 9;
$page = current_page();
$total_row = db_one("SELECT COUNT(*) AS n FROM news WHERE parish_id IS NULL AND status='published'");
$total = $total_row ? (int) $total_row['n'] : 0;
$pages = max(1, (int) ceil($total / $per_page));
$page = min($page, $pages);
$offset = ($page - 1) * $per_page;

$news = db_all(
    "SELECT * FROM news WHERE parish_id IS NULL AND status='published' ORDER BY created_at DESC LIMIT " . (int) $per_page . " OFFSET " . (int) $offset
);

include __DIR__ . '/includes/header.php';

page_hero(array(
    'title'   => 'Actualités',
    'eyebrow' => 'Vie du Vicariat',
    'lead'    => 'Célébrations, annonces et nouvelles des communautés chrétiennes de l\'archipel.',
    'image'   => 'images/MayGodBlessYouMa2.jpeg',
    'crumbs'  => array('Actualités' => null),
    'search'  => true,
));
?>

<section class="section">
    <div class="wrap">
        <?php if ($news): ?>
            <?php if ($page === 1 && count($news) >= 4): ?>
                <div class="news-layout" style="margin-bottom: clamp(1.25rem, 2.5vw, 2rem);">
                    <?php foreach (array_slice($news, 0, 4) as $i => $item) { news_card($item, $i === 0 ? 'featured' : 'row'); } ?>
                </div>
                <?php $news = array_slice($news, 4); ?>
            <?php endif; ?>
            <div class="grid grid-3">
                <?php foreach ($news as $item) { news_card($item); } ?>
            </div>
            <?php pagination($page, $pages, 'news.php'); ?>
        <?php else: ?>
            <?php empty_state('Aucune actualité pour le moment', 'Revenez bientôt pour suivre la vie du Vicariat.'); ?>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
