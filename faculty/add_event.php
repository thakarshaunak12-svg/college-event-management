<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['faculty'])){
    header("Location: login.php");
    exit;
}

$msg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])){

    $cat = $_POST['cat'] ?? '';
    $name = $_POST['name'] ?? '';
    $desc = $_POST['desc'] ?? '';
    $loc = $_POST['loc'] ?? '';
    $prize = $_POST['prize'] ?? '';
    $faculty = $_POST['faculty'] ?? '';
    $student = $_POST['student'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $date = $_POST['date'] ?? '';

    if($cat == "" || $name == "" || $desc == "" || $loc == ""){
        $msg = "⚠ Please fill all required fields!";
    } else {

        // FIXED QUERY (contact → student_contact)
        $conn->query("INSERT INTO events 
        (category,event_name,description,location,prize,faculty_coordinator,student_coordinator,student_contact,date)
        VALUES
        ('$cat','$name','$desc','$loc','$prize','$faculty','$student','$contact','$date')");

        $msg = "✅ Event Added Successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Event</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: linear-gradient(135deg, #0f0f0f, #1a1a2e);
    color: white;
}

.form-box {
    width: 420px;
    margin: auto;
    margin-top: 60px;
    background: rgba(255,255,255,0.05);
    padding: 30px;
    border-radius: 20px;
    backdrop-filter: blur(12px);
    box-shadow: 0 0 20px rgba(0,0,0,0.7);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #137ae9;
    text-shadow: 0 0 10px #ff00ff;

}

input, select, textarea {
    width: 100%;
    margin: 8px 0;
    padding: 10px;
    border-radius: 8px;
    border: none;
    outline: none;
}

textarea {
    height: 80px;
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    background: linear-gradient(45deg, purple, blue);
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    opacity: 0.9;
}

.msg {
    text-align: center;
    margin-bottom: 10px;
    font-weight: bold;
}

.back {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: lightblue;
    text-decoration: none;
}
</style>

</head>
<body>

<div class="form-box">

<h2>➕ Add Event</h2>

<?php if($msg != "") echo "<div class='msg'>$msg</div>"; ?>

<form method="POST">

<select name="cat" required>
    <option value="">Select Category</option>
    <option>Technical</option>
    <option>Sports</option>
    <option>Cultural</option>
    <option>Fun</option>
</select>

<input type="text" name="name" placeholder="Event Name" required>

<textarea name="desc" placeholder="Event Description" required></textarea>

<input type="text" name="loc" placeholder="Location" required>

<input type="text" name="prize" placeholder="Prize">

<input type="text" name="faculty" placeholder="Faculty Coordinator">

<input type="text" name="student" placeholder="Student Coordinator">

<input type="text" name="contact" placeholder="Student Contact">

<input type="date" name="date">

<button type="submit" name="add">Add Event</button>

</form>

<a href="dashboard.php" class="back">⬅ Back to Dashboard</a>

</div>

</body>
</html>