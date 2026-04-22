<?php
include("../config/db.php");

$res = $conn->query("SELECT * FROM events");

while($row=$res->fetch_assoc()){
    echo "<div class='card'>
            <h3>{$row['event_name']}</h3>
          </div>";
}
?>