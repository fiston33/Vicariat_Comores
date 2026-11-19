<?php
require_once __DIR__ . '/includes/ui.php';

$errors = array();
$values = array(
    'name'    => '',
    'email'   => '',
    'subject' => isset($_GET['subject']) ? mb_substr(trim((string) $_GET['subject']), 0, 200, 'UTF-8') : '',
    'message' => '',
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $v) {
        $values[$key] = isset($_POST[$key]) ? trim((string) $_POST[$key]) : '';
    }
    if ($values['subject'] === '') {
        $values['subject'] = 'Message depuis le site';
    }

    // Honeypot: real visitors never fill this hidden field.
    $is_bot = !empty($_POST['website']);

    if ($values['name'] === '') { $errors[] = 'Merci d\'indiquer votre nom.'; }
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) { $errors[] = 'Merci d\'indiquer une adresse email valide.'; }
    if (mb_strlen($values['message'], 'UTF-8') < 5) { $errors[] = 'Votre message est trop court.'; }

    if (!$errors) {
        if (!$is_bot) {
            $ok = db_exec(
                "INSERT INTO messages (name, email, subject, message, status) VALUES (?, ?, ?, ?, 'unread')",
                array(
                    mb_substr($values['name'], 0, 100, 'UTF-8'),
                    mb_substr($values['email'], 0, 100, 'UTF-8'),
                    mb_substr($values['subject'], 0, 255, 'UTF-8'),
                    $values['message'],
                )
            );
            if (!$ok) {
                $errors[] = "Votre message n'a pas pu être envoyé. Merci de réessayer ou de nous écrire par email.";
            }
        }
        if (!$errors) {
            redirect('contact.php?sent=1#formulaire');
        }
    }
}

$sent = isset($_GET['sent']);

$active = 'contact';
$page_title = 'Contact';
$page_description = "Contactez le Vicariat Apostolique de l'Archipel des Comores.";

include __DIR__ . '/includes/header.php';

page_hero(array(
    'title'   => 'Contactez-nous',
    'eyebrow' => 'Nous sommes à votre écoute',
    'lead'    => 'Une question, une demande de sacrement, une intention de prière ou une proposition d\'aide ? Écrivez-nous.',
    'image'   => 'images/church.jpeg',
    'crumbs'  => array('Contact' => null),
));
?>

<section class="section" id="formulaire">
    <div class="wrap contact-grid">
        <div class="contact-card">
            <p class="eyebrow">Coordonnées</p>
            <h2>Le Vicariat</h2>
            <p>Nous répondons généralement sous quelques jours ouvrés.</p>
            <ul class="info-list mt-2">
                <li><span class="ico"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span><div><small>Adresse</small><strong><?= e(setting('address')) ?></strong></div></li>
                <li><span class="ico"><i class="fa-solid fa-phone" aria-hidden="true"></i></span><div><small>Téléphone</small><strong><a href="tel:<?= e(preg_replace('/[^0-9+]/', '', setting('phone'))) ?>"><?= e(setting('phone')) ?></a></strong></div></li>
                <li><span class="ico"><i class="fa-regular fa-envelope" aria-hidden="true"></i></span><div><small>Email</small><strong><a href="mailto:<?= e(setting('email')) ?>"><?= e(setting('email')) ?></a></strong></div></li>
            </ul>
            <?php $socials = social_links(); if ($socials): ?>
                <div class="social-row">
                    <?php foreach ($socials as $s): ?><a href="<?= e($s[0]) ?>" target="_blank" rel="noopener" aria-label="<?= e($s[2]) ?>"><i class="<?= e($s[1]) ?>" aria-hidden="true"></i></a><?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="panel">
            <?php if ($sent): ?>
                <div class="thanks">
                    <div class="feature-icon"><i class="fa-solid fa-check" aria-hidden="true"></i></div>
                    <h2>Merci, votre message a bien été envoyé</h2>
                    <p class="muted">Nous vous répondrons dès que possible à l'adresse indiquée.</p>
                    <a class="btn btn-outline mt-2" href="index.php">Retour à l'accueil</a>
                </div>
            <?php else: ?>
                <h2>Envoyer un message</h2>
                <?php if ($errors): ?>
                    <div class="alert alert-error" role="alert"><i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i><div><?php foreach ($errors as $err): ?><div><?= e($err) ?></div><?php endforeach; ?></div></div>
                <?php endif; ?>
                <form method="post" action="contact.php#formulaire" novalidate>
                    <div class="form-grid mt-2">
                        <div class="field"><label for="cName">Nom complet</label><input class="input" id="cName" name="name" value="<?= e($values['name']) ?>" autocomplete="name" required></div>
                        <div class="field"><label for="cEmail">Email</label><input class="input" id="cEmail" type="email" name="email" value="<?= e($values['email']) ?>" autocomplete="email" required></div>
                        <div class="field full"><label for="cSubject">Sujet</label><input class="input" id="cSubject" name="subject" value="<?= e($values['subject']) ?>" required></div>
                        <div class="field full"><label for="cMessage">Message</label><textarea class="input" id="cMessage" name="message" rows="6" required><?= e($values['message']) ?></textarea></div>
                        <div class="sr-only" aria-hidden="true"><label for="cWebsite">Ne pas remplir</label><input id="cWebsite" name="website" tabindex="-1" autocomplete="off"></div>
                        <div class="full"><button class="btn btn-primary" type="submit" name="send">Envoyer le message <i class="fa-solid fa-paper-plane" aria-hidden="true"></i></button></div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section-tight" style="padding-top:0;">
    <div class="wrap">
        <div class="map-frame">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d999446.5546290635!2d42.6318604416149!3d-11.898953328132857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1898e3036408a48d%3A0xf70a7fbee4dfd4db!2sComoros!5e0!3m2!1sen!2sus!4v1780931087695!5m2!1sen!2sus" title="Carte de l'archipel des Comores" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen style="min-height:420px;"></iframe>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
