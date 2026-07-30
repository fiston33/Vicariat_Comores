<?php

include_once __DIR__.'/include/header.php';


$id = $_GET['id'];

$user =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM users WHERE id='$id'"
));


if(isset($_POST['update']))
{
    $role   = $_POST['role'];
    $status = $_POST['status'];

    mysqli_query(
        $conn,
        "UPDATE users
        SET role='$role',
        status='$status'
        WHERE id='$id'"
    );

    header("Location: users.php");
}

?>


<div class="main">

            <div class="topbar">
                <h1>Edit/Update Users</h1>
            </div>


            <div class="form-container">



                <form method="POST">

                    <input type="text" value="<?= $user['fullname']; ?>"readonly>

                    <select name="role">

                      <option value="user">User</option>

                      <option value="editor">Editor</option>

                      <option value="admin">Admin</option>

                    </select>

                    <select name="status">

                        <option value="active">Active</option>

                        <option value="inactive">Inactive</option>

                        <option value="pending">Pending</option>

                    </select>

                    <button type="submit" name="update">Update</button>

                </form>

            </div>

        </div>

      

    </div>

    


    <?php

include_once __DIR__.'/include/footer.php';
?>


</body>

</html>