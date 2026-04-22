<?php include("../config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>UDAAN</title>
    <link rel="stylesheet" href="event2.css">
</head>
<a href="../index.php" class="back-btn">HOME</a>
<div class="container">

<div class="left">
<h1>🚀 UDAAN - THE SKY HAS NO LIMITS</h1>

<p class="subtitle">
UDAAN is where technical & fun events come together.
</p>

<ul>
<li>Enjoy fun and technical events</li>
<li>Every event has its own learning</li>
<li>Enhances creativity and skills</li>
<li>Encourages you to be limitless</li>
</ul>

<h2>Technical & Fun Events</h2>

<div class="events-list">
<?php
$q = mysqli_query($conn,"SELECT event_name FROM events WHERE category='Technical' OR category='Fun'");
while($row = mysqli_fetch_assoc($q)){
    echo "<p>".$row['event_name']."</p>";
}
?>
</div>

</div>

<div class="right">
<div class="gallery">
<?php
for($i=9;$i<=16;$i++){
    echo "<img src='../images/$i.png'>";
}
?>
</div>
</div>
</div>
<div id="imgModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="fullImg">
</div>
<script src="gallery.js"></script>

</body>
</html>