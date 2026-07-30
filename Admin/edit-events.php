<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';

$id = (int) $_GET['id'];

$sql = "SELECT * FROM events WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);



if(isset($_POST['update'])){

    // $id = $_POST['id'];
    // $title = $_POST['title'];
    // $event_date = $_POST['event_date'];
    // $location = $_POST['location'];
    // $description = $_POST['description'];
    // $status = $_POST['status'];
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $title   = mysqli_real_escape_string($conn,$_POST['title']);
      $parish_id = !empty($_POST['parish_id'])
    ? (int)$_POST['parish_id']
    : "NULL";
$event_date = mysqli_real_escape_string($conn,$_POST['event_date']);
$location = mysqli_real_escape_string($conn,$_POST['location']);
$description  = mysqli_real_escape_string($conn,$_POST['description']);
$status = mysqli_real_escape_string($conn,$_POST['status']);



    if($_FILES['image']['name'] != ""){

        $image = time() . "_" . $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp, "../uploads/".$image);

        $sql = "UPDATE events SET 
                parish_id=$parish_id,
                title='$title',
                image='$image',
                event_date='$event_date',
                location='$location',
                description='$description',
                status='$status'
                WHERE id=$id";
    } else {

        $sql = "UPDATE events SET 
                parish_id=$parish_id,
                title='$title',
                event_date='$event_date',
                location='$location',
                description='$description',
                status='$status'
                WHERE id=$id";
    }

    mysqli_query($conn, $sql);

    header("Location: events-list.php");
}

?>
    <!-- MAIN -->
    <div class="main">

        <div class="topbar">
            <h1>Update/Edit Events</h1>
        </div>

        <div class="form-container">

           <form method="POST" enctype="multipart/form-data">

               <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <label>Events Title</label>
                <input type="text" name="title" value="<?= $row['title'] ?>"><br>

                 <label>Parish</label>

<select name="parish_id">

    <option value="">Vicariat General</option>

    <?php

    $parishes = mysqli_query($conn,"SELECT * FROM parishe ORDER BY name ASC");

    while($p = mysqli_fetch_assoc($parishes)){

    ?>

        <option value="<?= $p['id'] ?>"
            <?= ($row['parish_id'] == $p['id']) ? 'selected' : '' ?>>

            <?= $p['name'] ?>

        </option>

    <?php } ?>

</select>

<p>Current Image</p>

<img src="../uploads/<?= $row['image'] ?>"
     width="200"
     style="border-radius:8px;">


                <label>Events Description</label>
                <textarea name="description"><?= $row['description'] ?></textarea><br>


                <label>Events Date</label>
                <input type="date" name="event_date" value="<?= $row['event_date'] ?>"><br>

                <label>Location</label>
                <input type="text" name="location" value="<?= $row['location'] ?>"><br>

                <label>Status</label>
                 <select name="status">
                   <option value="draft" <?= $row['status']=='draft'?'selected':'' ?>>Draft</option>
                   <option value="published" <?= $row['status']=='published'?'selected':'' ?>>Published</option>
                </select>


                 <label>Events Image</label>
                <input type="file" name="image"><br>


                <button name="update" type="submit">Update Events</button>

            </form>

        </div>

    </div>

</div>

<?php
include_once __DIR__.'/include/footer.php';
?>


</body>
</html>