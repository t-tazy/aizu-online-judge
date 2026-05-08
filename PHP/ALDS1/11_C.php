<?php

$n = intval(trim(fgets(STDIN)));
$matrix = array_fill(0, $n, array_fill(0, $n, 0));

// 隣接行列準備
for ($i = 0; $i < $n; $i++) {
    $input = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $u = $input[0] - 1;
    $k = $input[1];

    for ($j = 0; $j < $k; $j++) {
        $v = $input[$j + 2] - 1;
        $matrix[$u][$v] = 1;
    }
}

$distance = array_fill(0, $n, INF); // 訪問状態の管理も
$q = new SplQueue();

function bfs(int $start): void
{
    global $n, $matrix, $distance, $q;

    $q->enqueue($start);
    $distance[$start] = 0;

    while (!$q->isEmpty()) {
        $u = $q->dequeue();

        for ($v = 0; $v < $n; $v++) {
            if ($matrix[$u][$v] === 0) continue;
            if ($distance[$v] !== INF) continue;
            $distance[$v] = $distance[$u] + 1;
            $q->enqueue($v);
        }
    }

    // 出力
    for ($i = 0; $i < $n; $i++) {
        echo ($i + 1) . ' ' . ($distance[$i] === INF ? -1 : $distance[$i]) . "\n";
    }
}

bfs(0);
