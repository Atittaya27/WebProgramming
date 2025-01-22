<?php
if (isset($_GET['submit'])) {
    $number1 = $_GET['number1'];
    $number2 = $_GET['number2'];
    $operator = $_GET['operator'];
    echo "<p>";
    echo "<b>ข้อมูลผู้ใช้ใส่มา </b><br />";
    echo "Number 1 : <i> $number1 </i> <br/>";
    echo "Number 2 : <i> $number2 </i> <br/>";
    echo "Operator : <i> $operator </i> <br/>";
    echo "Result : <i> ";
    if ($operator == "+")echo ($number1 + $number2) ." </i> <br/>";
    if ($operator == "-") echo ($number1 - $number2) ." </i> <br/>";
    if ($operator == "*")echo ($number1 * $number2) ." </i> <br/>";
    if ($operator == "/") echo ($number1 / $number2) ." </i> <br/>";
    if ($operator == "%")echo ($number1 % $number2) ." </i> <br/>";
}

else {
    
    echo "<html>";
    echo "<head><title>การสร้างฟอร์มในการรับค่าเพื่อคำนวณ</title></head>";
    echo "<body>";
    echo "<form method='get' action='testOnepageGet.php'>";
    echo "<table border='1' align='center' width='500'>";
    echo "<tr>";
    echo "<td colspan='2' align='center'>";
    echo "<big>ทดสอบการใช้ Arithmatic Operator </big>";
    echo "</td>";
    echo "<tr>";
    echo "<tr>";
    echo "<td>Enter Number 1 : </td>";
    echo "<td><input type='number' name='number1' min='1' max='100' size='15' value=''/> </td>";
    echo "</tr>";
    echo "<td>Enter Number 2 : </td>";
    echo "<td><input type='text' name='number2' size='15' 'value=''/></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td> Operator : </td>";
    echo "<td align='center'>";
    echo "<input type='radio' name='operator' value='+'> + <br>";
    echo "<input type='radio' name='operator' value='-'> - <br>";
    echo "<input type='radio' name='operator' value='*'> * <br>";
    echo "<input type='radio' name='operator' value='/'> / <br>";
    echo "<input type='radio' name='operator' value='%'> % <br>";
    echo "</td>";
    echo "<tr>";
    echo "<tr>";
    echo "<td colspan='2' align='center'>";
    echo "<input type='submit' name = 'submit' value='OK ' />";
    echo "<input type='reset' name = 'reset' value=' Clear ' />";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</form>";
    echo "</body>";
    echo "</html>";
    
}

?>