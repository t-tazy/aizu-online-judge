<?php

function main(): void
{
    [$n, $m] = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $coins = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $dp = array_fill(0, $n + 1, PHP_INT_MAX); // 金額とindexを合わせる
    $dp[0] = 0;

    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j + $coins[$i] <= $n; $j++) {
            $dp[$j + $coins[$i]] = min($dp[$j + $coins[$i]], $dp[$j] + 1); // 式変形
        }
    }

    echo $dp[$n] . "\n";
}

main();
