<?php
ob_start();
session_start();
if(!isset($_SESSION['student_id'])){
header("location:index.php");
die();
}
?>