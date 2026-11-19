<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../includes/config.php';




    if(!isset($_GET['id'])){
    die("No Parish ID Found");
}

$id = (int) $_GET['id'];



$sql = "SELECT * FROM parishe WHERE id=?";

$stmt = mysqli_prepare($conn,$sql);

mysqli_stmt_bind_param($stmt,"i",$id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);


if(mysqli_num_rows($result)==0){

    die("Parish Not Found");

}


$parish = mysqli_fetch_assoc($result);





if(isset($_POST['update'])){


    $name = $_POST['name'];
    $slug = $_POST['slug'];

    $history = $_POST['history'];
    $parish_life = $_POST['parish_life'];
    $council = $_POST['council'];
    $commissions = $_POST['commissions'];
    $groups_movements = $_POST['groups_movements'];
    $organisation = $_POST['organisation'];


    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $website = $_POST['website'];


    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $youtube = $_POST['youtube'];

    $map = $_POST['map'];


// IMAGE SETTINGS

$uploadDir = __DIR__ . "/uploads/";

if(!is_dir($uploadDir)){
    mkdir($uploadDir,0755,true);
}


// KEEP EXISTING IMAGES
$logoPath = $parish['logo'];
$heroPath = $parish['hero_image'];



// LOGO UPDATE

if(isset($_FILES['logo']) && $_FILES['logo']['error'] === 0){


    $logoName = time().'_'.basename($_FILES['logo']['name']);


    if(move_uploaded_file(
        $_FILES['logo']['tmp_name'],
        $uploadDir.$logoName
    )){

        $logoPath = "uploads/".$logoName;

    }

}




// HERO UPDATE

if(isset($_FILES['hero_image']) && $_FILES['hero_image']['error'] === 0){


    $heroName = time().'_'.basename($_FILES['hero_image']['name']);


    if(move_uploaded_file(
        $_FILES['hero_image']['tmp_name'],
        $uploadDir.$heroName
    )){

        $heroPath = "uploads/".$heroName;

    }

}



    $update = "

    UPDATE parishe SET

    name=?,
    slug=?,
    logo=?,
    hero_image=?,

    history=?,
    parish_life=?,
    council=?,
    commissions=?,
    groups_movements=?,
    organisation=?,

    address=?,
    phone=?,
    email=?,
    website=?,

    facebook=?,
    instagram=?,
    youtube=?,

    map=?

    WHERE id=?

    ";


    $stmt = mysqli_prepare($conn,$update);



    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssssssssssssi",

        $name,
        $slug,
        $logoPath,
        $heroPath,

        $history,
        $parish_life,
        $council,
        $commissions,
        $groups_movements,
        $organisation,

        $address,
        $phone,
        $email,
        $website,

        $facebook,
        $instagram,
        $youtube,

        $map,

        $id
    );



    if(mysqli_stmt_execute($stmt)){


        header("Location:newparish-list.php?msg=updated");
        exit();


    }else{


        echo "Update Failed: ".mysqli_stmt_error($stmt);

    }


}

?>





<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="Admin_Css/admin-layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>


    <div class="admin-container">

        <!-- SIDEBAR -->
        <div class="sidebar">
            <h2>Vicariat Apostolique des l'archipel des Comores</h2>

            <a href="../Admin/Dashboard.php"><i class="fa fa-home"></i> Dashboard</a>
            <a href="../Admin/newparish-list.php"><i class="fa fa-home"></i> Redesign Parishes</a>
            <a href="../Admin/news-list.php"><i class="fa fa-newspaper"></i> News</a>
            <a href="../Admin/events-list.php"><i class="fa fa-calendar"></i> Events</a>
            <a href="../Admin/parish_list.php"><i class="fa fa-church"></i> Parishes</a>
            <a href="../Admin/program-list.php"><i class="fa-solid fa-arrow-trend-up"></i> Programs</a>
            <a href="../Admin/messages.php"><i class="fa fa-envelope"></i> Messages</a>
            <a href="../Admin/garelly.php"><i class="fa fa-image"></i> Gallery</a>
            <a href="../Admin/donation.php"> <i class="fa-solid fa-hand-holding-heart"></i> Donations</a>

            <a href="../Admin/mediacenter.php"> <i class="fa-solid fa-hand-holding-heart"></i> Media Center</a>

            <a href="../Admin/members-list.php"> <i class="fa-solid fa-hand-holding-heart"></i> Membership</a>

            <a href="../Admin/users.php"> <i class="fa-solid fa-hand-holding-heart"></i> Users</a>

            <a href="../Admin/settings.php"> <i class="fa-solid fa-hand-holding-heart"></i> Settings</a>


            <a href="../Admin/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
        </div>


         <div class="main">

         <div class="topbar">
                <h1> Edit/Update Parishes Page</h1>
            </div>


  <div class="form-container">

  <form method="POST" enctype="multipart/form-data" action="">
  <!-- Hidden ID -->
  <input type="hidden" name="id" value="<?php echo htmlspecialchars($parish['id']); ?>">

  <h2>General Information</h2>
  <div class="section">
    <label for="name">Parish Name</label>
    <input type="text" id="parishName" name="name" value="<?php echo htmlspecialchars($parish['name']); ?>">

    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug" value="<?php echo htmlspecialchars($parish['slug']); ?>">

    <label for="logo">Logo</label>
    <input type="file" id="logo" name="logo">
    
    <?php if (!empty($parish['logo'])): ?>

<p>Current Logo:</p>

<img 
src="uploads/<?php echo basename($parish['logo']); ?>" 
width="100">
<?php endif; ?>

    <label for="heroImage">Hero Image</label>
    <input type="file" id="heroImage" name="hero_image">
    
    <?php if (!empty($parish['hero_image'])): ?>

<p>Current Hero Image:</p>

<img 
src="uploads/<?php echo basename($parish['hero_image']); ?>" 
width="150">
<?php endif; ?>
  </div>

  <h2>History</h2>
  <div class="section">
    <textarea name="history"><?php echo htmlspecialchars($parish['history']); ?></textarea>
  </div>

  <h2>Parish Life</h2>
  <div class="section">
    <textarea name="parish_life"><?php echo htmlspecialchars($parish['parish_life']); ?></textarea>
  </div>

  <h2>Parish Council</h2>
  <div class="section">
    <textarea name="council"><?php echo htmlspecialchars($parish['council']); ?></textarea>
  </div>

  <h2>Commissions</h2>
  <div class="section">
    <textarea name="commissions"><?php echo htmlspecialchars($parish['commissions']); ?></textarea>
  </div>

  <h2>Groups & Movements</h2>
  <div class="section">
    <textarea name="groups_movements"><?php echo htmlspecialchars($parish['groups_movements']); ?></textarea>
  </div>

  <h2>Organisation</h2>
  <div class="section">
    <textarea name="organisation"><?php echo htmlspecialchars($parish['organisation']); ?></textarea>
  </div>

  <h2>Contact</h2>
  <div class="section">
    <label for="address">Address</label>
    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($parish['address']); ?>">

    <label for="phone">Phone</label>
    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($parish['phone']); ?>">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($parish['email']); ?>">

    <label for="website">Website</label>
    <input type="url" id="website" name="website" value="<?php echo htmlspecialchars($parish['website']); ?>">
  </div>

  <h2>Social Media</h2>
  <div class="section">
    <label for="facebook">Facebook</label>
    <input type="url" id="facebook" name="facebook" value="<?php echo htmlspecialchars($parish['facebook']); ?>">

    <label for="instagram">Instagram</label>
    <input type="url" id="instagram" name="instagram" value="<?php echo htmlspecialchars($parish['instagram']); ?>">

    <label for="youtube">YouTube</label>
    <input type="url" id="youtube" name="youtube" value="<?php echo htmlspecialchars($parish['youtube']); ?>">
  </div>

  <h2>Google Map</h2>
  <div class="section">
    <textarea name="map"><?php echo htmlspecialchars($parish['map']); ?></textarea>
  </div>

  <button  name="update" type="submit">Update Parish</button>
</form>

     </div>

    </div>
</div>


<?php

include_once __DIR__.'/include/footer.php';

?>
</body>

</html>