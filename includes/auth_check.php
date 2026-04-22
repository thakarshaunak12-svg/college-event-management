<?php
session_start();

if(!isset($_SESSION['student']) && !isset($_SESSION['faculty'])){
    header("Location: /myproject/index.php");
}
?>