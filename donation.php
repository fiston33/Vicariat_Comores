<?php
include_once (__DIR__. '../includes/header.php');

if(isset($_POST['donate'])){

$fullname = mysqli_real_escape_string( $conn, $_POST['fullname']);

$email = mysqli_real_escape_string( $conn, $_POST['email']);

$phone = mysqli_real_escape_string( $conn, $_POST['phone']);

$amount = mysqli_real_escape_string( $conn, $_POST['amount']);

$method = mysqli_real_escape_string( $conn, $_POST['payment_method']);

$sql = "INSERT INTO donations
(fullname,email,phone,amount,payment_method)

VALUES
(
'$fullname','$email','$phone','$amount','$method')";

mysqli_query($conn,$sql);

header("Location: donation.php?success=1");
exit();

}
?>

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
<div class="confirmation-box">
    <h2><i class="fa-solid fa-person-praying"></i> Merci pour votre don !</h2>
    <p style="text-align:center;">Votre soutien aide à développer la mission et les communautés chrétiennes.</p>
</div>

<script>
setTimeout(() => {
    window.location.href = "donation.php"; 
}, 5000);
</script>
<?php endif; ?>




        <div class="donation-container">

            <!-- HERO SECTION -->
            <div class="donation-hero">

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


                <h1>Faire un Don</h1>
                <p style="text-align: center; color: white;">Votre soutien aide à développer la mission, la charité et les communautés chrétiennes.</p>

            </div>

            <!-- DONATION BOX -->
            <div class="donation-box">
<div class="donation-options">
    <h2>Choisissez un montant</h2>

    <div class="amounts">
        <button class="amount-btn" data-amount="5000">€ 50</button>
        <button class="amount-btn" data-amount="10000">€ 100</button>
        <button class="amount-btn" data-amount="20000">€ 2,000</button>
        <button class="amount-btn" data-amount="50000">€ 5,000</button>
    </div>

    <h3>Ou entrer un montant personnalisé</h3>
    <input type="number" id="customAmount" placeholder="Montant en €">

    <!-- Hidden field to store selected amount -->
    <input type="hidden" id="selectedAmount" name="amount">
</div>


                <div class="donation-form">

                    <h2>Vos informations</h2>

                    <form method="POST">
                   


            

    <input type="text" name="fullname" placeholder="Nom complet" required>

    <input  type="email" name="email" placeholder="Email">

    <input type="text" name="phone" placeholder="Téléphone">

    <select name="payment_method">

        <option value="">
            Choisir méthode de paiement
        </option>

        <option>
            MTN Mobile Money
        </option>

        <option>
            Airtel Money
        </option>

        <option>
            Bank Transfer
        </option>

    </select>

    <button type="submit" name="donate">
        Donner maintenant
    </button>

</form>

                </div>

            </div>

        </div>




   <?php
include_once (__DIR__. '../includes/footer.php');
?>     


    </div>
</body>


<script>



const buttons = document.querySelectorAll('.amount-btn');
const hiddenAmount = document.getElementById('selectedAmount');
const customAmount = document.getElementById('customAmount');

buttons.forEach(btn => {
    btn.addEventListener('click', () => {
        hiddenAmount.value = btn.dataset.amount;
        customAmount.value = '';
    });
});

customAmount.addEventListener('input', () => {
    hiddenAmount.value = customAmount.value;
});

</script>
</html>