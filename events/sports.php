<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Sports Events</title>

<link rel="stylesheet" href="event1.css">
</head>
<body>

<div class="header">
    <h1>🏅 Sports Events</h1>
    <a class="btn" href="../student/home.php">Back</a>
</div>

<div class="events-container">

<?php
$res = $conn->query("SELECT * FROM events WHERE category='Sports'");

if($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
?>

<div class="card">
    <h3><?php echo $row['event_name']; ?></h3>
    <p><?php echo $row['description']; ?></p>
    <p>📍 Location: <?php echo $row['location']; ?></p>

    <?php if(!empty($row['date'])) { ?>
        <p>📅 Date: <?php echo $row['date']; ?></p>
    <?php } ?>

    <?php if(!empty($row['prize'])) { ?>
        <p>Entry fees: <?php echo $row['prize']; ?></p>
    <?php } ?>

    <a class="apply-btn" href="../student/apply.php?id=<?php echo $row['id']; ?>">
        Apply
    </a>
</div>

<?php 
    }
} else {
    echo "<h3 style='text-align:center;'>No Sports Events Available</h3>";
}
?>

</div>

</body>
</html>