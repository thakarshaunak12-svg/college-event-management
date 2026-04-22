<?php
session_start();
include("../config/db.php");

// Check login
if(!isset($_SESSION['student'])) {
    $msg = "Please login first";
    $type = "error";
} else {

    $student_id = $_SESSION['student']['id'];
    $student_name = $_SESSION['student']['name'];
    $enroll_no = $_SESSION['student']['enroll_no'];   // ✅ ADDED
    $contact = $_SESSION['student']['contact'];       // ✅ ADDED
    $gender = $_SESSION['student']['gender'];

    if(isset($_GET['id'])) {
        $event_id = $_GET['id'];
    } else {
        $msg = "Event ID missing";
        $type = "error";
    }

    if(!isset($msg)) {

        $res = $conn->query("SELECT event_name FROM events WHERE id='$event_id'");
        $row = $res->fetch_assoc();
        $event_name = $row['event_name'];

        // Gender restriction
        if($gender == "Male" && $event_name == "Cricket") {
            $msg = "Male students cannot apply for Cricket";
            $type = "error";
        }
        elseif($gender == "Female" && $event_name == "Kabaddi") {
            $msg = "Female students cannot apply for Kabaddi";
            $type = "error";
        }

        // Duplicate check
        if(!isset($msg)){
            $check = $conn->query("SELECT * FROM registrations 
                                  WHERE student_id='$student_id' 
                                  AND event_id='$event_id'");

            if($check->num_rows > 0) {
                $msg = "Already Applied!";
                $type = "error";
            }
        }

        // INSERT UPDATED (IMPORTANT CHANGE HERE)
        if(!isset($msg)){
            $query = "INSERT INTO registrations 
            (student_id, student_name, enroll_no, contact, event_id, event_name) 
            VALUES 
            ('$student_id', '$student_name', '$enroll_no', '$contact', '$event_id', '$event_name')";

            if($conn->query($query)) {
                $msg = "Applied Successfully 🎉";
                $type = "success";
            } else {
                $msg = "Error: " . $conn->error;
                $type = "error";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Application Status</title>
<link rel="stylesheet" href="student.css">
</head>
<body>

<div class="card">
    <h2 class="<?php echo $type; ?>">
        <?php echo $msg; ?>
    </h2>

    <br>

    <a class="btn" href="home.php">Back to Events</a>
</div>

</body>
</html>