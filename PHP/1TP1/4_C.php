<?php

while (1) {
    [$a, $op, $b] = explode(' ', trim(fgets(STDIN)));
    $a = (int) $a;
    $b = (int) $b;

    if ($op === '?') break;

    $result = match ($op) {
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
        '/' => $a / $b
    };

    echo $result, "\n";
}
