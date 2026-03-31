<?php

function bubbleSort(array $array) {
    $n = count($array);

    for ($i = 0; $i < $n; $i++) {
        for ($j =  $n - 1; $j > $i; $j--) {
            if ($array[$j - 1] > $array[$j]) {
                $tmp = $array[$j];
                $array[$j] = $array[$j - 1];
                $array[$j - 1] = $tmp;
            }
        }
    }

    return $array;
}

$array = explode(' ', trim(fgets(STDIN)));

$sorted = bubbleSort($array);

echo implode(' ', $sorted), "\n";
