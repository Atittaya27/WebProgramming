
<?php
session_start();
session_destroy();
?>
<form action="session_file2.php">
LOGIN <br><br>
กรุณาป้อนชื่อผู้ใช้ (username) <br><br>
<input type="text" name="username"><br><br>
กรุณาป้อนรหัสผ่าน (password) <br><br>
<input type="text" name="password"><br><br>
<input type="submit" value=" OK ">
</form>
    
