<?php 
function add($n1,$n2)
{
    $result = $n1 + $n2;
    echo "<br><br>Result Add : $n1 + $n2 = $result";
}
$num1 = 10;
$num2 = 20;
add($num1,$num2);

function subtract($n1,$n2 = 50)
{
    $result = $n1 - $n2;
    echo "<br><br>Result Subtract :  $n1 - $n2 = ".$result;
}
$num1 = 10;
$num2 = 20;
subtract($num1,$num2);

function Multiply($n1,$n2)
{
    $result = $n1 * $n2;
    return $result;
}

$num1 = 10;
$num2 = 20;
$resultMultiply = Multiply($num1,$num2);
echo "<br><br>Result Multiply : $num1 * $num2 = ".$resultMultiply;

function Divide($n1,$n2,&$result)
{
    $result = $n1 / $n2;
}

$num1 = 8;
$num2 = 16;
Divide($num1,$num2,$resultDivide);
echo "<br><br>Result Divide : $num1 / $num2 = ".$resultDivide;

?> 
