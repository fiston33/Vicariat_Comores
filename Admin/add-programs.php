<?php

include_once __DIR__.'/include/header.php';

include_once __DIR__.'/include/auth.php';


if(isset($_POST['save'])){

    $parish_id = !empty($_POST['parish_id'])
    ? (int)$_POST['parish_id']
    : null;
$title = mysqli_real_escape_string($conn,$_POST['title']);
$category = mysqli_real_escape_string($conn,$_POST['category']);
$short_description = mysqli_real_escape_string($conn,$_POST['short_description']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$coordinator = mysqli_real_escape_string($conn,$_POST['coordinator']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$status = mysqli_real_escape_string($conn,$_POST['status']);


$image = '';

if(!empty($_FILES['image']['name'])){

$image = time().'_'.$_FILES['image']['name'];

move_uploaded_file(
$_FILES['image']['tmp_name'],
"../uploads/".$image
);

}

$sql = "INSERT INTO programs
(parish_id,title,image,short_description,description,category,
coordinator,phone,email,status)

VALUES
('$parish_id','$title','$image','$short_description','$description',
'$category','$coordinator','$phone','$email','$status')";

mysqli_query($conn,$sql);

header("Location: program-list.php");
exit();

}

?>

<div class="main">

    <div class="topbar">
        <h1>Ajouter un Programme</h1>
    </div>

    <div class="form-container">




        <form method="POST" enctype="multipart/form-data">

            <label>Program Title</label>
            <input type="text" name="title" required>

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

            <label>Image</label>
            <input type="file" name="image">

            <label>Category</label>
            <select name="category">
                <option>Youth</option>
                <option>Choir</option>
                <option>Catechism</option>
                <option>Charity</option>
                <option>Education</option>
                <option>Family</option>
            </select>

            <label>Short Description</label>
            <textarea name="short_description"></textarea>

            <label>Full Description</label>
            <textarea name="description"></textarea>

            <label>Coordinator</label>
            <input type="text" name="coordinator">

            <label>Phone</label>
            <input type="text" name="phone">

            <label>Email</label>
            <input type="email" name="email">

            <label>Status</label>
            <select name="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>

            <button type="submit" name="save">
                Save Program
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