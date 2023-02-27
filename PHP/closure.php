<?php
$x = 5;
$say = function ($y) use ($x) {
    $x = $x * $y ;
    echo $x ;
};
$say(7);
?>