<?php
session_start();

if(!isset($_SESSION['student'])){
    header("Location: login.php");
    exit;
}
?>
<link rel="stylesheet" href="student.css">

<br>
<br>
<br>
<h1>Welcome Student</h1>

<div class="container">
    
    <a href="profile.php">
        <div class="card option-card">
            <h2>👤 Profile</h2>
            <p>View and update your details</p>
        </div>
    </a>

    <a href="home.php">
        <div class="card option-card">
            <h2>🎉 Events</h2>
            <p>Browse and participate in events</p>
        </div>
    </a>

</div>