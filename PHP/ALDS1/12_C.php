<?php

class Solution {
    public $n;
    public $adj; // 隣接リスト

    public function dijkstra(): array
    {
        $pq = new SplPriorityQueue();
        $minDistance = array_fill(0, $this->n, PHP_INT_MAX);
        // $used = array_fill(0, $this->n, false);

        $minDistance[0] = 0;
        $pq->insert([0, 0], 0);
        // $pq->insert(0, 0);

        while (!$pq->isEmpty()) {
            [$u, $curDistance] = $pq->extract();
            // $u = $pq->extract();

            if ($minDistance[$u] < $curDistance) continue;

            // $used[$u] = true;

            foreach ($this->adj[$u] as [$v, $c]) {
                // if (!$used[$v] && $minDistance[$u] + $c < $minDistance[$v]) {
                if ($minDistance[$u] + $c < $minDistance[$v]) {
                    $minDistance[$v] = $minDistance[$u] + $c;
                    $pq->insert([$v, $minDistance[$v]], -$minDistance[$v]); // SplPriorityQueueは最大ヒープなので最小ヒープ化
                    // $pq->insert($v, -$minDistance[$v]);
                }
            }
        }

        return $minDistance;
    }

    public function main(): void
    {
        $this->n = intval(trim(fgets(STDIN)));
        $this->adj = array_fill(0, $this->n, []);

        // 重み付き有向グラフ
        for ($i = 0; $i < $this->n; $i++) {
            $line = array_map('intval', explode(' ', trim(fgets(STDIN))));
            $u = $line[0];
            $k = $line[1];

            for ($j = 0; $j < $k; $j++) {
                $v = $line[2 + $j * 2];
                $c = $line[3 + $j * 2];
                $this->adj[$u][] = [$v, $c];
            }
        }

        foreach ($this->dijkstra() as $i => $d) {
            echo $i . ' ' . $d . "\n";
        }
    }
}

$solution = new Solution();
$solution->main();
