<?php
session_start();
include("../config/db.php");

$msg = "";

if(isset($_POST['login'])){
    $res = $conn->query("SELECT * FROM student 
                         WHERE enroll_no='$_POST[enroll]' 
                         AND password='$_POST[pass]'");

    if($res->num_rows > 0){
        $_SESSION['student'] = $res->fetch_assoc();
        header("Location: student_panel.php");
        exit();
    } else {
        $msg = "Invalid Login ❌";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Login</title>

<link rel="stylesheet" href="student.css">

</head>
<body>

<div class="card">
    <h2>🎓 Student Login</h2>

    <?php if($msg != "") { ?>
        <div class="error"><?php echo $msg; ?></div>
    <?php } ?>

    <form method="POST">
        <input type="text" name="enroll" placeholder="Enroll No" required>
        <input type="password" name="pass" placeholder="Password" required>
        <button name="login">Login</button>
    </form>

    <a href="register.php">New user? Register</a>
    <a href="../index.php">⬅ Back to Home</a>
</div>

</body>
</html>