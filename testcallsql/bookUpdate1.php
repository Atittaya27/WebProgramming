<?php
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $bookId = $_POST['bookId'];
    $bookName = $_POST['BookName'];
    $typeID = $_POST['TypeID'];
    $statusID = $_POST['StatusID'];
    $publish = $_POST['Publish'];
    $unitPrice = $_POST['UnitPrice'];
    $unitRent = $_POST['UnitRent'];
    $dayAmount = $_POST['DayAmount'];
    $bookDate = $_POST['BookDate'];

    // เก็บข้อมูลในเซสชันเพื่อนำไปใช้ในฟอร์มยืนยันตัวตน
    $_SESSION['bookData'] = [
        'bookId' => $bookId,
        'bookName' => $bookName,
        'typeID' => $typeID,
        'statusID' => $statusID,
        'publish' => $publish,
        'unitPrice' => $unitPrice,
        'unitRent' => $unitRent,
        'dayAmount' => $dayAmount,
        'bookDate' => $bookDate
    ];

    // แสดงฟอร์มยืนยันตัวตน
    header("Location: bookUpdate1.php?action=confirm");
    exit();
}

// ตรวจสอบว่ามีการยืนยันตัวตนหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmUpdate'])) {
    $bookId = $_SESSION['bookData']['bookId'];
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // ดึงข้อมูลชื่อผู้ใช้งานและรหัสผ่านจากฐานข้อมูล
    $sql = "SELECT * FROM login WHERE username = '$inputUsername'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && $inputPassword == $row['Password']) {
        // ถ้ายืนยันตัวตนถูกต้อง ให้ทำการอัพเดทข้อมูล
        $updateSql = "UPDATE book SET 
            BookName = '{$_SESSION['bookData']['bookName']}',
            TypeID = '{$_SESSION['bookData']['typeID']}',
            StatusID = '{$_SESSION['bookData']['statusID']}',
            Publish = '{$_SESSION['bookData']['publish']}',
            UnitPrice = '{$_SESSION['bookData']['unitPrice']}',
            UnitRent = '{$_SESSION['bookData']['unitRent']}',
            DayAmount = '{$_SESSION['bookData']['dayAmount']}',
            BookDate = '{$_SESSION['bookData']['bookDate']}'
            WHERE BookID = '$bookId'";

        if (mysqli_query($conn, $updateSql)) {
            // ล้างข้อมูลในเซสชันหลังจากอัพเดทสำเร็จ
            unset($_SESSION['bookData']);
            header("Location: bookList1.php"); // หลังจากอัพเดทเสร็จให้กลับไปที่รายการหนังสือ
            exit();
        } else {
            $errorMsg = "เกิดข้อผิดพลาดในการอัพเดท: " . mysqli_error($conn);
        }
    } else {
        $errorMsg = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
    }
}

// ดึงข้อมูลหนังสือที่ต้องการอัพเดท
if (!isset($_SESSION['bookData']) && isset($_GET['bookId'])) {
    $bookId = $_GET['bookId'];
    $sql = "SELECT * FROM book WHERE BookID = '$bookId'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
} else {
    $data = $_SESSION['bookData'] ?? [];
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>อัพเดทข้อมูลหนังสือ</title>
</head>
<body>
    <?php if (!isset($_GET['action']) || $_GET['action'] != 'confirm') { ?>
        <!-- ฟอร์มการกรอกข้อมูลหนังสือ -->
        <form method="POST">
            <input type="hidden" name="bookId" value="<?php echo $data['bookId'] ?? ''; ?>">
            <table border="1" align="center">
                <tr><td colspan="2" align="center">ฟอร์มอัพเดทข้อมูลหนังสือ</td></tr>
                <tr><td>ชื่อหนังสือ:</td><td><input type="text" name="BookName" value="<?php echo $data['bookName'] ?? ''; ?>" required></td></tr>
                <tr><td>ประเภทหนังสือ:</td><td><input type="text" name="TypeID" value="<?php echo $data['typeID'] ?? ''; ?>" required></td></tr>
                <tr><td>สถานะหนังสือ:</td><td><input type="text" name="StatusID" value="<?php echo $data['statusID'] ?? ''; ?>" required></td></tr>
                <tr><td>สำนักพิมพ์:</td><td><input type="text" name="Publish" value="<?php echo $data['publish'] ?? ''; ?>" required></td></tr>
                <tr><td>ราคาซื้อ:</td><td><input type="text" name="UnitPrice" value="<?php echo $data['unitPrice'] ?? ''; ?>" required></td></tr>
                <tr><td>ราคาเช่า:</td><td><input type="text" name="UnitRent" value="<?php echo $data['unitRent'] ?? ''; ?>" required></td></tr>
                <tr><td>จำนวนวันที่ยืมได้:</td><td><input type="text" name="DayAmount" value="<?php echo $data['dayAmount'] ?? ''; ?>" required></td></tr>
                <tr><td>วันที่จัดเก็บ:</td><td><input type="date" name="BookDate" value="<?php echo $data['bookDate'] ?? ''; ?>" required></td></tr>
                <tr><td colspan="2" align="center"><input type="submit" name="update" value="ยืนยันการอัพเดท"></td></tr>
            </table>
        </form>
    <?php } else { ?>
        <!-- ฟอร์มการยืนยันตัวตน -->
        <h2>กรุณากรอกรหัสผ่านเพื่อยืนยันการอัพเดทข้อมูล</h2>
        
        <?php if (isset($errorMsg)) { ?>
            <p style="color: red;"><?php echo $errorMsg; ?></p>
        <?php } ?>

        <form method="POST">
            <input type="hidden" name="bookId" value="<?php echo $data['bookId'] ?? ''; ?>">
            <table border="1" width="300">
                <tr><td>Username :</td><td><input type="text" name="username" required></td></tr>
                <tr><td>Password :</td><td><input type="password" name="password" required></td></tr>
                <tr><td colspan="2" align="center"><input type="submit" name="confirmUpdate" value="ยืนยันการอัพเดท"></td></tr>
            </table>
        </form>
    <?php } ?>
</body>
</html>
