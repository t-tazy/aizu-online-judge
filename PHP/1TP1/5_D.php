<?php

/**
 * 与えられた数値までで3の倍数もしくは3を含む数を出力する 
 */

$n = intval(trim(fgets(STDIN)));

for ($i = 1; $i <= $n; $i++) {
    if ($i % 3 === 0) {
        echo " {$i}";
        continue;
    }

    for ($j = $i; $j; $j = intdiv($j, 10)) {
        if ($j % 10 === 3) {
            echo " {$i}";
            break;
        }
    }
}

echo "\n";
