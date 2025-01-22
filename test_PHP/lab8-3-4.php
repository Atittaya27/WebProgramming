<?php //การเรียกค่าแบบ pass by reference
function Divide($n1,$n2,&$result)
{
    $result = $n1 / $n2;
}

$num1 = 8;
$num2 = 16;
Divide($num1,$num2,$resultDivide);
echo "<br><br>Result Divide : ".$resultDivide;
?>