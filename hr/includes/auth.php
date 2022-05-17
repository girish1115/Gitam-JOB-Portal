<?php
ob_start();
session_start();
if(!isset($_SESSION['hr_id'])){
header("location:index.php");
die();
}
?>