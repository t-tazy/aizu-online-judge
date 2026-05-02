<?php

$n = intval(trim(fgets(STDIN)));

$parent = array_fill(0, $n, -1);
$left = array_fill(0, $n, -1);
$right = array_fill(0, $n, -1);
$depth = array_fill(0, $n, 0);
$height = array_fill(0, $n, 0);

// 入力
for ($i = 0; $i < $n; $i++) {
    [$id, $l, $r] = array_map('intval', explode(' ', trim(fgets(STDIN))));

     $left[$id] = $l;
     $right[$id] = $r;

     if ($l !== -1) $parent[$l] = $id;
     if ($r !== -1) $parent[$r] = $id;
}

// root探す
$root = -1;
for ($i = 0; $i < $n; $i++) {
    if ($parent[$i] === -1) {
        $root = $i;
        break;
    }
}

// 深さ計算
function setDepth($v, $d, &$left, &$right, &$depth)
{
     if ($v === -1) return;
     $depth[$v] = $d;
     setDepth($left[$v], $d + 1, $left, $right, $depth);
     setDepth($right[$v], $d + 1, $left, $right, $depth);
}

function setHeight($v, &$left, &$right, &$height)
{
    if ($v === -1) return -1; // 葉の高さは0となるので、ここでは-1

    $h1 = setHeight($left[$v], $left, $right, $height);
    $h2 = setHeight($right[$v], $left, $right, $height);

    $height[$v] = max($h1, $h2) + 1; // ここで+1
    return $height[$v];
}

setDepth($root, 0, $left, $right, $depth);
setHeight($root, $left, $right, $height);

// 出力
for ($i = 0; $i < $n; $i++) {
    // sibling
    if ($parent[$i] === -1) {
        // rootなら兄弟要素なし
        $sibling = -1;
    } else {
        $p = $parent[$i];
        // $iが左の子か右の子かで兄弟を探す
        if ($left[$p] === $i) {
            $sibling = $right[$p];
        } else {
            $sibling = $left[$p];
        }
    }

    // degree
    $deg = 0;
    if ($left[$i] !== -1) $deg++;
    if ($right[$i] !== -1) $deg++;

    // type
    if ($parent[$i] === -1) {
        $type = "root";
    } elseif ($deg === 0) {
        $type = "leaf";
    } else {
        $type = "internal node";
    }

    echo "node {$i}: ";
    echo "parent = {$parent[$i]}, ";
    echo "sibling = {$sibling}, ";
    echo "degree = {$deg}, ";
    echo "depth = {$depth[$i]}, ";
    echo "height = {$height[$i]}, ";
    echo "{$type}\n";
}
