<html>
<head>
    <title>Score Calculation</title>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
    $filename = $_POST['FNames']; // ชื่อ input ที่ใช้
    if (file_exists($filename)) { // ตรวจสอบว่าไฟล์มีอยู่จริง
        $text = file($filename); // อ่านไฟล์

        // เริ่มต้นแสดงตาราง
        echo "ผลลัพธ์จากการคำนวณเกรด";
        echo "<table  cellspacing='0' cellpadding='5'>";
        echo "<tr> 
                <th>นักศึกษา</th> 
                <th>ทดสอบย่อย</th> 
                <th>สอบกลางภาค</th> 
                <th>สอบปลายภาค</th> 
                <th>รวม 100 คะแนน</th> 
                <th>เกรด</th> 
              </tr>";

        // อ่านข้อมูลจากแต่ละบรรทัดในไฟล์
        foreach ($text as $line) {
            $data = explode(",", trim($line)); // แยกข้อมูลด้วยเครื่องหมายคอมมา
            $name = $data[0];
            $quiz = (int)$data[1];
            $midterm = (int)$data[2];
            $final = (int)$data[3];
            $total = $quiz + $midterm + $final; // คำนวณรวมคะแนน

            // กำหนดเกรดตามคะแนน
            if ($total >= 80) {
                $grade = "A";
            } elseif ($total >= 75) {
                $grade = "B+";
            } elseif ($total >= 70) {
                $grade = "B";
            } elseif ($total >= 65) {
                $grade = "C+";
            } elseif ($total >= 60) {
                $grade = "C";
            } elseif ($total >= 55) {
                $grade = "D+";
            } elseif ($total >= 50) {
                $grade = "D";
            } else {
                $grade = "F";
            }
            

            // แสดงผลข้อมูลในตาราง
            echo "<tr> 
                    <td>$name</td> 
                    <td>$quiz</td> 
                    <td>$midterm</td> 
                    <td>$final</td> 
                    <td>$total</td> 
                    <td>$grade</td> 
                  </tr>";
        }
        echo "</table>"; // ปิดตาราง
    } else {
        echo "ไม่พบไฟล์"; // แสดงข้อความหากไม่พบไฟล์
    }
} else {
?>
    <form method="post" action="Score.php">
        <center>
            <big>Result Score</big>
            <p>File name: 
                <input type="text" name="FNames" size="50" value="score.txt" /> 
            </p>
            <input type="submit" name="submit" value=" SUBMIT " /> 
            <input type="reset" name="reset" value=" RESET " />
        </center>
    </form>
<?php 
}
?>
</body>
</html>
