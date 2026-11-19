<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';

if(!isset($_GET['parish_id'])){
    die("Parish ID missing");
}

$parish_id = (int) $_GET['parish_id'];


if(isset($_POST['save'])){


    $parish_id = (int) $_POST['parish_id'];

    $title = $_POST['title'];

    $day = $_POST['prayer_day'];

    $time = $_POST['prayer_time'];

    $description = $_POST['description'];



    $sql = "
    INSERT INTO parish_prayers
    (
        parish_id,
        title,
        prayer_day,
        prayer_time,
        description
    )
    VALUES
    (?,?,?,?,?)
    ";



    $stmt = mysqli_prepare($conn,$sql);


    if(!$stmt){

        die("Prepare Error: ".mysqli_error($conn));

    }



    mysqli_stmt_bind_param(
        $stmt,
        "issss",
        $parish_id,
        $title,
        $day,
        $time,
        $description
    );



    if(mysqli_stmt_execute($stmt)){


      
header("Location: prayers-list.php?parish_id=$parish_id");
exit();


    }else{


        die("Insert Error: ".mysqli_stmt_error($stmt));

    }


}
?>


<div class="main">

<div class="topbar">
    <h1>Add Prayer</h1>
</div>

<div class="form-container">

<form method="POST" >

<input type="hidden" name="parish_id" value="<?= $parish_id ?>">

<label>Title</label>
<input type="text" name="title" required>

<label>Prayer Day</label>
<input type="text" name="prayer_day" placeholder="Monday">

<label>Prayer Time</label>
<input type="text" name="prayer_time" placeholder="18:00">

<label>Description</label>
<textarea name="description"></textarea>

<button type="submit" name="save">
Save Prayer
</button>

</form>

</div>

</div>