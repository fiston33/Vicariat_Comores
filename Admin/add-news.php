<?php

include_once __DIR__.'/include/header.php';

include __DIR__. '/include/auth.php';


if(isset($_POST['insert'])){


$parish_id = !empty($_POST['parish_id'])
    ? (int)$_POST['parish_id']
    : null;



    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $author = $_POST['author'];

  $image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

$uploadDir = "../uploads/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$targetFile = $uploadDir . basename($image);

if (move_uploaded_file($tmp, $targetFile)) {
} else {
    echo "Upload failed";
    die();
}

   $title   = mysqli_real_escape_string($conn,$_POST['title']);
$summary = mysqli_real_escape_string($conn,$_POST['summary']);
$content = mysqli_real_escape_string($conn,$_POST['content']);
$author  = mysqli_real_escape_string($conn,$_POST['author']);
$status  = mysqli_real_escape_string($conn,$_POST['status']);

  $stmt = mysqli_prepare(
    $conn,
    "INSERT INTO news
    (parish_id,title,image,summary,content,status,author)
    VALUES (?,?,?,?,?,?,?)"
);

if(!$stmt){
    die("Prepare Failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt, "issssss", $parish_id, $title, $image, $summary, $content, $status, $author
);

if(mysqli_stmt_execute($stmt)){

    mysqli_stmt_close($stmt);

    header("Location: news-list.php");
    exit();

}else{

    die("Insert Failed: " . mysqli_stmt_error($stmt));

}

}

?>
    <!-- MAIN -->
    <div class="main">

        <div class="topbar">
            <h1>Add News</h1>
        </div>

        <div class="form-container">

            <form method="POST" enctype="multipart/form-data">

         

                <label>News Title</label>
                <input type="text" name="title" placeholder="Enter title" required>

                <label>News Image</label>
                <input type="file" name="image">

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

                 <label>Summary</label>
                <textarea  name="summary" placeholder="Enter Summary" required></textarea>

                <label>News Content</label>
                <textarea name="content" placeholder="Write news content..."></textarea>

                <select name="status">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
    </select><br>

                <label>Author</label>
                <input type="text" name="author" placeholder="Admin name">

                <button type="submit" name="insert">Publish News</button>

            </form>

        </div>

    </div>

</div>

 <?php
   include __DIR__. '../include/footer.php';
   ?>

</body>
</html>