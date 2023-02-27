<?php

function my_callback($item)
{
    return strlen($item);
}

$strings = ["apple", "orange", "banana", "coconut"];
$lengths = array_map("my_callback", $strings);
print_r($lengths);


// same code differently


$strings = ["apple", "orange", "banana", "coconut"];
$lengths = array_map(function ($item) {
    return strlen($item);
}, $strings);
print_r($lengths);
?>