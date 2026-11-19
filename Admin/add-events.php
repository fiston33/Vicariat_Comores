<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';

if(isset($_POST['save'])){


$parish_id = !empty($_POST['parish_id'])
    ? (int)$_POST['parish_id']
    : null;

    $title = $_POSt['title'];
    $event_date = $_POST['event_date'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $image = time() . "_" . $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../uploads/".$image);


    
   $title   = mysqli_real_escape_string($conn,$_POST['title']);
$event_date = mysqli_real_escape_string($conn,$_POST['event_date']);
$location = mysqli_real_escape_string($conn,$_POST['location']);
$description  = mysqli_real_escape_string($conn,$_POST['description']);

  $stmt = mysqli_prepare(
    $conn,
    $sql = "INSERT INTO events (parish_id,title, image, event_date, location, description)
            VALUES (?,?,?,?,?,?)"

  );
if(!$stmt){
    die("Prepare Failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt, "isssss", $parish_id, $title, $image, $event_date, $location, $description
);

if(mysqli_stmt_execute($stmt)){

    mysqli_stmt_close($stmt);

    header("Location: events-list.php");
    exit();

}else{

    die("Insert Failed: " . mysqli_stmt_error($stmt));

}

}

?>


    <!-- MAIN -->
    <div class="main">

        <div class="topbar">
            <h1>Add Events</h1>
        </div>

        <div class="form-container">

            <form method="POST" enctype="multipart/form-data">

                <label>Events Title</label>
                <input type="text" name="title" placeholder="Enter title">

                       <label>Parish</label>

<select name="parish_id">

<option value="">Vicariat General</option>

<?php

$parishes=mysqli_query($conn,"SELECT * FROM parishe ORDER BY name ASC");

while($p=mysqli_fetch_assoc($parishes)){

?>

<option value="<?= $p['id'] ?>">

<?= $p['name'] ?>

</option>

<?php } ?>

</select>

                <label>Events Description</label>
                <textarea name="description" placeholder="Write Eventes Description..."></textarea>


                <label>Events Date</label>
                <input name="event_date" type="date">

                <label>Location</label>
                <input type="text" name="location" placeholder="7 Rue de l'Hôpital, 97600 Mamoudzou, Mayotte">


                 <label>Events Image</label>
                <input name="image" type="file">


                <button type="submit" name="save">Publish Events</button>

            </form>

        </div>

    </div>

</div>

<?php
include_once __DIR__.'/include/footer.php';
?>

</body>
</html>