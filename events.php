<?php
require_once __DIR__ . '/includes/ui.php';

$active = 'events';
$page_title = 'Événements';
$page_description = "Agenda des célébrations, rencontres et activités du Vicariat Apostolique des Comores.";

$today = date('Y-m-d');
$upcoming = db_all("SELECT * FROM events WHERE status='published' AND event_date >= ? ORDER BY event_date ASC", array($today));
$past = db_all("SELECT * FROM events WHERE status='published' AND (event_date < ? OR event_date IS NULL) ORDER BY event_date DESC LIMIT 12", array($today));

include __DIR__ . '/includes/header.php';

page_hero(array(
    'title'   => 'Événements',
    'eyebrow' => 'Agenda',
    'lead'    => 'Célébrations, rencontres et activités dans les paroisses de l\'archipel.',
    'image'   => 'images/Godisgood.jpeg',
    'crumbs'  => array('Événements' => null),
    'search'  => true,
));
?>

<section class="section">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow">À venir</p>
                <h2>Prochains rendez-vous</h2>
            </div>
        </div>
        <?php if ($upcoming): ?>
            <div class="event-list">
                <?php foreach ($upcoming as $ev) { event_item($ev); } ?>
            </div>
        <?php else: ?>
            <?php empty_state('Aucun événement programmé', "L'agenda sera bientôt mis à jour.", 'fa-regular fa-calendar'); ?>
        <?php endif; ?>
    </div>
</section>

<?php if ($past): ?>
<section class="section section-white">
    <div class="wrap">
        <div class="section-head">
            <div>
                <p class="eyebrow">Ils ont eu lieu</p>
                <h2>Événements passés</h2>
            </div>
        </div>
        <div class="grid grid-3">
            <?php foreach ($past as $ev) { event_card($ev); } ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
