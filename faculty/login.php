<?php
session_start();
include("../config/db.php");

$msg = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $res = $conn->query("SELECT * FROM faculty WHERE email='$email' AND password='$pass'");

    if($res->num_rows > 0){
        $_SESSION['faculty'] = $res->fetch_assoc();
        header("Location: dashboard.php");
        exit();
    } else {
        $msg = "❌ Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Faculty Login</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: linear-gradient(135deg, #0f0f0f, #1a1a2e);
    color: white;
}

/* Login Box */
.login-box {
    width: 350px;
    margin: auto;
    margin-top: 100px;
    background: rgba(255,255,255,0.05);
    padding: 30px;
    border-radius: 20px;
    backdrop-filter: blur(12px);
    box-shadow: 0 0 20px rgba(0,0,0,0.7);
}

/* Heading */
h2 {
    text-align: center;
    color: #137ae9;
    text-shadow: 0 0 10px #ff00ff;
}
a {
    display: block;
    margin-top: 10px;
    color: #ccc;
    text-decoration: none;
    text-align: center;
}
/* Inputs */
input {
    width: 100%;
    margin: 10px 0;
    padding: 10px;
    border-radius: 8px;
    border: none;
    outline: none;
    background: rgba(224, 235, 103, 0.34);
    color: black;
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
    color: red;
    font-weight: bold;
}
</style>

</head>
<body>

<div class="login-box">

<h2>👨‍🏫 Faculty Login</h2>

<?php if($msg != "") echo "<div class='msg'>$msg</div>"; ?>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="pass" placeholder="Password" required>

<button name="login">Login</button>

</form>

    <a href="register.php">New user? Register</a>
    <a href="../index.php">⬅ Back to Home</a>
</div>

</body>
</html>