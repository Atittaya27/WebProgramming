<?php //การ return ค่าของ function
function Multiply($n1,$n2)
{
    $result = $n1 * $n2;
    return $result;
}

$num1 = 10;
$num2 = 20;
$resultMultiply = Multiply($num1,$num2);
echo "<br><br>Result Multiply : ".$resultMultiply;
?>