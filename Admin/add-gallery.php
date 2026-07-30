<?php

include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';

if(isset($_POST['save'])){

$parish_id = !empty($_POST['parish_id'])
    ? (int)$_POST['parish_id']
    : null;

$title = mysqli_real_escape_string($conn, $_POST['title']);

$description = mysqli_real_escape_string($conn, $_POST['description']);

$category = mysqli_real_escape_string($conn,$_POST['category']);

$image = '';

if(!empty($_FILES['image']['name'])){

    $image = time().'_'.$_FILES['image']['name'];

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        '../uploads/'.$image
    );
}

$sql = "INSERT INTO gallery
(parish_id,title,description,category,image)
VALUES
('$parish_id','$title','$description','$category','$image')";

mysqli_query($conn,$sql);

header("Location: garelly.php");
exit();

}
?>
        <div class="main">

            <div class="topbar">
                <h1>Add Gallery</h1>
            </div>


            <div class="form-container">

                

                <form method="POST" enctype="multipart/form-data">

    <input type="text"  name="title" placeholder="Titre" required>

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


    
                <textarea name="description" placeholder="Write Description..."></textarea>

    <select name="category" required>
        <option value="">Choisir catégorie</option>
        <option>Événements</option>
        <option>Paroisses</option>
        <option>Jeunesse</option>
        <option>Évêque</option>
    </select>

    <input type="file" name="image" required>

    <button type="submit" name="save">
        Télécharger
    </button>

</form>

            </div>

        </div>


    </div>


    <?php

include_once __DIR__.'/include/footer.php';
?>


</body>

</html>