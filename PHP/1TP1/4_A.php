<?php

[$a, $b] = explode(' ', trim(fgets(STDIN)));

$d = intval($a / $b);
$r = intval($a % $b);
$f = floatval($a / $b);

echo "{$d} {$r} {$f}\n";
