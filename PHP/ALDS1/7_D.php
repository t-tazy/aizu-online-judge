<?php

$n = intval(trim(fgets(STDIN))); // 節点数

$pre = array_map('intval', explode(' ', trim(fgets(STDIN))));
$in = array_map('intval', explode(' ', trim(fgets(STDIN))));

// inorderでの位置を高速に引けるように
// inorderの値のハッシュ
$pos = [];
for ($i = 0; $i < $n; $i++) {
    $pos[$in[$i]] = $i;
}

$result = [];

function build($preLeft, $preRight, $inLeft, $inRight, &$pre, &$pos, &$result)
{
    if ($preLeft > $preRight) return;

    $root = $pre[$preLeft];
    $rootIdx = $pos[$root]; // Inorderでの位置

    $leftSize = $rootIdx - $inLeft; // Inorderから左部分木のサイズを求める

    // Preorderは根→左→右
    // 根は訪問済みのため+1
    // 左部分木（Inorderでの$rootIdxより左の部分木）
    build($preLeft + 1, $preLeft + $leftSize, $inLeft, $rootIdx - 1, $pre, $pos, $result);

    // Preorderは根→左→右
    // 根・左部分木は訪問済みのため+ $leftSize + 1
    // 右部分木
    build($preLeft + $leftSize + 1, $preRight, $rootIdx + 1, $inRight, $pre, $pos, $result);

    $result[] = $root;
}

build(0, $n - 1, 0, $n - 1, $pre, $pos, $result);

echo implode(' ', $result) . "\n";
