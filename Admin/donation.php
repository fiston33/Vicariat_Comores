<?php

include_once __DIR__.'/include/header.php';

$sql = "SELECT *
        FROM donations
        ORDER BY created_at DESC";

$result = mysqli_query($conn,$sql);
?>

        <div class="main">


            <div class="topbar">
                <h1>Donations</h1>
            </div>


            <div class="donation-tools">

                <input type="text" placeholder="Search donor">

                <select>
                    <option>All Methods</option>
                    <option>Mobile Money</option>
                    <option>Bank Transfer</option>
                    <option>Card</option>
                </select>

                <select>
                    <option>All Status</option>
                    <option>Confirmed</option>
                    <option>Pending</option>
                </select>


            </div>



            <div class="table-container">

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Donor</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['fullname']; ?></td>

<td><?= $row['email']; ?></td>

<td><?= number_format($row['amount']); ?> €</td>

<td><?= $row['payment_method']; ?></td>

<td>
<?= date(
'd/m/Y',
strtotime($row['created_at'])
); ?>
</td>

<td><?= $row['status']; ?></td>

<td>

<a href="view-donationslist.php?id=<?= $row['id']; ?>">
<button class="view">View</button>
</a>

<a href="edit-donation.php?id=<?= $row['id']; ?>">
<button class="edit">Update</button>
</a>

</td>

</tr>

<?php } ?>
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