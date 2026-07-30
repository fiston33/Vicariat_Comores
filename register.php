<?php

require_once 'includes/config.php';

$message = '';

if(isset($_POST['register']))
{
    $fullname = trim($_POST['fullname']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if($password != $confirm)
    {
        $message = "Passwords do not match.";
    }
    else
    {
        $check =
        mysqli_query(
            $conn,
            "SELECT id FROM users WHERE email='$email'"
        );

        if(mysqli_num_rows($check) > 0)
        {
            $message = "Email already exists.";
        }
        else
        {
            $hash =
            password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $insert = "
            INSERT INTO users(
                fullname,
                email,
                phone,
                password,
                role,
                profile_image,
                status
            )
            VALUES(
                '$fullname',
                '$email',
                '$phone',
                '$hash',
                'user',
                '',
                'active'
            )";

            if(mysqli_query($conn,$insert))
            {
                $message =
                "Registration successful. Please login.";

                header("Location: login.php");
            }
            else
            {
                $message =
                "Something went wrong.";
            }
        }
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
             <label>Full Name</label>
            <input type="text" name="fullname" placeholder="Enter fullname" required>

        
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter email" required>

            <label>Phone Number</label>
            <input type="tel" name="phone" placeholder="Phone Number" required>

            <label>Mot de passe</label>
            <input type="password" name="password" placeholder="Enter password" required>

             <label>Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm password" required>

            <button type="submit" name="register">Register</button>

            <div class="login-links">
                <a href="login.php">already Have An Account? Login</a>
            </div>
        </form>

    </div>
</div>
</body>
</html>