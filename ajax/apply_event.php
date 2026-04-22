<?php
session_start();
include("../config/db.php");

$student = $_SESSION['student']['id'];
$event = $_POST['event_id'];

$conn->query("INSERT INTO registrations(student_id,event_id) VALUES('$student','$event')");

echo "Applied";
?>