<?php
include("../config/db.php");

$key = $_POST['key'];

$res = $conn->query("SELECT * FROM events WHERE event_name LIKE '%$key%'");

while($row=$res->fetch_assoc()){
    echo "<div class='card'>
            <h3>{$row['event_name']}</h3>
            <p>{$row['description']}</p>
          </div>";
}
?>