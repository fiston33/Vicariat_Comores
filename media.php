<?php
require_once __DIR__ . '/includes/ui.php';

$active = 'media';
$page_title = 'Médiathèque';
$page_description = "Photos, vidéos, documents et publications du Vicariat Apostolique de l'Archipel des Comores.";

$types = array(
    'gallery'     => array('Photos', 'fa-regular fa-images'),
    'video'       => array('Vidéos', 'fa-solid fa-video'),
    'document'    => array('Documents', 'fa-regular fa-file-pdf'),
    'publication' => array('Publications', 'fa-solid fa-book-open'),
);
$media = array();
foreach ($types as $type => $info) {
    $media[$type] = db_all('SELECT * FROM media WHERE type = ? ORDER BY created_at DESC, id DESC', array($type));
}

/** YouTube / Vimeo link -> embed URL, or '' */
function video_embed($url)
{
    $url = safe_url($url);
    if (preg_match('~(?:youtube\.com/(?:watch\?v=|embed/|shorts/)|youtu\.be/)([A-Za-z0-9_-]{6,})~', $url, $m)) {
        return 'https://www.youtube-nocookie.com/embed/' . $m[1];
    }
    if (preg_match('~vimeo\.com/(\d+)~', $url, $m)) {
        return 'https://player.vimeo.com/video/' . $m[1];
    }
    return '';
}

include __DIR__ . '/includes/header.php';

page_hero(array(
    'title'   => 'Médiathèque',
    'eyebrow' => 'Centre multimédia',
    'lead'    => "Explorez les photos, vidéos, documents et publications du Vicariat.",
    'image'   => 'images/Godisgood.jpeg',
    'crumbs'  => array('Médiathèque' => null),
));
?>

<section class="section">
    <div class="wrap">
        <div class="chips" role="tablist" aria-label="Types de médias">
            <?php $first = true; foreach ($types as $type => $info): ?>
                <button class="chip" type="button" role="tab" id="tab-<?= e($type) ?>" aria-controls="panel-<?= e($type) ?>" aria-selected="<?= $first ? 'true' : 'false' ?>" tabindex="<?= $first ? '0' : '-1' ?>">
                    <i class="<?= e($info[1]) ?>" aria-hidden="true"></i> <?= e($info[0]) ?> <span class="count"><?= count($media[$type]) ?></span>
                </button>
            <?php $first = false; endforeach; ?>
        </div>

        <div id="panel-gallery" role="tabpanel" aria-labelledby="tab-gallery">
            <?php if ($media['gallery']): ?>
                <div class="gallery-grid">
                    <?php foreach ($media['gallery'] as $m): ?>
                        <a class="gallery-tile" href="<?= e(media_url($m['file_path'])) ?>" target="_blank" rel="noopener">
                            <img src="<?= e(media_url($m['file_path'])) ?>" alt="<?= e($m['title']) ?>" loading="lazy">
                            <span class="gallery-caption"><strong><?= e($m['title']) ?></strong></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else: empty_state('Aucune photo', 'Les photos seront bientôt disponibles.', 'fa-regular fa-images'); endif; ?>
        </div>

        <div id="panel-video" role="tabpanel" aria-labelledby="tab-video" hidden>
            <?php if ($media['video']): ?>
                <div class="grid grid-2">
                    <?php foreach ($media['video'] as $m): $embed = video_embed($m['external_link']); ?>
                        <article>
                            <div class="video-frame">
                                <?php if ($embed): ?>
                                    <iframe src="<?= e($embed) ?>" title="<?= e($m['title']) ?>" loading="lazy" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <?php elseif (trim((string) $m['file_path']) !== ''): ?>
                                    <video src="<?= e(media_url($m['file_path'])) ?>" controls preload="metadata"></video>
                                <?php endif; ?>
                            </div>
                            <h3 class="mt-0" style="margin-top:1rem;"><?= e($m['title']) ?></h3>
                            <?php if (trim((string) $m['description']) !== ''): ?><p class="muted"><?= e(excerpt($m['description'], 160)) ?></p><?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: empty_state('Aucune vidéo', 'Les vidéos seront bientôt disponibles.', 'fa-solid fa-video'); endif; ?>
        </div>

        <div id="panel-document" role="tabpanel" aria-labelledby="tab-document" hidden>
            <?php if ($media['document']): ?>
                <div class="doc-list">
                    <?php foreach ($media['document'] as $m): ?>
                        <div class="doc-item">
                            <div class="feature-icon"><i class="fa-regular fa-file-pdf" aria-hidden="true"></i></div>
                            <div>
                                <h3><?= e($m['title']) ?></h3>
                                <?php if (trim((string) $m['description']) !== ''): ?><p><?= e(excerpt($m['description'], 120)) ?></p><?php endif; ?>
                            </div>
                            <a class="btn btn-outline btn-sm" href="<?= e(media_url($m['file_path'])) ?>" download><i class="fa-solid fa-download" aria-hidden="true"></i> Télécharger</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: empty_state('Aucun document', 'Les documents seront bientôt disponibles.', 'fa-regular fa-file-pdf'); endif; ?>
        </div>

        <div id="panel-publication" role="tabpanel" aria-labelledby="tab-publication" hidden>
            <?php if ($media['publication']): ?>
                <div class="grid grid-3">
                    <?php foreach ($media['publication'] as $m): $link = safe_url($m['external_link']); ?>
                        <article class="card">
                            <div class="card-media"><img src="<?= e(media_url($m['file_path'])) ?>" alt="" loading="lazy"><span class="tag">Publication</span></div>
                            <div class="card-body">
                                <h3><?php if ($link): ?><a href="<?= e($link) ?>" target="_blank" rel="noopener"><?= e($m['title']) ?></a><?php else: ?><?= e($m['title']) ?><?php endif; ?></h3>
                                <p><?= e(excerpt($m['description'], 130)) ?></p>
                                <?php if ($link): ?><div class="card-footer"><span class="link-arrow">Lire <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span></div><?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: empty_state('Aucune publication', 'Les publications seront bientôt disponibles.', 'fa-solid fa-book-open'); endif; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
