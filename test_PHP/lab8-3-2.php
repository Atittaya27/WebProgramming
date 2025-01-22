<?php //การเรียกค่ามาใช้งานที่มีการกำหนดค่าไว้
function subtract($n1,$n2 = 50)
{
    $result = $n1 - $n2;
    echo "<br><br>Result Subtract : ".$result;
}
$num1 = 10;
$num2 = 20;
subtract($num1,$num2);

?> 
