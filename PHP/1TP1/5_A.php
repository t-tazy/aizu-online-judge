<?php

while (1) {
    [$h, $w] = array_map('intval', explode(' ', trim(fgets(STDIN))));
    if ($h === 0 && $w === 0) break;

    for ($i = 0; $i < $h; $i++) {
        for ($j = 0; $j < $w; $j++) {
            echo '#';
        }
        echo "\n";
    }
    echo "\n";
}
