<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';



if(!isset($_GET['id'])){
    die("Prayer ID missing");
}

$id = (int) $_GET['id'];


if(!isset($_GET['parish_id'])){
    die("Parish ID missing");
}

$parish_id = (int) $_GET['parish_id'];

$sql = "SELECT * FROM parish_prayers WHERE id=$id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


if(isset($_POST['update'])){

$id = $_POST['id'];
$parish_id = $_POST['parish_id'];

$title = $_POST['title'];
$day = $_POST['prayer_day'];
$time = $_POST['prayer_time'];
$description = $_POST['description'];

$sql = "
UPDATE parish_prayers SET
title='$title',
prayer_day='$day',
prayer_time='$time',
description='$description'
WHERE id=$id
";


mysqli_query($conn, $sql);


// having trouble for parish_id=0
header("Location: prayers-list.php?parish_id=".$parish_id);
exit();

}


?>

<div class="main">

        <div class="topbar">
            <h1>Update/Edit Prayer</h1>
        </div>

        <div class="form-container">

<form method="POST">

<input type="hidden" name="parish_id" value="<?= $row['parish_id'] ?>">

<input type="hidden" name="id" value="<?= $row['id'] ?>">

<label>Title</label>
<input type="text" name="title" value="<?= $row['title'] ?>">

<label>Day</label>
<input type="text" name="prayer_day" value="<?= $row['prayer_day'] ?>">

<label>Time</label>
<input type="text" name="prayer_time" value="<?= $row['prayer_time'] ?>">

<label>Description</label>
<textarea name="description"><?= $row['description'] ?></textarea>

<button type="submit" name="update">
Update
</button>

</form>

  </div>

    </div>

</div>

<?php
include_once __DIR__.'/include/header.php';
?>

</body>
</html>