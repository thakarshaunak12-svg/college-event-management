<?php
include("../config/db.php");

$id=$_GET['id'];
$res=$conn->query("SELECT * FROM events WHERE id='$id'");
$row=$res->fetch_assoc();
?>
<link rel="stylesheet" href="event1.css">
<div class="details-box">
    <h2><?php echo $row['event_name']; ?></h2>
    <p><?php echo $row['description']; ?></p>
    <p>Location: <?php echo $row['location']; ?></p>

    <a href="../student/apply.php?id=<?php echo $row['id']; ?>">Apply</a>
    <a href="../faculty/edit_event.php?id=<?php echo $row['id']; ?>">Edit</a>
</div>