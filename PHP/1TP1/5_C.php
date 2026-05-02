<?php

while (1) {
    [$h, $w] = array_map('intval', explode(' ', trim(fgets(STDIN))));
    if ($h === 0 && $w === 0) break;

    for ($i = 1; $i <= $h; $i++) {
        for ($j = 1; $j <= $w; $j++) {
            if ($i % 2 === 0) {
                if ($j % 2 === 0) echo '#';
                else echo '.';
            } else {
                if ($j % 2 === 0) echo '.';
                else echo '#';
            }
        }
        echo "\n";
    }
    echo "\n";
}
