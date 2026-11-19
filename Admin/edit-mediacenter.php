<?php

include_once __DIR__.'/include/header.php';


$id = (int)$_GET['id'];

$sql = "SELECT * FROM media WHERE id='$id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);


if(isset($_POST['update'])){

    $id = $_POST['id'];
    $parish_id = !empty($_POST['parish_id'])
    ? (int)$_POST['parish_id']
    : "NULL";
    $type = $_POST['type'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $link = $_POST['external_link'];

    $filePath = null; 

    // ONLY upload file if NOT video
    if($type != "video" && isset($_FILES['file']) && $_FILES['file']['name'] != ""){

        $file = time() . "_" . $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];

        $upload_path = "../uploads/" . $file;

        if(move_uploaded_file($tmp, $upload_path)){
            $filePath = "uploads/" . $file;
        } else {
            die("Upload failed");
        }

    }
    
if($filePath){

    $sql = "UPDATE media SET
     parish_id=$parish_id,
    type='$type',
    title='$title',
    description='$desc',
    file_path='$filePath',
    external_link='$link'
    WHERE id='$id'";

}else{

    $sql = "UPDATE media SET
     parish_id=$parish_id,
    type='$type',
    title='$title',
    description='$desc',
    external_link='$link'
    WHERE id='$id'";
}    $conn->query($sql);
      header("Location: mediacenter.php");

   

}
?>
    <!-- MAIN -->
    <div class="main">

         <div class="topbar">
                <h1> Update/Edit Media Center</h1>
            </div>

        <div class="form-container">

           <form method="POST" enctype="multipart/form-data">

           <input type="hidden" name="id" value="<?= $row['id']; ?>">

    <select name="type">

<option value="gallery"
<?= $row['type']=='gallery' ? 'selected' : ''; ?>>
Gallery
</option>

<option value="video"
<?= $row['type']=='video' ? 'selected' : ''; ?>>
Video
</option>

<option value="document"
<?= $row['type']=='document' ? 'selected' : ''; ?>>
Document
</option>

<option value="publication"
<?= $row['type']=='publication' ? 'selected' : ''; ?>>
Publication
</option>

</select>

    <input type="text" name="title" value="<?= $row['title']; ?>">


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

    <textarea name="description"><?= htmlspecialchars($row['description']); ?></textarea>

    <input type="file" name="file">

   <input type="text" name="external_link" value="<?= htmlspecialchars($row['external_link']); ?>" placeholder="YouTube or Link">

    <button name="update" type="submit">Update Media</button>

</form>

          
        </div>

    </div>
</div>


<?php

include_once __DIR__.'/include/footer.php';

?>

<!-- SCRIPT -->
<script>
    const buttons = document.querySelectorAll(".tab-btn");
    const tabs = document.querySelectorAll(".tab-content");

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {

            buttons.forEach(b => b.classList.remove("active"));
            tabs.forEach(t => t.classList.remove("active"));

            btn.classList.add("active");
            document.getElementById(btn.dataset.tab).classList.add("active");

        });
    });
</script>

</body>
</html>

