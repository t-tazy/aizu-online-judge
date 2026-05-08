<?php

$n = intval(trim(fgets(STDIN)));
$matrix = array_fill(0, $n, array_fill(0, $n, 0));

for ($i = 0; $i < $n; $i++) {
    $input = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $u = $input[0] - 1;
    $k = $input[1]; // 出次数

    // 与えられるのは有向グラフ
    for ($j = 0; $j < $k; $j++) {
        $v = $input[2 + $j] - 1;
        $matrix[$u][$v] = 1;
    }
}

for ($i = 0; $i < $n; $i++) {
    echo implode(" ", $matrix[$i]) . "\n";
}
