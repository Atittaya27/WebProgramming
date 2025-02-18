<?php
session_start();
session_destroy();
$Username = $_GET['Username'];
echo "<center>User : " . $Username . " now logout.";
echo "<br><center> <a href='login.php'>คลิก กลับไปหน้า login </a>";
?>
