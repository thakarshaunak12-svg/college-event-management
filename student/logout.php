<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
<title>Logout</title>
<link rel="stylesheet" href="student.css">
</head>
<body>

<div class="card">
    <h2>Logged Out Successfully 👋</h2>
    <p>Redirecting to home page...</p>

    <a class="btn" href="../index.php">Go to Home</a>
</div>

<script>
    // 🔥 Auto redirect after 2 seconds
    setTimeout(function(){
        window.location.href = "../index.php";
    }, 2000);
</script>

</body>
</html>