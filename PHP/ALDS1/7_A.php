<?php

$n = intval(trim(fgets(STDIN)));

$parent = array_fill(0, $n, -1);
$children = array_fill(0, $n, []);
$depth = array_fill(0, $n, 0);

for ($i = 0; $i < $n; $i++) {
    $line = explode(" ", trim(fgets(STDIN)));
    $id = intval($line[0]);
    $k = intval($line[1]);

    for ($j = 0; $j < $k; $j++) {
        $cId = intval($line[2 + $j]);
        $children[$id][] = $cId;
        $parent[$cId] = $id;
    }
}

// root探す
$root = -1;
for ($i = 0; $i < $n; $i++) {
    if ($parent[$i] === -1) {
        $root = $i;
        break;
    }
}

// 深さ計算（DFS）
function dfs($v, $d, &$children, &$depth)
{
    $depth[$v] = $d;
    foreach ($children[$v] as $c) {
        dfs($c, $d + 1, $children, $depth);
    }
}

dfs($root, 0, $children, $depth);

// 出力
for ($i = 0; $i < $n; $i++) {

    if ($parent[$i] === -1) {
        $type = "root";
    } elseif (count($children[$i]) === 0) {
        $type = "leaf";
    } else {
        $type = "internal node";
    }

    echo "node $i: parent = {$parent[$i]}, depth = {$depth[$i]}, $type, [";

    echo implode(", ", $children[$i]);

    echo "]\n";
}
