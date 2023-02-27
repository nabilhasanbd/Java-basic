<?php

$y = 1;
$fn1 = fn($x) => $x + $y;
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

echo($fn1(3));
?>