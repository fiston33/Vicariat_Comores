<?php
include_once (__DIR__. '../includes/header.php');

if(isset($_POST['send'])){

    $fullname = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $subject = mysqli_real_escape_string($conn,$_POST['subject']);
    $message = mysqli_real_escape_string($conn,$_POST['message']);

    $sql = "INSERT INTO messages
            (name,email,subject,message,status)
            VALUES
            ('$fullname','$email','$subject','$message','unread')";

    if(mysqli_query($conn,$sql)){

        header("Location: contact.php?success=1");
        exit();

    }else{

        echo "Error: ".mysqli_error($conn);

    }
}

?>
       




        <!-- CONTACT HERO -->

        <section class="contact-hero">

            <div class="hero-content">

             <section class="search-page">

                    <div class="search-box">

                        <form>

                            <input type="text" placeholder="Rechercher actualités, événements, paroisses...">

                            <button type="submit">
                                Rechercher
                            </button>

                        </form>

                    </div>

         </section>


                <h1>Contactez-Nous</h1>

                <p style="text-align: center; color: white;">
                    Nous sommes à votre écoute.
                </p>

            </div>

        </section>

        <!-- CONTACT SECTION -->

        <section class="contact-page">

            <div class="contact-container">

                <!-- LEFT -->

                <div class="contact-info">

                    <h2>Informations de Contact</h2>

                    <div class="info-item">
                        📍 Moroni, Union des Comores
                    </div>

                    <div class="info-item">
                        📞 +269 XXX XXX XXX
                    </div>

                    <div class="info-item">
                        ✉️ info@vicariat-comores.org
                    </div>

                </div>

                <!-- RIGHT -->

                <div class="contact-form">

                    <h2>Envoyer un Message</h2>

                    <?php if(isset($_GET['success'])){ ?>

<div class="success-message">
    Votre message a été envoyé avec succès.
</div>

<?php } ?>

<style>
    .success-message{
    background:#d4edda;
    color:#155724;
    padding:15px;
    margin-bottom:20px;
    border-radius:5px;
}
</style>

                    <form  method="POST">

    <input type="text" name="name" placeholder="Nom Complet" required>

    <input type="email" name="email" placeholder="Adresse Email" required>

    <input type="text" name="subject" placeholder="Sujet" required>

    <textarea name="message" placeholder="Votre Message" required></textarea>

    <button type="submit" name="send">
        Envoyer
    </button>

</form>

                </div>

            </div>

        </section>

        <!-- MAP -->

        <section class="map-section">

            <iframe src="https://www.google.com/maps/embed?pb=" loading="lazy">
            </iframe>

        </section>





         <?php
include_once (__DIR__. '../includes/footer.php');
?>  





    </div>
</body>

</html>
