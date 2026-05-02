<?php

while (1) {
    [$h, $w] = array_map('intval', explode(' ', trim(fgets(STDIN))));
    if ($h === 0 && $w === 0) break;

    for ($i = 0; $i < $h; $i++) {
        for ($j = 0; $j < $w; $j++) {
            if ($i === 0 || $i === $h - 1 || $j === 0 || $j === $w - 1) echo "#";
            else echo '.';
        }
        echo "\n";
    }
    echo "\n";
}
