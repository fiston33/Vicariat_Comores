<?php

session_start();

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "vicariat_comores";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}


if(isset($_POST['save'])){

// Collect POST data
$name          = $_POST['name'] ?? '';
$slug          = $_POST['slug'] ?? '';
$history       = $_POST['history'] ?? '';
$parish_life   = $_POST['parish_life'] ?? '';
$council       = $_POST['council'] ?? '';
$commissions   = $_POST['commissions'] ?? '';
$groups        = $_POST['groups_movements'] ?? '';
$organisation  = $_POST['organisation'] ?? '';
$address       = $_POST['address'] ?? '';
$phone         = $_POST['phone'] ?? '';
$email         = $_POST['email'] ?? '';
$website       = $_POST['website'] ?? '';
$facebook      = $_POST['facebook'] ?? '';
$instagram     = $_POST['instagram'] ?? '';
$youtube       = $_POST['youtube'] ?? '';
$map           = $_POST['map'] ?? '';

// Handle file uploads (logo & hero image)
$logoPath = "";
$heroPath = "";

if (!empty($_FILES['logo']['name'])) {
    $logoPath = "../uploads/"  . basename($_FILES['logo']['name']);
    move_uploaded_file($_FILES['logo']['tmp_name'], $logoPath);
}

if (!empty($_FILES['hero_image']['name'])) {
    $heroPath =  "../uploads/"  . basename($_FILES['hero_image']['name']);
    move_uploaded_file($_FILES['hero_image']['tmp_name'], $heroPath);
}

// Prepare SQL insert
$sql = "INSERT INTO parishe
    (name, slug, logo, hero_image, history, parish_life, council, commissions, groups_movements, organisation, address, phone, email, website, facebook, instagram, youtube, map) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters correctly
$stmt->bind_param(
    "ssssssssssssssssss",
    $name, $slug, $logoPath, $heroPath, $history, $parish_life, $council, $commissions, $groups, $organisation, $address, $phone, $email, $website, $facebook, $instagram, $youtube, $map
);

if ($stmt->execute()) {
    // echo "<div style='padding:10px; background:#d4edda; color:#155724; border:1px solid #c3e6cb; border-radius:5px;'>
    //         Parish added successfully!
    //       </div>";

           header("Location: newparish-list.php");
    exit();
} else {
    echo "<div style='padding:10px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; border-radius:5px;'>
            Error: " . htmlspecialchars($stmt->error) . "
          </div>";
}


$stmt->close();
$conn->close();

}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="Admin_Css/adminbig.css">
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
                <h1> Add Media Center</h1>
            </div>


  <div class="form-container">
    <form method="POST" enctype="multipart/form-data">

      <h2>General Information</h2>
      <div class="section">
        <label for="name">Parish Name</label>
        <input type="text" id="parishName" name="name">

        <label for="slug">Slug</label>
        <input type="text" id="slug" name="slug">

        <label for="logo">Logo</label>
        <input type="file" id="logo" name="logo">

        <label for="heroImage">Hero Image</label>
        <input type="file" id="heroImage" name="hero_image">
      </div>

      <h2>History</h2>
      <div class="section">
        <textarea name="history"></textarea>
      </div>

      <h2>Parish Life</h2>
      <div class="section">
        <textarea name="parish_life"></textarea>
      </div>

      <h2>Parish Council</h2>
      <div class="section">
        <textarea name="council"></textarea>
      </div>

      <h2>Commissions</h2>
      <div class="section">
        <textarea name="commissions"></textarea>
      </div>

      <h2>Groups & Movements</h2>
      <div class="section">
        <textarea name="groups_movements"></textarea>
      </div>

      <h2>Organisation</h2>
      <div class="section">
        <textarea name="organisation"></textarea>
      </div>

      <h2>Contact</h2>
      <div class="section">
        <label for="address">Address</label>
        <input type="text" id="address" name="address">

        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone">

        <label for="email">Email</label>
        <input type="email" id="email" name="email">

        <label for="website">Website</label>
        <input type="url" id="website" name="website">
      </div>

      <h2>Social Media</h2>
      <div class="section">
        <label for="facebook">Facebook</label>
        <input type="url" id="facebook" name="facebook">

        <label for="instagram">Instagram</label>
        <input type="url" id="instagram" name="instagram">

        <label for="youtube">YouTube</label>
        <input type="url" id="youtube" name="youtube">
      </div>

      <h2>Google Map</h2>
      <div class="section">
        <textarea name="map"></textarea>
      </div>

      <button name="save" type="submit">Add Parish</button>
    </form>
     </div>

    </div>
</div>


<?php

include_once __DIR__.'/include/footer.php';

?>
</body>

</html>