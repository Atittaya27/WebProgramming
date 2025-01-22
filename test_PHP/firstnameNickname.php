<html>
<head>
    <title>firstnameNickname.php</title>
</head>
<body>
<center>
    <?php
    if (isset($_POST['submit'])) {
       $filename = $_POST['FNaames'];  // แก้ไขชื่อให้ตรงกับ input ที่ใช้
       $text = file($filename);  // อ่านไฟล์ที่ได้รับ
       foreach ($text as $tr_data) { // อ่านทีละบรรทัด
            $col = 1;
            $array_word = explode(",", $tr_data); // แยกชื่อจากเครื่องหมายคอมมา
            foreach ($array_word as $value) { // เช็คชื่อจริงชื่อเล่น
                $value = trim($value); // ตัดวรรคทิ้ง
                if ($col == 1) {
                    echo $value . " ";  // แสดงชื่อจริงและเว้นวรรค
                } else {
                    // เช็คชื่อเล่นและแทนที่
                    if ($value == "Robert") {
                        echo "Dick ";
                    } elseif ($value == "Dick") {
                        echo "Robert ";
                    } elseif ($value == "William") {
                        echo "Bill ";
                    } elseif ($value == "Bill") {
                        echo "William ";
                    } elseif ($value == "James") {
                        echo "Jim ";
                    } elseif ($value == "Jim") {
                        echo "James ";
                    } elseif ($value == "John") {
                        echo "Jack ";
                    } elseif ($value == "Jack") {
                        echo "John ";
                    } elseif ($value == "Margaret") {
                        echo "Peggy ";
                    } elseif ($value == "Peggy") {
                        echo "Margaret ";
                    } elseif ($value == "Edward") {
                        echo "Ed ";
                    } elseif ($value == "Ed") {
                        echo "Edward ";
                    } elseif ($value == "Sarah") {
                        echo "Sally ";
                    } elseif ($value == "Sally") {
                        echo "Sarah ";
                    } elseif ($value == "Andrew") {
                        echo "Andy ";
                    } elseif ($value == "Andy") {
                        echo "Andrew ";
                    } elseif ($value == "Anthony") {
                        echo "Tony ";
                    } elseif ($value == "Tony") {
                        echo "Anthony ";
                    } elseif ($value == "Deborah") {
                        echo "Debbie ";
                    } elseif ($value == "Debbie") {
                        echo "Deborah ";
                    } else {
                        // กรณีที่ชื่อไม่ตรงกับชื่อที่กำหนด
                        echo $value . " ";  // แสดงชื่อที่ไม่เปลี่ยนและเว้นวรรค
                    }
                }
                $col++;
            }
            echo "<br>"; // เพิ่มการขึ้นบรรทัดใหม่หลังจากแสดงผลแต่ละบรรทัด
        }
    } else {
    ?>
        <form method="post" action="firstnameNickname.php">
        <big>firstnameNickname.php </big>
        <p>File name  
        <input type="text" name="FNaames" size="50" value=""/> 
        </p>
        <tr>
        <td colspan="2" align="center">
        <input type="submit" name="submit" value=" SUBMIT " />
        <input type="reset" name="reset" value=" RESET " />
        </td>
        </tr>
        </form>
    <?php
    }
    ?>
</center>
</body>
</html>
