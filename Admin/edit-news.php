<?php
include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';

$id = (int) $_GET['id'];

$sql = "SELECT * FROM news WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if(isset($_POST['update'])){

    // $id = $_POST['id'];
    // $title = $_POST['title'];
    // $summary = $_POST['summary'];
    // $content = $_POST['content'];
    // $status = $_POST['status'];
    // $author = $_POST['author'];


    $title   = mysqli_real_escape_string($conn,$_POST['title']);
    $parish_id = !empty($_POST['parish_id'])
    ? (int)$_POST['parish_id']
    : "NULL";
$summary = mysqli_real_escape_string($conn,$_POST['summary']);
$content = mysqli_real_escape_string($conn,$_POST['content']);
$author  = mysqli_real_escape_string($conn,$_POST['author']);
$status  = mysqli_real_escape_string($conn,$_POST['status']);

    // check image
   if(!empty($_FILES['image']['name'])){

    $image = time().'_'.$_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../uploads/".$image);

    $sql = "UPDATE news SET
            parish_id=$parish_id,
            title='$title',
            image='$image',
            summary='$summary',
            content='$content',
            status='$status',
            author='$author'
            WHERE id=$id";
} else{

    $sql = "UPDATE news SET
            parish_id=$parish_id,
            title='$title',
            summary='$summary',
            content='$content',
            status='$status',
            author='$author'
            WHERE id=$id";
}

    mysqli_query($conn, $sql);

    header("Location: news-list.php");
}


?>
    <!-- MAIN -->
    <div class="main">

        <div class="topbar">
            <h1>Update/Edit News</h1>
        </div>

        <div class="form-container">

            <form method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <label>News Title</label>
                <input type="text" name="title" value="<?= $row['title'] ?>">

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

        
                <label>News Image</label>
                <input type="file" name="image">

                 <label>Summary</label>
                <textarea name="summary"><?= $row['summary'] ?></textarea>


                <label>News Content</label>
                <textarea name="content"><?= $row['content'] ?></textarea>

                <select name="status">
                   <option value="draft" <?= $row['status']=='draft'?'selected':'' ?>>Draft</option>
                   <option value="published" <?= $row['status']=='published'?'selected':'' ?>>Published</option>
                </select>

                <label>Author</label>
                <input type="text" name="author" value="<?= $row['author'] ?>">

                <button type="submit" name="update">Update News</button>

            </form>

        </div>

    </div>

</div>

<?php
include_once __DIR__.'/include/footer.php';
?>

</body>
</html>