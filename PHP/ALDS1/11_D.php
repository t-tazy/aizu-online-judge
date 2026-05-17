<?php

function dfs(int $r, int $groupId): void
{
    global $group, $adj;

    $stack = new SplStack();
    $stack->push($r);
    $group[$r] = $groupId;

    while (!$stack->isEmpty()) {
        // $u = $stack->top();
        $u = $stack->pop(); // forで隣接リストから隣接する頂点を全て訪問するので、このタイミングでpop

        for ($i = 0; $i < count($adj[$u]); $i++) {
            $v = $adj[$u][$i]; // 隣接する頂点
            if ($group[$v] === 0) {
                $group[$v] = $groupId;
                $stack->push($v);
            }
        }
    }
}

function assignGroup(): void
{
    global $group, $n;

    $id = 1;
    for ($i = 0; $i < $n; $i++) {
        if ($group[$i] === 0) dfs($i, $id++);
    }
}

function main(): void
{
    global $n, $adj, $group;

    [$n, $m] = array_map('intval', explode(' ', trim(fgets(STDIN))));

    $adj = array_fill(0, $n, []);
    // 属する連結成分番号
    $group = array_fill(0, $n, 0);

    // 友人関係なので無向グラフ
    for ($i = 0; $i < $m; $i++) {
        [$s, $t] = array_map('intval', explode(' ', trim(fgets(STDIN))));
        $adj[$s][] = $t;
        $adj[$t][] = $s;
    }

    assignGroup();

    $q = intval(trim(fgets(STDIN)));

    for ($i = 0; $i < $q; $i++) {
        [$s, $t] = array_map('intval', explode(' ', trim(fgets(STDIN))));
        echo ($group[$s] === $group[$t]) ? "yes\n" : "no\n";
    }
}

main();
