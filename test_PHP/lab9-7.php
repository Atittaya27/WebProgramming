<html>
<head><title>แสดงการสร้างและเข้าถึง Numeric Array แบบหลายมิติ</title></head>
<body>
<?php
$maxRow = 20;  
$maxCol = 4;   
$score = array(); 

for ( $r = 0; $r < $maxRow; $r++ ) {
    for ( $c = 0; $c < $maxCol ; $c++ ) {
        if ($c == 0) {
            $score[$r][$c] = rand(0, 10);  
        } elseif ($c == 1) {
            $score[$r][$c] = rand(0, 20);  
        } elseif ($c == 2) {
            $score[$r][$c] = rand(0, 35);  
        } elseif ($c == 3) {
            $score[$r][$c] = rand(0, 35); 
        }
}
}
echo "<table border='1' align='center' width='80%'>";
echo "<tr><th width='80' align='center'>Homework</th>";
echo "<th width='80' align='center'>Assignment</th>";
echo "<th width='80' align='center'>Midterm</th>";
echo "<th width='80' align='center'>Final</th></tr>";

for ( $r = 0; $r < $maxRow; $r++ ) {
    echo "<tr>";
    for ( $c = 0; $c < $maxCol; $c++ ) {
        echo "<td align='center'>" . $score[$r][$c] . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
</body>
</html>
