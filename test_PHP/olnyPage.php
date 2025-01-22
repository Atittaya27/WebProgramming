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
     ?>
     <html>
    <head><title>การสร้างฟอร์มในการรับค่าเพื่อคำนวณ</title></head>
     <body>
     <form method="get" action="olny.php">
     <table border="1" align="center" width="500">
    <tr>
    <td colspan="2" align="center">
    <big>ทดสอบการใช้ Arithmatic Operator </big>
    </td>
   <tr>
    <tr>
    <td>Enter Number 1 : </td>
    <td><input type="number" name="number1" min="1" max="100" size="15" value=""/> </td>
    </tr>
    <td>Enter Number 2 : </td>
    <td><input type="text" name="number2" size="15" value=""/></td>
    </tr>
    <tr>
    <td> Operator : </td>
    <td align="center">
    <input type="radio" name="operator" value="+"> + <br>
    <input type="radio" name="operator" value="-"> - <br>
    <input type="radio" name="operator" value="*"> * <br>
    <input type="radio" name="operator" value="/"> / <br>
    <input type="radio" name="operator" value="%"> % <br>
    </td>
     <tr>
    <tr>
    <td colspan="2" align="center">
    <input type="submit" name = "submit" value=" OK " />
     <input type="reset" name = "reset" value=" Clear " />
    </td>
    </tr>
    </table>
    </form>
    </body>
    </html>
    <?php
}

?>