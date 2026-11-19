<?php
require_once __DIR__ . '/includes/ui.php';

$presets = array(50, 100, 2000, 5000);
$methods = array('MTN Mobile Money', 'Airtel Money', 'Virement bancaire');

$errors = array();
$values = array('fullname' => '', 'email' => '', 'phone' => '', 'amount' => '', 'payment_method' => '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $v) {
        $values[$key] = isset($_POST[$key]) ? trim((string) $_POST[$key]) : '';
    }
    $amount = (float) str_replace(array(' ', ','), array('', '.'), $values['amount']);

    if ($values['fullname'] === '') { $errors[] = 'Merci d\'indiquer votre nom.'; }
    if ($amount <= 0) { $errors[] = 'Merci de choisir ou de saisir un montant.'; }
    if ($amount > 99999999) { $errors[] = 'Le montant saisi est trop élevé.'; }
    if ($values['email'] !== '' && !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) { $errors[] = 'L\'adresse email n\'est pas valide.'; }
    if (!in_array($values['payment_method'], $methods, true)) { $errors[] = 'Merci de choisir un moyen de paiement.'; }

    if (!$errors) {
        $ok = db_exec(
            'INSERT INTO donations (fullname, email, phone, amount, payment_method) VALUES (?, ?, ?, ?, ?)',
            array(
                mb_substr($values['fullname'], 0, 255, 'UTF-8'),
                $values['email'] !== '' ? mb_substr($values['email'], 0, 255, 'UTF-8') : null,
                $values['phone'] !== '' ? mb_substr($values['phone'], 0, 50, 'UTF-8') : null,
                round($amount, 2),
                $values['payment_method'],
            )
        );
        if ($ok) {
            redirect('donation.php?merci=1');
        }
        $errors[] = "Votre promesse de don n'a pas pu être enregistrée. Merci de réessayer.";
    }
}

$thanks = isset($_GET['merci']);

$active = '';
$hide_footer_cta = true;
$page_title = 'Faire un don';
$page_description = "Soutenez la mission, la charité et les communautés chrétiennes de l'archipel des Comores.";

include __DIR__ . '/includes/header.php';

page_hero(array(
    'title'   => 'Faire un don',
    'eyebrow' => 'Soutenir la mission',
    'lead'    => 'Votre soutien aide à développer la mission, la charité et les communautés chrétiennes de l\'archipel.',
    'image'   => 'images/MayGodBlessYouMa4.jpeg',
    'crumbs'  => array('Faire un don' => null),
));
?>

<section class="section">
    <div class="wrap contact-grid">
        <div class="contact-card">
            <p class="eyebrow">Pourquoi donner ?</p>
            <h2>Votre don, au service de tous</h2>
            <p>Le Vicariat vit de la générosité des fidèles et de ses amis. Chaque contribution soutient directement :</p>
            <ul class="impact-list">
                <li><span class="feature-icon"><i class="fa-solid fa-church" aria-hidden="true"></i></span><div><strong>La vie des paroisses</strong><span>Entretien des églises, liturgie et sacrements.</span></div></li>
                <li><span class="feature-icon"><i class="fa-solid fa-people-group" aria-hidden="true"></i></span><div><strong>Les jeunes et la catéchèse</strong><span>Formation chrétienne, rencontres et retraites.</span></div></li>
                <li><span class="feature-icon"><i class="fa-solid fa-hand-holding-heart" aria-hidden="true"></i></span><div><strong>Caritas et l'action sociale</strong><span>Aide aux familles et aux personnes vulnérables.</span></div></li>
            </ul>
        </div>

        <div class="panel">
            <?php if ($thanks): ?>
                <div class="thanks">
                    <div class="feature-icon"><i class="fa-solid fa-hands-praying" aria-hidden="true"></i></div>
                    <h2>Merci pour votre générosité !</h2>
                    <p class="muted">Votre promesse de don a bien été enregistrée. Notre équipe vous contactera pour finaliser le paiement. Que Dieu vous bénisse.</p>
                    <a class="btn btn-outline mt-2" href="index.php">Retour à l'accueil</a>
                </div>
            <?php else: ?>
                <h2>Votre don</h2>
                <?php if ($errors): ?>
                    <div class="alert alert-error" role="alert"><i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i><div><?php foreach ($errors as $err): ?><div><?= e($err) ?></div><?php endforeach; ?></div></div>
                <?php endif; ?>
                <form method="post" action="donation.php" novalidate>
                    <fieldset style="border:0; padding:0; margin:1.5rem 0 0;">
                        <legend class="field-label">Choisissez un montant</legend>
                        <div class="amount-grid" style="margin-top:.5rem;">
                            <?php foreach ($presets as $p): ?>
                                <label class="amount-option">
                                    <input type="radio" name="preset" value="<?= $p ?>"<?= (string) $p === $values['amount'] ? ' checked' : '' ?>>
                                    <span><?= number_format($p, 0, ',', ' ') ?> €</span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>

                    <div class="form-grid mt-2">
                        <div class="field full">
                            <label for="customAmount">Ou saisissez un montant</label>
                            <div class="input-affix"><span>€</span><input class="input" id="customAmount" name="amount" type="number" min="1" step="1" inputmode="numeric" value="<?= e($values['amount']) ?>" placeholder="Montant en euros" required></div>
                        </div>
                        <div class="field"><label for="dName">Nom complet</label><input class="input" id="dName" name="fullname" value="<?= e($values['fullname']) ?>" autocomplete="name" required></div>
                        <div class="field"><label for="dPhone">Téléphone</label><input class="input" id="dPhone" name="phone" type="tel" value="<?= e($values['phone']) ?>" autocomplete="tel"></div>
                        <div class="field"><label for="dEmail">Email</label><input class="input" id="dEmail" name="email" type="email" value="<?= e($values['email']) ?>" autocomplete="email"></div>
                        <div class="field">
                            <label for="dMethod">Moyen de paiement</label>
                            <select class="input" id="dMethod" name="payment_method" required>
                                <option value="">Choisir…</option>
                                <?php foreach ($methods as $m): ?>
                                    <option<?= $values['payment_method'] === $m ? ' selected' : '' ?>><?= e($m) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="full">
                            <button class="btn btn-gold btn-block" type="submit" name="donate"><i class="fa-solid fa-heart" aria-hidden="true"></i> Donner maintenant</button>
                            <p class="muted center" style="font-size:.85rem; margin:1rem 0 0;"><i class="fa-solid fa-lock" aria-hidden="true"></i> Aucun paiement n'est prélevé en ligne : notre équipe vous contacte pour finaliser votre don.</p>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
