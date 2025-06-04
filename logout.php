<?php
session_start();
unset($_SESSION['prnnum']);
header("location:loginform2.php");

echo "<script>alert('Logged out successfully!'); window.location.href='loginform2.php';</script>";
?>
