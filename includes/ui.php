<?php
/**
 * Small reusable pieces of markup used across the public pages.
 */

require_once __DIR__ . '/db.php';

/**
 * Banner at the top of inner pages.
 * $opts: title, eyebrow, lead, image, crumbs (array label => url), search (bool), extra (raw html)
 */
function page_hero($opts)
{
    $title   = isset($opts['title']) ? $opts['title'] : '';
    $eyebrow = isset($opts['eyebrow']) ? $opts['eyebrow'] : '';
    $lead    = isset($opts['lead']) ? $opts['lead'] : '';
    $image   = isset($opts['image']) ? $opts['image'] : 'images/church.jpeg';
    $crumbs  = isset($opts['crumbs']) ? $opts['crumbs'] : array();
    $class   = isset($opts['class']) ? ' ' . $opts['class'] : '';
    ?>
    <section class="page-hero<?= e($class) ?>">
        <div class="page-hero-media"><img src="<?= e($image) ?>" alt="" fetchpriority="high"></div>
        <div class="wrap">
            <nav aria-label="Fil d'Ariane">
                <ol class="breadcrumb">
                    <li><a href="index.php">Accueil</a></li>
                    <?php foreach ($crumbs as $label => $url): ?>
                        <li><?php if ($url): ?><a href="<?= e($url) ?>"><?= e($label) ?></a><?php else: ?><span aria-current="page"><?= e($label) ?></span><?php endif; ?></li>
                    <?php endforeach; ?>
                </ol>
            </nav>
            <?php if ($eyebrow !== ''): ?><p class="eyebrow"><?= e($eyebrow) ?></p><?php endif; ?>
            <h1><?= e($title) ?></h1>
            <?php if ($lead !== ''): ?><p class="lead"><?= e($lead) ?></p><?php endif; ?>
            <?php if (!empty($opts['search'])) { search_bar(isset($opts['query']) ? $opts['query'] : ''); } ?>
            <?php if (!empty($opts['extra'])) { echo $opts['extra']; } ?>
        </div>
    </section>
    <?php
}

function search_bar($query = '', $class = '')
{
    ?>
    <form class="search-bar <?= e($class) ?>" action="search.php" method="get" role="search">
        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
        <label class="sr-only" for="q-<?= $class === '' ? 'hero' : 'page' ?>">Rechercher</label>
        <input id="q-<?= $class === '' ? 'hero' : 'page' ?>" type="search" name="q" value="<?= e($query) ?>" placeholder="Rechercher actualités, événements, paroisses…" autocomplete="off">
        <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
    </form>
    <?php
}

function empty_state($title, $text = '', $icon = 'fa-regular fa-folder-open')
{
    ?>
    <div class="empty">
        <i class="<?= e($icon) ?>" aria-hidden="true"></i>
        <h3><?= e($title) ?></h3>
        <?php if ($text !== ''): ?><p><?= e($text) ?></p><?php endif; ?>
    </div>
    <?php
}

function news_card($row, $variant = '')
{
    $url = 'news-details.php?id=' . (int) $row['id'];
    $summary = trim((string) $row['summary']) !== '' ? $row['summary'] : $row['content'];
    $length = $variant === 'featured' ? 220 : ($variant === 'row' ? 110 : 140);
    ?>
    <article class="card <?= $variant === 'featured' ? 'card-featured' : '' ?> <?= $variant === 'row' ? 'card-row' : '' ?> reveal">
        <div class="card-media">
            <img src="<?= e(upload_url($row['image'])) ?>" alt="" loading="lazy">
        </div>
        <div class="card-body">
            <div class="meta">
                <span><i class="fa-regular fa-calendar" aria-hidden="true"></i><time datetime="<?= e(date('Y-m-d', strtotime($row['created_at']))) ?>"><?= e(fr_date($row['created_at'])) ?></time></span>
                <?php if (!empty($row['author']) && $variant !== 'row'): ?>
                    <span><i class="fa-regular fa-user" aria-hidden="true"></i><?= e($row['author']) ?></span>
                <?php endif; ?>
            </div>
            <h3><a href="<?= e($url) ?>"><?= e($row['title']) ?></a></h3>
            <p><?= e(excerpt($summary, $length)) ?></p>
            <?php if ($variant !== 'row'): ?>
                <div class="card-footer"><span class="link-arrow">Lire l'article <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span></div>
            <?php endif; ?>
        </div>
    </article>
    <?php
}

function event_item($row)
{
    $d = date_parts($row['event_date']);
    $url = 'events-details.php?id=' . (int) $row['id'];
    ?>
    <article class="event-item reveal">
        <div class="date-badge" aria-hidden="true"><strong><?= e($d['day']) ?></strong><span><?= e($d['month']) ?></span></div>
        <div class="event-thumb"><img src="<?= e(upload_url($row['image'])) ?>" alt="" loading="lazy"></div>
        <div>
            <h3><a href="<?= e($url) ?>"><?= e($row['title']) ?></a></h3>
            <p><?= e(excerpt($row['description'], 130)) ?></p>
            <div class="meta">
                <span><i class="fa-regular fa-calendar" aria-hidden="true"></i><?= e(fr_date($row['event_date'])) ?></span>
                <?php if (!empty($row['location'])): ?><span><i class="fa-solid fa-location-dot" aria-hidden="true"></i><?= e($row['location']) ?></span><?php endif; ?>
            </div>
        </div>
        <span class="event-arrow" aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></span>
    </article>
    <?php
}

function event_card($row)
{
    $d = date_parts($row['event_date']);
    ?>
    <article class="card reveal">
        <div class="card-media">
            <img src="<?= e(upload_url($row['image'])) ?>" alt="" loading="lazy">
            <div class="date-badge" aria-hidden="true"><strong><?= e($d['day']) ?></strong><span><?= e($d['month']) ?></span></div>
        </div>
        <div class="card-body">
            <h3><a href="events-details.php?id=<?= (int) $row['id'] ?>"><?= e($row['title']) ?></a></h3>
            <p><?= e(excerpt($row['description'], 120)) ?></p>
            <div class="meta mb-0">
                <span><i class="fa-regular fa-calendar" aria-hidden="true"></i><?= e(fr_date($row['event_date'])) ?></span>
                <?php if (!empty($row['location'])): ?><span><i class="fa-solid fa-location-dot" aria-hidden="true"></i><?= e($row['location']) ?></span><?php endif; ?>
            </div>
        </div>
    </article>
    <?php
}

function program_icon($category)
{
    $c = mb_strtolower((string) $category, 'UTF-8');
    $map = array(
        'caté' => 'fa-book-bible', 'jeun' => 'fa-people-group', 'famil' => 'fa-people-roof',
        'carit' => 'fa-hand-holding-heart', 'social' => 'fa-hand-holding-heart', 'litur' => 'fa-church',
        'éduc' => 'fa-graduation-cap', 'educ' => 'fa-graduation-cap', 'santé' => 'fa-heart-pulse',
        'prière' => 'fa-hands-praying', 'priere' => 'fa-hands-praying', 'vocation' => 'fa-cross',
        'commun' => 'fa-bullhorn', 'femme' => 'fa-person-dress',
    );
    foreach ($map as $needle => $icon) {
        if (mb_strpos($c, $needle, 0, 'UTF-8') !== false) {
            return 'fa-solid ' . $icon;
        }
    }
    return 'fa-solid fa-dove';
}

function program_card($row, $withImage = false)
{
    ?>
    <article class="program-card reveal">
        <?php if ($withImage && !empty($row['image'])): ?>
            <div class="program-media"><img src="<?= e(upload_url($row['image'])) ?>" alt="" loading="lazy"></div>
        <?php else: ?>
            <div class="feature-icon"><i class="<?= e(program_icon($row['category'])) ?>" aria-hidden="true"></i></div>
        <?php endif; ?>
        <?php if (!empty($row['category'])): ?><span class="tag tag-gold"><?= e($row['category']) ?></span><?php endif; ?>
        <h3><a href="program-details.php?id=<?= (int) $row['id'] ?>"><?= e($row['title']) ?></a></h3>
        <p><?= e(excerpt(trim((string) $row['short_description']) !== '' ?$row['short_description'] : $row['description'], 130)) ?></p>
        <span class="link-arrow">Découvrir <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
    </article>
    <?php
}

/** Parish image paths are stored relative to /Admin ("uploads/x.jpg"). */
function parish_image($value, $fallback)
{
    $value = trim((string) $value);
    if ($value === '') {
        return $fallback;
    }
    $value = ltrim($value, '/');
    if (is_file(site_root() . '/Admin/' . $value)) {
        return 'Admin/' . url_path($value);
    }
    if (is_file(site_root() . '/' . $value)) {
        return url_path($value);
    }
    return upload_url(basename($value), $fallback);
}

function parish_card($row)
{
    $id = (int) $row['id'];
    $hero = parish_image(isset($row['hero_image']) ? $row['hero_image'] : '', 'images/church.jpeg');
    $logo = parish_image(isset($row['logo']) ? $row['logo'] : '', 'images/lologo.jpeg');
    $search = mb_strtolower($row['name'] . ' ' . $row['address'] . ' ' . $row['email'], 'UTF-8');
    ?>
    <article class="card parish-card reveal" data-search="<?= e($search) ?>">
        <div class="card-media"><img src="<?= e($hero) ?>" alt="" loading="lazy"></div>
        <div class="card-body">
            <img class="parish-logo" src="<?= e($logo) ?>" alt="" loading="lazy">
            <h3><a href="cathederal.php?id=<?= $id ?>"><?= e($row['name']) ?></a></h3>
            <ul class="contact-lines">
                <?php if (trim((string) $row['address']) !== ''): ?><li><i class="fa-solid fa-location-dot" aria-hidden="true"></i><?= e($row['address']) ?></li><?php endif; ?>
                <?php if (trim((string) $row['phone']) !== ''): ?><li><i class="fa-solid fa-phone" aria-hidden="true"></i><?= e($row['phone']) ?></li><?php endif; ?>
            </ul>
            <div class="card-footer"><span class="link-arrow">Découvrir la paroisse <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span></div>
        </div>
    </article>
    <?php
}

/** Social links from settings; returns array of [url, icon, label]. */
function social_links()
{
    $links = array();
    $map = array(
        'facebook'  => array('fa-brands fa-facebook-f', 'Facebook'),
        'instagram' => array('fa-brands fa-instagram', 'Instagram'),
        'youtube'   => array('fa-brands fa-youtube', 'YouTube'),
    );
    foreach ($map as $key => $info) {
        $url = setting($key);
        if ($url !== '' && preg_match('#^https?://#i', $url)) {
            $links[] = array($url, $info[0], $info[1]);
        }
    }
    return $links;
}

/** Current page number from ?page= */
function current_page()
{
    return isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
}

function pagination($page, $pages, $base)
{
    if ($pages <= 1) {
        return;
    }
    $sep = strpos($base, '?') === false ? '?' : '&';
    ?>
    <nav class="pagination" aria-label="Pagination">
        <?php if ($page > 1): ?>
            <a href="<?= e($base . $sep . 'page=' . ($page - 1)) ?>" aria-label="Page précédente"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <a href="<?= e($base . $sep . 'page=' . $i) ?>"<?= $i === $page ? ' aria-current="page"' : '' ?>><?= $i ?></a>
        <?php endfor; ?>
        <?php if ($page < $pages): ?>
            <a href="<?= e($base . $sep . 'page=' . ($page + 1)) ?>" aria-label="Page suivante"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        <?php endif; ?>
    </nav>
    <?php
}

/** Show the 404 page and stop. */
function not_found()
{
    http_response_code(404);
    include site_root() . '/404.php';
    exit();
}

/** Absolute URL of the current page (for share links). */
function current_url()
{
    $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
    return ($https ? 'https://' : 'http://') . $host . $uri;
}

function share_links($title)
{
    $url = rawurlencode(current_url());
    $t = rawurlencode($title);
    ?>
    <div class="share">
        <a class="icon-btn" href="https://www.facebook.com/sharer/sharer.php?u=<?= $url ?>" target="_blank" rel="noopener" aria-label="Partager sur Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
        <a class="icon-btn" href="https://wa.me/?text=<?= $t ?>%20<?= $url ?>" target="_blank" rel="noopener" aria-label="Partager sur WhatsApp"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></a>
        <a class="icon-btn" href="mailto:?subject=<?= $t ?>&amp;body=<?= $url ?>" aria-label="Partager par email"><i class="fa-regular fa-envelope" aria-hidden="true"></i></a>
    </div>
    <?php
}

/** Weekday helpers for mass schedules (stored in English or French). */
function weekday_index($day)
{
    $d = mb_strtolower(trim((string) $day), 'UTF-8');
    $days = array(
        'monday' => 1, 'lundi' => 1, 'tuesday' => 2, 'mardi' => 2, 'wednesday' => 3, 'mercredi' => 3,
        'thursday' => 4, 'jeudi' => 4, 'friday' => 5, 'vendredi' => 5, 'saturday' => 6, 'samedi' => 6,
        'sunday' => 7, 'dimanche' => 7,
    );
    return isset($days[$d]) ? $days[$d] : 8;
}

function weekday_fr($day)
{
    $names = array(1 => 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    $i = weekday_index($day);
    return isset($names[$i]) ? $names[$i] : ucfirst(trim((string) $day));
}

/** Render an admin text field as a list when it looks like one, otherwise as paragraphs. */
function list_or_text($text, $icon = 'fa-solid fa-check', $class = 'chip-grid')
{
    $items = lines($text);
    $isList = count($items) >= 2;
    foreach ($items as $item) {
        if (mb_strlen($item, 'UTF-8') > 90) { $isList = false; break; }
    }
    if (!$isList) {
        echo '<div class="prose">' . paragraphs($text) . '</div>';
        return;
    }
    echo '<ul class="' . e($class) . '">';
    foreach ($items as $item) {
        echo '<li>' . ($icon ? '<i class="' . e($icon) . '" aria-hidden="true"></i>' : '') . '<span>' . e($item) . '</span></li>';
    }
    echo '</ul>';
}

/** Safe external link (http/https only). */
function safe_url($url)
{
    $url = trim((string) $url);
    return preg_match('#^https?://#i', $url) ? $url : '';
}
