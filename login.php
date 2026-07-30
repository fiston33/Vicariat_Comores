<?php

session_start();
require_once 'includes/config.php';

$message = '';

if(isset($_POST['login']))
{
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password']))
        {
            // Check account status
            if($user['status'] != 'active')
            {
                $message = "Your account is inactive.";
            }
            else
            {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                if($user['role'] == 'admin')
                {
                    header("Location: Admin/Dashboard.php");
                    exit();
                }
                elseif($user['role'] == 'editor')
                {
                    header("Location: Admin/Dashboard.php");
                    exit();
                }
                else
                {
                    header("Location: index.php");
                    exit();
                }
            }
        }
        else
        {
            $message = "Invalid Email or Password";
        }
    }
    else
    {
        $message = "Invalid Email or Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/eminema.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Vicariat de l'archipel des Comores</title>

    <style>
        .alert.error{
    background: #ffebee;
    color: #c62828;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    text-align: center;
}
    </style>
</head>
<body>
    <div class="login-container">
    <div class="login-box">



        <h2>Connexion</h2>
        <p>Accédez à votre tableau de bord</p>

        <?php if(!empty($message)) : ?>
    <div class="alert error">
        <?= $message ?>
    </div>
<?php endif; ?>

        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter email" required>

            <label>Mot de passe</label>
            <input type="password" name="password" placeholder="Enter password" required>

            <button type="submit" name="login">Se connecter</button>

            <div class="login-links">
                <a href="#">Mot de passe oublié ?</a> <br> <br>
                 <a href="register.php">Or Don't Have an Account Register</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>