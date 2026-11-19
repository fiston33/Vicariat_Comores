<?php
require_once __DIR__ . '/includes/ui.php';

$id = get_id();
$article = $id ? db_one("SELECT * FROM news WHERE id = ? AND status='published'", array($id)) : null;
if (!$article) {
    not_found();
}

$parish = null;
if (!empty($article['parish_id'])) {
    $parish = db_one('SELECT id, name FROM parishe WHERE id = ?', array((int) $article['parish_id']));
}
$related = db_all("SELECT id, title, image, created_at FROM news WHERE status='published' AND id <> ? ORDER BY created_at DESC LIMIT 5", array($id));

$active = 'news';
$page_title = $article['title'];
$page_description = excerpt(trim((string) $article['summary']) !== '' ?$article['summary'] : $article['content'], 155);
$page_image = upload_url($article['image']);

include __DIR__ . '/includes/header.php';

$crumbs = array('Actualités' => 'news.php');
$crumbs[excerpt($article['title'], 40)] = null;
page_hero(array(
    'title'   => $article['title'],
    'eyebrow' => fr_date($article['created_at']),
    'lead'    => trim((string) $article['summary']),
    'image'   => upload_url($article['image']),
    'crumbs'  => $crumbs,
));
?>

<section class="section">
    <div class="wrap article-layout">
        <article>
            <figure class="article-cover mt-0" style="margin-inline:0;">
                <img src="<?= e(upload_url($article['image'])) ?>" alt="<?= e($article['title']) ?>">
            </figure>
            <div class="prose dropcap">
                <?= paragraphs($article['content']) ?>
            </div>
        </article>

        <aside class="aside-stack">
            <div class="aside-card">
                <h3>À propos de cet article</h3>
                <ul class="info-list">
                    <li><span class="ico"><i class="fa-regular fa-calendar" aria-hidden="true"></i></span><div><small>Publié le</small><strong><?= e(fr_date($article['created_at'])) ?></strong></div></li>
                    <?php if (!empty($article['author'])): ?>
                        <li><span class="ico"><i class="fa-regular fa-user" aria-hidden="true"></i></span><div><small>Auteur</small><strong><?= e($article['author']) ?></strong></div></li>
                    <?php endif; ?>
                    <?php if ($parish): ?>
                        <li><span class="ico"><i class="fa-solid fa-church" aria-hidden="true"></i></span><div><small>Paroisse</small><strong><a href="cathederal.php?id=<?= (int) $parish['id'] ?>"><?= e($parish['name']) ?></a></strong></div></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="aside-card">
                <h3>Partager</h3>
                <?php share_links($article['title']); ?>
            </div>
            <?php if ($related): ?>
                <div class="aside-card">
                    <h3>Autres actualités</h3>
                    <ul class="mini-list">
                        <?php foreach ($related as $r): ?>
                            <li><a href="news-details.php?id=<?= (int) $r['id'] ?>">
                                <img src="<?= e(upload_url($r['image'])) ?>" alt="" loading="lazy">
                                <span><strong><?= e(excerpt($r['title'], 70)) ?></strong><span><?= e(fr_date($r['created_at'])) ?></span></span>
                            </a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </aside>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
