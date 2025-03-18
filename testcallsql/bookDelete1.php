<?php
//เป็นการลบหนังสือที่มีloginในdatabaseเดียวกัน
session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "bookStore";

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect($hostname, $username, $password, $dbName);
if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
}

// ตรวจสอบว่ามีการกดปุ่ม submit หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST['bookId'];
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // ดึงข้อมูลชื่อผู้ใช้งานและรหัสผ่านจากฐานข้อมูล
    $sql = "SELECT * FROM login WHERE username = '$inputUsername'";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        die("เกิดข้อผิดพลาดในการรันคำสั่ง SQL: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);

    // ตรวจสอบชื่อผู้ใช้งานและรหัสผ่าน
    if ($row && $inputPassword == $row['Password']) {
        // ลบหนังสือ
        $deleteSql = "DELETE FROM book WHERE BookID='$bookId'";
        if (mysqli_query($conn, $deleteSql)) {
            // Redirect ไปที่ bookList1.php หลังจากลบสำเร็จ
            header("Location: bookList1.php");
            exit(); // ทำให้การรีไดเร็กต์ทำงานได้
        } else {
            // ถ้ามีข้อผิดพลาดในการลบ
            $errorMsg = "เกิดข้อผิดพลาดในการลบ: " . mysqli_error($conn);
        }
    } else {
        // ถ้าชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง
        $errorMsg = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
    }
} else {
    // รับค่า bookId ที่ต้องการลบ
    $bookId = $_GET['bookId'] ?? '';
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ยืนยันการลบหนังสือ</title>
</head>
<body>
    <h2>กรุณาป้อนชื่อผู้ใช้งานและรหัสผ่านเพื่อยืนยันการลบ</h2>
    
    <?php if (isset($errorMsg)) { ?>
        <p style="color: red;"><?php echo $errorMsg; ?></p>
    <?php } ?>

    <form action="" method="post">
        <input type="hidden" name="bookId" value="<?php echo $bookId; ?>">
        <table border='1' width='300'>
            <tr><td>Username :</td><td><input type="text" name="username" required></td></tr>
            <tr><td>Password :</td><td><input type="password" name="password" required></td></tr>
            <tr><td colspan='2' align='center'><input type="submit" value="ยืนยันการลบ"></td></tr>
        </table>
    </form>
</body>
</html>
