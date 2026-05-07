<?php

class Node {
    public $key;
    public $left = null;
    public $right = null;
    public $parent = null;

    public function __construct($key) {
        $this->key = $key;
    }
}

class BST {
    public $root = null;

    public function find(Node $node, $key) {
        while ($node !== null && $key !== $node->key) {
            if ($key < $node->key) {
                $node = $node->left;
            } else {
                $node = $node->right;
            }
        }

        return $node;
    }

    public function insert($key) {
        $z = new Node($key);
        $y = null; // xの親
        $x = $this->root;

        while ($x !== null) {
            $y = $x;

            if ($z->key < $x->key) {
                $x = $x->left;
            } else {
                $x = $x->right;
            }
        }

        $z->parent = $y;

        if ($y === null) {
            $this->root = $z;
        } else if ($z->key < $y->key) {
            $y->left = $z;
        } else {
            $y->right = $z;
        }
    }

    public function inorder($node, &$res) {
        if ($node === null) return;
        $this->inorder($node->left, $res);
        $res[] = $node->key;
        $this->inorder($node->right, $res);
    }

    public function preorder($node, &$res) {
        if ($node === null) return;
        $res[] = $node->key;
        $this->preorder($node->left, $res);
        $this->preorder($node->right, $res);
    }
}

$n = intval(trim(fgets(STDIN)));
$bst = new BST();

for ($i = 0; $i < $n; $i++) {
    $input = explode(' ', trim(fgets(STDIN)));

    if ($input[0] === "insert") {
        $bst->insert(intval($input[1]));
    } else if ($input[0] === "find") {
        $node = $bst->find($bst->root, intval($input[1]));
        $result = $node !== null ? "yes" : "no";
        echo $result . "\n";
    } else if ($input[0] === "print") {
        $in = [];
        $pre = [];
        $bst->inorder($bst->root, $in);
        $bst->preorder($bst->root, $pre);
        echo " " . implode(" ", $in) . "\n";
        echo " " . implode(" ", $pre) . "\n";
    }
}
