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

    public function inorder($node) {
        if ($node === null) return;
        $this->inorder($node->left);
        echo " " . $node->key;
        $this->inorder($node->right);
    }

    public function preorder($node) {
        if ($node === null) return;
        echo " " . $node->key;
        $this->preorder($node->left);
        $this->preorder($node->right);
    }
}

$n = intval(trim(fgets(STDIN)));
$bst = new BST();

for ($i = 0; $i < $n; $i++) {
    $input = explode(' ', trim(fgets(STDIN)));

    if ($input[0] === "insert") {
        $bst->insert(intval($input[1]));
    } else if ($input[0] === "print") {
        $bst->inorder($bst->root);
        echo "\n";
        $bst->preorder($bst->root);
        echo "\n";
    }
}
