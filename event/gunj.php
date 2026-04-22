<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>GUNJ</title>
    <link rel="stylesheet" href="event2.css">
</head>

<body>

<a href="../index.php" class="back-btn">HOME</a>

<div class="container">

<div class="left">
<h1>🎭 GUNJ - THE ECHO OF YOUTH</h1>

<p class="subtitle">
GUNJ is the Cultural & Annual Day Program of GDEC, Abrama Navsari.
</p>

<ul>
<li>Showcase your talent in dance, music, drama</li>
<li>Celebrate creativity and passion</li>
<li>Platform to achieve your dreams</li>
<li>Express yourself freely</li>
<li>It gives you wings ✨</li>
</ul>

<h2>Cultural Events</h2>

<div class="events-list">
<?php
$q = mysqli_query($conn,"SELECT event_name FROM events WHERE category='Cultural'");
while($row = mysqli_fetch_assoc($q)){
    echo "<p>".$row['event_name']."</p>";
}
?>
</div>

</div>

<div class="right">
<div class="gallery">
<?php
for($i=1;$i<=8;$i++){
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