<?php
include("../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>All Events</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: linear-gradient(135deg, #0f0f0f, #1a1a2e);
    color: white;
}

/* Header */
.header {
    text-align: center;
    padding: 20px;
}

/* Message */
.msg {
    text-align: center;
    margin-bottom: 10px;
    font-weight: bold;
}

/* Table */
table {
    width: 90%;
    margin: auto;
    border-collapse: collapse;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    overflow: hidden;
}

th {
    background: #111;
}

th, td {
    padding: 12px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    text-align: center;
}

/* Buttons */
a.btn {
    padding: 6px 12px;
    margin: 2px;
    background: linear-gradient(45deg, purple, blue);
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 14px;
}

h1{
    color: #137ae9;
    text-shadow: 0 0 10px #ff00ff;
}
/* Back */
.back {
    display: block;
    text-align: center;
    margin: 20px;
    color: lightblue;
    text-decoration: none;
}
</style>

</head>
<body>

<div class="header">
    <h1>📋 All Events</h1>
</div>

<!-- 🔥 MESSAGE HANDLING -->
<?php
if(isset($_GET['msg'])){
    if($_GET['msg'] == "deleted"){
        echo "<div class='msg' style='color:lightgreen;'>✅ Event Deleted Successfully</div>";
    } elseif($_GET['msg'] == "error"){
        echo "<div class='msg' style='color:red;'>❌ Error deleting event</div>";
    } elseif($_GET['msg'] == "invalid"){
        echo "<div class='msg' style='color:orange;'>⚠ Invalid request</div>";
    }
}
?>

<table>
<tr>
    <th>ID</th>
    <th>Event Name</th>
    <th>Category</th>
    <th>Action</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM events");

if($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['event_name']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td>
        <a class="btn" href="edit_event.php?id=<?php echo $row['id']; ?>">Edit</a>

        <a class="btn" 
           href="delete_event.php?id=<?php echo $row['id']; ?>" 
           onclick="return confirm('Are you sure you want to delete this event?')">
           Delete
        </a>
    </td>
</tr>

<?php 
    }
} else {
    echo "<tr><td colspan='4'>No Events Found</td></tr>";
}
?>

</table>

<a href="dashboard.php" class="back">⬅ Back to Dashboard</a>

</body>
</html>