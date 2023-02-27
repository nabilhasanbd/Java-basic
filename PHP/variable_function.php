<?php

function hello()
{
    echo "Hello Nabil hasan";
}

$var = "Hello";
$var(); // prints "Hello Nabil hasan"

function add($x, $y)
{
    echo $x + $y;
}

$var = "add";
$var(10, 20); // 30
?>