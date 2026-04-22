<?php
include("../config/db.php");
session_start();

if(!isset($_SESSION['student'])){
    header("Location: login.php");
    exit();
}

$id = $_SESSION['student']['id'];

/* Get student details */
$student = $conn->query("SELECT * FROM student WHERE id='$id'")->fetch_assoc();

/* Get registered events */
$res = $conn->query("
SELECT events.event_name 
FROM registrations 
JOIN events ON registrations.event_id = events.id 
WHERE registrations.student_id='$id'
");

/* Update profile */
if(isset($_POST['update'])){

    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $conn->query("
        UPDATE student SET 
        name='$name',
        dept='$dept',
        contact='$contact',
        email='$email'
        WHERE id='$id'
    ");

    echo "<script>alert('Profile Updated Successfully');window.location='profile.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Profile</title>
<link rel="stylesheet" href="student.css">
</head>

<body>

<div class="header">
    <h2>👤 Student Profile</h2>
    <a class="btn" href="logout.php">🚪 Logout</a>
</div>

<div class="container">

<!-- PROFILE BOX -->
<div class="box">
    <h3>Edit Profile</h3>

    <form method="POST">

        <input type="text" name="name" value="<?php echo $student['name']; ?>" required>

        <input type="text" name="dept" value="<?php echo $student['dept']; ?>" required>

        <input type="text" name="contact" value="<?php echo $student['contact']; ?>" required>

        <input type="email" name="email" value="<?php echo $student['email']; ?>" required>

        <button class="btn" name="update">Update</button>

    </form>
</div>

<!-- EVENTS BOX -->
<div class="box">
    <h3>🎯 My Events</h3>

    <?php
    if($res->num_rows > 0){
        while($row = $res->fetch_assoc()){
            echo "<div class='event'>".$row['event_name']."</div>";
        }
    } else {
        echo "<p>No events registered yet 😔</p>";
    }
    ?>
      <a class="btn" href="home.php">WANT TO PARTICIPATE?</a>
</div>

</div>
</body>
</html>