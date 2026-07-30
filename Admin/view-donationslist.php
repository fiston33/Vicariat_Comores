<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';


$id = (int) $_GET['id'];

$sql = "SELECT * FROM donations WHERE id=$id";
$result = mysqli_query($conn,$sql);

$donation = mysqli_fetch_assoc($result);

if(!$donation){
    die("Donation not found");
}

?>

<div class="main">

    <div class="topbar">
        <h1>Donation Details</h1>
    </div>

    <div class="messages-summary">

        <div class="summary-card">

        <h2><?= $donation['fullname']; ?></h2>

        <p><b>Email:</b> <?= $donation['email']; ?></p>
        <p><b>Phone:</b> <?= $donation['phone']; ?></p>
        <p><b>Amount:</b> <?= number_format($donation['amount']); ?> RWF</p>
        <p><b>Method:</b> <?= $donation['payment_method']; ?></p>
        <p><b>Status:</b> <?= $donation['status']; ?></p>
        <p><b>Date:</b> <?= $donation['created_at']; ?></p>


          </div>

            

            

       



        <div class="back-gallery">

    <a href="donation.php">
        ← Retour à la donation
    </a>

</div>

<style>
    .back-gallery{
    width:90%;
    margin:20px auto;
}

.back-gallery a{
    text-decoration:none;
    font-weight:600;
}
</style>


    </div>

</div>

 </div>

     <?php
   include __DIR__. '../include/footer.php';
   ?>

</body>

</html>