<?php
session_start();
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth-layout.php';

// Already signed in
if (isset($_SESSION['user_id'], $_SESSION['role'])) {
    redirect(in_array($_SESSION['role'], array('admin', 'editor'), true) ? 'Admin/Dashboard.php' : 'index.php');
}

$message = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim((string) $_POST['email']) : '';
    $password = isset($_POST['password']) ? (string) $_POST['password'] : '';

    $user = $email !== '' ? db_one('SELECT * FROM users WHERE email = ? LIMIT 1', array($email)) : null;

    if ($user && password_verify($password, $user['password'])) {
        if ($user['status'] !== 'active') {
            $message = "Votre compte est désactivé. Contactez un administrateur.";
        } else {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            redirect(in_array($user['role'], array('admin', 'editor'), true) ? 'Admin/Dashboard.php' : 'index.php');
        }
    } else {
        $message = 'Email ou mot de passe incorrect.';
    }
}

auth_open('Connexion');
?>
            <p class="eyebrow">Espace membres</p>
            <h1>Connexion</h1>
            <p class="muted">Accédez à votre tableau de bord.</p>

            <?php if (isset($_GET['registered'])): ?>
                <div class="alert alert-success" role="status"><i class="fa-solid fa-circle-check" aria-hidden="true"></i><div>Votre compte a été créé. Vous pouvez maintenant vous connecter.</div></div>
            <?php endif; ?>
            <?php if ($message !== ''): ?>
                <div class="alert alert-error" role="alert"><i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i><div><?= e($message) ?></div></div>
            <?php endif; ?>

            <form class="form-stack" method="post" action="login.php">
                <div class="field">
                    <label for="email">Email</label>
                    <input class="input" id="email" type="email" name="email" value="<?= e($email) ?>" autocomplete="email" required autofocus>
                </div>
                <?php password_input('password', 'password', 'Mot de passe', 'current-password'); ?>
                <button class="btn btn-primary btn-block" type="submit" name="login">Se connecter</button>
            </form>

            <p class="auth-foot">Pas encore de compte ? <a href="register.php">Créer un compte</a><br>
            <small>Mot de passe oublié ? Contactez l'administrateur du site.</small></p>
<?php auth_close(); ?>
