<?php

include_once __DIR__.'/include/header.php';

if(isset($_POST['save'])){

    
$parish_id = !empty($_POST['parish_id'])
    ? (int)$_POST['parish_id']
    : null;
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

    // INSERT INTO DATABASE
    $sql = "INSERT INTO media 
        (parish_id,type, title, description, file_path, external_link)
        VALUES 
        ('$parish_id','$type', '$title', '$desc', '$filePath', '$link')";

    $conn->query($sql);

    header("Location: mediacenter.php");
}
?>
    <!-- MAIN -->
    <div class="main">

         <div class="topbar">
                <h1> Add Media Center</h1>
            </div>

        <div class="form-container">

           <form method="POST" enctype="multipart/form-data">

    <select name="type">
        <option value="gallery">Gallery</option>
        <option value="video">Video</option>
        <option value="document">Document</option>
        <option value="publication">Publication</option>
    </select>

    <input type="text" name="title" placeholder="Title">

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


    <textarea name="description" placeholder="Description"></textarea>

    <input type="file" name="file">

    <input type="text" name="external_link" placeholder="YouTube or Link">

    <button name="save" type="submit">Save Media</button>

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

