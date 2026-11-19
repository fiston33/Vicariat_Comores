<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';


$id = (int)$_GET['id'];

$sql = "SELECT * FROM parishes WHERE id=$id";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);





if(isset($_POST['update'])){

$id = (int)$_POST['id'];

$name = mysqli_real_escape_string($conn,$_POST['name']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$location = mysqli_real_escape_string($conn,$_POST['location']);
$priest = mysqli_real_escape_string($conn,$_POST['priest']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$mass_schedule = mysqli_real_escape_string($conn,$_POST['mass_schedule']);

if(!empty($_FILES['image']['name'])){

    $image = time().'_'.$_FILES['image']['name'];

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "../uploads/".$image
    );

    $sql = "UPDATE parishes SET
        name='$name',
        image='$image',
        description='$description',
        location='$location',
        priest='$priest',
        phone='$phone',
        email='$email',
        mass_schedule='$mass_schedule'
        WHERE id=$id";

} else {

    $sql = "UPDATE parishes SET
        name='$name',
        description='$description',
        location='$location',
        priest='$priest',
        phone='$phone',
        email='$email',
        mass_schedule='$mass_schedule'
        WHERE id=$id";
}

mysqli_query($conn,$sql);

header("Location: parish_list.php");
exit();

}
?>
    <!-- MAIN -->
    <div class="main">

        <div class="topbar">
            <h1>Update/Edit Parish</h1>
        </div>

        <div class="form-container">

            <form method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $row['id']; ?>">

                <label>Parish Name</label>
                <input type="text" name="name" value="<?= $row['name']; ?>">

                 <label>Parish Image</label>
                <input name="image" type="file">


                 <label>Description</label>
                <textarea name="description"><?= $row['description']; ?></textarea>


                <label>Location</label>
                <input type="text" name="location" value="<?= $row['location']; ?>">

                <label>Priest</label>
                <input type="text" name="priest" value="<?= $row['priest']; ?>">

                <label>Telephone</label>
                <input type="text" name="phone" value="<?= $row['phone']; ?>">

                <label>Email</label>
                <input type="email" name="email" value="<?= $row['email']; ?>">

                <label>Mass Schedule</label>
                <textarea name="mass_schedule"><?= $row['mass_schedule']; ?></textarea>

                <button type="submit" name="update">Update Parish</button>

            </form>

        </div>

    </div>

</div>

<?php
include_once __DIR__.'/include/header.php';
?>

</body>
</html>