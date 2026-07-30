<?php

include_once __DIR__.'/include/header.php';


?>



        <div class="main">
            <div class="topbar">
                <h1>Users List</h1>
            </div>



            

                <div class="table-container">

                    <table>

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <?php
                        
$result = mysqli_query ($conn,"SELECT * FROM users ORDER BY id DESC" );

while($row = mysqli_fetch_assoc($result))
{


                        ?>

                        <tbody>

                        <tr>
                            <td><?= $row['id']; ?></td>

                           <td><?= $row['fullname']; ?></td>

                           <td><?= $row['email']; ?></td>
                           <td><?= $row['phone']; ?></td>

                           <td><?= $row['role']; ?></td>
                           <td><?= $row['status']; ?></td>

                           <td><a href="edit-users.php?id=<?= $row['id']; ?>" style="text-decoration:none; color:white;"><button class="edit">Edit</buutton></a></td>


                                                 <?php
}
?>
                        </tr>

  

                        </tbody>

                    </table>

                </div>

            







        </div>
    </div>


    <?php

include_once __DIR__.'/include/footer.php';
?>

</body>

</html>