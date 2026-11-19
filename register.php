<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth-layout.php';

$errors = array();
$values = array('fullname' => '', 'email' => '', 'phone' => '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $v) {
        $values[$key] = isset($_POST[$key]) ? trim((string) $_POST[$key]) : '';
    }
    $password = isset($_POST['password']) ? (string) $_POST['password'] : '';
    $confirm = isset($_POST['confirm_password']) ? (string) $_POST['confirm_password'] : '';

    if ($values['fullname'] === '') { $errors[] = 'Merci d\'indiquer votre nom complet.'; }
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) { $errors[] = 'L\'adresse email n\'est pas valide.'; }
    if ($values['phone'] === '') { $errors[] = 'Merci d\'indiquer un numéro de téléphone.'; }
    if (strlen($password) < 8) { $errors[] = 'Le mot de passe doit contenir au moins 8 caractères.'; }
    if ($password !== $confirm) { $errors[] = 'Les mots de passe ne correspondent pas.'; }

    if (!$errors && db_one('SELECT id FROM users WHERE email = ?', array($values['email']))) {
        $errors[] = 'Un compte existe déjà avec cette adresse email.';
    }

    if (!$errors) {
        $ok = db_exec(
            "INSERT INTO users (fullname, email, phone, password, role, profile_image, status) VALUES (?, ?, ?, ?, 'user', '', 'active')",
            array(
                mb_substr($values['fullname'], 0, 100, 'UTF-8'),
                mb_substr($values['email'], 0, 100, 'UTF-8'),
                mb_substr($values['phone'], 0, 100, 'UTF-8'),
                password_hash($password, PASSWORD_DEFAULT),
            )
        );
        if ($ok) {
            redirect('login.php?registered=1');
        }
        $errors[] = 'Une erreur est survenue. Merci de réessayer.';
    }
}

auth_open('Créer un compte');
?>
            <p class="eyebrow">Espace membres</p>
            <h1>Créer un compte</h1>
            <p class="muted">Rejoignez la communauté en ligne du Vicariat.</p>

            <?php if ($errors): ?>
                <div class="alert alert-error" role="alert"><i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i><div><?php foreach ($errors as $err): ?><div><?= e($err) ?></div><?php endforeach; ?></div></div>
            <?php endif; ?>

            <form class="form-stack" method="post" action="register.php" novalidate>
                <div class="field"><label for="fullname">Nom complet</label><input class="input" id="fullname" name="fullname" value="<?= e($values['fullname']) ?>" autocomplete="name" required></div>
                <div class="field"><label for="email">Email</label><input class="input" id="email" type="email" name="email" value="<?= e($values['email']) ?>" autocomplete="email" required></div>
                <div class="field"><label for="phone">Téléphone</label><input class="input" id="phone" type="tel" name="phone" value="<?= e($values['phone']) ?>" autocomplete="tel" required></div>
                <?php password_input('password', 'password', 'Mot de passe (8 caractères minimum)', 'new-password'); ?>
                <?php password_input('confirm_password', 'confirm', 'Confirmer le mot de passe', 'new-password'); ?>
                <button class="btn btn-primary btn-block" type="submit" name="register">Créer mon compte</button>
            </form>

            <p class="auth-foot">Déjà inscrit ? <a href="login.php">Se connecter</a></p>
<?php auth_close(); ?>
