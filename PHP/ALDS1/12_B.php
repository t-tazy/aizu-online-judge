<?php

function dijkstra()
{
    global $n, $matrix;

    $minDistance = array_fill(0, $n, PHP_INT_MAX);
    $used = array_fill(0, $n, false);

    $minDistance[0] = 0;

    while (true) {
        $u = -1;
        $minCost = PHP_INT_MAX;

        for ($i = 0; $i < $n; $i++) {
            if (!$used[$i] && $minDistance[$i] < $minCost) {
                $u = $i;
                $minCost = $minDistance[$i];
            }
        }

        if ($u === -1) break;

        $used[$u] = true;

        for ($v = 0; $v < $n; $v++) {
            if (!$used[$v] && $matrix[$u][$v] !== PHP_INT_MAX) {
                if ($minDistance[$u] + $matrix[$u][$v] < $minDistance[$v]) {
                    $minDistance[$v] = $minDistance[$u] + $matrix[$u][$v];
                }
            }
        }
    }

    foreach ($minDistance as $i => $minD) {
        echo $i . ' ' . ($minD === PHP_INT_MAX ? -1 : $minD) . "\n";
    }
}

function main(): void
{
    global $n, $matrix;

    $n = intval(trim(fgets(STDIN)));
    $matrix = array_fill(0, $n, array_fill(0, $n, PHP_INT_MAX));

    // 重み付き有向グラフ
    for ($i = 0; $i < $n; $i++) {
        $line = array_map('intval', explode(' ', trim(fgets(STDIN))));
        $u = $line[0];
        $k = $line[1];

        for ($j = 0; $j < $k; $j++) {
            $v = $line[2 + $j * 2];
            $c = $line[3 + $j * 2];
            $matrix[$u][$v] = $c;
        }
    }

    dijkstra();
}

main();
