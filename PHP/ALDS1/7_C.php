<?php

$n = intval(trim(fgets(STDIN)));

$left = array_fill(0, $n, -1);
$right = array_fill(0, $n, -1);
$parent = array_fill(0, $n, -1);

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

// 各走査

// vが-1ならreturn
// その後、nodeがあるなら$resに追加する、つまり訪問したこととする
// これは再帰呼び出しの前のタイミング
function preorder($v, &$left, &$right, &$res)
{
    if ($v === -1) return;
    $res[] = $v; // 部分木の根節点
    preorder($left[$v], $left, $right, $res); // 左
    preorder($right[$v], $left, $right, $res); // 右
}

// 左部分木の再帰呼び出しが終わったら
// $resに$vを追加する（rootがresに追加されるのは、rootの左部分木が再帰的に訪問された後）
// その後、右部分木を再帰的に訪問
function inorder($v, &$left, &$right, &$res)
{
    if ($v === -1) return;
    inorder($left[$v], $left, $right, $res); // 左
    $res[] = $v; // 部分木の根節点
    inorder($right[$v], $left, $right, $res); // 右
}

// 左部分木、右部分木の訪問後、根節点を$resに追加する
function postorder($v, &$left, &$right, &$res)
{
    if ($v === -1) return;
    postorder($left[$v], $left, $right, $res); // 左
    postorder($right[$v], $left, $right, $res); // 右
    $res[] = $v; // 部分木の根節点
}

$pre = [];
$in = [];
$post = [];

preorder($root, $left, $right, $pre);
inorder($root, $left, $right, $in);
postorder($root, $left, $right, $post);

// 出力
echo "Preorder\n";
echo " " . implode(" ", $pre) . "\n";
echo "Inorder\n";
echo " " . implode(" ", $in) . "\n";
echo "Postorder\n";
echo " " . implode(" ", $post) . "\n";
