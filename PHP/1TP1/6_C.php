<?php

$building = array_fill(
    1,
    4,
    array_fill(
        1,
        3,
        array_fill(
            1,
            10,
            0
        )
    )
);

$n = intval(trim(fgets(STDIN)));

for ($i = 0; $i < $n; $i++) {
    [$b, $f, $r, $v] = explode(' ', trim(fgets(STDIN)));
    $building[$b][$f][$r] += $v;
}

for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        for ($k = 1; $k <= 10; $k++) {
            echo ' ', $building[$i][$j][$k];
            if ($k === 10) echo "\n";
        }
    }
    if ($i !== 4) echo str_repeat('#', 20), "\n";
}
