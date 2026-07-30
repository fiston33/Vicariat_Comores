<?php

include_once __DIR__.'/include/header.php';

$id = (int) $_GET['id'];

$sql = "SELECT * FROM donations WHERE id=$id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $status = $_POST['status'];

    $sql = "UPDATE donations SET
            status='$status'
            WHERE id=$id";

    mysqli_query($conn,$sql);

    header("Location: donation.php");
    exit;
}

?>

<div class="main">

    <div class="topbar">
        <h1>Update Donation Status</h1>
    </div>

    <div class="form-container">

        <form method="POST">

            <label>Status</label>

            <select name="status">

                <option value="pending"
                <?= $row['status']=='pending'?'selected':'' ?>>
                Pending
                </option>

                <option value="confirmed"
                <?= $row['status']=='confirmed'?'selected':'' ?>>
                Confirmed
                </option>

                <option value="cancelled"
                <?= $row['status']=='cancelled'?'selected':'' ?>>
                Cancelled
                </option>

            </select>

            <button type="submit" name="update">
                Update
            </button>

        </form>

    </div>

</div>

</div>

<?php include_once __DIR__.'/include/footer.php'; ?>

    </div>
</body>
</html>