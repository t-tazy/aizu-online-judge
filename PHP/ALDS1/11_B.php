<?php

$n = intval(trim(fgets(STDIN)));
$matrix = array_fill(0, $n, array_fill(0, $n, 0));

// 隣接行列準備
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

$time = 0;
const WHITE = 0; // 未訪問
const GRAY = 1; // 訪問済み
const BLACK = 2; // 訪問完了（未訪問の隣接なし）
$color = array_fill(0, $n, WHITE); // 訪問状態をWHITE, GRAY, BLACKで管理
$d = array_fill(0, $n, 0); // 発見時刻
$f = array_fill(0, $n, 0); // 訪問完了時刻

/**
 * 再帰によるDFS
 *
 * @param int $u 頂点インデックス 
 *
 * @return void
 */
function dfsVisit(int $u): void {
    global $color, $d, $f, $time, $matrix, $n;

    $color[$u] = GRAY;
    $d[$u] = ++$time;

    // 全隣接頂点
    for ($v = 0; $v < $n; $v++) {
        if ($matrix[$u][$v] === 0) continue;
        if ($color[$v] === WHITE) {
            dfsVisit($v);
        }
    }

    // 未訪問の隣接なし
    $color[$u] = BLACK;
    $f[$u] = ++$time;
}

function dfs() {
    global $color, $time, $n, $d, $f;

    // 初期化
    for ($i = 0; $i < $n; $i++) {
        $color[$i] = WHITE;
    }
    $time = 0;

    // 探索
    for ($i = 0; $i < $n; $i++) {
        if ($color[$i] === WHITE) dfsVisit($i);
    }

    // 出力
    for ($i = 0; $i < $n; $i++) {
        echo ($i + 1) . ' ' . $d[$i] . ' ' . $f[$i] . "\n";
    }
}

dfs();

/**
 * Stackを使うバージョン
 */
$next = array_fill(0, $n, 0);

/**
 * 隣接する頂点を順番に取得
 */
function nextNode(int $u): int {
    global $next, $n, $matrix;

    for ($v = $next[$u]; $v < $n; $v++) {
        $next[$u] = $v + 1;
        if ($matrix[$u][$v]) return $v;
    }

    return -1;
}

function dfsVisitWithStack(int $r) {
    global $color, $d, $f, $time, $matrix, $n, $next;

    // 多分いらない
    // for ($i = 0; $i < $n; $i++) {
    //     $next[$i] = 0;
    // }

    $stack = new SplStack();
    $stack->push($r);
    $color[$r] = GRAY;
    $d[$r] = ++$time;

    while (!$stack->isEmpty()) {
        $u = $stack->top();
        $v = nextNode($u);

        if ($v !== -1) {
            if ($color[$v] === WHITE) {
                $color[$v] = GRAY;
                $d[$v] = ++$time;
                $stack->push($v);
            }
        } else {
            $stack->pop();
            $color[$u] = BLACK;
            $f[$u] = ++$time;
        }
    }
}

function dfsWithStack() {
    global $color, $time, $n, $d, $f, $next;

    // 初期化
    for ($i = 0; $i < $n; $i++) {
        $color[$i] = WHITE;
        $next[$i] = 0;
    }
    $time = 0;

    // 探索
    for ($i = 0; $i < $n; $i++) {
        if ($color[$i] === WHITE) dfsVisitWithStack($i);
    }

    // 出力
    for ($i = 0; $i < $n; $i++) {
        echo ($i + 1) . ' ' . $d[$i] . ' ' . $f[$i] . "\n";
    }
}

dfsWithStack();
