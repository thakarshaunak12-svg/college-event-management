<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Faculty Registration</title>

<style>
body {
    background: linear-gradient(135deg, #0d0d0d, #1a1a40);
    color: white;
    font-family: Arial;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Card */
.container {
    background: #1a1a1a;
    padding: 30px;
    border-radius: 15px;
    width: 350px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #137ae9;
    text-shadow: 0 0 10px #ff00ff;
}

/* Inputs */
input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border-radius: 8px;
    border: none;
    outline: none;
    background: rgba(18, 234, 216, 0.34);
    color: black;
}

.links a {
    display: block;
    margin-top: 8px;
    color: #0a57dd;
    text-decoration: none;
}

/* Button */
button {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background: linear-gradient(45deg, purple, blue);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    transform: scale(1.05);
}

/* Message */
.success {
    color: lightgreen;
    margin-top: 10px;
}

.error {
    color: red;
}

/* Links */
.links a {
    display: inline-block;
    margin: 10px;
    padding: 8px 15px;
    background: #333;
    color: white;
    text-decoration: none;
    border-radius: 6px;
}
</style>

</head>
<body>

<div class="container">

<h2>Faculty Registration</h2>

<form method="POST">
<input name="name" placeholder="Name" required>
<input name="dept" placeholder="Department" required>
<input name="contact" placeholder="Contact" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="pass" placeholder="Password" required>

<button name="reg">Register</button>
</form>

<div class="links">
    <a href="login.php">Already have an account? Login</a>
    <a href="../index.php">Back to Home</a>
</div>
<?php
if(isset($_POST['reg'])){

    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // 🔥 Check duplicate email
    $check = $conn->query("SELECT * FROM faculty WHERE email='$email'");

    if($check->num_rows > 0){
        echo "<p class='error'>⚠ Email already registered</p>";
    } else {

        $sql = "INSERT INTO faculty(name,dept,contact,email,password)
        VALUES('$name','$dept','$contact','$email','$pass')";

        if($conn->query($sql)){
            echo "<p class='success'>✅ Registered Successfully</p>";

            echo "<div class='links'>
                    <a href='login.php'>Login</a>
                    <a href='../index.php'>Home</a>
                  </div>";

            // Auto redirect
            echo "<script>
                    setTimeout(function(){
                        window.location.href='login.php';
                    }, 2500);
                  </script>";

        } else {
            echo "<p class='error'>Error: ".$conn->error."</p>";
        }
    }
}
?>

</div>

</body>
</html>