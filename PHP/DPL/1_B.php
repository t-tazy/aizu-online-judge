<?php

function main(): void
{
    [$N, $W] = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $items = [];

    for ($i = 0; $i < $N; $i++) {
        [$v, $w] = array_map('intval', explode(' ', trim(fgets(STDIN))));
        $items[] = [$v, $w];
    }

    // 2次元DPで解く
    // この問題の場合1次元DPでも良さそう
    // 選択した品物を記録したいならmaxは使えない
    $dp = array_fill(0, $N + 1, array_fill(0, $W + 1, 0));

    for ($i = 0; $i < $N; $i++) {
        [$value, $weight] = $items[$i];

        for ($j = 1; $j <= $W; $j++) {
            $dp[$i + 1][$j] = $dp[$i][$j]; // 品物iを使わない

            if ($weight > $j) continue;

            // 品物iを使った方が大きなら更新
            $dp[$i + 1][$j] = max($dp[$i + 1][$j], $dp[$i][$j - $weight] + $value);
        }
    }

    echo $dp[$N][$W] . "\n";
}

main();
