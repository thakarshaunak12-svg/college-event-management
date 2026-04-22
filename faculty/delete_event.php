<?php
include("../config/db.php");

// Check if id is passed
if(isset($_GET['id'])) {

    $id = intval($_GET['id']); // 🔒 security

    // Delete query
    $query = "DELETE FROM events WHERE id='$id'";

    if($conn->query($query)) {

        // Redirect with success message
        header("Location: view_events.php?msg=deleted");
        exit();

    } else {
        header("Location: view_events.php?msg=error");
        exit();
    }

} else {
    header("Location: view_events.php?msg=invalid");
    exit();
}
?>