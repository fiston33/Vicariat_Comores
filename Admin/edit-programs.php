<?php

include_once __DIR__.'/include/header.php';
include_once __DIR__.'/include/auth.php';

$id = (int)$_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM programs WHERE id=$id");

if(mysqli_num_rows($result) == 0){
    die("Program not found");
}

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
     $parish_id = !empty($_POST['parish_id'])
    ? (int)$_POST['parish_id']
    : "NULL";
    $short_description = mysqli_real_escape_string($conn,$_POST['short_description']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $coordinator = mysqli_real_escape_string($conn,$_POST['coordinator']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);

    $image = $row['image'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

        $image = time().'_'.$_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp, "../uploads/".$image);
    }

    $sql = "UPDATE programs SET
            parish_id=$parish_id,
            title='$title',
            image='$image',
            category='$category',
            short_description='$short_description',
            description='$description',
            coordinator='$coordinator',
            phone='$phone',
            email='$email',
            status='$status'
            WHERE id=$id";

    if(mysqli_query($conn,$sql)){

        header("Location: program-list.php");
        exit();

    }else{

        echo mysqli_error($conn);
    }
}
?>

<div class="main">

<div class="topbar">
    <h1>Edit Program</h1>
</div>

<div class="form-container">

    <form method="POST" enctype="multipart/form-data">

        <label>Program Title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required>
        
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


        <label>Current Image</label><br>
        <img src="../uploads/<?= $row['image'] ?>"
             width="120"><br><br>

        <label>Change Image</label>
        <input type="file" name="image">

        <label>Category</label>
        <select name="category">

            <option value="Youth" <?= $row['category']=='Youth'?'selected':'' ?>>Youth</option>

            <option value="Choir" <?= $row['category']=='Choir'?'selected':'' ?>>Choir</option>

            <option value="Catechism" <?= $row['category']=='Catechism'?'selected':'' ?>>Catechism</option>

            <option value="Charity" <?= $row['category']=='Charity'?'selected':'' ?>>Charity</option>

            <option value="Education" <?= $row['category']=='Education'?'selected':'' ?>>Education</option>

            <option value="Family" <?= $row['category']=='Family'?'selected':'' ?>>Family</option>

        </select>

        <label>Short Description</label>
        <textarea name="short_description"><?= htmlspecialchars($row['short_description']) ?></textarea>

        <label>Full Description</label>
        <textarea name="description"><?= htmlspecialchars($row['description']) ?></textarea>

        <label>Coordinator</label>
        <input type="text" name="coordinator"
               value="<?= htmlspecialchars($row['coordinator']) ?>">

        <label>Phone</label>
        <input type="text" name="phone"
               value="<?= htmlspecialchars($row['phone']) ?>">

        <label>Email</label>
        <input type="email" name="email"
               value="<?= htmlspecialchars($row['email']) ?>">

        <label>Status</label>
        <select name="status">
            <option value="active" <?= $row['status']=='active'?'selected':'' ?>>Active</option>

            <option value="inactive" <?= $row['status']=='inactive'?'selected':'' ?>>Inactive</option>
        </select>

        <button type="submit" name="update">
            Update Program
        </button>

    </form>

</div>

</div>

</div>

<?php include_once __DIR__.'/include/footer.php'; ?>




</body>
</html>

