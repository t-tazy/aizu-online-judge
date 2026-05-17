<?php

function prim(): int
{
    global $n, $matrix;

    $parent = array_fill(0, $n, -1);
    $minCost = array_fill(0, $n, INF); // 本ではdで表される
    $used = array_fill(0, $n, false); // 本ではcolor

    $minCost[0] = 0;

    while (true) {
        $u = -1;
        $minV = INF;

        for ($i = 0; $i < $n; $i++) {
            if (!$used[$i] && $minCost[$i] < $minV) {
                $u = $i;
                $minV = $minCost[$i];
            }
        }

        if ($u === -1) break; // V - Tがなくなったら

        $used[$u] = true;

        for ($v = 0; $v < $n; $v++) {
            if (!$used[$v] && $matrix[$u][$v] !== INF) {
                if ($matrix[$u][$v] < $minCost[$v]) {
                    $minCost[$v] = $matrix[$u][$v];
                    $parent[$v] = $u;
                }
            }
        }
    }

    $sum = 0;

    for ($i = 0; $i < $n; $i++) {
        if ($parent[$i] !== -1) $sum += $matrix[$i][$parent[$i]];
    }

    return $sum;
}

function main(): void
{
    global $n, $matrix;

    $n = intval(trim(fgets(STDIN)));
    $matrix = array_fill(0, $n, array_fill(0, $n, INF));

    // 隣接行列構築
    for ($i = 0; $i < $n; $i++) {
        $line = array_map('intval', explode(' ', trim(fgets(STDIN))));

        for ($j = 0; $j < $n; $j++) {
            if ($line[$j] !== -1) $matrix[$i][$j] = $line[$j];
        }
    }

    echo prim() . "\n";
}

main();
