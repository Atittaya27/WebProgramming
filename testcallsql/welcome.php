<?php
session_start();
$Username = $_GET['Username'];
if ( $Username == $_SESSION['Username']) {
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "session";
$conn = mysqli_connect( $hostname, $username, $password );
if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้");
mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล test ได้" );
$sqltxt = "SELECT * FROM login where username = '$Username'";
$result = mysqli_query ( $conn, $sqltxt );
$rs = mysqli_fetch_array ( $result );
echo "<table border=1 align=center bgcolor=#FFCCCC width=400>";
echo "<tr><td colspan=2 bgcolor =#FF99CC>";
echo "<B><center>แสดงรายละเอียดผู้ใช้</center></B></td></tr>";
echo "<tr><td> Username : </td><td>".$rs["UserName"]."</td></tr>"; // ["UserName"] ต้องตรงกับชื่อ field ในฐานข้อมูล
echo "<tr><td> Password : </td><td>".$rs["Password"]."</td></tr>"; // ["Password"] ต้องตรงกับชื่อ field ในฐานข้อมูล
echo "<tr><td> Status : </td><td>".$rs["Status"]."</td></tr>"; // ["Status"] ต้องตรงกับชื่อ field ในฐานข้อมูล
echo "</table>";
echo "<br><center><a href='logout.php?Username=$Username'> logout </a>";
}
else {
echo "You not login.";
echo "<br><a href='login.php'>คลิก กลับไปเพื่อ login </a>";
}
?>