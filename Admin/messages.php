<?php

include_once __DIR__.'/include/header.php';


$sql = "SELECT * FROM messages
        ORDER BY created_at DESC";

$result = mysqli_query($conn,$sql);

$total_messages = mysqli_num_rows($result);


?>
       
       
       
       <div class="main">

            <div class="page-header">
                <h1>Messages</h1>
                <p>Manage contact form submissions.</p>
            </div>

            <div class="messages-summary">

                <div class="summary-card">
                    <h2><?= $total_messages ?></h2>
                    <p>Total Messages</p>
                </div>

            </div>

            <div class="table-container">

                <div class="table-header">

                    <input type="text" placeholder="Search messages...">

                </div>

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr class="<?= $row['status']=='unread' ? 'unread-row' : '' ?>">

<tr>
<td><?= htmlspecialchars($row['id']) ?></td>
<td><?= htmlspecialchars($row['name']) ?></td>

<td><?= htmlspecialchars($row['subject']) ?></td>

<td>
<?= substr(htmlspecialchars($row['message']),0,100) ?>...
</td>

<td>
<?= date('d/m/Y',strtotime($row['created_at'])) ?>
</td>

<td>
<?php if($row['status'] == 'unread'){ ?>
    <span class="status-unread">Unread</span>
<?php } else { ?>
    <span class="status-read">Read</span>
<?php } ?>
</td>

<style>
    .status-unread{
    background:#ffe5e5;
    color:#d63031;
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
}

.status-read{
    background:#e8f8ec;
    color:#27ae60;
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
}

.unread-row{
    background:#fff8e1;
    font-weight:600;
}
</style>

<td>

<a href="view-messageslist.php?id=<?= $row['id'] ?>">
    <button class="view-btn">
        View
    </button>
</a>

<a href="delete-messages.php?id=<?= $row['id'] ?>"
   onclick="return confirm('Delete message?')">

    <button class="delete-btn">
        Delete
    </button>

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