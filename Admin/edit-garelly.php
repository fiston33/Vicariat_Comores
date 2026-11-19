<?php

include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';

$id = (int)$_GET['id'];

$sql = "SELECT * FROM gallery
        WHERE id=$id";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){





$id = $_POST['id'];
    $title = $_POST['title'];
     $parish_id = !empty($_POST['parish_id'])
    ? (int)$_POST['parish_id']
    : "NULL";
    $description = $_POST['description'];
    $category = $_POST['category'];

    if($_FILES['image']['name'] != ""){

        $image = time() . "_" . $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp, "../uploads/".$image);

        $sql = "UPDATE gallery SET
                parish_id=$parish_id,
                title='$title',
                description = '$description',
                image= '$image',
                category='$category'
                WHERE id=$id";
    } else {

        $sql = "UPDATE gallery SET
                parish_id=$parish_id,
                title='$title',
                description = '$description',
                category='$category'
                WHERE id=$id";
    }

    mysqli_query($conn, $sql);

    header("Location: garelly.php");
}




?>
        <div class="main">

            <div class="topbar">
                <h1>Update/Edit Gallery</h1>
            </div>


            
<?php

$categories = [
    'Événements',
    'Paroisses',
    'Jeunesse',
    'Évêque',
];

?>


            <div class="form-container">

                

<form method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <input type="text" name="title" value="<?= $row['title']; ?>">
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


                    <textarea name="description"><?= htmlspecialchars($row['description']); ?></textarea>


<select name="category">

<?php foreach($categories as $category){ ?>

<option value="<?= $category; ?>"<?= $row['category'] == $category ? 'selected' : ''; ?>><?= $category; ?></option>

<?php } ?>

</select>

<img src="../uploads/<?= $row['image']; ?>" width="130" style="margin:10px;">

<input type="file" name="image">

                    <button type="submit" name="update">
    Update Gallery
</button>
                </form>

            </div>

        </div>

        


    </div>

    <?php
    include_once __DIR__.'/include/footer.php'
    ?>
</body>

</html>



