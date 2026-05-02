<?php

$n = intval(trim(fgets(STDIN))); // 使わないか
$intArray = array_map('intval', explode(' ', trim(fgets(STDIN))));

// MEMO: 10^10は扱える
// echo PHP_INT_MAX;

$min = 1000000;
$max = -1000000;
$sum = 0; // array_sumで出せる

array_map(
    function ($val) use (&$min, &$max, &$sum) {
        if ($min > $val) $min = $val;
        if ($max < $val) $max = $val;
        $sum += $val;
    },
    $intArray
);

echo "{$min} {$max} {$sum}\n";
