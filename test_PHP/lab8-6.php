<?php
// declare function page_header with argument and default value
function page_header($title, $bgcolor = "ffffff") {
    echo '<html><head><meta charset="UTF-8"><title>' . $title . '</title></head>'; // แก้ไขการปิดแท็ก head
    echo '<body bgcolor="#' . $bgcolor . '">';
}

// declare function page_footer
function page_footer($message) {
    echo '<hr />' . $message;
    echo '</body></html>';
}

// declare function TestValue (pass by value)
function TestValue($num) {
    $num = $num + 10; // เพิ่มค่า $num โดยไม่เปลี่ยนแปลงค่าภายนอก
    return $num; // ส่งค่ากลับ
}

// declare function TestReference (pass by reference)
function TestReference(&$num) {
    $num = $num + 10; // เพิ่มค่า $num โดยการส่งผ่านการอ้างอิง
}

function show_form() {
    echo ' <form method="get" action="lab8-6.php">';
    echo '<table border="1" align="center" width="400">';
    echo '<tr><td colspan="2" align="center"><big>การส่งค่าอาร์กิวเมนต์</big></td></tr>';
    echo '<tr><td>การส่งแบบ : </td><td>';
    echo '<input type="radio" name="type" value="1"> Pass by Value <br>';
    echo '<input type="radio" name="type" value="2"> Pass by Reference <br>';
    echo '</td><tr>';
    echo '<tr><td colspan="2" align="center">';
    echo '<input type="submit" value=" OK " />';
    echo '<input type="reset" value=" Clear " /></td></tr></table></form> ';
}

// เริ่มต้นการแสดงผล
page_header("การส่งผ่านค่าอาร์กิวเมนต์", "EEDDFF");

if (isset($_GET['type'])) {
    $n = intval($_GET['type']);
    show_form();
    echo '<hr>';
    
    $value = 10;
    
    if ($n == 1) {
        echo "การเรียกใช้ฟังก์ชั่นแบบ Pass by Value<br>";
        echo "ค่าของ \$value ก่อนเรียกฟังก์ชั่น Test มีค่า = $value <br>";
        $value = TestValue($value); // รับค่ากลับจากฟังก์ชั่น TestValue
        echo "ค่าของ \$value หลังเรียกฟังก์ชั่น Test มีค่า = $value <br>";
    } else {
        echo "การเรียกใช้ฟังก์ชั่นแบบ Pass by Reference<br>";
        echo "ค่าของ \$value ก่อนเรียกฟังก์ชั่น Test มีค่า = $value <br>";
        TestReference($value); // ส่งผ่านการอ้างอิง
        echo "ค่าของ \$value หลังเรียกฟังก์ชั่น Test มีค่า = $value <br>";
    }
} else {
    show_form();
}

page_footer("Thank You.");
?>
