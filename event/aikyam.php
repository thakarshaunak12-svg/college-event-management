<?php include("../config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>AIKYAM</title>
    <link rel="stylesheet" href="event2.css">
</head>
<a href="../index.php" class="back-btn">HOME</a>
<div class="container">

<div class="left">
<h1>🏆 AIKYAM - SPORTS FEST</h1>

<p class="subtitle">
5 houses compete: AGNI 🔥, VAYU 🌪, PRITHVI 🌍, JAL 💧, AAKASH ☁
</p>

<ul>
<li>Teams compete for highest points</li>
<li>Equal chance for every participant</li>
<li>Promotes teamwork & discipline</li>
<li>Twist: Boys can't play Cricket, Girls can't play Kabaddi 😄</li>
</ul>

<h2>Sports Events</h2>

<div class="events-list">
<?php
$q = mysqli_query($conn,"SELECT event_name FROM events WHERE category='Sports'");
while($row = mysqli_fetch_assoc($q)){
    echo "<p>".$row['event_name']."</p>";
}
?>
</div>

</div>

<div class="right">
<div class="gallery">
<?php
for($i=17;$i<=24;$i++){
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