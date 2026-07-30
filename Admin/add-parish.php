<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';


if(isset($_POST['save'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $location = mysqli_real_escape_string($conn,$_POST['location']);
    $priest = mysqli_real_escape_string($conn,$_POST['priest']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $mass_schedule = mysqli_real_escape_string($conn,$_POST['mass_schedule']);

       // image upload
  $image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

$uploadDir = "../uploads/";

// create folder if not exists
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$targetFile = $uploadDir . basename($image);

// check if file moved
if (move_uploaded_file($tmp, $targetFile)) {
    echo "Upload success";
} else {
    echo "Upload failed";
    die();
}

    $sql = "INSERT INTO parishes
    (name,image,description,location,priest,phone,email,mass_schedule)

    VALUES
    ('$name','$image','$description','$location',
    '$priest','$phone','$email','$mass_schedule')";

    mysqli_query($conn,$sql);

    header("Location: parish_list.php");
    exit();
}
?>



    <!-- MAIN -->
    <div class="main">

        <div class="topbar">
            <h1>Add Parish</h1>
        </div>

        <div class="form-container">

           <form method="POST" enctype="multipart/form-data">

                <label>Parish Name</label>
                <input type="text" name="name" placeholder="Enter parish name">

                 <label>Parish Image</label>
                <input name="image" type="file">

                <label>Description</label>
                <textarea name="description" placeholder="Enter description..."></textarea>

                <label>Location</label>
                <input type="text" name="location" placeholder="7 Rue de l'Hôpital, 97600 Mamoudzou, Mayotte">

                <label>Priest</label>
                <input type="text" name="priest" placeholder="Enter parish's Priest">


                <label>Telephone</label>
                <input type="text" name="phone" placeholder="Enter phone Number">

                <label>Email</label>
                <input type="text" name="email" placeholder="Enter phone Number">

                <label>Mass Schedule</label>
                <textarea name="mass_schedule" placeholder="Enter description..."></textarea>

                


                <button type="submit" name="save">Launch Parish</button>

            </form>

        </div>

    </div>

</div>

<?php
include_once __DIR__.'/include/footer.php';
?>

</body>
</html>