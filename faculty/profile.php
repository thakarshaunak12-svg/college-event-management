<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['faculty'])){
    header("Location: login.php");
    exit;
}

$faculty = $_SESSION['faculty'];
$id = $faculty['id'];

/* UPDATE LOGIC */
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $query = "UPDATE faculty SET 
                name='$name',
                dept='$dept',
                contact='$contact',
                email='$email'
              WHERE id='$id'";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Profile Updated Successfully');</script>";

        // update session also
        $_SESSION['faculty']['name'] = $name;
        $_SESSION['faculty']['dept'] = $dept;
        $_SESSION['faculty']['contact'] = $contact;
        $_SESSION['faculty']['email'] = $email;

        $faculty = $_SESSION['faculty'];
    } else {
        echo "<script>alert('Update Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Faculty Profile</title>

<style>
body{
    background: linear-gradient(135deg, #0f0f0f, #1a1a2e);
    color:white;
    font-family:'Segoe UI', sans-serif;
    text-align:center;
}

/* Glass Profile Box */
.profile-box{
    width:420px;
    margin:auto;
    margin-top:40px;
    background: rgba(255,255,255,0.05);
    padding:25px;
    border-radius:18px;
    backdrop-filter: blur(12px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
    text-align:left;
    border:1px solid rgba(255,255,255,0.1);
}

.profile-box h2{
    text-align:center;
    color: #137ae9;
    text-shadow: 0 0 10px #ff00ff;
}

/* Inputs */
.profile-box input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:none;
    border-radius:8px;
    background:#2a2a2a;
    color:white;
}

/* Buttons */
.btn {
    display:inline-block;
    margin-top:15px;
    padding:10px 20px;
    background: linear-gradient(45deg, purple, blue);
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    text-decoration:none;
    transition:0.3s;
}

.btn:hover{
    transform:scale(1.05);
    box-shadow:0 0 10px rgba(138,43,226,0.6);
}

/* Back button */
.back-btn{
    display:inline-block;
    margin-top:20px;
}
</style>

</head>
<body>

<div class="profile-box">
    <h2>👤 Faculty Profile</h2>

    <form method="POST">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $faculty['name']; ?>" required>

        <label>Department</label>
        <input type="text" name="dept" value="<?php echo $faculty['dept']; ?>" required>

        <label>Contact</label>
        <input type="text" name="contact" value="<?php echo $faculty['contact']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $faculty['email']; ?>" required>

        <button type="submit" name="update" class="btn">Update Profile</button>
    </form>
</div>

<a href="dashboard.php" class="btn back-btn">⬅ Back to Dashboard</a>

</body>
</html>