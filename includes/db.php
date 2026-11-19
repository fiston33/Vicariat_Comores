<?php
/**
 * Shared helpers for the public site.
 *
 * Every query goes through db_query(), which binds "?" placeholders with
 * properly escaped values, so page code never concatenates user input
 * into SQL.
 */

require_once __DIR__ . '/config.php';

/* ------------------------------------------------------------------ */
/* Database                                                            */
/* ------------------------------------------------------------------ */

function db_quote($value)
{
    global $conn;

    if ($value === null) {
        return 'NULL';
    }
    if (is_int($value) || is_float($value)) {
        return (string) $value;
    }
    if (is_bool($value)) {
        return $value ? '1' : '0';
    }
    if ($conn instanceof PDO) {
        return $conn->quote((string) $value);
    }
    return "'" . mysqli_real_escape_string($conn, (string) $value) . "'";
}

function db_bind($sql, $params)
{
    if (empty($params)) {
        return $sql;
    }
    $params = array_values($params);
    $index = 0;
    return preg_replace_callback('/\?/', function () use (&$index, $params) {
        $value = array_key_exists($index, $params) ? $params[$index] : null;
        $index++;
        return db_quote($value);
    }, $sql);
}

/** Run a SELECT and return every row as an associative array. */
function db_all($sql, $params = array())
{
    global $conn;
    $sql = db_bind($sql, $params);

    if ($conn instanceof PDO) {
        $stmt = $conn->query($sql);
        return $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : array();
    }

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        error_log('SQL error: ' . mysqli_error($conn));
        return array();
    }
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

/** Run a SELECT and return the first row, or null. */
function db_one($sql, $params = array())
{
    $rows = db_all($sql, $params);
    return $rows ? $rows[0] : null;
}

/** Run an INSERT / UPDATE / DELETE. Returns true on success. */
function db_exec($sql, $params = array())
{
    global $conn;
    $sql = db_bind($sql, $params);

    if ($conn instanceof PDO) {
        return $conn->exec($sql) !== false;
    }
    $ok = mysqli_query($conn, $sql);
    if (!$ok) {
        error_log('SQL error: ' . mysqli_error($conn));
    }
    return (bool) $ok;
}

/* ------------------------------------------------------------------ */
/* Output                                                              */
/* ------------------------------------------------------------------ */

/** Escape for HTML output. */
function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Plain-text excerpt, cut on a word boundary. */
function excerpt($text, $length = 160)
{
    $text = trim(preg_replace('/\s+/u', ' ', strip_tags((string) $text)));
    if (mb_strlen($text, 'UTF-8') <= $length) {
        return $text;
    }
    $cut = mb_substr($text, 0, $length, 'UTF-8');
    $space = mb_strrpos($cut, ' ', 0, 'UTF-8');
    if ($space !== false && $space > $length * 0.6) {
        $cut = mb_substr($cut, 0, $space, 'UTF-8');
    }
    return rtrim($cut, " ,.;:-") . '…';
}

/** Text with paragraphs: blank lines become <p>, single newlines <br>. */
function paragraphs($text)
{
    $text = trim(str_replace("\r\n", "\n", (string) $text));
    if ($text === '') {
        return '';
    }
    // Content that already contains HTML block tags is shown as written (admin-authored).
    if (preg_match('/<(p|br|ul|ol|h[1-6]|div|blockquote)\b/i', $text)) {
        return $text;
    }
    $html = '';
    foreach (preg_split('/\n{2,}/', $text) as $block) {
        $html .= '<p>' . nl2br(e(trim($block))) . '</p>';
    }
    return $html;
}

/** Split a multi-line admin field ("one item per line") into a clean list. */
function lines($text)
{
    $items = array();
    foreach (preg_split('/\r\n|\r|\n/', (string) $text) as $line) {
        $line = trim($line, " \t-•*");
        if ($line !== '') {
            $items[] = $line;
        }
    }
    return $items;
}

/* ------------------------------------------------------------------ */
/* Dates                                                               */
/* ------------------------------------------------------------------ */

function fr_month($n, $short = false)
{
    $long = array(1 => 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    $abbr = array(1 => 'janv.', 'févr.', 'mars', 'avr.', 'mai', 'juin', 'juil.', 'août', 'sept.', 'oct.', 'nov.', 'déc.');
    $n = (int) $n;
    return $short ? $abbr[$n] : $long[$n];
}

/** "12 mars 2026" */
function fr_date($date)
{
    $ts = strtotime((string) $date);
    if (!$ts) {
        return '';
    }
    return date('j', $ts) . ' ' . fr_month(date('n', $ts)) . ' ' . date('Y', $ts);
}

/** array('day' => '12', 'month' => 'mars', 'year' => '2026') for date badges. */
function date_parts($date)
{
    $ts = strtotime((string) $date);
    if (!$ts) {
        return array('day' => '—', 'month' => '', 'year' => '');
    }
    return array('day' => date('d', $ts), 'month' => fr_month(date('n', $ts), true), 'year' => date('Y', $ts));
}

/* ------------------------------------------------------------------ */
/* Images                                                              */
/* ------------------------------------------------------------------ */

function site_root()
{
    return dirname(__DIR__);
}

function url_path($path)
{
    return implode('/', array_map('rawurlencode', explode('/', $path)));
}

/**
 * Image stored by the admin in /uploads (news, events, programs, gallery).
 * The column holds either "file.jpg" or "uploads/file.jpg".
 */
function upload_url($file, $fallback = 'images/church.jpeg')
{
    $file = trim((string) $file);
    if ($file === '') {
        return $fallback;
    }
    $file = preg_replace('#^/?uploads/#', '', $file);
    if (is_file(site_root() . '/uploads/' . $file)) {
        return 'uploads/' . url_path($file);
    }
    if (is_file(site_root() . '/Admin/uploads/' . $file)) {
        return 'Admin/uploads/' . url_path($file);
    }
    return $fallback;
}

/** Media centre file path ("uploads/…") or external URL. */
function media_url($path)
{
    $path = trim((string) $path);
    if ($path === '') {
        return '';
    }
    if (preg_match('#^https?://#i', $path)) {
        return $path;
    }
    return url_path(ltrim($path, '/'));
}

/** Pull a safe Google Maps embed URL out of an iframe snippet or URL. */
function map_embed_url($value)
{
    $value = trim((string) $value);
    if ($value === '') {
        return '';
    }
    if (preg_match('/src=["\']([^"\']+)["\']/i', $value, $m)) {
        $value = html_entity_decode($m[1], ENT_QUOTES, 'UTF-8');
    }
    if (preg_match('#^https://(www\.)?google\.[a-z.]+/maps/embed\?#i', $value)) {
        return $value;
    }
    return '';
}

/* ------------------------------------------------------------------ */
/* Site settings (from the admin "settings" table, with defaults)      */
/* ------------------------------------------------------------------ */

function site_settings()
{
    static $settings = null;
    if ($settings !== null) {
        return $settings;
    }
    $defaults = array(
        'site_name'        => "Vicariat Apostolique de l'Archipel des Comores",
        'site_description' => "Église catholique dans l'archipel des Comores — actualités, paroisses, programmes, événements et actions pastorales.",
        'phone'            => '(+262) 269 61 11 53',
        'email'            => 'mission-catholique@orange.fr',
        'address'          => 'Moroni, Union des Comores',
        'facebook'         => '',
        'instagram'        => '',
        'youtube'          => '',
    );
    $row = db_one('SELECT * FROM settings ORDER BY id DESC LIMIT 1');
    $settings = $defaults;
    if ($row) {
        foreach ($defaults as $key => $default) {
            if (isset($row[$key]) && trim((string) $row[$key]) !== '') {
                $settings[$key] = trim((string) $row[$key]);
            }
        }
    }
    return $settings;
}

function setting($key)
{
    $s = site_settings();
    return isset($s[$key]) ? $s[$key] : '';
}

/** Read an integer id from the query string. */
function get_id($key = 'id')
{
    return isset($_GET[$key]) ? max(0, (int) $_GET[$key]) : 0;
}

function redirect($url)
{
    header('Location: ' . $url);
    exit();
}
