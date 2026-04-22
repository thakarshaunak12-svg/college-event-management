<?php
include("../config/db.php");

$id = $_GET['id'];

$res = $conn->query("SELECT * FROM events WHERE id='$id'");
$row = $res->fetch_assoc();

$msg = "";

if(isset($_POST['update'])) {

    $name = $_POST['event_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $prize = $_POST['prize'];
    $faculty = $_POST['faculty_coordinator'];
    $date = $_POST['date'];

    if($category == "Fun") {
        $student_coordinator = $_POST['student_coordinator'];
        $student_contact = $_POST['student_contact'];
    } else {
        $student_coordinator = NULL;
        $student_contact = NULL;
    }

    $conn->query("UPDATE events SET 
        event_name='$name',
        category='$category',
        description='$description',
        location='$location',
        prize='$prize',
        faculty_coordinator='$faculty',
        student_coordinator='$student_coordinator',
        student_contact='$student_contact',
        date='$date'
        WHERE id='$id'
    ");

    $msg = "✅ Updated Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Event</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: linear-gradient(135deg, #0f0f0f, #1a1a2e);
    color: white;
}

/* Form Box */
.form-box {
    width: 420px;
    margin: auto;
    margin-top: 50px;
    background: rgba(255,255,255,0.05);
    padding: 30px;
    border-radius: 20px;
    backdrop-filter: blur(12px);
    box-shadow: 0 0 20px rgba(0,0,0,0.7);
}

/* Heading */
h2 {
    text-align: center;
    color: #13e937;
    text-shadow: 0 0 10px #001eff;
}

/* Inputs */
input, select, textarea {
    width: 100%;
    margin: 8px 0;
    padding: 10px;
    border-radius: 8px;
    border: none;
    outline: none;
}

/* Textarea */
textarea {
    height: 80px;
}

/* Button */
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

/* Message */
.msg {
    text-align: center;
    margin-bottom: 10px;
    font-weight: bold;
}

/* Back */
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

<h2>✏ Edit Event</h2>

<?php if($msg != "") echo "<div class='msg'>$msg</div>"; ?>

<form method="POST">

<input type="text" name="event_name" value="<?php echo $row['event_name']; ?>" placeholder="Event Name">

<select name="category" id="category" onchange="toggleFields()">
    <option value="Fun" <?php if($row['category']=="Fun") echo "selected"; ?>>Fun</option>
    <option value="Technical" <?php if($row['category']=="Technical") echo "selected"; ?>>Technical</option>
    <option value="Cultural" <?php if($row['category']=="Cultural") echo "selected"; ?>>Cultural</option>
    <option value="Sports" <?php if($row['category']=="Sports") echo "selected"; ?>>Sports</option>
</select>

<textarea name="description" placeholder="Description"><?php echo $row['description']; ?></textarea>

<input type="text" name="location" value="<?php echo $row['location']; ?>" placeholder="Location">

<input type="text" name="prize" value="<?php echo $row['prize']; ?>" placeholder="Prize">

<input type="text" name="faculty_coordinator" value="<?php echo $row['faculty_coordinator']; ?>" placeholder="Faculty Coordinator">

<input type="date" name="date" value="<?php echo $row['date']; ?>">

<!-- Fun Fields -->
<div id="funFields">
    <input type="text" name="student_coordinator" value="<?php echo $row['student_coordinator']; ?>" placeholder="Student Coordinator">
    <input type="text" name="student_contact" value="<?php echo $row['student_contact']; ?>" placeholder="Student Contact">
</div>

<button type="submit" name="update">Update Event</button>

</form>

<a href="view_events.php" class="back">⬅ Back to Events</a>

</div>

<script>
function toggleFields() {
    var category = document.getElementById("category").value;
    var funFields = document.getElementById("funFields");

    if(category === "Fun") {
        funFields.style.display = "block";
    } else {
        funFields.style.display = "none";
    }
}

// Run on load
toggleFields();
</script>

</body>
</html>