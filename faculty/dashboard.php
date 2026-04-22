<?php
session_start();

if(!isset($_SESSION['faculty'])) {
    echo "Please login first";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Faculty Dashboard</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #0f0f0f, #1a1a2e);
    color: white;
}

/* Header */
.header {
    position: relative;
    text-align: center;
    padding: 25px;
}

.header h1 {
    margin: 0;
    font-size: 28px;
    letter-spacing: 1px;
}

.logout-btn {
    position: absolute;
    top: 20px;
    right: 40px;

    padding: 10px 20px;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(12px);
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.1);

    color: white;
    text-decoration: none;
    font-size: 14px;

    box-shadow: 0 5px 15px rgba(0,0,0,0.5);
    transition: all 0.3s ease;
}

/* Hover same as cards */
.logout-btn:hover {
    transform: translateY(-3px) scale(1.03);
    box-shadow: 0 0 20px rgba(138,43,226,0.6);
}
.container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 30px;
    padding: 50px;
}

/* Cards */
.card {
    background: rgba(255,255,255,0.05);
    padding: 35px;
    border-radius: 20px;
    backdrop-filter: blur(12px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid rgba(255,255,255,0.1);
}

.card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 0 25px rgba(138,43,226,0.6);
}
h1{
    color: #21e913;
    text-shadow: 0 0 10px #0077ff;
}
/* Card Icons */
.card h2 {
    font-size: 22px;
    margin-bottom: 10px;
    color: #137ae9;
    text-shadow: 0 0 10px #ff00ff;
}

/* Text */
.card p {
    font-size: 14px;
    color: #ccc;
}

/* Buttons */
.card a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 22px;
    background: linear-gradient(45deg, purple, blue);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    transition: 0.3s;
}

.card a:hover {
    transform: scale(1.05);
    box-shadow: 0 0 12px rgba(138,43,226,0.7);
}
</style>

</head>
<body>

<div class="header">
    <h1>Dashboard</h1>
    <a href="../student/logout.php" class="logout-btn">🚪 Logout</a>
</div>

<div class="container">

    <div class="card">
        <h2>View and manage your profile</h2>
        <a href="profile.php">👤 Profile</a>
    </div>

    <div class="card">
        <h2>Create new events</h2>
        <a href="add_event.php">➕ Add Event</a>
    </div>

    <div class="card">
        <h2>Manage all events</h2>
        <a href="view_events.php">📋 View Events</a>
    </div>

</div>

</body>
</html>