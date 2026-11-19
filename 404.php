<?php
require_once __DIR__ . '/includes/ui.php';

if (!headers_sent()) {
    http_response_code(404);
}
$active = '';
$page_title = 'Page introuvable';

include __DIR__ . '/includes/header.php';
?>

<section class="error-page">
    <div class="wrap-narrow">
        <div class="error-code">4<span>0</span>4</div>
        <h1 style="font-size: clamp(1.8rem, 4vw, 2.6rem);">Page introuvable</h1>
        <p class="lead" style="margin-inline:auto;">Désolé, la page que vous recherchez n'existe pas ou a été déplacée.</p>
        <div style="max-width:560px; margin:2rem auto 0;"><?php search_bar('', 'on-light'); ?></div>
        <div class="btn-row" style="justify-content:center; margin-top:2rem;">
            <a class="btn btn-primary" href="index.php">Retour à l'accueil</a>
            <a class="btn btn-outline" href="contact.php">Nous contacter</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
