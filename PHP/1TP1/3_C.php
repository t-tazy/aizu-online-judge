<?php

while (1) {
    [$x, $y] = array_map('intval', explode(' ', trim(fgets(STDIN))));
    if ($x === 0 && $y === 0) break;

    if ($x > $y) echo "{$y} {$x}\n";
    else echo "{$x} {$y}\n";
}
