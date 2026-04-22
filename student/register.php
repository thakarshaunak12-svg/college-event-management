<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>
<link rel="stylesheet" href="student.css">
</head>
<body>

<div class="card">
<h2>🎓 Student Registration</h2>

<form method="POST">
<input type="text" name="name" placeholder="Name" required>
<input type="text" name="enroll" placeholder="Enroll No" required>
<input type="text" name="dept" placeholder="Department" required>
<input type="number" name="year" placeholder="Year" required>
<input type="number" name="sem" placeholder="Sem" required>
<input type="text" name="contact" placeholder="Contact" required>

<select name="gender" required>
<option value="">Select Gender</option>
<option>Male</option>
<option>Female</option>
</select>

<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<div class="radio-group">
    Coordinator? 
    <input type="radio" name="coord" value="1" required> Yes
    <input type="radio" name="coord" value="0" required> No
</div>

<button name="submit">Register</button>
</form>

<div class="links">
    <a href="login.php">Already have an account? Login</a>
    <a href="../index.php">⬅ Back to Home</a>
</div>

<?php
if(isset($_POST['submit'])){
    $sql="INSERT INTO student(name,enroll_no,dept,year,sem,contact,gender,email,password,is_coordinator)
    VALUES('$_POST[name]','$_POST[enroll]','$_POST[dept]','$_POST[year]','$_POST[sem]',
    '$_POST[contact]','$_POST[gender]','$_POST[email]','$_POST[password]','$_POST[coord]')";

    if($conn->query($sql)){
        echo "<div class='success'>Registered Successfully ✅</div>";
        
        echo '<a class="btn" href="login.php">Go to Login</a>';

        echo "<script>
                setTimeout(function(){
                    window.location.href='login.php';
                }, 3000);
              </script>";
    } else {
        echo "<div class='success'>Error: ".$conn->error."</div>";
    }
}
?>

</div>

</body>
</html>